<?php

namespace App\Livewire\Admin;

use App\Models\HomeFinderAssignment;
use App\Models\HomeFinderMessage;
use App\Models\HomeFinderRequest;
use App\Models\HomeFinderSmsLead;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class HomeFinderRequests extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $selectedRequestId = null;
    public $selectedAgentId = '';
    public $messageBody = '';
    public $reviewNotes = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    public function mount()
    {
        if (auth()->user()?->user_type !== 'savanna') {
            abort(403);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function selectRequest($requestId)
    {
        $this->selectedRequestId = $requestId;
        $request = HomeFinderRequest::with('assignments')->find($requestId);
        $this->selectedAgentId = $request?->assignments->first()?->agent_id ?? '';
        $this->messageBody = '';
        $this->reviewNotes = '';
    }

    public function assignAgent()
    {
        $this->validate([
            'selectedRequestId' => 'required|integer',
            'selectedAgentId' => 'required|integer',
            'reviewNotes' => 'nullable|string|max:1000',
        ]);

        $request = HomeFinderRequest::find($this->selectedRequestId);
        if (!$request) {
            session()->flash('error', 'Request not found.');
            return;
        }

        $assignment = HomeFinderAssignment::firstOrCreate(
            [
                'home_finder_request_id' => $request->id,
                'agent_id' => $this->selectedAgentId,
            ],
            [
                'assigned_by' => auth()->id(),
                'status' => 'reviewed',
                'review_notes' => $this->reviewNotes ?: null,
            ]
        );

        if (!$assignment->wasRecentlyCreated) {
            $assignment->update([
                'assigned_by' => auth()->id(),
                'review_notes' => $this->reviewNotes ?: $assignment->review_notes,
            ]);
        }

        $request->update(['status' => 'reviewed']);
        session()->flash('message', 'Agent assigned for review.');
    }

    public function sendLead()
    {
        $this->validate([
            'selectedRequestId' => 'required|integer',
            'selectedAgentId' => 'required|integer',
        ]);

        $request = HomeFinderRequest::find($this->selectedRequestId);
        if (!$request) {
            session()->flash('error', 'Request not found.');
            return;
        }

        $agent = User::find($this->selectedAgentId);
        if (!$agent || $agent->user_type !== 'agent') {
            session()->flash('error', 'Selected agent is invalid.');
            return;
        }

        $agentPhone = $agent->phone ?? '';
        if (trim($agentPhone) === '') {
            session()->flash('error', 'Agent phone number is missing.');
            return;
        }

        $assignment = HomeFinderAssignment::firstOrCreate(
            [
                'home_finder_request_id' => $request->id,
                'agent_id' => $agent->id,
            ],
            [
                'assigned_by' => auth()->id(),
                'status' => 'sent',
            ]
        );

        $assignment->update([
            'status' => 'sent',
            'sent_at' => now(),
        ]);

        $request->update(['status' => 'sent_to_agent']);

        $smsMessage = $this->buildSmsMessage($request, $agent);
        HomeFinderSmsLead::create([
            'home_finder_request_id' => $request->id,
            'agent_id' => $agent->id,
            'phone' => $agentPhone,
            'message' => $smsMessage,
            'status' => 'sent',
            'sent_at' => now(),
        ]);

        HomeFinderMessage::create([
            'home_finder_request_id' => $request->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $agent->id,
            'message' => "Lead sent via SMS.\n\n" . $smsMessage,
        ]);

        Log::info('Home finder lead SMS sent', [
            'request_id' => $request->id,
            'agent_id' => $agent->id,
            'phone' => $agentPhone,
        ]);

        session()->flash('message', 'Lead sent to agent via SMS.');
    }

    public function sendMessage()
    {
        $this->validate([
            'selectedRequestId' => 'required|integer',
            'selectedAgentId' => 'required|integer',
            'messageBody' => 'required|string|min:2|max:2000',
        ]);

        HomeFinderMessage::create([
            'home_finder_request_id' => $this->selectedRequestId,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->selectedAgentId,
            'message' => $this->messageBody,
        ]);

        $this->messageBody = '';
        session()->flash('message', 'Message sent to agent.');
    }

    protected function buildSmsMessage(HomeFinderRequest $request, User $agent): string
    {
        $parts = [
            'New Home Finder Lead',
            'Client: ' . $request->name . ' (' . $request->phone . ')',
            'Email: ' . $request->email,
            'Location: ' . trim($request->region . ', ' . $request->district . ', ' . ($request->ward ?: '')),
            'Property: ' . $request->property_category . ' / ' . $request->property_type,
        ];

        if ($request->rooms) {
            $parts[] = 'Rooms: ' . $request->rooms;
        }
        if ($request->area_sqm) {
            $parts[] = 'Area: ' . $request->area_sqm . ' sqm';
        }
        if ($request->budget_min || $request->budget_max) {
            $parts[] = 'Budget: ' . ($request->budget_min ?: '-') . ' - ' . ($request->budget_max ?: '-');
        }
        if ($request->payment_terms) {
            $parts[] = 'Terms: ' . $request->payment_terms;
        }
        if ($request->note) {
            $parts[] = 'Note: ' . $request->note;
        }

        return implode("\n", $parts);
    }

    public function getSelectedRequestProperty()
    {
        if (!$this->selectedRequestId) {
            return null;
        }

        return HomeFinderRequest::with(['assignments.agent', 'smsLeads'])
            ->find($this->selectedRequestId);
    }

    public function getConversationMessagesProperty()
    {
        if (!$this->selectedRequestId) {
            return collect();
        }

        $query = HomeFinderMessage::where('home_finder_request_id', $this->selectedRequestId);
        if ($this->selectedAgentId) {
            $agentId = $this->selectedAgentId;
            $userId = auth()->id();
            $query->where(function ($builder) use ($agentId, $userId) {
                $builder->where(function ($q) use ($agentId, $userId) {
                    $q->where('sender_id', $userId)->where('receiver_id', $agentId);
                })->orWhere(function ($q) use ($agentId, $userId) {
                    $q->where('sender_id', $agentId)->where('receiver_id', $userId);
                });
            });
        }

        return $query->with(['sender', 'receiver'])->orderBy('created_at')->get();
    }

    public function render()
    {
        $requests = HomeFinderRequest::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%')
                        ->orWhere('region', 'like', '%' . $this->search . '%')
                        ->orWhere('district', 'like', '%' . $this->search . '%')
                        ->orWhere('ward', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->withCount(['assignments', 'smsLeads'])
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $agents = User::where('user_type', 'agent')
            ->orderBy('name')
            ->get(['id', 'name', 'email', 'phone']);

        return view('livewire.admin.home-finder-requests', [
            'requests' => $requests,
            'agents' => $agents,
            'selectedRequest' => $this->selectedRequest,
            'conversationMessages' => $this->conversationMessages,
        ])->layout('components.layouts.app');
    }
}
