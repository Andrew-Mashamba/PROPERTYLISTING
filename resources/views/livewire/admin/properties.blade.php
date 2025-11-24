<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <h1 class="text-3xl font-bold text-gray-900">Property Oversight</h1>
        <p class="text-base text-gray-600 mt-1">Monitor and manage all properties (Sale & Rent)</p>
    </div>

    <div class="p-6 rounded-xl mb-6 mx-6 mt-6" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%); border: 3px solid #FF7F00;">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Search</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search properties..." 
                       class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Verification</label>
                <select wire:model.live="status" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="verified">Verified</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Listing Type</label>
                <select wire:model.live="type" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <option value="">All Types</option>
                    <option value="sale">For Sale</option>
                    <option value="rent">For Rent</option>
                    <option value="both">Both</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Property Type</label>
                <select wire:model.live="propertyType" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <option value="">All</option>
                    <option value="residential">Residential</option>
                    <option value="commercial">Commercial</option>
                    <option value="land">Land</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Per Page</label>
                <select wire:model.live="perPage" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <option value="15">15 per page</option>
                    <option value="30">30 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>
    </div>

    <div class="px-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Total Properties</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Verified</p>
                        <p class="text-3xl font-bold text-green-600">{{ $stats['active'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Pending Review</p>
                        <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Rejected</p>
                        <p class="text-3xl font-bold text-red-600">{{ $stats['suspended'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($properties->count() > 0)
        <div class="px-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($properties as $property)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-base font-bold text-gray-900 mb-1">{{ $property->title }}</h3>
                                <p class="text-xs text-gray-500">{{ $property->address }}</p>
                            </div>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-500 uppercase">Owner</span>
                                <span class="text-sm font-bold text-gray-900">{{ $property->user->name ?? 'N/A' }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-500 uppercase">Listing Type</span>
                                <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg
                                    @if($property->listing_type === 'sale') {{ 'style=background:linear-gradient(135deg,#10B981 0%,#059669 100%);' }}
                                    @elseif($property->listing_type === 'rent') {{ 'style=background:linear-gradient(135deg,#3B82F6 0%,#1D4ED8 100%);' }}
                                    @else {{ 'style=background:linear-gradient(135deg,#8B5CF6 0%,#6D28D9 100%);' }}
                                    @endif">
                                    {{ ucfirst($property->listing_type) }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-500 uppercase">Property Type</span>
                                <span class="text-sm font-medium text-gray-700">{{ ucfirst($property->property_type ?? 'N/A') }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-500 uppercase">Verification</span>
                                <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg
                                    @if($property->verification_status === 'verified') {{ 'style=background:linear-gradient(135deg,#10B981 0%,#059669 100%);' }}
                                    @elseif($property->verification_status === 'pending') {{ 'style=background:linear-gradient(135deg,#F59E0B 0%,#D97706 100%);' }}
                                    @else {{ 'style=background:linear-gradient(135deg,#EF4444 0%,#DC2626 100%);' }}
                                    @endif">
                                    {{ ucfirst($property->verification_status) }}
                                </span>
                            </div>

                            <div class="p-4 rounded-lg" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%); border: 2px solid rgba(255, 127, 0, 0.2);">
                                <p class="text-xs text-gray-600 font-medium mb-1">Price</p>
                                <p class="text-xl font-bold" style="color: #FF7F00;">TZS {{ number_format($property->price) }}</p>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex items-center justify-between mb-3">
                                <div>
                                    <p class="text-xs text-gray-500">NIDA Provided</p>
                                    <p class="text-sm font-semibold {{ $property->owner_nida ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $property->owner_nida ? 'Yes' : 'No' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Documents</p>
                                    <p class="text-sm font-semibold {{ ($property->title_deed_document || $property->sales_agreement_document) ? 'text-green-600' : 'text-red-600' }}">
                                        {{ ($property->title_deed_document || $property->sales_agreement_document) ? 'Uploaded' : 'Missing' }}
                                    </p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                <a href="/admin/properties/{{ $property->id }}" class="flex items-center justify-center gap-1 text-white px-3 py-2 rounded-lg font-semibold text-xs hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Details
                                </a>
                                @if($property->verification_status === 'pending')
                                    <button wire:click="approveProperty({{ $property->id }})" class="flex items-center justify-center gap-1 text-white px-3 py-2 rounded-lg font-semibold text-xs hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Verify
                                    </button>
                                @else
                                    <button wire:click="suspendProperty({{ $property->id }})" class="flex items-center justify-center gap-1 text-white px-3 py-2 rounded-lg font-semibold text-xs hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>
                                        Reject
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="px-6 pb-6">
            {{ $properties->links() }}
        </div>
    @else
        <div class="mx-6 mb-6">
            <div class="text-center py-16 bg-white rounded-xl shadow-lg">
                <div class="w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                    <svg class="w-10 h-10" style="color: #FF7F00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">No Properties Found</h3>
                <p class="text-gray-500">No properties match your search criteria.</p>
            </div>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 px-6 py-4 rounded-xl text-white font-semibold shadow-xl z-50" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
            {{ session('message') }}
        </div>
    @endif
</div>
