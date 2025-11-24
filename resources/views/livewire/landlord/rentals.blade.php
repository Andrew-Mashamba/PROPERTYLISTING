<div class="min-h-screen bg-gray-50">
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Rental Properties</h1>
                <p class="text-sm text-gray-600 mt-1">Manage your rental property portfolio</p>
            </div>
            <a href="{{ route('landlord.add-rental') }}" class="px-4 py-2 rounded-lg text-white font-semibold transition-all shadow-md hover:shadow-lg" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add Property
            </a>
        </div>
    </div>

    <!-- Filters Panel -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #dee2e6;">
        <div class="flex items-center justify-between mb-4 pb-4" style="border-bottom: 3px solid #FF7F00;">
            <h3 class="text-lg font-bold" style="color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                Filter Properties
            </h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search properties..." 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select wire:model.live="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="">All Status</option>
                    <option value="occupied">Occupied</option>
                    <option value="available">Available</option>
                    <option value="maintenance">Maintenance</option>
                    <option value="vacant">Vacant</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Property Type</label>
                <select wire:model.live="propertyType" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="">All Types</option>
                    <option value="apartment">Apartment</option>
                    <option value="house">House</option>
                    <option value="condo">Condo</option>
                    <option value="studio">Studio</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Per Page</label>
                <select wire:model.live="perPage" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="12">12 per page</option>
                    <option value="24">24 per page</option>
                    <option value="48">48 per page</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Total Properties</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $stats['total'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #007BFF 0%, #0056b3 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">Rental portfolio</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Occupied</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $stats['occupied'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">Currently rented</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Available</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $stats['available'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">Ready for rent</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Maintenance</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $stats['maintenance'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">Under repair</p>
        </div>
    </div>

        @if($rentals->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($rentals as $rental)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                        <div class="relative h-48 bg-gray-100">
                            @php
                                $firstImage = $rental->images->first();
                                $imageCount = $rental->images->count();
                            @endphp
                            
                            @if($firstImage)
                                <img src="{{ Storage::url($firstImage->image_path) }}" alt="{{ $rental->title }}" class="w-full h-full object-cover">
                                
                                @if($imageCount > 1)
                                    <button wire:click="viewImages({{ $rental->id }})" class="absolute bottom-3 right-3 text-white px-3 py-1.5 rounded-lg text-xs font-semibold shadow-lg hover:opacity-90 transition-opacity" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $imageCount }} photos
                                    </button>
                                @endif
                            @else
                                <div class="flex items-center justify-center h-full">
                                    <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="absolute top-3 left-3">
                                @if($rental->status === 'Rented')
                                    <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                        {{ $rental->status }}
                                    </span>
                                @elseif($rental->status === 'Active')
                                    <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                                        {{ $rental->status }}
                                    </span>
                                @elseif($rental->status === 'Pending')
                                    <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);">
                                        {{ $rental->status }}
                                    </span>
                                @else
                                    <span class="px-3 py-1.5 text-xs font-bold rounded-full bg-gray-600 text-white shadow-lg">
                                        {{ $rental->status }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 text-base mb-2">{{ $rental->title }}</h3>
                            <div class="flex items-start gap-1 mb-3">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="text-sm text-gray-600">{{ $rental->address }}</p>
                            </div>
                            
                            <div class="flex items-center justify-between mb-3">
                                <div class="px-3 py-2 rounded-lg" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                                    <span class="text-lg font-bold" style="color: #FF7F00;">TZS {{ number_format($rental->price) }}</span>
                                    <span class="text-xs text-gray-600 font-medium">/mo</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                    @if($rental->bedrooms)
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                            <span class="font-medium">{{ $rental->bedrooms }}</span>
                                        </div>
                                    @endif
                                    @if($rental->bathrooms)
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                            </svg>
                                            <span class="font-medium">{{ $rental->bathrooms }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-100">
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 text-xs font-bold rounded-full" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.15) 0%, rgba(255, 69, 0, 0.15) 100%); color: #FF7F00;">
                                        {{ ucfirst($rental->property_type) }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-1 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                    </svg>
                                    <span class="font-medium">{{ $rental->sqft ? number_format($rental->sqft) . ' sqft' : 'N/A' }}</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                <a href="{{ route('landlord.add-rental', ['edit' => $rental->id]) }}" class="flex items-center justify-center gap-2 px-3 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%); color: white;">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View
                                </a>
                                <a href="{{ route('landlord.add-rental', ['edit' => $rental->id]) }}" class="flex items-center justify-center gap-2 px-3 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white;">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $rentals->links() }}
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-xl shadow-lg">
                <div class="w-20 h-20 rounded-full mx-auto mb-6 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                    <svg class="w-10 h-10" style="color: #FF7F00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">No rental properties found</h3>
                <p class="text-sm text-gray-500 mb-6">Start by adding your first rental property.</p>
                <a href="{{ route('landlord.add-rental') }}" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-bold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Rental Property
                </a>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif

    <!-- Image Gallery Modal -->
    @if($showImageModal)
        <div class="fixed inset-0 z-50 overflow-hidden" wire:click="closeImageModal">
            <div class="absolute inset-0 bg-black bg-opacity-90"></div>
            
            <div class="relative h-full flex flex-col">
                <div class="absolute top-4 right-4 z-10">
                    <button wire:click="closeImageModal" class="w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-white hover:bg-opacity-20 transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="flex-1 flex items-center justify-center p-4" wire:click.stop>
                    @if($currentImageIndex > 0)
                        <button wire:click="previousImage" class="absolute left-4 w-12 h-12 rounded-full flex items-center justify-center text-white hover:bg-white hover:bg-opacity-20 transition-all duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                    @endif
                    
                    <img src="{{ Storage::url($currentImage) }}" alt="Property" class="object-contain" style="max-height: 60vh; max-width: 60vw;">
                    
                    @if($currentImageIndex < count($viewingImages) - 1)
                        <button wire:click="nextImage" class="absolute right-4 w-12 h-12 rounded-full flex items-center justify-center text-white hover:bg-white hover:bg-opacity-20 transition-all duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    @endif
                </div>
                
                <div class="bg-black bg-opacity-80 p-4">
                    <div class="text-center text-white text-sm mb-2">
                        {{ $currentImageIndex + 1 }} / {{ count($viewingImages) }}
                    </div>
                    <div class="flex justify-center gap-2 overflow-x-auto">
                        @foreach($viewingImages as $index => $image)
                            <button wire:click="setCurrentImage({{ $index }})" class="flex-shrink-0">
                                <img src="{{ Storage::url($image) }}" alt="Thumbnail" 
                                     class="w-16 h-16 object-cover rounded {{ $index === $currentImageIndex ? 'ring-2 ring-orange-500' : 'opacity-60 hover:opacity-100' }}">
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
