<div>
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Customer Orders</h1>
                <p class="text-sm text-gray-600 mt-1">Manage and process material orders from customers</p>
            </div>
            <div class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                <span class="text-sm font-medium text-gray-700">{{ $orders->total() }} Orders</span>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Total Orders</p>
                    <p class="text-gray-900 text-2xl font-bold">245</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-center text-sm text-green-600 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                </svg>
                +12% from last month
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Pending</p>
                    <p class="text-gray-900 text-2xl font-bold">24</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">Awaiting confirmation</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Processing</p>
                    <p class="text-gray-900 text-2xl font-bold">18</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">Being prepared</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <div class="flex flex-col">
                    <p class="text-gray-600 text-sm font-normal mb-1">Revenue</p>
                    <p class="text-2xl font-bold" style="color: #FF7F00;">TZS 12.5M</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-center text-sm text-green-600 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                </svg>
                +8% from last month
            </div>
        </div>
    </div>

    <!-- Filters Panel -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #dee2e6;">
        <div class="flex items-center justify-between mb-4 pb-4" style="border-bottom: 2px solid #FF7F00;">
            <h3 class="text-lg font-bold" style="color: #FF7F00;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                Filter Orders
            </h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search orders..." 
                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select wire:model.live="status" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                <input wire:model.live="dateFrom" type="date" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                <input wire:model.live="dateTo" type="date" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    @if($orders->count() > 0)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-900">Order #</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-900">Customer</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-900">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-900">Items</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-900">Total</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-900">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($orders as $order)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <span class="font-semibold text-gray-900">{{ $order->order_number }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-semibold" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                            {{ strtoupper(substr($order->buyer->name ?? 'N', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $order->buyer->name ?? 'N/A' }}</div>
                                            <div class="text-sm text-gray-500">{{ $order->buyer->email ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                        {{ $order->created_at->format('M d, Y') }}
                                    </div>
                                    <div class="text-sm text-gray-400">{{ $order->created_at->format('h:i A') }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">
                                        {{ $order->items->count() }} items
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-lg" style="color: #FF7F00;">TZS {{ number_format($order->total) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1.5 text-xs font-semibold rounded-full
                                        @if($order->status === 'pending') bg-yellow-500 text-white
                                        @elseif($order->status === 'confirmed') bg-blue-500 text-white
                                        @elseif($order->status === 'processing') bg-purple-500 text-white
                                        @elseif($order->status === 'shipped') bg-indigo-500 text-white
                                        @elseif($order->status === 'delivered') bg-green-500 text-white
                                        @else bg-red-500 text-white
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <button wire:click="viewOrderDetails({{ $order->id }})" 
                                                class="px-3 py-2 text-sm bg-white border border-gray-300 rounded-lg hover:bg-gray-50 font-medium text-gray-700 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            View
                                        </button>
                                        <select wire:change="updateOrderStatus({{ $order->id }}, $event.target.value)" 
                                                class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white font-medium">
                                            <option value="">Update Status</option>
                                            <option value="confirmed">✓ Confirm</option>
                                            <option value="processing">⚙ Process</option>
                                            <option value="shipped">🚚 Ship</option>
                                            <option value="delivered">✓ Deliver</option>
                                            <option value="cancelled">✗ Cancel</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-lg p-12">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-20 w-20 text-gray-400 mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No orders found</h3>
                <p class="text-sm text-gray-500">Orders will appear here when customers place them.</p>
            </div>
        </div>
    @endif

    <!-- Order Details Modal -->
    @if($showOrderDetails && $selectedOrder)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" wire:click="closeOrderDetails">
            <div class="relative max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto" wire:click.stop>
                <div class="bg-white rounded-xl shadow-2xl">
                    <!-- Modal Header -->
                    <div class="p-6 border-b-3 border-orange-500">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900">Order Details</h3>
                                    <p class="text-sm text-gray-600">{{ $selectedOrder->order_number }}</p>
                                </div>
                            </div>
                            <button wire:click="closeOrderDetails" class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="p-6">
                        <!-- Order Info Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-1">Customer</p>
                                <p class="font-semibold text-gray-900">{{ $selectedOrder->buyer->name ?? 'N/A' }}</p>
                                <p class="text-sm text-gray-600">{{ $selectedOrder->buyer->email ?? '' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-1">Order Date</p>
                                <p class="font-semibold text-gray-900">{{ $selectedOrder->created_at->format('M d, Y') }}</p>
                                <p class="text-sm text-gray-600">{{ $selectedOrder->created_at->format('h:i A') }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-1">Payment Method</p>
                                <p class="font-semibold text-gray-900">{{ ucfirst(str_replace('_', ' ', $selectedOrder->payment_method)) }}</p>
                                <p class="text-sm">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold
                                        @if($selectedOrder->payment_status === 'paid') bg-green-100 text-green-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ ucfirst($selectedOrder->payment_status) }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- Shipping Address -->
                        @if($selectedOrder->shipping_address)
                            <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4 mb-6">
                                <p class="text-sm font-semibold text-blue-900 mb-2">Shipping Address</p>
                                <p class="text-sm text-blue-800">{{ $selectedOrder->shipping_address }}</p>
                            </div>
                        @endif

                        <!-- Order Items -->
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" style="color: #FF7F00;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                                Order Items
                            </h4>
                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Product</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">SKU</th>
                                            <th class="px-4 py-3 text-right text-xs font-semibold text-gray-700 uppercase">Price</th>
                                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Qty</th>
                                            <th class="px-4 py-3 text-right text-xs font-semibold text-gray-700 uppercase">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($selectedOrder->items as $item)
                                            <tr>
                                                <td class="px-4 py-3">
                                                    <p class="font-medium text-gray-900">{{ $item->product_name }}</p>
                                                </td>
                                                <td class="px-4 py-3 text-sm text-gray-600">{{ $item->product_sku }}</td>
                                                <td class="px-4 py-3 text-right font-medium text-gray-900">TZS {{ number_format($item->price, 0) }}</td>
                                                <td class="px-4 py-3 text-center">
                                                    <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">{{ $item->quantity }}</span>
                                                </td>
                                                <td class="px-4 py-3 text-right font-bold" style="color: #FF7F00;">TZS {{ number_format($item->subtotal, 0) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-lg p-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-4">Order Summary</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between text-gray-700">
                                    <span>Subtotal</span>
                                    <span class="font-semibold">TZS {{ number_format($selectedOrder->subtotal, 0) }}</span>
                                </div>
                                <div class="flex justify-between text-gray-700">
                                    <span>Tax (18%)</span>
                                    <span class="font-semibold">TZS {{ number_format($selectedOrder->tax, 0) }}</span>
                                </div>
                                <div class="flex justify-between text-gray-700">
                                    <span>Shipping Fee</span>
                                    <span class="font-semibold">TZS {{ number_format($selectedOrder->shipping_fee, 0) }}</span>
                                </div>
                                <div class="border-t-2 border-orange-300 pt-2 mt-2">
                                    <div class="flex justify-between">
                                        <span class="text-lg font-bold text-gray-900">Total</span>
                                        <span class="text-2xl font-bold" style="color: #FF7F00;">TZS {{ number_format($selectedOrder->total, 0) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notes -->
                        @if($selectedOrder->notes)
                            <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-4 mt-6">
                                <p class="text-sm font-semibold text-yellow-900 mb-2">Order Notes</p>
                                <p class="text-sm text-yellow-800">{{ $selectedOrder->notes }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Modal Footer -->
                    <div class="p-6 border-t border-gray-200 flex justify-end gap-3">
                        <button wire:click="closeOrderDetails" class="px-4 py-2 border-2 border-gray-300 rounded-lg text-gray-700 font-semibold hover:bg-gray-50 transition-all">
                            Close
                        </button>
                        <button class="px-4 py-2 rounded-lg text-white font-semibold transition-all" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            Print Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="fixed top-6 right-6 z-50 animate-slide-in">
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-lg max-w-md">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-green-700 font-medium">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
