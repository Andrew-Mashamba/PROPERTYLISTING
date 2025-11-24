<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Supplier Network</h1>
                <p class="text-sm text-gray-600">Manage your supplier relationships and partnerships</p>
            </div>
            <button wire:click="$set('showAddSupplier', true)" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-plus mr-1"></i> Add Supplier
            </button>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search suppliers..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="category" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Categories</option>
                    <option value="cement">Cement Suppliers</option>
                    <option value="steel">Steel Suppliers</option>
                    <option value="tiles">Tile Suppliers</option>
                    <option value="paint">Paint Suppliers</option>
                    <option value="plumbing">Plumbing Suppliers</option>
                </select>
            </div>
            <div>
                <select wire:model.live="rating" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Ratings</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4+ Stars</option>
                    <option value="3">3+ Stars</option>
                    <option value="2">2+ Stars</option>
                </select>
            </div>
            <div>
                <select wire:model.live="status" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="pending">Pending Approval</option>
                </select>
            </div>
        </div>
    </div>

    <div class="p-4">
        <!-- Supplier Network Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Total Suppliers</div>
                <div class="text-xl font-bold text-gray-900">{{ $totalSuppliers ?? 0 }}</div>
                <div class="text-xs text-blue-600 mt-1"><i class="fas fa-handshake"></i> In network</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Active Suppliers</div>
                <div class="text-xl font-bold text-green-600">{{ $activeSuppliers ?? 0 }}</div>
                <div class="text-xs text-gray-500 mt-1">Currently supplying</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Average Rating</div>
                <div class="text-xl font-bold text-yellow-600">{{ number_format($averageRating ?? 0, 1) }}</div>
                <div class="text-xs text-gray-500 mt-1">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= ($averageRating ?? 0) ? 'text-yellow-400' : 'text-gray-300' }} text-xs"></i>
                    @endfor
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Pending Review</div>
                <div class="text-xl font-bold text-red-600">{{ $pendingSuppliers ?? 0 }}</div>
                <div class="text-xs text-gray-500 mt-1">Awaiting approval</div>
            </div>
        </div>

        @if($suppliers->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($suppliers as $supplier)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                        <!-- Supplier Header -->
                        <div class="relative bg-gradient-to-r from-orange-500 to-red-500 p-3 text-white">
                            <div class="absolute top-2 right-2">
                                <span class="px-2 py-1 text-xs rounded-full
                                    @if($supplier->status === 'active') bg-green-100 text-green-800
                                    @elseif($supplier->status === 'pending') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($supplier->status) }}
                                </span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mr-3">
                                    @if($supplier->logo_url)
                                        <img src="{{ $supplier->logo_url }}" alt="{{ $supplier->name }}" class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <i class="fas fa-building text-orange-500 text-lg"></i>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-semibold text-sm">{{ $supplier->name }}</h3>
                                    <p class="text-xs opacity-90">{{ $supplier->category ?? 'General Supplier' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Supplier Details -->
                        <div class="p-3">
                            <!-- Rating -->
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= ($supplier->rating ?? 0) ? 'text-yellow-400' : 'text-gray-300' }} text-xs"></i>
                                    @endfor
                                    <span class="ml-1 text-xs text-gray-600">({{ $supplier->rating ?? 0 }}/5)</span>
                                </div>
                                <span class="text-xs text-gray-500">{{ $supplier->reviews_count ?? 0 }} reviews</span>
                            </div>

                            <!-- Contact Information -->
                            <div class="space-y-2 mb-3">
                                @if($supplier->contact_person)
                                    <div class="flex items-center text-xs text-gray-600">
                                        <i class="fas fa-user w-4"></i>
                                        <span>{{ $supplier->contact_person }}</span>
                                    </div>
                                @endif
                                @if($supplier->phone)
                                    <div class="flex items-center text-xs text-gray-600">
                                        <i class="fas fa-phone w-4"></i>
                                        <span>{{ $supplier->phone }}</span>
                                    </div>
                                @endif
                                @if($supplier->email)
                                    <div class="flex items-center text-xs text-gray-600">
                                        <i class="fas fa-envelope w-4"></i>
                                        <span>{{ $supplier->email }}</span>
                                    </div>
                                @endif
                                @if($supplier->location)
                                    <div class="flex items-center text-xs text-gray-600">
                                        <i class="fas fa-map-marker-alt w-4"></i>
                                        <span>{{ $supplier->location }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Supplier Stats -->
                            <div class="grid grid-cols-3 gap-2 mb-3 text-center">
                                <div class="bg-gray-50 rounded p-2">
                                    <div class="text-xs font-medium text-gray-900">{{ $supplier->orders_count ?? 0 }}</div>
                                    <div class="text-xs text-gray-500">Orders</div>
                                </div>
                                <div class="bg-gray-50 rounded p-2">
                                    <div class="text-xs font-medium text-gray-900">{{ $supplier->products_count ?? 0 }}</div>
                                    <div class="text-xs text-gray-500">Products</div>
                                </div>
                                <div class="bg-gray-50 rounded p-2">
                                    <div class="text-xs font-medium text-gray-900">{{ $supplier->response_time ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-500">Response</div>
                                </div>
                            </div>

                            <!-- Specializations -->
                            @if($supplier->specializations)
                                <div class="mb-3">
                                    <div class="flex flex-wrap gap-1">
                                        @foreach(explode(',', $supplier->specializations) as $specialization)
                                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">{{ trim($specialization) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Payment Terms -->
                            @if($supplier->payment_terms)
                                <div class="mb-3">
                                    <div class="text-xs text-gray-600">
                                        <i class="fas fa-credit-card mr-1"></i>
                                        Payment: {{ $supplier->payment_terms }}
                                    </div>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-3 gap-1">
                                <button wire:click="viewSupplier({{ $supplier->id }})" 
                                        class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button wire:click="contactSupplier({{ $supplier->id }})" 
                                        class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                                    <i class="fas fa-phone"></i> Contact
                                </button>
                                <button wire:click="rateSupplier({{ $supplier->id }})" 
                                        class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition-colors">
                                    <i class="fas fa-star"></i> Rate
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $suppliers->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-handshake text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No suppliers found</h3>
                <p class="mt-1 text-sm text-gray-500">Start building your supplier network.</p>
                <div class="mt-6">
                    <button wire:click="$set('showAddSupplier', true)" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700">
                        <i class="fas fa-plus mr-1"></i> Add First Supplier
                    </button>
                </div>
            </div>
        @endif
    </div>

    <!-- Add Supplier Modal -->
    @if($showAddSupplier)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-10 mx-auto p-4 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Supplier</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Supplier Name</label>
                            <input wire:model="newSupplier.name" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Category</label>
                            <select wire:model="newSupplier.category" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                                <option value="">Select Category</option>
                                <option value="cement">Cement</option>
                                <option value="steel">Steel</option>
                                <option value="tiles">Tiles</option>
                                <option value="paint">Paint</option>
                                <option value="plumbing">Plumbing</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Contact Person</label>
                            <input wire:model="newSupplier.contact_person" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Phone</label>
                            <input wire:model="newSupplier.phone" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Email</label>
                            <input wire:model="newSupplier.email" type="email" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Location</label>
                            <input wire:model="newSupplier.location" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <button wire:click="addSupplier" class="px-3 py-1.5 bg-orange-500 text-white text-sm rounded hover:bg-orange-600">
                            Add Supplier
                        </button>
                        <button wire:click="$set('showAddSupplier', false)" class="px-3 py-1.5 bg-gray-300 text-gray-700 text-sm rounded hover:bg-gray-400">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>