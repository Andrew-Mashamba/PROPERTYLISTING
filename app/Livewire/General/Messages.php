<?php

namespace App\Livewire\General;

use Livewire\Component;

class Messages extends Component
{
    public $selectedConversation = null;
    public $messageText = '';
    public $search = '';

    public function selectConversation($conversationId)
    {
        $this->selectedConversation = $conversationId;
    }

    public function sendMessage()
    {
        $this->messageText = '';
        session()->flash('message', 'Message sent successfully.');
    }

    public function render()
    {
        $conversations = [
            (object)[
                'id' => 1,
                'user' => 'John Mwamba',
                'avatar' => null,
                'last_message' => 'Thank you for the quick response!',
                'unread' => 2,
                'timestamp' => '2024-10-17 10:30:00'
            ],
            (object)[
                'id' => 2,
                'user' => 'Sarah Kilimo',
                'avatar' => null,
                'last_message' => 'Is the property still available?',
                'unread' => 0,
                'timestamp' => '2024-10-16 15:45:00'
            ]
        ];

        $messages = [
            (object)[
                'id' => 1,
                'sender' => 'John Mwamba',
                'message' => 'Hello, I\'m interested in the apartment.',
                'timestamp' => '2024-10-17 10:00:00',
                'is_mine' => false
            ],
            (object)[
                'id' => 2,
                'sender' => 'You',
                'message' => 'Thank you for your interest! The apartment is available.',
                'timestamp' => '2024-10-17 10:15:00',
                'is_mine' => true
            ]
        ];

        return view('livewire.general.messages', [
            'conversations' => $conversations,
            'messages' => $messages
        ]);
    }
}
