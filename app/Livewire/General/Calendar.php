<?php

namespace App\Livewire\General;

use Livewire\Component;

class Calendar extends Component
{
    public $currentMonth = '';
    public $view = 'month';

    public function mount()
    {
        $this->currentMonth = now()->format('F Y');
    }

    public function createEvent()
    {
        session()->flash('message', 'Event created successfully.');
    }

    public function deleteEvent($eventId)
    {
        session()->flash('message', 'Event deleted successfully.');
    }

    public function render()
    {
        $events = [
            (object)[
                'id' => 1,
                'title' => 'Property Viewing',
                'description' => 'Show apartment to potential tenant',
                'date' => '2024-10-18',
                'time' => '14:00',
                'type' => 'viewing',
                'location' => 'Apartment 3B, Masaki'
            ],
            (object)[
                'id' => 2,
                'title' => 'Rent Collection',
                'description' => 'Collect monthly rent from tenants',
                'date' => '2024-10-20',
                'time' => '10:00',
                'type' => 'payment',
                'location' => 'Office'
            ],
            (object)[
                'id' => 3,
                'title' => 'Maintenance Check',
                'description' => 'Routine maintenance inspection',
                'date' => '2024-10-22',
                'time' => '09:00',
                'type' => 'maintenance',
                'location' => 'House 12, Mikocheni'
            ]
        ];

        return view('livewire.general.calendar', [
            'events' => $events
        ]);
    }
}
