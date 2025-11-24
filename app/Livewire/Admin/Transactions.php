<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class Transactions extends Component
{
    use WithPagination;

    public $search = '';
    public $type = '';
    public $status = '';
    public $dateRange = '30';
    public $perPage = 20;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $transactions = collect([
            (object)[
                'id' => 'TXN-001',
                'user' => 'John Doe',
                'type' => 'rent_payment',
                'amount' => 1200000,
                'status' => 'completed',
                'method' => 'Bank Transfer',
                'date' => '2024-10-17 10:30:00',
                'property' => 'Apartment 3B'
            ],
            (object)[
                'id' => 'TXN-002',
                'user' => 'Jane Smith',
                'type' => 'subscription',
                'amount' => 50000,
                'status' => 'completed',
                'method' => 'M-Pesa',
                'date' => '2024-10-16 15:45:00',
                'property' => null
            ],
            (object)[
                'id' => 'TXN-003',
                'user' => 'Mike Johnson',
                'type' => 'material_purchase',
                'amount' => 350000,
                'status' => 'pending',
                'method' => 'Credit Card',
                'date' => '2024-10-15 08:20:00',
                'property' => null
            ]
        ]);

        $stats = [
            'total_volume' => 45000000,
            'completed' => 42000000,
            'pending' => 2500000,
            'failed' => 500000
        ];

        return view('livewire.admin.transactions', [
            'transactions' => $transactions,
            'stats' => $stats
        ]);
    }
}
