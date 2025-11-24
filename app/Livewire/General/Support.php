<?php

namespace App\Livewire\General;

use App\Models\SupportTicket;
use App\Models\SupportMessage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Support extends Component
{
    use WithFileUploads;

    public $activeTab = 'tickets';
    public $selectedTicket = null;
    public $newMessage = '';
    public $attachment = null;
    
    public $subject = '';
    public $category = 'general';
    public $priority = 'normal';
    public $initialMessage = '';

    public function mount()
    {
        $this->loadTickets();
    }

    public function loadTickets()
    {
        $tickets = SupportTicket::where('user_id', auth()->id())
            ->with(['messages', 'assignedTo'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        if ($tickets->isEmpty() && $this->selectedTicket === null) {
            $this->activeTab = 'new';
        }
    }

    public function createTicket()
    {
        $this->validate([
            'subject' => 'required|min:5|max:255',
            'category' => 'required',
            'priority' => 'required',
            'initialMessage' => 'required|min:10',
        ]);

        $ticket = SupportTicket::create([
            'user_id' => auth()->id(),
            'ticket_number' => SupportTicket::generateTicketNumber(),
            'subject' => $this->subject,
            'category' => $this->category,
            'priority' => $this->priority,
            'status' => 'open',
            'last_reply_at' => now(),
        ]);

        SupportMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => auth()->id(),
            'message' => $this->initialMessage,
            'is_admin' => false,
        ]);

        $this->reset(['subject', 'category', 'priority', 'initialMessage']);
        $this->selectedTicket = $ticket->id;
        $this->activeTab = 'chat';
        
        session()->flash('message', 'Support ticket created successfully!');
    }

    public function selectTicket($ticketId)
    {
        $this->selectedTicket = $ticketId;
        $this->activeTab = 'chat';
        $this->markMessagesAsRead($ticketId);
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required|min:1',
            'attachment' => 'nullable|file|max:5120',
        ]);

        $attachmentPath = null;
        if ($this->attachment) {
            $attachmentPath = $this->attachment->store('support-attachments', 'public');
        }

        $message = SupportMessage::create([
            'ticket_id' => $this->selectedTicket,
            'user_id' => auth()->id(),
            'message' => $this->newMessage,
            'attachment' => $attachmentPath,
            'is_admin' => false,
        ]);

        $ticket = SupportTicket::find($this->selectedTicket);
        $ticket->update(['last_reply_at' => now()]);

        $this->reset(['newMessage', 'attachment']);
    }

    public function markMessagesAsRead($ticketId)
    {
        SupportMessage::where('ticket_id', $ticketId)
            ->where('is_admin', true)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }

    public function closeTicket()
    {
        $ticket = SupportTicket::find($this->selectedTicket);
        $ticket->update([
            'status' => 'closed',
            'closed_at' => now(),
        ]);

        $this->selectedTicket = null;
        $this->activeTab = 'tickets';
        session()->flash('message', 'Ticket closed successfully.');
    }

    public function render()
    {
        $tickets = SupportTicket::where('user_id', auth()->id())
            ->with(['messages', 'assignedTo'])
            ->orderBy('created_at', 'desc')
            ->get();

        $currentTicket = null;
        $messages = collect();

        if ($this->selectedTicket) {
            $currentTicket = SupportTicket::with(['messages.user', 'assignedTo'])->find($this->selectedTicket);
            $messages = $currentTicket->messages()->with('user')->orderBy('created_at', 'asc')->get();
        }

        return view('livewire.general.support', [
            'tickets' => $tickets,
            'currentTicket' => $currentTicket,
            'messages' => $messages,
        ]);
    }
}
