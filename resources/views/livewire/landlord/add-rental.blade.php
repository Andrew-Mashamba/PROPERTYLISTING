<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">{{ $propertyId ? 'Edit Rental Property' : 'Add New Rental Property' }}</h1>
                <p class="text-sm text-gray-600">{{ $propertyId ? 'Update rental property details' : 'Create a new rental property listing' }}</p>
            </div>
            <a href="{{ route('landlord.rentals') }}" class="text-sm text-gray-600 hover:text-gray-900">← Back to Rentals</a>
        </div>
    </div>

    <div class="max-w-4xl mx-auto p-4">
        <form wire:submit="save" class="space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-medium text-gray-900 mb-3">Basic Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Property Title *</label>
                        <input wire:model="title" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        @error('title') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Property Type *</label>
                        <select wire:model="property_type" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            <option value="residential">Residential</option>
                            <option value="commercial">Commercial</option>
                            <option value="land">Land</option>
                            <option value="industrial">Industrial</option>
                        </select>
                        @error('property_type') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Listing Type *</label>
                        <select wire:model="listing_type" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            <option value="rent">For Rent</option>
                            <option value="both">Both (Rent/Sale)</option>
                            <option value="sale">For Sale</option>
                        </select>
                        @error('listing_type') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Monthly Rent (TZS) *</label>
                        <input wire:model="price" type="number" step="0.01" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        @error('price') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Price Type</label>
                        <select wire:model="price_type" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            <option value="fixed">Fixed Price</option>
                            <option value="negotiable">Negotiable</option>
                            <option value="auction">Auction</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Availability Status</label>
                        <select wire:model="status" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            <option value="Active">Available</option>
                            <option value="Rented">Occupied</option>
                            <option value="Pending">Under Review</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-xs font-medium text-gray-700 mb-1">Description *</label>
                    <textarea wire:model="description" rows="3" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                    @error('description') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Property Details -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-medium text-gray-900 mb-3">Property Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Bedrooms</label>
                        <input wire:model="bedrooms" type="number" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Bathrooms</label>
                        <input wire:model="bathrooms" type="number" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Area (sq ft)</label>
                        <input wire:model="area_sqft" type="number" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-medium text-gray-900 mb-3">Location</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Address *</label>
                        <input wire:model="address" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        @error('address') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">City *</label>
                        <input wire:model="city" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        @error('city') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">State *</label>
                        <input wire:model="state" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        @error('state') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">ZIP Code *</label>
                        <input wire:model="zip_code" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        @error('zip_code') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Country</label>
                        <input wire:model="country" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Latitude</label>
                        <input wire:model="latitude" type="number" step="any" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Longitude</label>
                        <input wire:model="longitude" type="number" step="any" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-medium text-gray-900 mb-3">Rental Property Images</h3>
                
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                    <div class="text-center mb-3">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-xs text-gray-600 mb-2">Upload multiple images of the rental property</p>
                        <label class="cursor-pointer px-3 py-1.5 text-xs bg-orange-500 text-white rounded hover:bg-orange-600 transition-colors inline-block">
                            <i class="fas fa-plus mr-1"></i> Choose Images
                            <input wire:model="images" type="file" class="hidden" multiple accept="image/*">
                        </label>
                        <p class="text-xs text-gray-500 mt-2">Or enter image URLs below</p>
                    </div>

                    @if($images)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mb-3">
                            @foreach($images as $index => $image)
                                <div class="relative group">
                                    <img src="{{ $image->temporaryUrl() }}" alt="Property" class="w-full h-24 object-cover rounded">
                                    <button wire:click="removeImage({{ $index }})" type="button" 
                                            class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="space-y-2">
                        <div class="flex gap-2">
                            <input wire:model="imageUrl" type="text" placeholder="Image URL" 
                                   class="flex-1 px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            <button wire:click="addImageUrl" type="button" 
                                    class="px-3 py-1.5 text-xs bg-blue-500 text-white rounded hover:bg-blue-600">
                                <i class="fas fa-plus"></i> Add URL
                            </button>
                        </div>

                        @if($imageUrls && count($imageUrls) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                                @foreach($imageUrls as $index => $url)
                                    <div class="relative group">
                                        <img src="{{ $url }}" alt="Property" class="w-full h-24 object-cover rounded">
                                        <button wire:click="removeImageUrl({{ $index }})" type="button" 
                                                class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Existing Images -->
                @if($uploadedImages->count() > 0)
                    <div class="mt-3">
                        <p class="text-xs font-medium text-gray-700 mb-2">Existing Images</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                            @foreach($uploadedImages as $image)
                                <div class="relative group">
                                    <img src="{{ Storage::url($image->image_path) }}" alt="Property Image" class="w-full h-24 object-cover rounded">
                                    <button wire:click="removeUploadedImage({{ $image->id }})" type="button"
                                            class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    @if($image->is_primary)
                                        <span class="absolute bottom-1 left-1 bg-orange-500 text-white text-xs px-1 rounded">Main</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Featured -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center">
                    <input wire:model="featured" type="checkbox" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                    <label class="ml-2 text-sm text-gray-700">Feature this rental property</label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-2">
                <a href="{{ route('landlord.rentals') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded text-sm font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded text-sm font-medium transition-colors">
                    {{ $propertyId ? 'Update Rental Property' : 'Create Rental Property' }}
                </button>
            </div>
        </form>
    </div>

    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm">
            {{ session('message') }}
        </div>
    @endif
</div>
