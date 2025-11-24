<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Price Management</h1>
                <p class="text-sm text-gray-600">Manage material pricing and bulk discounts</p>
            </div>
            <div class="flex gap-2">
                <button wire:click="$set('showBulkDiscount', true)" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                    <i class="fas fa-percentage mr-1"></i> Bulk Discount
                </button>
                <button wire:click="exportPricing" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                    <i class="fas fa-download mr-1"></i> Export
                </button>
            </div>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search materials..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="category" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Categories</option>
                    <option value="cement">Cement</option>
                    <option value="steel">Steel</option>
                    <option value="tiles">Tiles</option>
                    <option value="paint">Paint</option>
                    <option value="plumbing">Plumbing</option>
                </select>
            </div>
            <div>
                <select wire:model.live="priceRange" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Prices</option>
                    <option value="0-10000">TZS 0 - 10,000</option>
                    <option value="10000-50000">TZS 10,000 - 50,000</option>
                    <option value="50000-100000">TZS 50,000 - 100,000</option>
                    <option value="100000+">TZS 100,000+</option>
                </select>
            </div>
            <div>
                <select wire:model.live="sortBy" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="name">Name</option>
                    <option value="price">Price</option>
                    <option value="updated_at">Last Updated</option>
                </select>
            </div>
        </div>
    </div>

    <div class="p-4">
        <!-- Pricing Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Avg. Material Price</div>
                <div class="text-xl font-bold text-orange-600">TZS {{ number_format($averagePrice ?? 0) }}</div>
                <div class="text-xs text-blue-600 mt-1"><i class="fas fa-calculator"></i> Across all materials</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Highest Price</div>
                <div class="text-xl font-bold text-green-600">TZS {{ number_format($highestPrice ?? 0) }}</div>
                <div class="text-xs text-gray-500 mt-1">Premium materials</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Lowest Price</div>
                <div class="text-xl font-bold text-red-600">TZS {{ number_format($lowestPrice ?? 0) }}</div>
                <div class="text-xs text-gray-500 mt-1">Budget options</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Price Updates</div>
                <div class="text-xl font-bold text-yellow-600">{{ $recentUpdates ?? 0 }}</div>
                <div class="text-xs text-gray-500 mt-1">This month</div>
            </div>
        </div>

        @if($materials->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
                @foreach($materials as $material)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="relative h-32 bg-gray-200">
                            @if($material->image_url)
                                <img src="{{ $material->image_url }}" alt="{{ $material->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <i class="fas fa-box text-3xl"></i>
                                </div>
                            @endif
                            
                            @if($material->has_discount)
                                <div class="absolute top-2 left-2">
                                    <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">
                                        <i class="fas fa-tag"></i> {{ $material->discount_percentage }}% OFF
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-2">
                            <div class="flex items-start justify-between mb-2">
                                <h3 class="font-medium text-gray-900 text-sm flex-1">{{ $material->name }}</h3>
                                <span class="ml-2 px-1.5 py-0.5 text-xs rounded bg-gray-100 text-gray-800">
                                    {{ $material->category }}
                                </span>
                            </div>
                            
                            <p class="text-xs text-gray-600 mb-2">SKU: {{ $material->sku }} • {{ $material->unit }}</p>
                            
                            <!-- Price Display -->
                            <div class="mb-3">
                                @if($material->has_discount)
                                    <div class="flex items-center">
                                        <span class="text-sm font-semibold text-orange-600">TZS {{ number_format($material->discounted_price) }}</span>
                                        <span class="text-xs text-gray-500 line-through ml-2">TZS {{ number_format($material->price) }}</span>
                                    </div>
                                @else
                                    <span class="text-base font-semibold text-orange-600">TZS {{ number_format($material->price) }}</span>
                                @endif
                            </div>

                            <!-- Inline Price Editing -->
                            <div class="space-y-2">
                                <div class="flex items-center gap-1">
                                    <input wire:model.lazy="priceUpdates.{{ $material->id }}" 
                                           type="number" 
                                           min="0" 
                                           step="100"
                                           placeholder="{{ $material->price }}"
                                           class="flex-1 px-2 py-1 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-orange-500">
                                    <button wire:click="updatePrice({{ $material->id }})" 
                                            class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>

                                <!-- Quick Price Actions -->
                                <div class="grid grid-cols-3 gap-1">
                                    <button wire:click="adjustPrice({{ $material->id }}, 5, 'increase')" 
                                            class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                                        +5%
                                    </button>
                                    <button wire:click="adjustPrice({{ $material->id }}, 10, 'increase')" 
                                            class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                                        +10%
                                    </button>
                                    <button wire:click="adjustPrice({{ $material->id }}, 5, 'decrease')" 
                                            class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                                        -5%
                                    </button>
                                </div>

                                <!-- Discount Controls -->
                                <div class="border-t pt-2">
                                    <div class="flex items-center gap-1 mb-1">
                                        <input wire:model.lazy="discountUpdates.{{ $material->id }}" 
                                               type="number" 
                                               min="0" 
                                               max="100"
                                               placeholder="Discount %"
                                               class="flex-1 px-2 py-1 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-yellow-500">
                                        <button wire:click="applyDiscount({{ $material->id }})" 
                                                class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition-colors">
                                            <i class="fas fa-tag"></i>
                                        </button>
                                    </div>
                                    @if($material->has_discount)
                                        <button wire:click="removeDiscount({{ $material->id }})" 
                                                class="w-full px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition-colors">
                                            Remove Discount
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $materials->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-tags text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No materials found</h3>
                <p class="mt-1 text-sm text-gray-500">Your pricing will appear here.</p>
            </div>
        @endif
    </div>

    <!-- Bulk Discount Modal -->
    @if($showBulkDiscount)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-4 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Bulk Discount Application</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Category</label>
                            <select wire:model="bulkDiscountCategory" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                                <option value="">All Categories</option>
                                <option value="cement">Cement</option>
                                <option value="steel">Steel</option>
                                <option value="tiles">Tiles</option>
                                <option value="paint">Paint</option>
                                <option value="plumbing">Plumbing</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Discount Type</label>
                            <select wire:model="bulkDiscountType" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                                <option value="percentage">Percentage Discount</option>
                                <option value="fixed">Fixed Amount Discount</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">
                                @if($bulkDiscountType === 'percentage') Discount Percentage (%) @else Discount Amount (TZS) @endif
                            </label>
                            <input wire:model="bulkDiscountValue" type="number" min="0" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Valid Until</label>
                            <input wire:model="bulkDiscountExpiry" type="date" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <button wire:click="processBulkDiscount" class="px-3 py-1.5 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">
                            Apply Discount
                        </button>
                        <button wire:click="$set('showBulkDiscount', false)" class="px-3 py-1.5 bg-gray-300 text-gray-700 text-sm rounded hover:bg-gray-400">
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