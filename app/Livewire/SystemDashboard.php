<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\Material;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SystemDashboard extends Component
{
    public function getStatsProperty()
    {
        $userId = auth()->id();
        $userType = auth()->user()->user_type;
        
        if ($userType === 'supplier') {
            return [
                'total_materials' => Material::where('supplier_id', $userId)->count(),
                'pending_orders' => 24,
                'monthly_sales' => 15000000,
                'low_stock_materials' => Material::where('supplier_id', $userId)->whereColumn('stock_quantity', '<=', 'min_stock_level')->count(),
            ];
        } elseif ($userType === 'agent') {
            return [
                'assigned_properties' => 12,
                'active_deals' => 5,
                'monthly_commission' => 1200000,
                'property_showings' => 7,
            ];
        } elseif ($userType === 'landlord') {
            return [
                'total_properties' => Property::where('user_id', $userId)->whereIn('listing_type', ['rent', 'both'])->count(),
                'occupied_units' => 12,
                'rent_collected' => 8500000,
                'maintenance_requests' => 6,
            ];
        } elseif ($userType === 'savanna') {
            return [
                'total_properties' => Property::count(),
                'total_users' => User::count(),
                'total_transactions' => 125000000,
                'active_listings' => Property::where('status', 'Active')->count(),
            ];
        } else {
            return [
                'total_properties' => Property::where('user_id', $userId)->count(),
                'active_properties' => Property::where('user_id', $userId)->where('status', 'Active')->count(),
                'total_rentals' => Property::where('user_id', $userId)->whereIn('listing_type', ['rent', 'both'])->count(),
                'total_value' => Property::where('user_id', $userId)->sum('price'),
            ];
        }
    }

    public function getRecentPropertiesProperty()
    {
        return Property::where('user_id', auth()->id())
            ->with('images')
            ->latest()
            ->limit(6)
            ->get();
    }

    public function getRecentMaterialsProperty()
    {
        return Material::latest()
            ->limit(6)
            ->get();
    }

    public function getPropertyByTypeProperty()
    {
        return Property::where('user_id', auth()->id())
            ->select('property_type', DB::raw('count(*) as count'))
            ->groupBy('property_type')
            ->get();
    }

    public function getPropertyByStatusProperty()
    {
        return Property::where('user_id', auth()->id())
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();
    }

    public function render()
    {
        return view('livewire.system-dashboard', [
            'stats' => $this->stats,
            'recentProperties' => $this->recentProperties,
            'recentMaterials' => $this->recentMaterials,
            'propertyByType' => $this->propertyByType,
            'propertyByStatus' => $this->propertyByStatus,
        ])->layout('components.layouts.app');
    }
}
