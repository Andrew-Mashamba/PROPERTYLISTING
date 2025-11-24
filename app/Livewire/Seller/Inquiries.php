<?php

namespace App\Livewire\Seller;

use Livewire\Component;
use App\Models\Inquiry;
use App\Models\Property;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class Inquiries extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $priority = '';
    public $propertyId = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    public $showReplyModal = false;
    public $replyingToInquiry = null;
    public $replyMessage = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'priority' => ['except' => ''],
        'propertyId' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updateStatus($inquiryId, $status)
    {
        $inquiry = Inquiry::find($inquiryId);
        if ($inquiry && $inquiry->to_user_id === auth()->id()) {
            $inquiry->update(['status' => $status]);
            session()->flash('message', 'Inquiry status updated.');
        }
    }

    public function updatePriority($inquiryId, $priority)
    {
        $inquiry = Inquiry::find($inquiryId);
        if ($inquiry && $inquiry->to_user_id === auth()->id()) {
            $inquiry->update(['priority' => $priority]);
            session()->flash('message', 'Inquiry priority updated.');
        }
    }

    public function deleteInquiry($inquiryId)
    {
        $inquiry = Inquiry::find($inquiryId);
        if ($inquiry && $inquiry->to_user_id === auth()->id()) {
            $inquiry->delete();
            session()->flash('message', 'Inquiry deleted successfully.');
        }
    }

    public function openReplyModal($inquiryId)
    {
        $inquiry = Inquiry::with(['fromUser', 'property'])->find($inquiryId);
        if ($inquiry && $inquiry->to_user_id === auth()->id()) {
            $this->replyingToInquiry = $inquiry;
            $this->replyMessage = '';
            $this->showReplyModal = true;
            
            if ($inquiry->status === 'new') {
                $inquiry->update(['status' => 'read', 'read_at' => now()]);
            }
        }
    }

    public function closeReplyModal()
    {
        $this->showReplyModal = false;
        $this->replyingToInquiry = null;
        $this->replyMessage = '';
        $this->resetValidation();
    }

    public function sendReply()
    {
        $this->validate([
            'replyMessage' => 'required|string|min:10',
        ]);

        if (!$this->replyingToInquiry || $this->replyingToInquiry->to_user_id !== auth()->id()) {
            session()->flash('error', 'Invalid inquiry.');
            return;
        }

        try {
            $inquiry = $this->replyingToInquiry;
            $recipientEmail = $inquiry->contact_email ?? $inquiry->fromUser->email;
            $recipientName = $inquiry->fromUser->name;
            $senderName = auth()->user()->name;
            $propertyTitle = $inquiry->property ? $inquiry->property->title : 'N/A';

            Mail::raw(
                "Dear {$recipientName},\n\n" .
                "Thank you for your inquiry regarding: {$propertyTitle}\n\n" .
                "Original Inquiry: {$inquiry->subject}\n\n" .
                "Reply from {$senderName}:\n" .
                "{$this->replyMessage}\n\n" .
                "Best regards,\n{$senderName}",
                function ($message) use ($recipientEmail, $senderName) {
                    $message->to($recipientEmail)
                            ->subject('Reply to Your Property Inquiry')
                            ->from(config('mail.from.address'), $senderName);
                }
            );

            $inquiry->update([
                'status' => 'replied',
                'replied_at' => now()
            ]);

            session()->flash('message', 'Reply sent successfully!');
            $this->closeReplyModal();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to send reply: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $inquiries = Inquiry::where('to_user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('subject', 'like', '%' . $this->search . '%')
                      ->orWhere('message', 'like', '%' . $this->search . '%')
                      ->orWhereHas('fromUser', function ($userQuery) {
                          $userQuery->where('name', 'like', '%' . $this->search . '%')
                                   ->orWhere('email', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->when($this->priority, function ($query) {
                $query->where('priority', $this->priority);
            })
            ->when($this->propertyId, function ($query) {
                $query->where('property_id', $this->propertyId);
            })
            ->with(['fromUser', 'property'])
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        $properties = Property::where('user_id', auth()->id())
            ->select('id', 'title')
            ->get();

        return view('livewire.seller.inquiries', [
            'inquiries' => $inquiries,
            'properties' => $properties
        ]);
    }
}
