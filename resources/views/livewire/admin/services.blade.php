<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-screen-xl mx-auto">
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-gray-900 font-bold text-2xl">Other Services</h1>
                        <p class="text-gray-600 text-sm">Manage property-related services for public display</p>
                    </div>
                </div>
                <button wire:click="openCreateModal" class="px-4 py-2 rounded-lg text-white font-semibold transition-all duration-200 shadow-md hover:shadow-lg text-sm" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add New Service
                </button>
            </div>

            @if (session()->has('message'))
                <div class="mb-4 p-4 rounded-lg bg-green-50 border-2 border-green-300">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-green-800 font-semibold">{{ session('message') }}</p>
                    </div>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-200">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-gray-900 font-bold text-lg">{{ $service->name }}</h3>
                    <div class="flex items-center gap-2">
                        <button wire:click="toggleActive({{ $service->id }})" class="text-sm">
                            @if($service->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Active</span>
                            @else
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-semibold">Inactive</span>
                            @endif
                        </button>
                    </div>
                </div>

                @if($service->category)
                <div class="mb-3">
                    <span class="px-2 py-1 bg-blue-50 text-blue-700 rounded text-xs font-medium">{{ $service->category }}</span>
                </div>
                @endif

                <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $service->description }}</p>

                @if($service->price)
                <div class="mb-4 p-3 bg-orange-50 rounded-lg">
                    <p class="text-xs text-orange-700 mb-1">Price</p>
                    <p class="text-xl font-bold text-orange-600">
                        @if($service->price_type === 'negotiable')
                            Negotiable
                        @else
                            TZS {{ number_format($service->price) }}
                            @if($service->price_type === 'hourly')
                                <span class="text-sm font-normal">/hr</span>
                            @endif
                        @endif
                    </p>
                </div>
                @endif

                @if($service->contact_name || $service->contact_phone || $service->contact_email)
                <div class="mb-4 p-3 bg-gray-50 rounded-lg">
                    <p class="text-xs text-gray-600 mb-2">Contact Information</p>
                    @if($service->contact_name)
                        <p class="text-sm text-gray-700">{{ $service->contact_name }}</p>
                    @endif
                    @if($service->contact_phone)
                        <p class="text-sm text-gray-700">{{ $service->contact_phone }}</p>
                    @endif
                    @if($service->contact_email)
                        <p class="text-sm text-gray-700">{{ $service->contact_email }}</p>
                    @endif
                </div>
                @endif

                <div class="flex gap-2 pt-4 border-t border-gray-200">
                    <button wire:click="openEditModal({{ $service->id }})" class="flex-1 px-3 py-2 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 font-semibold text-sm transition-colors duration-200">
                        Edit
                    </button>
                    <button wire:click="deleteService({{ $service->id }})" wire:confirm="Are you sure you want to delete this service?" class="flex-1 px-3 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 font-semibold text-sm transition-colors duration-200">
                        Delete
                    </button>
                </div>
            </div>
            @empty
            <div class="col-span-full flex flex-col items-center justify-center py-16">
                <svg class="w-24 h-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <p class="text-gray-500 text-lg font-medium mb-2">No Services Yet</p>
                <p class="text-gray-400 text-sm mb-4">Get started by adding your first service</p>
                <button wire:click="openCreateModal" class="px-6 py-3 rounded-lg text-white font-semibold shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    Add New Service
                </button>
            </div>
            @endforelse
        </div>
    </div>

    @if($showModal)
    <div class="fixed inset-0 z-50 overflow-y-auto" wire:click="closeModal">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div class="inline-block w-full max-w-2xl overflow-hidden text-left align-middle transition-all transform bg-white rounded-xl shadow-xl" wire:click.stop>
                <div class="px-6 py-4" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">{{ $editMode ? 'Edit Service' : 'Add New Service' }}</h3>
                        <button wire:click="closeModal" class="text-white hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <form wire:submit.prevent="saveService" class="p-6 space-y-4">
                    <div>
                        <label class="block text-gray-700 font-medium text-sm mb-2">Service Name <span class="text-red-500">*</span></label>
                        <input wire:model="name" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                        @error('name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium text-sm mb-2">Category</label>
                        <input wire:model="category" type="text" placeholder="e.g., Construction, Legal, Moving" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                        @error('category') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium text-sm mb-2">Description <span class="text-red-500">*</span></label>
                        <textarea wire:model="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700"></textarea>
                        @error('description') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Price</label>
                            <input wire:model="price" type="number" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                            @error('price') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Price Type</label>
                            <select wire:model="price_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                                <option value="fixed">Fixed</option>
                                <option value="hourly">Per Hour</option>
                                <option value="negotiable">Negotiable</option>
                            </select>
                            @error('price_type') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium text-sm mb-2">Contact Name</label>
                        <input wire:model="contact_name" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                        @error('contact_name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Contact Phone</label>
                            <input wire:model="contact_phone" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                            @error('contact_phone') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Contact Email</label>
                            <input wire:model="contact_email" type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                            @error('contact_email') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium text-sm mb-2">Features (one per line)</label>
                        <textarea wire:model="features" rows="3" placeholder="Feature 1&#10;Feature 2&#10;Feature 3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700"></textarea>
                        @error('features') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center">
                        <input wire:model="is_active" type="checkbox" id="is_active" class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                        <label for="is_active" class="ml-2 text-sm text-gray-700">Active (visible on public page)</label>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-semibold text-sm transition-colors duration-200">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 py-2 rounded-lg text-white font-semibold transition-all duration-200 shadow-md hover:shadow-lg text-sm" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            {{ $editMode ? 'Update Service' : 'Create Service' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
