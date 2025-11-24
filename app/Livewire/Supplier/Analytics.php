<?php

namespace App\Livewire\Supplier;

use Livewire\Component;
use App\Models\Material;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class Analytics extends Component
{
    public $dateRange = '30';
    public $selectedPeriod = 'month';

    public function render()
    {
        $totalMaterials = Material::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', 'delivered')->sum('total_amount');
        $avgOrderValue = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;

        $topProducts = Material::withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->take(5)
            ->get();

        $revenueByCategory = Material::select('category', DB::raw('SUM(price * stock_quantity) as total'))
            ->groupBy('category')
            ->orderBy('total', 'desc')
            ->get();

        $monthlyRevenue = [
            ['month' => 'Jan', 'revenue' => 850000],
            ['month' => 'Feb', 'revenue' => 920000],
            ['month' => 'Mar', 'revenue' => 1100000],
            ['month' => 'Apr', 'revenue' => 980000],
            ['month' => 'May', 'revenue' => 1250000],
            ['month' => 'Jun', 'revenue' => 1150000],
        ];

        return view('livewire.supplier.analytics', [
            'totalMaterials' => $totalMaterials,
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'avgOrderValue' => $avgOrderValue,
            'topProducts' => $topProducts,
            'revenueByCategory' => $revenueByCategory,
            'monthlyRevenue' => $monthlyRevenue
        ]);
    }
}
