<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Property Viewings</h1>
                <p class="text-sm text-gray-600">Schedule and manage property viewings</p>
            </div>
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                Schedule Viewing
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search viewings..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
            </div>
            <div>
                <select wire:model.live="status" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Status</option>
                    <option value="scheduled">Scheduled</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
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
                <input wire:model.live="dateFrom" type="date" 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
            </div>
            <div>
                <input wire:model.live="dateTo" type="date" 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
            </div>
        </div>
    </div>

    <!-- Viewings List -->
    <div class="p-4">
        @if($viewings->count() > 0)
            <div class="space-y-3">
                @foreach($viewings as $viewing)
                    <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-2">
                                    <h3 class="font-medium text-gray-900 text-sm">{{ $viewing->property_title }}</h3>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        @if($viewing->status === 'scheduled') bg-blue-100 text-blue-800
                                        @elseif($viewing->status === 'confirmed') bg-green-100 text-green-800
                                        @elseif($viewing->status === 'completed') bg-gray-100 text-gray-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($viewing->status) }}
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
                                    <div>
                                        <p class="text-xs text-gray-500">Client</p>
                                        <p class="text-sm text-gray-900">{{ $viewing->client_name }}</p>
                                        <p class="text-xs text-gray-600">{{ $viewing->client_email }}</p>
                                        <p class="text-xs text-gray-600">{{ $viewing->client_phone }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Scheduled</p>
                                        <p class="text-sm text-gray-900">{{ $viewing->scheduled_at->format('M d, Y H:i') }}</p>
                                        @if($viewing->notes)
                                            <p class="text-xs text-gray-600 mt-1">{{ $viewing->notes }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-2 ml-4">
                                <!-- Status Actions -->
                                <div class="flex space-x-1">
                                    @if($viewing->status === 'scheduled')
                                        <button wire:click="updateStatus({{ $viewing->id }}, 'confirmed')" 
                                                class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                                            Confirm
                                        </button>
                                    @endif
                                    @if($viewing->status === 'confirmed')
                                        <button wire:click="updateStatus({{ $viewing->id }}, 'completed')" 
                                                class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                                            Complete
                                        </button>
                                    @endif
                                    @if(in_array($viewing->status, ['scheduled', 'confirmed']))
                                        <button wire:click="cancelViewing({{ $viewing->id }})" 
                                                class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                                            Cancel
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No viewings scheduled</h3>
                <p class="mt-1 text-sm text-gray-500">Schedule your first property viewing.</p>
                <div class="mt-6">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700">
                        Schedule Viewing
                    </button>
                </div>
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
