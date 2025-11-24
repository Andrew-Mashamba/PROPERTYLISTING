<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Rent Collection</h1>
                <p class="text-sm text-gray-600">Track and manage rental payments</p>
            </div>
            <a href="/landlord/record-payment" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-money-bill mr-1"></i> Record Payment
            </a>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search payments..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="status" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Status</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                    <option value="overdue">Overdue</option>
                </select>
            </div>
            <div>
                <select wire:model.live="month" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Months</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div>
                <select wire:model.live="perPage" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="15">15 per page</option>
                    <option value="30">30 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Expected</p>
                        <p class="text-xl font-bold text-gray-900">TZS {{ number_format($stats['total_expected']) }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Collected</p>
                        <p class="text-xl font-bold text-green-600">TZS {{ number_format($stats['total_collected']) }}</p>
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
                        <p class="text-xs text-gray-600 mb-1">Overdue</p>
                        <p class="text-xl font-bold text-red-600">TZS {{ number_format($stats['overdue']) }}</p>
                    </div>
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                </div>
            </div>
        </div>

        @if($payments->count() > 0)
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Tenant</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Property</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Amount</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Due Date</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Status</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($payments as $payment)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2">
                                        <p class="text-sm font-medium text-gray-900">{{ $payment->tenant_name }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-xs text-gray-600">{{ $payment->property }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-sm font-semibold text-gray-900">TZS {{ number_format($payment->amount) }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-xs text-gray-600">{{ \Carbon\Carbon::parse($payment->due_date)->format('M d, Y') }}</p>
                                        @if($payment->paid_date)
                                            <p class="text-xs text-green-600">Paid: {{ \Carbon\Carbon::parse($payment->paid_date)->format('M d, Y') }}</p>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full
                                            @if($payment->status === 'paid') bg-green-100 text-green-800
                                            @elseif($payment->status === 'overdue') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800
                                            @endif">
                                            {{ ucfirst($payment->status) }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2">
                                        <div class="flex items-center gap-1">
                                            @if($payment->status !== 'paid')
                                                <button wire:click="markAsPaid({{ $payment->id }})" class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                                                    <i class="fas fa-check"></i> Pay
                                                </button>
                                                <button wire:click="sendReminder({{ $payment->id }})" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                                                    <i class="fas fa-bell"></i>
                                                </button>
                                            @else
                                                <a href="/landlord/receipts/{{ $payment->receipt }}" class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition-colors">
                                                    <i class="fas fa-receipt"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $payments->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-money-bill text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No payment records found</h3>
                <p class="mt-1 text-sm text-gray-500">Start tracking your rental payments.</p>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
