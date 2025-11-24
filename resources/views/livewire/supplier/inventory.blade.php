<div class="min-h-screen bg-gray-50">
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Stock Management</h1>
                <p class="text-sm text-gray-600 mt-1">Monitor and manage your inventory levels</p>
            </div>
            <button wire:click="exportInventory" class="px-4 py-2 rounded-lg text-white font-semibold transition-all shadow-md hover:shadow-lg" style="background: linear-gradient(135deg, #28A745 0%, #1e7e34 100%);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                Export
            </button>
        </div>
    </div>

    <!-- Filters Panel -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #dee2e6;">
        <div class="flex items-center justify-between mb-4 pb-4" style="border-bottom: 3px solid #FF7F00;">
            <h3 class="text-lg font-bold" style="color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                Filter Inventory
            </h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search materials..." 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <select wire:model.live="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="">All Categories</option>
                    <option value="cement">Cement</option>
                    <option value="steel">Steel</option>
                    <option value="tiles">Tiles</option>
                    <option value="paint">Paint</option>
                    <option value="plumbing">Plumbing</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Stock Alert</label>
                <select wire:model.live="stockAlert" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="">All Stock Levels</option>
                    <option value="low">Low Stock (≤5)</option>
                    <option value="critical">Critical (≤2)</option>
                    <option value="out">Out of Stock</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
                <select wire:model.live="sortBy" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="name">Name</option>
                    <option value="stock_quantity">Stock Level</option>
                    <option value="updated_at">Last Updated</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Total Materials</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $totalMaterials }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #007BFF 0%, #0056b3 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">In catalog</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Low Stock</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $lowStockCount }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">≤5 units remaining</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Critical Stock</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $criticalStockCount }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">≤2 units remaining</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Out of Stock</p>
                    <p class="text-gray-900 text-2xl font-bold">{{ $outOfStockCount }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">Needs restocking</p>
        </div>
    </div>

        @if($materials->count() > 0)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Material</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">SKU</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Current Stock</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Min. Stock</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Unit Price</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Stock Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($materials as $material)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                                @if($material->image_url)
                                                    <img src="{{ asset('storage/' . $material->image_url) }}" alt="{{ $material->name }}" class="w-12 h-12 object-cover rounded-lg">
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                    </svg>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="font-semibold text-gray-900">{{ $material->name }}</div>
                                                <div class="text-sm text-gray-500">Unit: {{ $material->unit }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-mono text-sm text-gray-600">{{ $material->sku }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 text-xs font-semibold rounded-full" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%); color: #FF7F00;">{{ ucfirst($material->category) }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex flex-col items-center">
                                            <span class="text-2xl font-bold text-gray-900">{{ $material->stock_quantity }}</span>
                                            <span class="text-xs text-gray-500">{{ $material->unit }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-sm font-semibold text-gray-600">{{ $material->min_stock_level ?? 5 }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-sm font-bold" style="color: #FF7F00;">TZS {{ number_format($material->price, 0) }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($material->stock_quantity == 0)
                                            <span class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-full bg-red-500 text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Out of Stock
                                            </span>
                                        @elseif($material->stock_quantity <= 2)
                                            <span class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-full" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white;">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                </svg>
                                                Critical
                                            </span>
                                        @elseif($material->stock_quantity <= 5)
                                            <span class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-full bg-yellow-500 text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                </svg>
                                                Low Stock
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-full bg-green-500 text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                In Stock
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <div class="flex items-center gap-1 bg-gray-50 rounded-lg p-1">
                                                <button wire:click="addStock({{ $material->id }}, -10)" 
                                                        class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-300 hover:bg-red-50 hover:border-red-300 transition-all">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-red-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                                    </svg>
                                                </button>
                                                <input wire:model.lazy="stockUpdates.{{ $material->id }}" 
                                                       type="number" 
                                                       min="0" 
                                                       placeholder="{{ $material->stock_quantity }}"
                                                       class="w-20 px-2 py-1.5 text-sm text-center font-semibold border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                                <button wire:click="addStock({{ $material->id }}, 10)" 
                                                        class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-300 hover:bg-green-50 hover:border-green-300 transition-all">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-green-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <button wire:click="updateStock({{ $material->id }})" 
                                                    class="px-3 py-1.5 text-sm font-semibold rounded-lg text-white transition-all shadow-md hover:shadow-lg" 
                                                    style="background: linear-gradient(135deg, #007BFF 0%, #0056b3 100%);">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $materials->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-warehouse text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No materials found</h3>
                <p class="mt-1 text-sm text-gray-500">Your inventory will appear here.</p>
            </div>
        @endif
    </div>

    <!-- Bulk Stock Update Modal -->
    @if($showBulkUpdate)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-4 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Bulk Stock Update</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Category</label>
                            <select wire:model="bulkCategory" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                                <option value="">Select Category</option>
                                <option value="cement">Cement</option>
                                <option value="steel">Steel</option>
                                <option value="tiles">Tiles</option>
                                <option value="paint">Paint</option>
                                <option value="plumbing">Plumbing</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Action</label>
                            <select wire:model="bulkAction" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                                <option value="add">Add to Stock</option>
                                <option value="set">Set Stock Level</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Quantity</label>
                            <input wire:model="bulkQuantity" type="number" min="0" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <button wire:click="processBulkUpdate" class="px-3 py-1.5 bg-orange-500 text-white text-sm rounded hover:bg-orange-600">
                            Update
                        </button>
                        <button wire:click="$set('showBulkUpdate', false)" class="px-3 py-1.5 bg-gray-300 text-gray-700 text-sm rounded hover:bg-gray-400">
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