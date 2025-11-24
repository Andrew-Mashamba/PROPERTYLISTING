<?php

namespace App\Livewire\Admin;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class Properties extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $type = '';
    public $propertyType = '';
    public $perPage = 15;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function approveProperty($propertyId)
    {
        session()->flash('message', 'Property approved successfully.');
    }

    public function suspendProperty($propertyId)
    {
        session()->flash('message', 'Property suspended successfully.');
    }

    public function render()
    {
        $properties = Property::with('user')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%')
                      ->orWhereHas('user', function ($uq) {
                          $uq->where('name', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->status, function ($query) {
                $query->where('verification_status', $this->status);
            })
            ->when($this->type, function ($query) {
                $query->where('listing_type', $this->type);
            })
            ->when($this->propertyType, function ($query) {
                $query->where('property_type', $this->propertyType);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $stats = [
            'total' => Property::count(),
            'active' => Property::where('verification_status', 'verified')->count(),
            'pending' => Property::where('verification_status', 'pending')->count(),
            'suspended' => Property::where('verification_status', 'rejected')->count()
        ];

        return view('livewire.admin.properties', [
            'properties' => $properties,
            'stats' => $stats
        ]);
    }
}
