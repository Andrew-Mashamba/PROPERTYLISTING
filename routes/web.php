<?php

use App\Livewire\HomePage;
use App\Livewire\RentPage;
use App\Livewire\MaterialsPage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public Routes
Route::get('/', HomePage::class)->name('home');
Route::get('/rent', RentPage::class)->name('rent');
Route::get('/materials', MaterialsPage::class)->name('materials');
Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/financing', function () {
    return view('financing');
})->name('financing');

// Force logout and redirect to home
Route::get('/login', function () {
    Auth::logout();
    return redirect('/');
})->name('login');

// System Dashboard
Route::get('/system', App\Livewire\SystemDashboard::class)->name('system')->middleware('auth');

// SELLER ROUTES
Route::middleware(['auth'])->group(function () {
    // Seller Tools
    Route::get('/system/seller/listings', App\Livewire\Seller\PropertyListings::class)->name('seller.listings');
    Route::get('/system/seller/add-property', App\Livewire\Seller\AddProperty::class)->name('seller.add-property');
    Route::get('/system/seller/inquiries', App\Livewire\Seller\Inquiries::class)->name('seller.inquiries');
    Route::get('/system/seller/viewings', App\Livewire\Seller\Viewings::class)->name('seller.viewings');
    Route::get('/system/seller/offers', App\Livewire\Seller\Offers::class)->name('seller.offers');
    Route::get('/system/seller/performance', App\Livewire\Seller\Performance::class)->name('seller.performance');
    Route::get('/system/seller/marketing', App\Livewire\Seller\Marketing::class)->name('seller.marketing');
    Route::get('/system/seller/commission', App\Livewire\Seller\Commission::class)->name('seller.commission');
    
    // Supplier Tools
    Route::get('/system/supplier/catalog', App\Livewire\Supplier\Catalog::class)->name('supplier.catalog');
    Route::get('/system/supplier/add-product', App\Livewire\Supplier\AddProduct::class)->name('supplier.add-product');
    Route::get('/system/supplier/orders', App\Livewire\Supplier\Orders::class)->name('supplier.orders');
    Route::get('/system/supplier/inventory', App\Livewire\Supplier\Inventory::class)->name('supplier.inventory');
    Route::get('/system/supplier/pricing', App\Livewire\Supplier\Pricing::class)->name('supplier.pricing');
    Route::get('/system/supplier/suppliers', App\Livewire\Supplier\Suppliers::class)->name('supplier.suppliers');
    Route::get('/system/supplier/analytics', App\Livewire\Supplier\Analytics::class)->name('supplier.analytics');
    Route::get('/system/supplier/contractors', App\Livewire\Supplier\Contractors::class)->name('supplier.contractors');
    
    // Agent Tools
    Route::get('/system/agent/assigned-properties', App\Livewire\Agent\AssignedProperties::class)->name('agent.assigned-properties');
    
    // Landlord Tools
    Route::get('/system/landlord/rentals', App\Livewire\Landlord\Rentals::class)->name('landlord.rentals');
    Route::get('/system/landlord/add-rental', App\Livewire\Landlord\AddRental::class)->name('landlord.add-rental');
    Route::get('/system/landlord/tenants', App\Livewire\Landlord\Tenants::class)->name('landlord.tenants');
    Route::get('/system/landlord/rent-collection', App\Livewire\Landlord\RentCollection::class)->name('landlord.rent-collection');
    Route::get('/system/landlord/lease-agreements', App\Livewire\Landlord\LeaseAgreements::class)->name('landlord.lease-agreements');
    Route::get('/system/landlord/maintenance', App\Livewire\Landlord\Maintenance::class)->name('landlord.maintenance');
    Route::get('/system/landlord/financials', App\Livewire\Landlord\Financials::class)->name('landlord.financials');
    Route::get('/system/landlord/vacancies', App\Livewire\Landlord\Vacancies::class)->name('landlord.vacancies');
    Route::get('/system/landlord/tenant-screening', App\Livewire\Landlord\TenantScreening::class)->name('landlord.tenant-screening');
    Route::get('/landlord/applications/{id}', App\Livewire\Landlord\ApplicationDetails::class)->name('landlord.application-details');
    Route::get('/landlord/tenants/{id}', App\Livewire\Landlord\TenantDetails::class)->name('landlord.tenant-details');
    
    // Admin Tools (Savanna only)
    Route::get('/system/admin/users', App\Livewire\Admin\Users::class)->name('admin.users');
    Route::get('/admin/users/{id}', App\Livewire\Admin\UserDetails::class)->name('admin.user-details');
    Route::get('/system/admin/properties', App\Livewire\Admin\Properties::class)->name('admin.properties');
    Route::get('/admin/properties/{id}', App\Livewire\Admin\PropertyDetails::class)->name('admin.property-details');
    Route::get('/system/admin/oversight', App\Livewire\Admin\Oversight::class)->name('admin.oversight');
    Route::get('/system/admin/financing-inquiries', App\Livewire\Admin\FinancingInquiries::class)->name('admin.financing-inquiries');
    Route::get('/system/admin/services', App\Livewire\Admin\Services::class)->name('admin.services');
    
    // General Tools (All Users)
    Route::get('/system/profile', App\Livewire\General\Profile::class)->name('general.profile');
    Route::get('/system/notifications', App\Livewire\General\Notifications::class)->name('general.notifications');
    Route::get('/system/messages', App\Livewire\General\Messages::class)->name('general.messages');
    Route::get('/system/calendar', App\Livewire\General\Calendar::class)->name('general.calendar');
    Route::get('/system/documents', App\Livewire\General\Documents::class)->name('general.documents');
    Route::get('/system/help', App\Livewire\General\Help::class)->name('general.help');
    Route::get('/system/support', App\Livewire\General\Support::class)->name('general.support');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
