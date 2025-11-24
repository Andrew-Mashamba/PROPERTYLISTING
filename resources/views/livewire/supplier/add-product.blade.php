<div>
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $materialId ? 'Edit' : 'Add' }} Product</h1>
                <p class="text-sm text-gray-600 mt-1">{{ $materialId ? 'Update material details and inventory' : 'Add new material to your inventory' }}</p>
            </div>
            <a href="{{ route('supplier.catalog') }}" 
               class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Back to Catalog
            </a>
        </div>
    </div>

    <!-- Form -->
    <form wire:submit.prevent="save" class="max-w-5xl mx-auto">
        <!-- Basic Information Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Basic Information</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Product Name *</label>
                    <input wire:model="name" type="text" 
                           class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                           placeholder="Enter product name">
                    @error('name') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description *</label>
                    <textarea wire:model="description" rows="4" 
                              class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all resize-vertical"
                              placeholder="Detailed product description"></textarea>
                    @error('description') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category *</label>
                    <select wire:model="category" class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white transition-all">
                        <option value="">Select Category</option>
                        <option value="Cement">Cement</option>
                        <option value="Steel">Steel</option>
                        <option value="Bricks">Bricks</option>
                        <option value="Paint">Paint</option>
                        <option value="Tiles">Tiles</option>
                        <option value="Plumbing">Plumbing</option>
                        <option value="Electrical">Electrical</option>
                        <option value="Lumber">Lumber</option>
                        <option value="Roofing">Roofing</option>
                        <option value="Hardware">Hardware</option>
                    </select>
                    @error('category') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Brand</label>
                    <input wire:model="brand" type="text" 
                           class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                           placeholder="Brand name">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">SKU *</label>
                    <input wire:model="sku" type="text" 
                           class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                           placeholder="Product SKU">
                    @error('sku') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Supplier Name</label>
                    <input wire:model="supplier_name" type="text" 
                           class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                           placeholder="Supplier name">
                </div>
            </div>
        </div>

        <!-- Pricing & Inventory Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Pricing & Inventory</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Price (TZS) *</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">TZS</span>
                        <input wire:model="price" type="number" step="0.01" 
                               class="w-full pl-16 pr-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                               placeholder="0.00">
                    </div>
                    @error('price') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Discount (%)</label>
                    <div class="relative">
                        <input wire:model="discount_percentage" type="number" step="0.01" min="0" max="100" 
                               class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                               placeholder="0">
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">%</span>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Stock Quantity *</label>
                    <input wire:model="stock_quantity" type="number" 
                           class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                           placeholder="0">
                    @error('stock_quantity') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Min Stock Level *</label>
                    <input wire:model="min_stock_level" type="number" 
                           class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                           placeholder="5">
                    @error('min_stock_level') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Unit *</label>
                    <select wire:model="unit" class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white transition-all">
                        <option value="piece">Piece</option>
                        <option value="bag">Bag</option>
                        <option value="box">Box</option>
                        <option value="sqft">Square Feet</option>
                        <option value="meter">Meter</option>
                        <option value="kg">Kilogram</option>
                        <option value="liter">Liter</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Product Images Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Product Images</h3>
            </div>

            <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 hover:border-orange-500 transition-colors" style="background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%);">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                    </div>
                    <h4 class="text-base font-semibold text-gray-900 mb-2">Upload Product Images</h4>
                    <p class="text-sm text-gray-600 mb-4">Drag and drop or click to upload multiple images</p>
                    <label class="inline-flex items-center gap-2 cursor-pointer px-6 py-3 text-sm font-semibold text-white rounded-lg hover:shadow-lg transition-all"
                           style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Choose Images
                        <input wire:model="images" type="file" class="hidden" multiple accept="image/*">
                    </label>
                    <p class="text-xs text-gray-500 mt-4">Or enter image URLs below</p>
                </div>

                @if($images)
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        @foreach($images as $index => $image)
                            <div class="relative group">
                                <img src="{{ $image->temporaryUrl() }}" alt="Product" class="w-full h-32 object-cover rounded-lg shadow-md">
                                <button wire:click="removeImage({{ $index }})" type="button" 
                                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm opacity-0 group-hover:opacity-100 transition-opacity shadow-lg hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="space-y-4">
                    <div class="flex gap-3">
                        <input wire:model="image_url" type="text" placeholder="https://example.com/image.jpg" 
                               class="flex-1 px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <button wire:click="addImageUrl" type="button" 
                                class="px-6 py-3 text-sm font-semibold bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add URL
                        </button>
                    </div>

                    @if($imageUrls && count($imageUrls) > 0)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($imageUrls as $index => $url)
                                <div class="relative group">
                                    <img src="{{ $url }}" alt="Product" class="w-full h-32 object-cover rounded-lg shadow-md">
                                    <button wire:click="removeImageUrl({{ $index }})" type="button" 
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm opacity-0 group-hover:opacity-100 transition-opacity shadow-lg hover:bg-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Product Options Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 010-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Product Options</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <label class="flex items-center p-4 bg-gray-50 rounded-lg border-2 border-gray-200 cursor-pointer hover:border-orange-500 transition-colors">
                    <input wire:model="is_featured" type="checkbox" class="w-5 h-5 rounded border-gray-300 text-orange-600 focus:ring-orange-500">
                    <div class="ml-3">
                        <span class="text-sm font-semibold text-gray-900 block">Featured Product</span>
                        <span class="text-xs text-gray-500">Show this product in featured section</span>
                    </div>
                </label>
                <label class="flex items-center p-4 bg-gray-50 rounded-lg border-2 border-gray-200 cursor-pointer hover:border-orange-500 transition-colors">
                    <input wire:model="is_available" type="checkbox" class="w-5 h-5 rounded border-gray-300 text-orange-600 focus:ring-orange-500">
                    <div class="ml-3">
                        <span class="text-sm font-semibold text-gray-900 block">Available for Sale</span>
                        <span class="text-xs text-gray-500">Make product available to customers</span>
                    </div>
                </label>
            </div>
        </div>

        <!-- Proof of Ownership -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Proof of Ownership</h3>
            </div>

            <div class="bg-yellow-50 border-2 border-yellow-200 rounded-lg p-4 mb-6">
                <p class="text-sm font-semibold text-yellow-800">Required for Verification</p>
                <p class="text-xs text-yellow-700 mt-1">Your product will be reviewed by our admin team before being published. Please provide valid business documents.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">NIDA Number *</label>
                    <input wire:model="owner_nida" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all" placeholder="Enter your NIDA number">
                    @error('owner_nida') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Owner Phone *</label>
                    <input wire:model="owner_phone" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all" placeholder="+255 XXX XXX XXX">
                    @error('owner_phone') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Owner Email *</label>
                    <input wire:model="owner_email" type="email" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all" placeholder="email@example.com">
                    @error('owner_email') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Business License Document</label>
                    <input wire:model="business_license_document" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <p class="text-xs text-gray-500 mt-1">PDF, JPG, or PNG (Max 5MB)</p>
                    @error('business_license_document') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    @if($existing_business_license)
                        <p class="text-xs text-green-600 mt-1">✓ Document already uploaded</p>
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Supplier Certificate</label>
                    <input wire:model="supplier_certificate" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <p class="text-xs text-gray-500 mt-1">PDF, JPG, or PNG (Max 5MB)</p>
                    @error('supplier_certificate') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    @if($existing_supplier_certificate)
                        <p class="text-xs text-green-600 mt-1">✓ Document already uploaded</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-4 mt-8">
            <a href="{{ route('supplier.catalog') }}" 
               class="px-6 py-3 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" 
                    class="px-8 py-3 text-sm font-semibold text-white rounded-lg hover:shadow-lg transition-all flex items-center gap-2"
                    style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                {{ $materialId ? 'Update' : 'Save' }} Product
            </button>
        </div>
    </form>
</div>
