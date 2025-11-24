<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Financial Reports</h1>
                <p class="text-sm text-gray-600">Track income, expenses, and profitability</p>
            </div>
            <div class="flex items-center gap-2">
                <select wire:model.live="dateRange" class="px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="30">Last 30 Days</option>
                    <option value="60">Last 60 Days</option>
                    <option value="90">Last 90 Days</option>
                    <option value="365">Last Year</option>
                </select>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                    <i class="fas fa-download mr-1"></i> Export
                </button>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Income</p>
                        <p class="text-xl font-bold text-green-600">TZS {{ number_format($financialData['total_income']) }}</p>
                    </div>
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-arrow-up text-green-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Expenses</p>
                        <p class="text-xl font-bold text-red-600">TZS {{ number_format($financialData['total_expenses']) }}</p>
                    </div>
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-arrow-down text-red-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Net Income</p>
                        <p class="text-xl font-bold text-blue-600">TZS {{ number_format($financialData['net_income']) }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Occupancy Rate</p>
                        <p class="text-xl font-bold text-orange-600">{{ $financialData['occupancy_rate'] }}%</p>
                    </div>
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-percentage text-orange-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">Monthly Income vs Expenses</h3>
                <div class="space-y-2">
                    @foreach($monthlyIncome as $month)
                        <div>
                            <div class="flex items-center justify-between text-xs mb-1">
                                <span class="text-gray-600">{{ $month['month'] }}</span>
                                <span class="text-gray-900 font-medium">TZS {{ number_format($month['income']) }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ ($month['income'] / 12000000) * 100 }}%"></div>
                            </div>
                            <div class="flex items-center justify-between text-xs mt-1">
                                <span class="text-gray-500">Expenses</span>
                                <span class="text-red-600">TZS {{ number_format($month['expenses']) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">Expense Breakdown</h3>
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-red-500 rounded-full mr-2"></div>
                            <span class="text-xs text-gray-600">Maintenance</span>
                        </div>
                        <span class="text-sm font-medium text-gray-900">TZS {{ number_format($financialData['maintenance_costs']) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-orange-500 rounded-full mr-2"></div>
                            <span class="text-xs text-gray-600">Property Tax</span>
                        </div>
                        <span class="text-sm font-medium text-gray-900">TZS {{ number_format($financialData['property_tax']) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                            <span class="text-xs text-gray-600">Insurance</span>
                        </div>
                        <span class="text-sm font-medium text-gray-900">TZS {{ number_format($financialData['insurance']) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                            <span class="text-xs text-gray-600">Utilities</span>
                        </div>
                        <span class="text-sm font-medium text-gray-900">TZS {{ number_format($financialData['utilities']) }}</span>
                    </div>
                    <div class="border-t border-gray-200 pt-2 mt-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-900">Total Expenses</span>
                            <span class="text-sm font-bold text-red-600">TZS {{ number_format($financialData['total_expenses']) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs text-gray-600">Average Rent</span>
                    <i class="fas fa-home text-gray-400"></i>
                </div>
                <p class="text-lg font-bold text-gray-900">TZS {{ number_format($financialData['avg_rent']) }}</p>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs text-gray-600">Maintenance Costs</span>
                    <i class="fas fa-tools text-gray-400"></i>
                </div>
                <p class="text-lg font-bold text-gray-900">TZS {{ number_format($financialData['maintenance_costs']) }}</p>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs text-gray-600">Property Tax</span>
                    <i class="fas fa-file-invoice text-gray-400"></i>
                </div>
                <p class="text-lg font-bold text-gray-900">TZS {{ number_format($financialData['property_tax']) }}</p>
            </div>
        </div>
    </div>
</div>
