<?php

namespace App\Livewire\Agent;

use App\Models\HomeFinderAssignment;
use App\Models\HomeFinderMessage;
use App\Models\HomeFinderRequest;
use Livewire\Component;
use Livewire\WithPagination;

class HomeFinderLeads extends Component
{
    use WithPagination;

    public $selectedRequestId = null;
    public $messageBody = '';

    public function mount()
    {
        $userType = auth()->user()?->user_type;
        if (!in_array($userType, ['agent', 'savanna'], true)) {
            abort(403);
        }
    }

    public function selectRequest($requestId)
    {
        $this->selectedRequestId = $requestId;
        $this->messageBody = '';
    }

    public function sendMessage()
    {
        $this->validate([
            'selectedRequestId' => 'required|integer',
            'messageBody' => 'required|string|min:2|max:2000',
        ]);

        $assignment = HomeFinderAssignment::where('home_finder_request_id', $this->selectedRequestId)
            ->where('agent_id', auth()->id())
            ->latest()
            ->first();

        if (!$assignment) {
            session()->flash('error', 'No assignment found for this request.');
            return;
        }

        HomeFinderMessage::create([
            'home_finder_request_id' => $this->selectedRequestId,
            'sender_id' => auth()->id(),
            'receiver_id' => $assignment->assigned_by,
            'message' => $this->messageBody,
        ]);

        $this->messageBody = '';
        session()->flash('message', 'Message sent to Savanna.');
    }

    public function getSelectedRequestProperty()
    {
        if (!$this->selectedRequestId) {
            return null;
        }

        return HomeFinderRequest::find($this->selectedRequestId);
    }

    public function getConversationMessagesProperty()
    {
        if (!$this->selectedRequestId) {
            return collect();
        }

        $userId = auth()->id();
        return HomeFinderMessage::where('home_finder_request_id', $this->selectedRequestId)
            ->where(function ($builder) use ($userId) {
                $builder->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            })
            ->with(['sender', 'receiver'])
            ->orderBy('created_at')
            ->get();
    }

    public function render()
    {
        $assignments = HomeFinderAssignment::with('request')
            ->where('agent_id', auth()->id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.agent.home-finder-leads', [
            'assignments' => $assignments,
            'selectedRequest' => $this->selectedRequest,
            'conversationMessages' => $this->conversationMessages,
        ])->layout('components.layouts.app');
    }
}
