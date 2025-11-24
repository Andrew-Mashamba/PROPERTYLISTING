<?php

namespace App\Livewire\Seller;

use Livewire\Component;
use App\Models\Property;

class Commission extends Component
{
    public $timeRange = '30';
    public $propertyId = '';

    public function render()
    {
        // Mock commission data
        $commissionData = [
            'totalCommission' => 37500,
            'pendingCommission' => 8500,
            'paidCommission' => 29000,
            'avgCommissionRate' => 3.0,
            'totalSales' => 1250000,
            'propertiesSold' => 4,
            'avgCommissionPerSale' => 9375
        ];

        $properties = Property::where('user_id', auth()->id())
            ->select('id', 'title')
            ->get();

        return view('livewire.seller.commission', [
            'commissionData' => $commissionData,
            'properties' => $properties
        ]);
    }
}
