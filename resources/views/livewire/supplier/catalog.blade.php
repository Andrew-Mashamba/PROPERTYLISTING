<div>
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Product Catalog</h1>
                <p class="text-sm text-gray-600 mt-1">Manage your materials inventory and products</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">{{ $materials->total() }} Products</span>
                </div>
                <a href="{{ route('supplier.add-product') }}" 
                   class="px-4 py-2 text-sm font-semibold text-white rounded-lg hover:shadow-lg transition-all flex items-center gap-2"
                   style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add Product
                </a>
            </div>
        </div>
    </div>

    <!-- Filters Panel -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #dee2e6;">
        <div class="flex items-center justify-between mb-4 pb-4" style="border-bottom: 2px solid #FF7F00;">
            <h3 class="text-lg font-bold" style="color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                Filter Products
            </h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search materials..." 
                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select wire:model.live="category" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select wire:model.live="status" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="">All Status</option>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                    <option value="low_stock">Low Stock</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                <select wire:model.live="sortBy" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="created_at">Date Added</option>
                    <option value="name">Name</option>
                    <option value="price">Price</option>
                    <option value="stock_quantity">Stock</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Per Page</label>
                <select wire:model.live="perPage" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="12">12 per page</option>
                    <option value="24">24 per page</option>
                    <option value="48">48 per page</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    @if($materials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
            @foreach($materials as $material)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-200 transform hover:-translate-y-1">
                    <!-- Product Image -->
                    <div class="relative h-48 bg-gray-200 group overflow-hidden">
                        @php
                            $productImages = $material->images ? (is_array($material->images) ? $material->images : json_decode($material->images, true)) : [];
                            $firstImage = !empty($productImages) ? $productImages[0] : $material->image_url;
                            $imageCount = count($productImages);
                        @endphp
                        
                        @if($firstImage)
                            <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $material->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                        @endif
                        
                        @if($imageCount > 1)
                            <button wire:click="viewImages({{ $material->id }})" 
                                    class="absolute bottom-2 right-2 px-3 py-1.5 text-xs font-semibold bg-black bg-opacity-70 text-white rounded-lg opacity-0 group-hover:opacity-100 transition-opacity hover:bg-opacity-90">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 inline-block mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                +{{ $imageCount - 1 }} more
                            </button>
                        @endif
                        
                        <!-- Badges -->
                        <div class="absolute top-2 left-2 flex flex-col gap-2">
                            @if($material->is_featured)
                                <span class="px-3 py-1 text-xs font-semibold bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-full shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-3 h-3 inline-block mr-1">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg>
                                    Featured
                                </span>
                            @endif
                            @if($material->stock_quantity <= 5)
                                <span class="px-3 py-1 text-xs font-semibold bg-red-500 text-white rounded-full shadow-lg">
                                    Low Stock
                                </span>
                            @endif
                        </div>

                        <!-- Status Badge -->
                        <div class="absolute top-2 right-2">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full shadow-lg
                                @if($material->is_available && $material->stock_quantity > 0) bg-green-500 text-white
                                @else bg-red-500 text-white
                                @endif">
                                {{ $material->is_available && $material->stock_quantity > 0 ? 'Available' : 'Unavailable' }}
                            </span>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 text-base mb-2 line-clamp-2">{{ $material->name }}</h3>
                        
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-md">{{ $material->category }}</span>
                            @if($material->brand)
                                <span class="px-2 py-1 text-xs font-medium text-gray-600 rounded-md" style="background: linear-gradient(135deg, #fff5e6 0%, #ffe6cc 100%);">{{ $material->brand }}</span>
                            @endif
                        </div>
                        
                        <p class="text-xs text-gray-500 mb-3">SKU: <span class="font-medium text-gray-700">{{ $material->sku }}</span></p>
                        
                        <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Price</p>
                                <p class="text-xl font-bold" style="color: #FF7F00;">TZS {{ number_format($material->price) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500 mb-1">Stock</p>
                                <p class="text-sm font-semibold text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                    </svg>
                                    {{ $material->stock_quantity }} {{ $material->unit }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-3 gap-2">
                            <button wire:click="toggleFeatured({{ $material->id }})" 
                                    class="px-3 py-2 text-xs font-semibold rounded-lg transition-all hover:shadow-md
                                    @if($material->is_featured) text-white @else bg-gray-100 text-gray-700 hover:bg-gray-200 @endif"
                                    style="{{ $material->is_featured ? 'background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4 mx-auto">
                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <a href="{{ route('supplier.add-product', ['edit' => $material->id]) }}" 
                               class="px-3 py-2 text-xs font-semibold bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-all hover:shadow-md text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                            <button wire:click="deleteMaterial({{ $material->id }})" 
                                    wire:confirm="Are you sure you want to delete this material?"
                                    class="px-3 py-2 text-xs font-semibold bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-all hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
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
            {{ $materials->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-lg p-12">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-20 w-20 text-gray-400 mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No products found</h3>
                <p class="text-sm text-gray-500 mb-6">Get started by adding your first product to the catalog.</p>
                <a href="{{ route('supplier.add-product') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white rounded-lg hover:shadow-lg transition-all"
                   style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add Your First Product
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
        <div class="fixed inset-0 z-50 overflow-y-auto" style="background: rgba(0,0,0,0.9);">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
                <div class="fixed inset-0 transition-opacity" wire:click="closeImageModal"></div>

                <div class="relative inline-block w-full max-w-4xl">
                    <button wire:click="closeImageModal" class="absolute -top-12 right-0 text-white text-2xl hover:text-gray-300 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    
                    <div class="bg-white rounded-xl overflow-hidden shadow-2xl">
                        <!-- Main Image -->
                        <div class="relative h-96 bg-gray-900 flex items-center justify-center">
                            @if($currentImage)
                                <img src="{{ asset('storage/' . $currentImage) }}" alt="Product Image" class="max-h-full max-w-full object-contain">
                            @endif
                            
                            @if($currentImageIndex > 0)
                                <button wire:click="previousImage" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-75 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                    </svg>
                                </button>
                            @endif
                            
                            @if($currentImageIndex < count($viewingImages) - 1)
                                <button wire:click="nextImage" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-75 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                            @endif
                            
                            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-black bg-opacity-70 text-white px-4 py-2 rounded-full text-sm font-semibold">
                                {{ $currentImageIndex + 1 }} / {{ count($viewingImages) }}
                            </div>
                        </div>
                        
                        <!-- Thumbnail Strip -->
                        <div class="p-4 bg-gray-100">
                            <div class="flex gap-3 overflow-x-auto">
                                @foreach($viewingImages as $index => $image)
                                    <button wire:click="setCurrentImage({{ $index }})" 
                                            class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 transition-all {{ $currentImageIndex === $index ? 'border-orange-500 shadow-lg' : 'border-transparent opacity-60 hover:opacity-100' }}">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Thumbnail" class="w-full h-full object-cover">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
