<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Tenants</h1>
                <p class="text-base text-gray-600 mt-1">Manage your tenant relationships</p>
            </div>
        </div>
    </div>

    <div class="bg-white border-b px-6 py-4" style="border-color: rgba(255, 127, 0, 0.2);">
        <div class="p-6 rounded-xl" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%); border: 3px solid #FF7F00;">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Search Tenants</label>
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search by name, email, property..." 
                           class="w-full px-4 py-2.5 text-sm border-2 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300" style="border-color: #FF7F00;">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status Filter</label>
                    <select wire:model.live="status" class="w-full px-4 py-2.5 text-sm border-2 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300" style="border-color: #FF7F00;">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Items Per Page</label>
                    <select wire:model.live="perPage" class="w-full px-4 py-2.5 text-sm border-2 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300" style="border-color: #FF7F00;">
                        <option value="12">12 per page</option>
                        <option value="24">24 per page</option>
                        <option value="48">48 per page</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 uppercase font-semibold mb-2">Total Tenants</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 uppercase font-semibold mb-2">Active</p>
                        <p class="text-3xl font-bold text-green-600">{{ $stats['active'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 uppercase font-semibold mb-2">Inactive</p>
                        <p class="text-3xl font-bold text-gray-600">{{ $stats['inactive'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center bg-gray-200">
                        <svg class="w-7 h-7 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 uppercase font-semibold mb-2">Overdue</p>
                        <p class="text-3xl font-bold text-red-600">{{ $stats['overdue'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        @if($tenants->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($tenants as $tenant)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 text-lg mb-1">{{ $tenant->user->name }}</h3>
                                <div class="flex items-start gap-1">
                                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    <p class="text-sm text-gray-600 font-medium">{{ $tenant->property->title }}</p>
                                </div>
                            </div>
                            @if($tenant->payment_status === 'paid')
                                <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                    Paid
                                </span>
                            @elseif($tenant->payment_status === 'overdue')
                                <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                                    Overdue
                                </span>
                            @else
                                <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);">
                                    {{ ucfirst($tenant->payment_status) }}
                                </span>
                            @endif
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $tenant->user->email }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span>{{ $tenant->rentalApplication->phone ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-medium">{{ $tenant->lease_start->format('M d, Y') }} - {{ $tenant->lease_end->format('M d, Y') }}</span>
                            </div>
                        </div>

                        <div class="p-4 rounded-lg mb-4" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%); border: 2px solid rgba(255, 127, 0, 0.2);">
                            <p class="text-xs text-gray-600 font-medium mb-1">Monthly Rent</p>
                            <p class="text-xl font-bold" style="color: #FF7F00;">TZS {{ number_format($tenant->rent_amount) }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <a href="/landlord/tenants/{{ $tenant->id }}" class="flex items-center justify-center gap-2 px-3 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%); color: white;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View
                            </a>
                            <a href="mailto:{{ $tenant->user->email }}" class="flex items-center justify-center gap-2 px-3 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Contact
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $tenants->links() }}
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-xl shadow-lg">
                <div class="w-20 h-20 rounded-full mx-auto mb-6 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                    <svg class="w-10 h-10" style="color: #FF7F00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">No tenants found</h3>
                <p class="text-sm text-gray-500">Tenants will appear here after approving rental applications.</p>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-sm z-50 shadow-lg">
            {{ session('message') }}
        </div>
    @endif
</div>
