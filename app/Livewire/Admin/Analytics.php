<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Analytics extends Component
{
    public $dateRange = '30';

    public function render()
    {
        $stats = [
            'total_users' => 1250,
            'active_listings' => 850,
            'total_revenue' => 125000000,
            'transactions' => 3420
        ];

        $userGrowth = [
            ['month' => 'Jan', 'users' => 950],
            ['month' => 'Feb', 'users' => 1020],
            ['month' => 'Mar', 'users' => 1085],
            ['month' => 'Apr', 'users' => 1130],
            ['month' => 'May', 'users' => 1180],
            ['month' => 'Jun', 'users' => 1250]
        ];

        $revenueData = [
            ['month' => 'Jan', 'revenue' => 18000000],
            ['month' => 'Feb', 'revenue' => 19500000],
            ['month' => 'Mar', 'revenue' => 21000000],
            ['month' => 'Apr', 'revenue' => 20500000],
            ['month' => 'May', 'revenue' => 22500000],
            ['month' => 'Jun', 'revenue' => 23500000]
        ];

        $topProperties = [
            ['title' => 'Modern Apartment Masaki', 'views' => 1250, 'inquiries' => 85],
            ['title' => 'Villa Mikocheni', 'views' => 980, 'inquiries' => 62],
            ['title' => 'Studio Upanga', 'views' => 756, 'inquiries' => 48]
        ];

        return view('livewire.admin.analytics', [
            'stats' => $stats,
            'userGrowth' => $userGrowth,
            'revenueData' => $revenueData,
            'topProperties' => $topProperties
        ]);
    }
}
