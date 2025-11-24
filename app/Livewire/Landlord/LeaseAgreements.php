<?php

namespace App\Livewire\Landlord;

use Livewire\Component;
use Livewire\WithPagination;

class LeaseAgreements extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $expiringIn = '';
    public $perPage = 12;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $leases = collect([
            (object)[
                'id' => 1,
                'tenant_name' => 'John Mwamba',
                'property' => 'Apartment 3B - Masaki',
                'lease_start' => '2024-01-15',
                'lease_end' => '2025-01-14',
                'rent_amount' => 1200000,
                'deposit_amount' => 1200000,
                'status' => 'active',
                'document_path' => '/leases/lease-001.pdf'
            ],
            (object)[
                'id' => 2,
                'tenant_name' => 'Sarah Kilimo',
                'property' => 'House 12 - Mikocheni',
                'lease_start' => '2024-03-01',
                'lease_end' => '2024-11-30',
                'rent_amount' => 2500000,
                'deposit_amount' => 2500000,
                'status' => 'expiring_soon',
                'document_path' => '/leases/lease-002.pdf'
            ]
        ]);

        return view('livewire.landlord.lease-agreements', [
            'leases' => $leases
        ]);
    }
}
