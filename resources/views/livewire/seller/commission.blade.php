<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Commission Tracking</h1>
                <p class="text-sm text-gray-600">Track your earnings and commission payments</p>
            </div>
            <div class="flex items-center space-x-2">
                <select wire:model.live="timeRange" class="px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="7">Last 7 days</option>
                    <option value="30">Last 30 days</option>
                    <option value="90">Last 90 days</option>
                    <option value="365">Last year</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Commission Overview -->
    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <!-- Total Commission -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs font-medium text-gray-500">Total Commission</p>
                        <p class="text-lg font-semibold text-gray-900">${{ number_format($commissionData['totalCommission']) }}</p>
                    </div>
                </div>
            </div>

            <!-- Pending Commission -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs font-medium text-gray-500">Pending</p>
                        <p class="text-lg font-semibold text-gray-900">${{ number_format($commissionData['pendingCommission']) }}</p>
                    </div>
                </div>
            </div>

            <!-- Paid Commission -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs font-medium text-gray-500">Paid</p>
                        <p class="text-lg font-semibold text-gray-900">${{ number_format($commissionData['paidCommission']) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Commission Details -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Commission Metrics -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-medium text-gray-900 mb-4">Commission Metrics</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-600">Average Commission Rate</span>
                        <span class="text-sm font-medium text-gray-900">{{ $commissionData['avgCommissionRate'] }}%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-600">Total Sales Value</span>
                        <span class="text-sm font-medium text-gray-900">${{ number_format($commissionData['totalSales']) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-600">Properties Sold</span>
                        <span class="text-sm font-medium text-gray-900">{{ $commissionData['propertiesSold'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-600">Avg Commission per Sale</span>
                        <span class="text-sm font-medium text-gray-900">${{ number_format($commissionData['avgCommissionPerSale']) }}</span>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-medium text-gray-900 mb-4">Recent Transactions</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Beautiful Family Home</p>
                            <p class="text-xs text-gray-600">Sale completed • Dec 15, 2024</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-green-600">+$12,500</p>
                            <p class="text-xs text-gray-600">Paid</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Modern Apartment</p>
                            <p class="text-xs text-gray-600">Sale completed • Dec 10, 2024</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-green-600">+$9,000</p>
                            <p class="text-xs text-gray-600">Paid</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Luxury Condo</p>
                            <p class="text-xs text-gray-600">Sale completed • Dec 5, 2024</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-yellow-600">+$15,000</p>
                            <p class="text-xs text-gray-600">Pending</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Townhouse</p>
                            <p class="text-xs text-gray-600">Sale completed • Nov 28, 2024</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-green-600">+$7,500</p>
                            <p class="text-xs text-gray-600">Paid</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Commission Chart -->
        <div class="mt-6 bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-sm font-medium text-gray-900 mb-4">Commission Trends</h3>
            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <p class="mt-2 text-sm text-gray-500">Commission trends chart will be displayed here</p>
                </div>
            </div>
        </div>
    </div>
</div>
