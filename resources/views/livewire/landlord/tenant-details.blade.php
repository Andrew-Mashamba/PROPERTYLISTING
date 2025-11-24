<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('landlord.tenants') }}" class="p-2 rounded-lg hover:bg-gray-100 transition-all duration-300">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Tenant Details</h1>
                    <p class="text-sm text-gray-600 mt-1">View and manage tenant information</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                @if($tenant->status === 'active')
                    <span class="px-4 py-2 text-sm font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                        Active Tenant
                    </span>
                @else
                    <span class="px-4 py-2 text-sm font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);">
                        Inactive
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="p-6 max-w-7xl mx-auto">
        @if (session()->has('message'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-sm">
                {{ session('message') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Tenant Information</h2>
                            <p class="text-sm text-gray-600">Personal and contact details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Full Name</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->user->name }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Email Address</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->user->email }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Phone Number</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->rentalApplication->phone ?? 'N/A' }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Emergency Contact</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->emergency_contact ?? 'Not provided' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Lease Information</h2>
                            <p class="text-sm text-gray-600">Rental agreement details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Lease Start Date</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->lease_start->format('M d, Y') }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Lease End Date</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->lease_end->format('M d, Y') }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-orange-100" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%);">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Monthly Rent</label>
                            <p class="text-2xl font-bold mt-1" style="color: #FF7F00;">TZS {{ number_format($tenant->rent_amount) }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Lease Duration</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->lease_start->diffInMonths($tenant->lease_end) }} months</p>
                        </div>
                    </div>

                    <div class="mt-4 p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                        <label class="text-xs font-semibold text-gray-500 uppercase">Days Remaining</label>
                        <p class="text-xl font-bold text-blue-900 mt-1">
                            {{ now()->diffInDays($tenant->lease_end, false) > 0 ? now()->diffInDays($tenant->lease_end) . ' days' : 'Expired' }}
                        </p>
                    </div>
                </div>

                @if($tenant->rentalApplication)
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Employment & Financial</h2>
                            <p class="text-sm text-gray-600">From rental application</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-lg border-2 border-green-100 bg-green-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Monthly Income</label>
                            <p class="text-lg font-bold text-green-700 mt-1">TZS {{ number_format($tenant->rentalApplication->monthly_income) }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Employment Status</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->rentalApplication->employment_status }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50 md:col-span-2">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Employer</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->rentalApplication->employer }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($tenant->notes)
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                            <svg class="w-5 h-5" style="color: #FF7F00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900">Notes</h3>
                    </div>
                    <p class="text-sm text-gray-700 leading-relaxed">{{ $tenant->notes }}</p>
                </div>
                @endif
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                            <svg class="w-5 h-5" style="color: #FF7F00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900">Property Details</h3>
                    </div>
                    
                    <div class="space-y-3">
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Property</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $tenant->property->title }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Address</label>
                            <p class="text-sm text-gray-700 mt-1">{{ $tenant->property->address }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Property Type</label>
                            <p class="text-sm text-gray-700 mt-1">{{ ucfirst($tenant->property->property_type) }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Payment Status</h3>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600 mb-3">Current Status: 
                            @if($tenant->payment_status === 'paid')
                                <span class="font-bold text-green-600">Paid</span>
                            @elseif($tenant->payment_status === 'overdue')
                                <span class="font-bold text-red-600">Overdue</span>
                            @else
                                <span class="font-bold text-yellow-600">{{ ucfirst($tenant->payment_status) }}</span>
                            @endif
                        </p>
                        <button wire:click="updatePaymentStatus('paid')" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Mark as Paid
                        </button>
                        <button wire:click="updatePaymentStatus('unpaid')" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Mark as Unpaid
                        </button>
                        <button wire:click="updatePaymentStatus('overdue')" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            Mark as Overdue
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Tenant Status</h3>
                    <div class="space-y-2">
                        @if($tenant->status === 'active')
                            <button wire:click="updateTenantStatus('inactive')" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                </svg>
                                Set as Inactive
                            </button>
                        @else
                            <button wire:click="updateTenantStatus('active')" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Set as Active
                            </button>
                        @endif
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-2">
                        <a href="mailto:{{ $tenant->user->email }}" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold rounded-lg transition-all duration-300" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%); color: #FF7F00; border: 2px solid #FF7F00;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Email Tenant
                        </a>
                        @if($tenant->rentalApplication)
                            <a href="{{ route('landlord.application-details', $tenant->rentalApplication->id) }}" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold rounded-lg transition-all duration-300" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(29, 78, 216, 0.1) 100%); color: #3B82F6; border: 2px solid #3B82F6;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                View Application
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
