<?php

namespace App\Livewire\Seller;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;

class Viewings extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $propertyId = '';
    public $dateFrom = '';
    public $dateTo = '';
    public $sortBy = 'scheduled_at';
    public $sortDirection = 'asc';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'propertyId' => ['except' => ''],
        'dateFrom' => ['except' => ''],
        'dateTo' => ['except' => ''],
        'sortBy' => ['except' => 'scheduled_at'],
        'sortDirection' => ['except' => 'asc'],
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

    public function updateStatus($viewingId, $status)
    {
        // This would update a viewing status in a real implementation
        session()->flash('message', 'Viewing status updated.');
    }

    public function cancelViewing($viewingId)
    {
        // This would cancel a viewing in a real implementation
        session()->flash('message', 'Viewing cancelled.');
    }

    public function render()
    {
        // Mock data for demonstration
        $viewings = collect([
            (object)[
                'id' => 1,
                'property_title' => 'Beautiful Family Home',
                'client_name' => 'John Smith',
                'client_email' => 'john@example.com',
                'client_phone' => '+1234567890',
                'scheduled_at' => now()->addDays(1),
                'status' => 'scheduled',
                'notes' => 'First time buyer, very interested',
                'property_id' => 1
            ],
            (object)[
                'id' => 2,
                'property_title' => 'Modern Apartment',
                'client_name' => 'Sarah Johnson',
                'client_email' => 'sarah@example.com',
                'client_phone' => '+1234567891',
                'scheduled_at' => now()->addDays(3),
                'status' => 'confirmed',
                'notes' => 'Looking for investment property',
                'property_id' => 2
            ]
        ]);

        $properties = Property::where('user_id', auth()->id())
            ->select('id', 'title')
            ->get();

        return view('livewire.seller.viewings', [
            'viewings' => $viewings,
            'properties' => $properties
        ]);
    }
}
