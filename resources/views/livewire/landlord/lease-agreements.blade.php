<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Lease Agreements</h1>
                <p class="text-sm text-gray-600">Manage tenant lease contracts</p>
            </div>
            <a href="/landlord/create-lease" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-file-contract mr-1"></i> Create Lease
            </a>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search leases..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="status" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="expiring_soon">Expiring Soon</option>
                    <option value="expired">Expired</option>
                </select>
            </div>
            <div>
                <select wire:model.live="expiringIn" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">Expiring In</option>
                    <option value="30">30 Days</option>
                    <option value="60">60 Days</option>
                    <option value="90">90 Days</option>
                </select>
            </div>
            <div>
                <select wire:model.live="perPage" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="12">12 per page</option>
                    <option value="24">24 per page</option>
                    <option value="48">48 per page</option>
                </select>
            </div>
        </div>
    </div>

    <div class="p-4">
        @if($leases->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($leases as $lease)
                    <div class="bg-white rounded-lg border border-gray-200 p-3 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900 text-sm">{{ $lease->tenant_name }}</h3>
                                <p class="text-xs text-gray-600">{{ $lease->property }}</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                @if($lease->status === 'active') bg-green-100 text-green-800
                                @elseif($lease->status === 'expiring_soon') bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ ucfirst(str_replace('_', ' ', $lease->status)) }}
                            </span>
                        </div>

                        <div class="space-y-1 mb-2">
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-calendar-alt w-4"></i>
                                <span class="ml-1">Start: {{ \Carbon\Carbon::parse($lease->lease_start)->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-calendar-check w-4"></i>
                                <span class="ml-1">End: {{ \Carbon\Carbon::parse($lease->lease_end)->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-clock w-4"></i>
                                <span class="ml-1">{{ \Carbon\Carbon::parse($lease->lease_end)->diffForHumans() }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div class="bg-gray-50 rounded p-2">
                                <p class="text-xs text-gray-600">Monthly Rent</p>
                                <p class="text-sm font-semibold text-orange-600">TZS {{ number_format($lease->rent_amount) }}</p>
                            </div>
                            <div class="bg-gray-50 rounded p-2">
                                <p class="text-xs text-gray-600">Deposit</p>
                                <p class="text-sm font-semibold text-gray-900">TZS {{ number_format($lease->deposit_amount) }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-1">
                            <a href="{{ $lease->document_path }}" target="_blank" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors text-center">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <a href="/landlord/leases/{{ $lease->id }}/edit" class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors text-center">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition-colors">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $leases->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-file-contract text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No lease agreements found</h3>
                <p class="mt-1 text-sm text-gray-500">Start by creating your first lease agreement.</p>
                <div class="mt-6">
                    <a href="/landlord/create-lease" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700">
                        <i class="fas fa-file-contract mr-1"></i> Create Lease
                    </a>
                </div>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
