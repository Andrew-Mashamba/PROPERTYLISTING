<div>
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-2">
            <div>
                @if(auth()->user()->user_type === 'seller')
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Property Seller Dashboard</h1>
                    <p class="text-sm text-gray-600 mt-1">Manage your listings and close more sales</p>
                @elseif(auth()->user()->user_type === 'landlord')
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Landlord Dashboard</h1>
                    <p class="text-sm text-gray-600 mt-1">Manage rentals and tenant relationships</p>
                @elseif(auth()->user()->user_type === 'agent')
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Real Estate Agent Dashboard</h1>
                    <p class="text-sm text-gray-600 mt-1">Welcome back, {{ auth()->user()->name }}</p>
                @elseif(auth()->user()->user_type === 'supplier')
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Materials Supplier Dashboard</h1>
                    <p class="text-sm text-gray-600 mt-1">Manage inventory and process orders</p>
                @elseif(auth()->user()->user_type === 'savanna')
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">System Admin Dashboard</h1>
                    <p class="text-sm text-gray-600 mt-1">Monitor platform performance and oversee operations</p>
                @else
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Dashboard Overview</h1>
                    <p class="text-sm text-gray-600 mt-1">Welcome back, {{ auth()->user()->name }}</p>
                @endif
            </div>
            <div class="flex gap-2">
                @if(auth()->user()->user_type === 'seller' || auth()->user()->user_type === 'savanna')
                    <a href="{{ route('seller.add-property') }}" class="px-4 py-2 rounded-lg text-white font-semibold transition-all duration-200 shadow-md text-sm" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add Property
                    </a>
                @elseif(auth()->user()->user_type === 'supplier')
                    <a href="/system/supplier/add-product" class="px-4 py-2 rounded-lg text-white font-semibold transition-all duration-200 shadow-md text-sm" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add Product
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @if(auth()->user()->user_type === 'agent')
            <!-- Assigned Properties --><div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Assigned Properties</p>
                        <p class="text-gray-900 text-2xl font-bold">{{ $stats['assigned_properties'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clipboard-list text-blue-600 text-xl"></i>
                    </div>
                </div>
                <p class="text-sm text-green-500 font-bold">+3 new assignments</p>
            </div>
            <!-- Active Deals -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Active Deals</p>
                        <p class="text-gray-900 text-2xl font-bold">{{ $stats['active_deals'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-handshake text-purple-600 text-xl"></i>
                    </div>
                </div>
                <p class="text-sm text-green-500 font-bold">2 closing soon</p>
            </div>
            <!-- Commission -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">This Month Commission</p>
                        <p class="text-gray-900 text-2xl font-bold">TZS {{ number_format($stats['monthly_commission'] / 1000000, 1) }}M</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                    </div>
                </div>
                <p class="text-sm text-green-500 font-bold">+25% from last month</p>
            </div>
            <!-- Showings -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Property Showings</p>
                        <p class="text-gray-900 text-2xl font-bold">{{ $stats['property_showings'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-orange-600 text-xl"></i>
                    </div>
                </div>
                <p class="text-sm text-blue-500 font-bold">Scheduled this week</p>
            </div>
        @else
            <!-- Total Properties -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex flex-col">
                        <p class="text-gray-600 text-sm font-normal mb-1">Total Properties</p>
                        <p class="text-gray-900 text-2xl font-bold">{{ number_format($stats['total_properties'] ?? 0) }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white text-xl w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-green-500 font-bold mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                    All your properties
                </p>
            </div>

            <!-- Active Properties -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex flex-col">
                        <p class="text-gray-600 text-sm font-normal mb-1">Active Listings</p>
                        <p class="text-gray-900 text-2xl font-bold">{{ number_format($stats['active_properties'] ?? 0) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green-600 text-xl w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-green-500 font-bold mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                    Currently listed
                </p>
            </div>

            <!-- Rentals -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex flex-col">
                        <p class="text-gray-600 text-sm font-normal mb-1">For Rent</p>
                        <p class="text-gray-900 text-2xl font-bold">{{ number_format($stats['total_rentals'] ?? 0) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-blue-600 text-xl w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-blue-500 font-bold mt-4">
                    Rental properties
                </p>
            </div>

            <!-- Total Value -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex flex-col">
                        <p class="text-gray-600 text-sm font-normal mb-1">Total Value</p>
                        <p class="text-gray-900 text-2xl font-bold">{{ number_format(($stats['total_value'] ?? 0) / 1000000, 1) }}M</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-purple-600 text-xl w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-gray-500 font-normal mt-4">
                    TZS {{ number_format($stats['total_value'] ?? 0) }}
                </p>
            </div>
        @endif
    </div>

    <!-- Charts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Property by Type -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="mb-4">
                <h3 class="text-gray-800 text-xl font-semibold mb-2">Properties by Type</h3>
                <p class="text-gray-500 text-sm">Distribution of your property portfolio</p>
            </div>
            @if($propertyByType->count() > 0)
                <div class="flex flex-col space-y-4">
                    @foreach($propertyByType as $type)
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 last:border-b-0">
                            <div class="flex items-center">
                                <span class="text-gray-700 text-base font-normal">{{ ucfirst($type->property_type) }}</span>
                            </div>
                            <div class="flex space-x-6 text-gray-600 text-sm">
                                <div class="flex items-center gap-3">
                                    <div class="w-32 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full transition-all duration-300" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); width: {{ $stats['total_properties'] > 0 ? ($type->count / $stats['total_properties']) * 100 : 0 }}%"></div>
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $type->count }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-12 w-12 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                    </svg>
                    <p class="text-gray-500 text-sm mt-2">No data available</p>
                </div>
            @endif
        </div>

        <!-- Property by Status -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="mb-4">
                <h3 class="text-gray-800 text-xl font-semibold mb-2">Properties by Status</h3>
                <p class="text-gray-500 text-sm">Current status of your listings</p>
            </div>
            @if($propertyByStatus->count() > 0)
                <div class="flex flex-col space-y-4">
                    @foreach($propertyByStatus as $status)
                        @php
                            $color = match($status->status) {
                                'Active' => '#28A745',
                                'Pending' => '#FFD700',
                                'Sold' => '#007BFF',
                                'Rented' => '#FF7F00',
                                default => '#6C757D'
                            };
                        @endphp
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 last:border-b-0">
                            <div class="flex items-center">
                                <span class="text-gray-700 text-base font-normal">{{ $status->status }}</span>
                            </div>
                            <div class="flex space-x-6 text-gray-600 text-sm">
                                <div class="flex items-center gap-3">
                                    <div class="w-32 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full transition-all duration-300" style="background-color: {{ $color }}; width: {{ $stats['total_properties'] > 0 ? ($status->count / $stats['total_properties']) * 100 : 0 }}%"></div>
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $status->count }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-12 w-12 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                    </svg>
                    <p class="text-gray-500 text-sm mt-2">No data available</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Recent Properties -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-gray-800 text-xl font-semibold">Recent Properties</h3>
                <p class="text-gray-500 text-sm mt-1">Your latest property listings</p>
            </div>
            <a href="{{ route('seller.listings') }}" class="text-sm font-semibold transition-colors duration-200" style="color: #FF7F00;">
                View All →
            </a>
        </div>
        
        @if($recentProperties->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($recentProperties as $property)
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-200">
                        <div class="relative h-48 bg-gray-200">
                            @php
                                $firstImage = $property->images->first();
                            @endphp
                            @if($firstImage)
                                <img src="{{ Storage::url($firstImage->image_path) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                    </svg>
                                </div>
                            @endif
                            <span class="absolute top-2 left-2 px-3 py-1 text-xs font-medium rounded-full {{ $property->status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $property->status }}
                            </span>
                        </div>
                        <div class="p-4">
                            <h4 class="text-gray-900 font-semibold text-base mb-2 truncate">{{ $property->title }}</h4>
                            <p class="text-gray-600 text-sm mb-3">{{ $property->city }}, {{ $property->state }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold" style="color: #FF7F00;">TZS {{ number_format($property->price) }}</span>
                                <a href="{{ route('seller.add-property', ['edit' => $property->id]) }}" class="px-3 py-1.5 text-sm bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-16 w-16 text-gray-400 mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                </svg>
                <h3 class="text-gray-900 text-base font-semibold mb-2">No properties yet</h3>
                <p class="text-gray-500 text-sm mb-4">Get started by adding your first property</p>
                <a href="{{ route('seller.add-property') }}" class="inline-block px-4 py-2 text-white rounded-lg font-semibold transition-all duration-200 shadow-md" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    Add Your First Property
                </a>
            </div>
        @endif
    </div>

    <!-- Recent Materials -->
    @if($recentMaterials->count() > 0)
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-gray-800 text-xl font-semibold">Available Materials</h3>
                <p class="text-gray-500 text-sm mt-1">Browse construction materials</p>
            </div>
            <a href="{{ route('materials') }}" class="text-sm font-semibold transition-colors duration-200" style="color: #FF7F00;">
                View All →
            </a>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($recentMaterials as $material)
                @php
                    $images = is_array($material->images) ? $material->images : json_decode($material->images, true) ?? [];
                    $firstImage = !empty($images) ? $images[0] : $material->image_url;
                @endphp
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-200">
                    <div class="h-32 bg-gray-200">
                        @if($firstImage)
                            <img src="{{ Storage::url($firstImage) }}" alt="{{ $material->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-3">
                        <h4 class="text-sm font-semibold text-gray-900 truncate mb-1">{{ $material->name }}</h4>
                        <p class="text-sm font-bold" style="color: #FF7F00;">TZS {{ number_format($material->price) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
