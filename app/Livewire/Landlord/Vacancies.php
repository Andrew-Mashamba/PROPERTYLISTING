<?php

namespace App\Livewire\Landlord;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;

class Vacancies extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 12;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function listProperty($propertyId)
    {
        session()->flash('message', 'Property listed for rent.');
    }

    public function render()
    {
        $vacantProperties = collect([
            (object)[
                'id' => 1,
                'title' => 'Modern 2BR Apartment',
                'address' => 'Masaki, Dar es Salaam',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area_sqft' => 1200,
                'target_rent' => 1500000,
                'vacant_since' => '2024-09-15',
                'reason' => 'Lease Expired',
                'is_listed' => true,
                'views' => 45,
                'inquiries' => 8
            ],
            (object)[
                'id' => 2,
                'title' => 'Spacious 3BR House',
                'address' => 'Mikocheni, Dar es Salaam',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'area_sqft' => 2200,
                'target_rent' => 3000000,
                'vacant_since' => '2024-10-01',
                'reason' => 'Tenant Moved Out',
                'is_listed' => false,
                'views' => 0,
                'inquiries' => 0
            ]
        ]);

        return view('livewire.landlord.vacancies', [
            'vacantProperties' => $vacantProperties
        ]);
    }
}
