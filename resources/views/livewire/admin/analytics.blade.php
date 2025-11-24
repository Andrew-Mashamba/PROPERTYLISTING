<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Analytics Dashboard</h1>
                <p class="text-sm text-gray-600">System analytics and performance metrics</p>
            </div>
            <button wire:click="refreshData" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-sync mr-1"></i> Refresh
            </button>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div>
                <select wire:model.live="period" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="7">Last 7 Days</option>
                    <option value="30">Last 30 Days</option>
                    <option value="90">Last 90 Days</option>
                    <option value="365">Last Year</option>
                </select>
            </div>
            <div>
                <select wire:model.live="metric" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="all">All Metrics</option>
                    <option value="users">User Growth</option>
                    <option value="revenue">Revenue</option>
                    <option value="properties">Property Activity</option>
                </select>
            </div>
            <div>
                <select wire:model.live="chartType" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="line">Line Chart</option>
                    <option value="bar">Bar Chart</option>
                    <option value="area">Area Chart</option>
                </select>
            </div>
            <div>
                <button wire:click="exportReport" class="w-full px-2 py-1.5 text-sm bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition-colors">
                    <i class="fas fa-download mr-1"></i> Export
                </button>
            </div>
        </div>
    </div>

    <div class="p-4">
        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Revenue</p>
                        <p class="text-xl font-bold text-gray-900">TZS {{ number_format($kpis['total_revenue']) }}</p>
                        <p class="text-xs text-green-600">+{{ $kpis['revenue_growth'] }}% from last period</p>
                    </div>
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-green-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Active Users</p>
                        <p class="text-xl font-bold text-blue-600">{{ number_format($kpis['active_users']) }}</p>
                        <p class="text-xs text-blue-600">+{{ $kpis['user_growth'] }}% growth</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Property Views</p>
                        <p class="text-xl font-bold text-orange-600">{{ number_format($kpis['property_views']) }}</p>
                        <p class="text-xs text-orange-600">+{{ $kpis['views_growth'] }}% increase</p>
                    </div>
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-eye text-orange-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Conversion Rate</p>
                        <p class="text-xl font-bold text-purple-600">{{ $kpis['conversion_rate'] }}%</p>
                        <p class="text-xs text-purple-600">{{ $kpis['conversion_change'] > 0 ? '+' : '' }}{{ $kpis['conversion_change'] }}% change</p>
                    </div>
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-percentage text-purple-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
            <!-- User Growth Chart -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-semibold text-gray-900">User Growth</h3>
                    <span class="text-xs text-gray-500">{{ $period }} days</span>
                </div>
                <div class="h-48 bg-gray-50 rounded flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-chart-area text-3xl text-gray-400 mb-2"></i>
                        <p class="text-xs text-gray-500">Chart visualization would appear here</p>
                    </div>
                </div>
            </div>

            <!-- Revenue Chart -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-semibold text-gray-900">Revenue Data</h3>
                    <span class="text-xs text-gray-500">TZS</span>
                </div>
                <div class="h-48 bg-gray-50 rounded flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-chart-bar text-3xl text-gray-400 mb-2"></i>
                        <p class="text-xs text-gray-500">Revenue chart would appear here</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Properties List -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-sm font-semibold text-gray-900">Top Performing Properties</h3>
                <button class="text-xs text-orange-600 hover:text-orange-700">View All</button>
            </div>
            
            @if($topProperties && count($topProperties) > 0)
                <div class="space-y-2">
                    @foreach($topProperties as $property)
                        <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">{{ $property['title'] }}</p>
                                <p class="text-xs text-gray-600">{{ $property['location'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-900">{{ $property['views'] }} views</p>
                                <p class="text-xs text-gray-600">{{ $property['inquiries'] }} inquiries</p>
                            </div>
                            <div class="ml-3">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    #{{ $loop->iteration }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-chart-line text-4xl text-gray-400 mb-2"></i>
                    <p class="text-sm text-gray-500">No property data available</p>
                </div>
            @endif
        </div>
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>