<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Transaction Oversight</h1>
                <p class="text-sm text-gray-600">Monitor all financial transactions</p>
            </div>
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-download mr-1"></i> Export
            </button>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search transactions..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="type" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Types</option>
                    <option value="rent_payment">Rent Payment</option>
                    <option value="subscription">Subscription</option>
                    <option value="material_purchase">Material Purchase</option>
                    <option value="commission">Commission</option>
                </select>
            </div>
            <div>
                <select wire:model.live="status" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Status</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
            <div>
                <select wire:model.live="dateRange" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="7">Last 7 Days</option>
                    <option value="30">Last 30 Days</option>
                    <option value="90">Last 90 Days</option>
                </select>
            </div>
            <div>
                <select wire:model.live="perPage" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="20">20 per page</option>
                    <option value="50">50 per page</option>
                    <option value="100">100 per page</option>
                </select>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Volume</p>
                        <p class="text-xl font-bold text-gray-900">TZS {{ number_format($stats['total_volume']) }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Completed</p>
                        <p class="text-xl font-bold text-green-600">TZS {{ number_format($stats['completed']) }}</p>
                    </div>
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Pending</p>
                        <p class="text-xl font-bold text-yellow-600">TZS {{ number_format($stats['pending']) }}</p>
                    </div>
                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-yellow-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Failed</p>
                        <p class="text-xl font-bold text-red-600">TZS {{ number_format($stats['failed']) }}</p>
                    </div>
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-times-circle text-red-600"></i>
                    </div>
                </div>
            </div>
        </div>

        @if($transactions->count() > 0)
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Transaction ID</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">User</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Type</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Amount</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Method</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Status</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Date</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($transactions as $transaction)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2">
                                        <p class="text-xs font-mono text-gray-900">{{ $transaction->id }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-sm text-gray-900">{{ $transaction->user }}</p>
                                        @if($transaction->property)
                                            <p class="text-xs text-gray-500">{{ $transaction->property }}</p>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                            {{ ucfirst(str_replace('_', ' ', $transaction->type)) }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-sm font-semibold text-gray-900">TZS {{ number_format($transaction->amount) }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-xs text-gray-600">{{ $transaction->method }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full
                                            @if($transaction->status === 'completed') bg-green-100 text-green-800
                                            @elseif($transaction->status === 'pending') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-xs text-gray-600">{{ \Carbon\Carbon::parse($transaction->date)->format('M d, Y H:i') }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <a href="/admin/transactions/{{ $transaction->id }}" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $transactions->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-receipt text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No transactions found</h3>
                <p class="mt-1 text-sm text-gray-500">Transactions will appear here.</p>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
