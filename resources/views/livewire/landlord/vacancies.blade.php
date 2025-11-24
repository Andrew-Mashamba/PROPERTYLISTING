<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Vacant Properties</h1>
                <p class="text-sm text-gray-600">Manage and list available properties</p>
            </div>
            <a href="{{ route('landlord.add-rental') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-plus mr-1"></i> Add Property
            </a>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search vacant properties..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="perPage" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="12">12 per page</option>
                    <option value="24">24 per page</option>
                    <option value="48">48 per page</option>
                </select>
            </div>
        </div>
    </div>

    <div class="p-4">
        @if($vacantProperties->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($vacantProperties as $property)
                    <div class="bg-white rounded-lg border border-gray-200 p-3 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900 text-sm">{{ $property->title }}</h3>
                                <p class="text-xs text-gray-600">{{ $property->address }}</p>
                            </div>
                            @if($property->is_listed)
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    Listed
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                    Not Listed
                                </span>
                            @endif
                        </div>

                        <div class="space-y-1 mb-2">
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-bed w-4"></i>
                                <span class="ml-1">{{ $property->bedrooms }} Bed • {{ $property->bathrooms }} Bath</span>
                            </div>
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-ruler-combined w-4"></i>
                                <span class="ml-1">{{ number_format($property->area_sqft) }} sq ft</span>
                            </div>
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-calendar w-4"></i>
                                <span class="ml-1">Vacant since: {{ \Carbon\Carbon::parse($property->vacant_since)->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-info-circle w-4"></i>
                                <span class="ml-1">Reason: {{ $property->reason }}</span>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded p-2 mb-2">
                            <p class="text-xs text-gray-600">Target Rent</p>
                            <p class="text-base font-semibold text-orange-600">TZS {{ number_format($property->target_rent) }}/mo</p>
                        </div>

                        @if($property->is_listed)
                            <div class="grid grid-cols-2 gap-2 mb-2">
                                <div class="bg-blue-50 rounded p-2">
                                    <p class="text-xs text-gray-600">Views</p>
                                    <p class="text-sm font-semibold text-blue-600">{{ $property->views }}</p>
                                </div>
                                <div class="bg-green-50 rounded p-2">
                                    <p class="text-xs text-gray-600">Inquiries</p>
                                    <p class="text-sm font-semibold text-green-600">{{ $property->inquiries }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="grid grid-cols-3 gap-1">
                            <a href="/landlord/vacancies/{{ $property->id }}" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors text-center">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if(!$property->is_listed)
                                <button wire:click="listProperty({{ $property->id }})" class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors text-center">
                                    <i class="fas fa-globe"></i> List
                                </button>
                            @else
                                <button class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition-colors text-center">
                                    <i class="fas fa-edit"></i>
                                </button>
                            @endif
                            <button class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition-colors">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $vacantProperties->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-home text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No vacant properties</h3>
                <p class="mt-1 text-sm text-gray-500">All your properties are occupied!</p>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
