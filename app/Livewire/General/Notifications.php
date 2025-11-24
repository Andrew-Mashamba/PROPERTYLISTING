<?php

namespace App\Livewire\General;

use Livewire\Component;
use Livewire\WithPagination;

class Notifications extends Component
{
    use WithPagination;

    public $filter = 'all';
    public $perPage = 15;

    public function markAsRead($notificationId)
    {
        session()->flash('message', 'Notification marked as read.');
    }

    public function markAllAsRead()
    {
        session()->flash('message', 'All notifications marked as read.');
    }

    public function deleteNotification($notificationId)
    {
        session()->flash('message', 'Notification deleted.');
    }

    public function render()
    {
        $notifications = collect([
            (object)[
                'id' => 1,
                'type' => 'payment',
                'title' => 'Payment Received',
                'message' => 'You received a payment of TZS 1,200,000 from John Mwamba',
                'read' => false,
                'created_at' => '2024-10-17 10:30:00'
            ],
            (object)[
                'id' => 2,
                'type' => 'property',
                'title' => 'New Property Inquiry',
                'message' => 'You have a new inquiry for Apartment 3B',
                'read' => false,
                'created_at' => '2024-10-17 09:15:00'
            ],
            (object)[
                'id' => 3,
                'type' => 'system',
                'title' => 'System Maintenance',
                'message' => 'Scheduled maintenance on Oct 20, 2024 at 2:00 AM',
                'read' => true,
                'created_at' => '2024-10-16 18:00:00'
            ]
        ]);

        return view('livewire.general.notifications', [
            'notifications' => $notifications
        ]);
    }
}
