<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Sales Analytics</h1>
                <p class="text-sm text-gray-600">Track your sales performance and trends</p>
            </div>
            <div class="flex gap-2">
                <select wire:model.live="dateRange" class="px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="7">Last 7 days</option>
                    <option value="30">Last 30 days</option>
                    <option value="90">Last 90 days</option>
                    <option value="365">Last Year</option>
                </select>
                <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                    <i class="fas fa-download mr-1"></i> Export
                </button>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Revenue</p>
                        <p class="text-2xl font-bold text-orange-600">TZS {{ number_format($totalRevenue) }}</p>
                        <p class="text-xs text-green-600 mt-2">
                            <i class="fas fa-arrow-up"></i> +15.3% from last period
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-dollar-sign text-orange-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Orders</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $totalOrders }}</p>
                        <p class="text-xs text-green-600 mt-2">
                            <i class="fas fa-arrow-up"></i> +8.2% from last period
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Avg. Order Value</p>
                        <p class="text-2xl font-bold text-green-600">TZS {{ number_format($avgOrderValue) }}</p>
                        <p class="text-xs text-red-600 mt-2">
                            <i class="fas fa-arrow-down"></i> -2.1% from last period
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Products</p>
                        <p class="text-2xl font-bold text-purple-600">{{ $totalMaterials }}</p>
                        <p class="text-xs text-gray-500 mt-2">
                            <i class="fas fa-box"></i> In catalog
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-boxes text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">Monthly Revenue Trend</h3>
                <div class="space-y-2">
                    @foreach($monthlyRevenue as $month)
                        <div>
                            <div class="flex items-center justify-between text-xs mb-1">
                                <span class="text-gray-600">{{ $month['month'] }}</span>
                                <span class="font-medium text-gray-900">TZS {{ number_format($month['revenue']) }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-orange-500 to-red-500 h-2 rounded-full" 
                                     style="width: {{ ($month['revenue'] / 1500000) * 100 }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">Revenue by Category</h3>
                <div class="space-y-3">
                    @foreach($revenueByCategory as $category)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center flex-1">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-box text-gray-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $category->category }}</p>
                                    <p class="text-xs text-gray-500">TZS {{ number_format($category->total) }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">
                                    {{ round(($category->total / $revenueByCategory->sum('total')) * 100, 1) }}%
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-sm font-semibold text-gray-900 mb-3">Top Selling Products</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Rank</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Product</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Category</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Orders</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Revenue</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Trend</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($topProducts as $index => $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-2">
                                    <span class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold
                                        @if($index === 0) bg-yellow-100 text-yellow-800
                                        @elseif($index === 1) bg-gray-100 text-gray-800
                                        @elseif($index === 2) bg-orange-100 text-orange-800
                                        @else bg-blue-100 text-blue-800
                                        @endif">
                                        {{ $index + 1 }}
                                    </span>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="font-medium text-gray-900">{{ $product->name }}</div>
                                    <div class="text-xs text-gray-500">SKU: {{ $product->sku }}</div>
                                </td>
                                <td class="px-3 py-2">
                                    <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded">{{ $product->category }}</span>
                                </td>
                                <td class="px-3 py-2 font-medium text-gray-900">{{ $product->order_items_count ?? 0 }}</td>
                                <td class="px-3 py-2 font-medium text-orange-600">TZS {{ number_format($product->price * ($product->order_items_count ?? 0)) }}</td>
                                <td class="px-3 py-2">
                                    <span class="text-xs text-green-600">
                                        <i class="fas fa-arrow-up"></i> {{ rand(5, 25) }}%
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
