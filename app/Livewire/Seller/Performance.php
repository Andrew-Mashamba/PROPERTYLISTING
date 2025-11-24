<?php

namespace App\Livewire\Seller;

use Livewire\Component;
use App\Models\Property;

class Performance extends Component
{
    public $timeRange = '30';
    public $propertyId = '';

    public function render()
    {
        // Mock performance data
        $performanceData = [
            'totalProperties' => 12,
            'activeListings' => 8,
            'soldProperties' => 4,
            'totalViews' => 1250,
            'avgViewsPerProperty' => 104,
            'inquiriesReceived' => 45,
            'conversionRate' => 8.9,
            'avgDaysOnMarket' => 45,
            'totalRevenue' => 1250000,
            'avgSalePrice' => 312500
        ];

        $properties = Property::where('user_id', auth()->id())
            ->select('id', 'title')
            ->get();

        return view('livewire.seller.performance', [
            'performanceData' => $performanceData,
            'properties' => $properties
        ]);
    }
}
