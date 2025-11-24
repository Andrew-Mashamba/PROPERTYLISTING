<?php

namespace App\Livewire\Landlord;

use Livewire\Component;
use Livewire\WithPagination;

class RentCollection extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $month = '';
    public $perPage = 15;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function markAsPaid($paymentId)
    {
        session()->flash('message', 'Payment marked as paid successfully.');
    }

    public function sendReminder($tenantId)
    {
        session()->flash('message', 'Reminder sent to tenant.');
    }

    public function render()
    {
        $payments = collect([
            (object)[
                'id' => 1,
                'tenant_name' => 'John Mwamba',
                'property' => 'Apartment 3B - Masaki',
                'amount' => 1200000,
                'due_date' => '2024-10-31',
                'paid_date' => '2024-10-28',
                'status' => 'paid',
                'method' => 'Bank Transfer',
                'receipt' => 'RCT-2024-001'
            ],
            (object)[
                'id' => 2,
                'tenant_name' => 'Sarah Kilimo',
                'property' => 'House 12 - Mikocheni',
                'amount' => 2500000,
                'due_date' => '2024-10-31',
                'paid_date' => null,
                'status' => 'overdue',
                'method' => null,
                'receipt' => null
            ]
        ]);

        $stats = [
            'total_expected' => 5200000,
            'total_collected' => 2700000,
            'pending' => 2500000,
            'overdue' => 500000
        ];

        return view('livewire.landlord.rent-collection', [
            'payments' => $payments,
            'stats' => $stats
        ]);
    }
}
