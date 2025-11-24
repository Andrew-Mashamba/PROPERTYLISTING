<div>
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Assigned Properties</h1>
                <p class="text-sm text-gray-600 mt-1">Manage properties assigned to you by property owners</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Total Assigned</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $stats['total_assigned'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-clipboard-list text-blue-600 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-blue-500 font-bold">All assigned properties</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Active Listings</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $stats['active_listings'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 font-bold">Currently active</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Pending Viewings</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $stats['pending_viewings'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-purple-600 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-purple-500 font-bold">Scheduled viewings</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Total Value</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ number_format($stats['total_value'] / 1000000, 1) }}M</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-orange-600 text-xl"></i>
                </div>
            </div>
            <p class="text-sm text-gray-500 font-normal">TZS {{ number_format($stats['total_value']) }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input wire:model.live="search" type="text" placeholder="Search properties..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
            </div>
            <div>
                <select wire:model.live="statusFilter" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="">All Status</option>
                    <option value="Active">Active</option>
                    <option value="Pending">Pending</option>
                    <option value="Sold">Sold</option>
                    <option value="Rented">Rented</option>
                </select>
            </div>
            <div>
                <select wire:model.live="propertyTypeFilter" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="">All Types</option>
                    <option value="residential">Residential</option>
                    <option value="commercial">Commercial</option>
                    <option value="land">Land</option>
                    <option value="industrial">Industrial</option>
                </select>
            </div>
            <div>
                <button wire:click="clearFilters" 
                        class="w-full px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Clear Filters
                </button>
            </div>
        </div>
    </div>

    @if($properties->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($properties as $property)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="relative h-48">
                        @if($property->images->count() > 0)
                            @php
                                $imagePath = $property->images->first()->image_path;
                                $imageUrl = str_starts_with($imagePath, 'http') 
                                    ? $imagePath 
                                    : asset('storage/' . $imagePath);
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $property->title }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-home text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                        
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full text-white"
                                  style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                {{ ucfirst($property->property_type) }}
                            </span>
                        </div>
                        
                        <div class="absolute top-3 right-3">
                            @if($property->status === 'Active')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-500 text-white">
                                    Active
                                </span>
                            @elseif($property->status === 'Pending')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-500 text-white">
                                    Pending
                                </span>
                            @elseif($property->status === 'Sold')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-500 text-white">
                                    Sold
                                </span>
                            @elseif($property->status === 'Rented')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-500 text-white">
                                    Rented
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $property->title }}</h3>
                        
                        <div class="flex items-center text-gray-600 text-sm mb-4">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>{{ $property->city }}, {{ $property->state }}</span>
                        </div>
                        
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-2xl font-bold" style="color: #FF7F00;">
                                TZS {{ number_format($property->price) }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ ucfirst($property->listing_type) }}
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between text-sm text-gray-600 mb-4">
                            @if($property->bedrooms)
                                <div class="flex items-center">
                                    <i class="fas fa-bed mr-1"></i>
                                    <span>{{ $property->bedrooms }} Beds</span>
                                </div>
                            @endif
                            @if($property->bathrooms)
                                <div class="flex items-center">
                                    <i class="fas fa-bath mr-1"></i>
                                    <span>{{ $property->bathrooms }} Baths</span>
                                </div>
                            @endif
                            @if($property->sqft)
                                <div class="flex items-center">
                                    <i class="fas fa-expand-arrows-alt mr-1"></i>
                                    <span>{{ number_format($property->sqft) }} sqft</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="border-t pt-4">
                            <div class="flex items-center justify-between text-sm">
                                <div class="text-gray-600">
                                    <i class="fas fa-user mr-1"></i>
                                    Owner: <span class="font-semibold">{{ $property->user->name }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex gap-2">
                            <a href="/admin/properties/{{ $property->id }}" 
                               class="flex-1 px-4 py-2 text-center bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm font-semibold">
                                View Details
                            </a>
                            <button class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors text-sm font-semibold">
                                <i class="fas fa-calendar-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $properties->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-clipboard-list text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">No Assigned Properties</h3>
            <p class="text-gray-600 mb-6">You don't have any properties assigned to you yet.</p>
            @if($search || $statusFilter || $propertyTypeFilter)
                <button wire:click="clearFilters" 
                        class="px-6 py-3 rounded-lg text-white font-semibold transition-all duration-200 shadow-md"
                        style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    Clear Filters
                </button>
            @endif
        </div>
    @endif
</div>
