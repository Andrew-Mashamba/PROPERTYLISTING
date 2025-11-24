<div>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places&callback=initMap" async defer></script>
    
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $propertyId ? 'Edit Property' : 'Add New Property' }}</h1>
                <p class="text-sm text-gray-600 mt-1">{{ $propertyId ? 'Update your property details' : 'Create a new property listing for your portfolio' }}</p>
            </div>
            <a href="{{ route('seller.listings') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Back to Listings
            </a>
        </div>
    </div>

    <form wire:submit="save" class="space-y-6">
        <!-- Basic Information -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Basic Information</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Property Title *</label>
                    <input wire:model="title" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all" placeholder="e.g., Modern 3BR Apartment in Masaki">
                    @error('title') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Property Type *</label>
                    <select wire:model="property_type" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <option value="residential">Residential</option>
                        <option value="commercial">Commercial</option>
                        <option value="land">Land</option>
                        <option value="industrial">Industrial</option>
                    </select>
                    @error('property_type') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Listing Type *</label>
                    <select wire:model="listing_type" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <option value="sale">For Sale</option>
                        <option value="rent">For Rent</option>
                        <option value="both">Both</option>
                    </select>
                    @error('listing_type') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price (TZS) *</label>
                    <input wire:model="price" type="number" step="0.01" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="0.00">
                    @error('price') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price Type</label>
                    <select wire:model="price_type" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <option value="fixed">Fixed Price</option>
                        <option value="negotiable">Negotiable</option>
                        <option value="auction">Auction</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select wire:model="status" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Sold">Sold</option>
                        <option value="Rented">Rented</option>
                    </select>
                </div>
            </div>
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea wire:model="description" rows="4" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Describe your property, its features, and amenities..."></textarea>
                @error('description') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Property Details -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Property Details</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bedrooms</label>
                    <input wire:model="bedrooms" type="number" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="0">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bathrooms</label>
                    <input wire:model="bathrooms" type="number" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="0">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Area (sq ft)</label>
                    <input wire:model="area_sqft" type="number" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="0">
                </div>
            </div>
        </div>

        <!-- Location -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Location</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                    <input wire:model="address" id="address-input" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Street address">
                    @error('address') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                    <input wire:model="city" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="City">
                    @error('city') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">State/Region *</label>
                    <input wire:model="state" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="State or Region">
                    @error('state') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ZIP Code *</label>
                    <input wire:model="zip_code" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="ZIP Code">
                    @error('zip_code') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                    <input wire:model="country" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Country">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Latitude</label>
                    <input wire:model="latitude" id="latitude" type="number" step="any" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="e.g., -6.7924" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Longitude</label>
                    <input wire:model="longitude" id="longitude" type="number" step="any" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="e.g., 39.2083" readonly>
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pin Location on Map</label>
                <div id="map" class="w-full h-96 rounded-lg border-2 border-gray-300"></div>
                <p class="text-xs text-gray-500 mt-2">Click on the map to set the exact location, or use the search box above</p>
            </div>
        </div>

        <!-- Images -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Property Images</h3>
            </div>
            
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 hover:border-orange-500 transition-colors">
                <div class="text-center mb-6">
                    <div class="mx-auto w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8" style="color: #FF7F00;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-700 font-medium mb-2">Upload property images</p>
                    <p class="text-xs text-gray-500 mb-4">PNG, JPG up to 10MB</p>
                    <label class="cursor-pointer px-6 py-3 text-sm font-semibold text-white rounded-lg transition-all duration-200 shadow-md inline-flex items-center gap-2" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
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
                                <img src="{{ $image->temporaryUrl() }}" alt="Property" class="w-full h-32 object-cover rounded-lg">
                                <button wire:click="removeImage({{ $index }})" type="button" 
                                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all shadow-lg hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="space-y-3">
                    <div class="flex gap-3">
                        <input wire:model="imageUrl" type="text" placeholder="Enter image URL" 
                               class="flex-1 px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <button wire:click="addImageUrl" type="button" 
                                class="px-6 py-2.5 text-sm font-semibold bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add URL
                        </button>
                    </div>

                    @if($imageUrls && count($imageUrls) > 0)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($imageUrls as $index => $url)
                                <div class="relative group">
                                    <img src="{{ $url }}" alt="Property" class="w-full h-32 object-cover rounded-lg">
                                    <button wire:click="removeImageUrl({{ $index }})" type="button" 
                                            class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all shadow-lg hover:bg-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Existing Images -->
            @if($uploadedImages->count() > 0)
                <div class="mt-6">
                    <p class="text-sm font-medium text-gray-700 mb-4">Existing Images</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($uploadedImages as $image)
                            <div class="relative group">
                                <img src="{{ Storage::url($image->image_path) }}" alt="Property Image" class="w-full h-32 object-cover rounded-lg">
                                <button wire:click="removeUploadedImage({{ $image->id }})" type="button"
                                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all shadow-lg hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                @if($image->is_primary)
                                    <span class="absolute bottom-2 left-2 px-3 py-1 text-xs font-semibold rounded-full shadow-md" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white;">
                                        Main Image
                                    </span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Proof of Ownership -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6 pb-4 border-b-2" style="border-color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: #FF7F00;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Proof of Ownership</h3>
            </div>

            <div class="bg-yellow-50 border-2 border-yellow-200 rounded-lg p-4 mb-6">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-yellow-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-yellow-800">Required for Verification</p>
                        <p class="text-xs text-yellow-700 mt-1">Your property will be reviewed by our admin team before being published. Please provide valid ownership documents.</p>
                    </div>
                </div>
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

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Owner Email *</label>
                    <input wire:model="owner_email" type="email" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all" placeholder="owner@example.com">
                    @error('owner_email') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title Deed Document</label>
                    <input wire:model="title_deed_document" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <p class="text-xs text-gray-500 mt-1">PDF, JPG, or PNG (Max 5MB)</p>
                    @error('title_deed_document') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    @if($existing_title_deed)
                        <p class="text-xs text-green-600 mt-1">✓ Document already uploaded</p>
                    @endif
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sales Agreement Document</label>
                    <input wire:model="sales_agreement_document" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <p class="text-xs text-gray-500 mt-1">PDF, JPG, or PNG (Max 5MB)</p>
                    @error('sales_agreement_document') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    @if($existing_sales_agreement)
                        <p class="text-xs text-green-600 mt-1">✓ Document already uploaded</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Featured -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center gap-3">
                <input wire:model="featured" type="checkbox" id="featured" class="h-5 w-5 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                <label for="featured" class="text-sm font-medium text-gray-700 cursor-pointer flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" style="color: #FF7F00;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                    Feature this property (Premium placement in search results)
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('seller.listings') }}" class="px-6 py-3 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 text-sm font-semibold text-white rounded-lg transition-all duration-200 shadow-md flex items-center gap-2" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $propertyId ? 'Update Property' : 'Create Property' }}
            </button>
        </div>
    </form>

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
    
    <script>
        let map;
        let marker;
        let autocomplete;
        
        function initMap() {
            const defaultLocation = { lat: -6.7924, lng: 39.2083 };
            
            const currentLat = parseFloat(document.getElementById('latitude').value);
            const currentLng = parseFloat(document.getElementById('longitude').value);
            const initialLocation = (currentLat && currentLng) ? { lat: currentLat, lng: currentLng } : defaultLocation;
            
            map = new google.maps.Map(document.getElementById('map'), {
                center: initialLocation,
                zoom: 13,
                mapTypeControl: true,
                streetViewControl: false,
            });
            
            marker = new google.maps.Marker({
                position: initialLocation,
                map: map,
                draggable: true,
                title: 'Property Location'
            });
            
            const input = document.getElementById('address-input');
            autocomplete = new google.maps.places.Autocomplete(input, {
                componentRestrictions: { country: ['tz', 'us'] },
                fields: ['address_components', 'geometry', 'formatted_address']
            });
            
            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                
                if (!place.geometry) {
                    return;
                }
                
                const location = place.geometry.location;
                map.setCenter(location);
                marker.setPosition(location);
                
                updateLocationInputs(location.lat(), location.lng());
                
                if (place.address_components) {
                    extractAddressComponents(place.address_components);
                }
            });
            
            map.addListener('click', function(event) {
                placeMarker(event.latLng);
            });
            
            marker.addListener('dragend', function(event) {
                updateLocationInputs(event.latLng.lat(), event.latLng.lng());
            });
        }
        
        function placeMarker(location) {
            marker.setPosition(location);
            map.panTo(location);
            updateLocationInputs(location.lat(), location.lng());
        }
        
        function updateLocationInputs(lat, lng) {
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);
            
            @this.set('latitude', lat.toFixed(6));
            @this.set('longitude', lng.toFixed(6));
        }
        
        function extractAddressComponents(components) {
            let city = '';
            let state = '';
            let country = '';
            let zipCode = '';
            
            components.forEach(component => {
                const types = component.types;
                
                if (types.includes('locality')) {
                    city = component.long_name;
                } else if (types.includes('administrative_area_level_1')) {
                    state = component.long_name;
                } else if (types.includes('country')) {
                    country = component.long_name;
                } else if (types.includes('postal_code')) {
                    zipCode = component.long_name;
                }
            });
            
            if (city) @this.set('city', city);
            if (state) @this.set('state', state);
            if (country) @this.set('country', country);
            if (zipCode) @this.set('zip_code', zipCode);
        }
    </script>
</div>
