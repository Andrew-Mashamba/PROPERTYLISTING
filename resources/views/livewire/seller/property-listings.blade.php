<div>
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">My Property Listings</h1>
                <p class="text-sm text-gray-600 mt-1">Manage and track your property portfolio</p>
            </div>
            <a href="{{ route('seller.add-property') }}" class="px-4 py-2 rounded-lg text-white font-semibold transition-all duration-200 shadow-md" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add Property
            </a>
        </div>
    </div>

    <!-- Filters Panel -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #dee2e6;">
        <div class="flex items-center justify-between mb-4 pb-4" style="border-bottom: 2px solid #FF7F00;">
            <h3 class="text-lg font-bold" style="color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                Filter Properties
            </h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search properties..." 
                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select wire:model.live="status" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="">All Status</option>
                    <option value="Active">Active</option>
                    <option value="Pending">Pending</option>
                    <option value="Sold">Sold</option>
                    <option value="Rented">Rented</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Property Type</label>
                <select wire:model.live="propertyType" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="">All Types</option>
                    <option value="residential">Residential</option>
                    <option value="commercial">Commercial</option>
                    <option value="land">Land</option>
                    <option value="industrial">Industrial</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Per Page</label>
                <select wire:model.live="perPage" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Properties Grid -->
    @if($properties->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            @foreach($properties as $property)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-200">
                    <!-- Property Image -->
                    <div class="relative h-56 bg-gray-200">
                        @php
                            $firstImage = $property->images->first();
                            $imageCount = $property->images->count();
                        @endphp
                        
                        @if($firstImage)
                            <img src="{{ Storage::url($firstImage->image_path) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                            
                            @if($imageCount > 1)
                                <button wire:click="viewImages({{ $property->id }})" 
                                        class="absolute bottom-3 right-3 bg-black bg-opacity-70 text-white px-3 py-1.5 rounded-lg text-sm font-medium hover:bg-opacity-90 transition-all flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    +{{ $imageCount - 1 }} more
                                </button>
                            @endif
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Status Badge -->
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full shadow-md
                                @if($property->status === 'Active') bg-green-500 text-white
                                @elseif($property->status === 'Pending') bg-yellow-500 text-white
                                @elseif($property->status === 'Sold') bg-blue-500 text-white
                                @elseif($property->status === 'Rented') bg-purple-500 text-white
                                @else bg-gray-500 text-white
                                @endif">
                                {{ $property->status }}
                            </span>
                        </div>

                        <!-- Featured Badge -->
                        @if($property->is_featured)
                            <div class="absolute top-3 right-3">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full shadow-md" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white;">
                                    ⭐ Featured
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Property Details -->
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-1">{{ $property->title }}</h3>
                        <p class="text-sm text-gray-600 mb-3 flex items-start gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mt-0.5 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <span class="line-clamp-1">{{ $property->address }}</span>
                        </p>
                        
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xl font-bold" style="color: #FF7F00;">TZS {{ number_format($property->price) }}</span>
                        </div>

                        <div class="flex items-center flex-wrap gap-2 text-xs text-gray-600 mb-4 pb-4 border-b border-gray-200">
                            <span class="px-2 py-1 bg-gray-100 rounded-md capitalize font-medium">{{ $property->property_type }}</span>
                            <span class="px-2 py-1 bg-gray-100 rounded-md capitalize font-medium">{{ $property->listing_type }}</span>
                            @if($property->bedrooms)
                                <span class="px-2 py-1 bg-gray-100 rounded-md font-medium">{{ $property->bedrooms }} bed</span>
                            @endif
                            @if($property->bathrooms)
                                <span class="px-2 py-1 bg-gray-100 rounded-md font-medium">{{ $property->bathrooms }} bath</span>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex gap-2 flex-1">
                                <button wire:click="toggleFeatured({{ $property->id }})" 
                                        class="flex-1 px-3 py-2 text-sm font-semibold rounded-lg transition-all duration-200
                                        @if($property->is_featured) text-white shadow-md @else bg-gray-100 text-gray-700 hover:bg-gray-200 @endif"
                                        @if($property->is_featured) style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);" @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                    {{ $property->is_featured ? 'Featured' : 'Feature' }}
                                </button>
                                <a href="{{ route('seller.add-property', ['edit' => $property->id]) }}" 
                                   class="flex-1 px-3 py-2 text-sm font-semibold bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    Edit
                                </a>
                            </div>
                            <button wire:click="deleteProperty({{ $property->id }})" 
                                    wire:confirm="Are you sure you want to delete this property?"
                                    class="px-3 py-2 text-sm font-semibold bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $properties->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-lg p-12">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-20 w-20 text-gray-400 mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No properties found</h3>
                <p class="text-sm text-gray-500 mb-6">Get started by adding your first property to your portfolio.</p>
                <a href="{{ route('seller.add-property') }}" class="inline-flex items-center px-6 py-3 text-white font-semibold rounded-lg transition-all duration-200 shadow-md" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add Your First Property
                </a>
            </div>
        </div>
    @endif

    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="fixed top-6 right-6 z-50 animate-slide-in">
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-lg max-w-md">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-green-700 font-medium">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Image Gallery Modal -->
    @if($showImageModal)
        <div class="fixed inset-0 z-50 overflow-hidden" wire:click="closeImageModal">
            <div class="absolute inset-0 bg-black bg-opacity-95 backdrop-blur-sm"></div>
            
            <div class="relative h-full flex flex-col">
                <div class="absolute top-6 right-6 z-10">
                    <button wire:click="closeImageModal" class="text-white hover:text-gray-300 transition-colors p-2 bg-black bg-opacity-50 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="flex-1 flex items-center justify-center p-4" wire:click.stop>
                    @if($currentImageIndex > 0)
                        <button wire:click="previousImage" class="absolute left-6 text-white text-5xl hover:text-gray-300 transition-colors bg-black bg-opacity-50 rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                    @endif
                    
                    <img src="{{ Storage::url($currentImage) }}" alt="Property" class="object-contain rounded-lg shadow-2xl" style="max-height: 70vh; max-width: 80vw;">
                    
                    @if($currentImageIndex < count($viewingImages) - 1)
                        <button wire:click="nextImage" class="absolute right-6 text-white text-5xl hover:text-gray-300 transition-colors bg-black bg-opacity-50 rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    @endif
                </div>
                
                <div class="bg-black bg-opacity-90 p-6">
                    <div class="text-center text-white text-base font-medium mb-4">
                        {{ $currentImageIndex + 1 }} / {{ count($viewingImages) }}
                    </div>
                    <div class="flex justify-center gap-3 overflow-x-auto pb-2">
                        @foreach($viewingImages as $index => $image)
                            <button wire:click="setCurrentImage({{ $index }})" class="flex-shrink-0 transition-all duration-200">
                                <img src="{{ Storage::url($image) }}" alt="Thumbnail" 
                                     class="w-20 h-20 object-cover rounded-lg {{ $index === $currentImageIndex ? 'ring-4 ring-orange-500 shadow-lg' : 'opacity-60 hover:opacity-100 hover:ring-2 hover:ring-white' }}">
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
