<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Purchase Offers</h1>
                <p class="text-sm text-gray-600">Track and manage purchase offers</p>
            </div>
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-500">{{ $offers->count() }} total offers</span>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search offers..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
            </div>
            <div>
                <select wire:model.live="status" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="accepted">Accepted</option>
                    <option value="rejected">Rejected</option>
                    <option value="expired">Expired</option>
                </select>
            </div>
            <div>
                <select wire:model.live="propertyId" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Properties</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select wire:model.live="perPage" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Offers List -->
    <div class="p-4">
        @if($offers->count() > 0)
            <div class="space-y-3">
                @foreach($offers as $offer)
                    <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-2">
                                    <h3 class="font-medium text-gray-900 text-sm">{{ $offer->property_title }}</h3>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        @if($offer->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($offer->status === 'accepted') bg-green-100 text-green-800
                                        @elseif($offer->status === 'rejected') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ ucfirst($offer->status) }}
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
                                    <div>
                                        <p class="text-xs text-gray-500">Buyer</p>
                                        <p class="text-sm text-gray-900">{{ $offer->buyer_name }}</p>
                                        <p class="text-xs text-gray-600">{{ $offer->buyer_email }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Offer Details</p>
                                        <p class="text-sm text-gray-900">${{ number_format($offer->offer_amount) }}</p>
                                        <p class="text-xs text-gray-600">Asking: ${{ number_format($offer->asking_price) }}</p>
                                        <p class="text-xs text-gray-600">
                                            @if($offer->offer_amount < $offer->asking_price)
                                                <span class="text-red-600">-${{ number_format($offer->asking_price - $offer->offer_amount) }} below asking</span>
                                            @elseif($offer->offer_amount > $offer->asking_price)
                                                <span class="text-green-600">+${{ number_format($offer->offer_amount - $offer->asking_price) }} above asking</span>
                                            @else
                                                <span class="text-gray-600">At asking price</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Timeline</p>
                                        <p class="text-sm text-gray-900">{{ $offer->offer_date->format('M d, Y') }}</p>
                                        <p class="text-xs text-gray-600">Expires: {{ $offer->expires_at->format('M d, Y') }}</p>
                                        @if($offer->notes)
                                            <p class="text-xs text-gray-600 mt-1">{{ $offer->notes }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-2 ml-4">
                                <!-- Offer Actions -->
                                <div class="flex space-x-1">
                                    @if($offer->status === 'pending')
                                        <button wire:click="acceptOffer({{ $offer->id }})" 
                                                class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                                            Accept
                                        </button>
                                        <button wire:click="counterOffer({{ $offer->id }})" 
                                                class="px-2 py-1 text-xs bg-orange-100 text-orange-700 rounded hover:bg-orange-200 transition-colors">
                                            Counter
                                        </button>
                                        <button wire:click="rejectOffer({{ $offer->id }})" 
                                                class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                                            Reject
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No offers received</h3>
                <p class="mt-1 text-sm text-gray-500">You haven't received any purchase offers yet.</p>
            </div>
        @endif
    </div>

    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm">
            {{ session('message') }}
        </div>
    @endif
</div>
