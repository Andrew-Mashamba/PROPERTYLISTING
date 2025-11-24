<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\Inquiry;
use App\Models\Order;
use App\Models\User;
use App\Models\RentalApplication;
use App\Models\FinancingInquiry;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('components.layouts.app', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                
                $counts = [
                    'my_properties' => Property::where('user_id', $user->id)->count(),
                    'buyer_inquiries' => Inquiry::where('to_user_id', $user->id)
                        ->where('status', 'new')
                        ->count(),
                    'customer_orders' => Order::where('supplier_id', $user->id)
                        ->whereIn('status', ['pending', 'processing'])
                        ->count(),
                    'rental_properties' => Property::where('user_id', $user->id)
                        ->whereIn('listing_type', ['rent', 'both'])
                        ->count(),
                    'total_users' => User::count(),
                    'pending_applications' => RentalApplication::where('status', 'pending')->count(),
                    'pending_financing' => FinancingInquiry::where('status', 'pending')->count(),
                ];
                
                $view->with('sidebarCounts', $counts);
            }
        });
    }
}
