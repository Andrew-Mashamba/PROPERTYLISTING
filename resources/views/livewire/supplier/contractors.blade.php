<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Contractor Partnerships</h1>
                <p class="text-sm text-gray-600">Manage your contractor network and collaborations</p>
            </div>
            <button wire:click="$toggle('showAddContractor')" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-plus mr-1"></i> Add Contractor
            </button>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search contractors..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="specialization" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Specializations</option>
                    <option value="residential">Residential Construction</option>
                    <option value="commercial">Commercial Buildings</option>
                    <option value="renovation">Renovation & Remodeling</option>
                    <option value="roofing">Roofing</option>
                    <option value="plumbing">Plumbing</option>
                    <option value="electrical">Electrical</option>
                </select>
            </div>
            <div>
                <select wire:model.live="location" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Locations</option>
                    <option value="dar">Dar es Salaam</option>
                    <option value="arusha">Arusha</option>
                    <option value="mwanza">Mwanza</option>
                    <option value="dodoma">Dodoma</option>
                </select>
            </div>
            <div>
                <select wire:model.live="rating" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Ratings</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4+ Stars</option>
                    <option value="3">3+ Stars</option>
                </select>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Total Contractors</div>
                <div class="text-xl font-bold text-gray-900">{{ count($filteredContractors) }}</div>
                <div class="text-xs text-blue-600 mt-1"><i class="fas fa-hard-hat"></i> In network</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Active Projects</div>
                <div class="text-xl font-bold text-green-600">{{ collect($filteredContractors)->where('status', 'active')->count() }}</div>
                <div class="text-xs text-gray-500 mt-1">Ongoing work</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Completed Projects</div>
                <div class="text-xl font-bold text-orange-600">{{ collect($filteredContractors)->sum('projects_completed') }}</div>
                <div class="text-xs text-gray-500 mt-1">Total finished</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="text-xs text-gray-600 mb-1">Avg. Rating</div>
                <div class="text-xl font-bold text-yellow-600">{{ number_format(collect($filteredContractors)->avg('rating'), 1) }}</div>
                <div class="text-xs text-gray-500 mt-1">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= collect($filteredContractors)->avg('rating') ? 'text-yellow-400' : 'text-gray-300' }} text-xs"></i>
                    @endfor
                </div>
            </div>
        </div>

        @if(count($filteredContractors) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($filteredContractors as $contractor)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="relative bg-gradient-to-r from-blue-500 to-purple-500 p-3 text-white">
                            <div class="absolute top-2 right-2">
                                <span class="px-2 py-1 text-xs rounded-full
                                    @if($contractor['status'] === 'active') bg-green-100 text-green-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($contractor['status']) }}
                                </span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-hard-hat text-blue-500 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-sm">{{ $contractor['name'] }}</h3>
                                    <p class="text-xs opacity-90">{{ $contractor['company'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-3">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $contractor['rating'] ? 'text-yellow-400' : 'text-gray-300' }} text-xs"></i>
                                    @endfor
                                    <span class="ml-1 text-xs text-gray-600">({{ $contractor['rating'] }}/5)</span>
                                </div>
                                <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">
                                    {{ $contractor['specialization'] }}
                                </span>
                            </div>

                            <div class="space-y-2 mb-3">
                                <div class="flex items-center text-xs text-gray-600">
                                    <i class="fas fa-envelope w-4"></i>
                                    <span class="ml-2">{{ $contractor['email'] }}</span>
                                </div>
                                <div class="flex items-center text-xs text-gray-600">
                                    <i class="fas fa-phone w-4"></i>
                                    <span class="ml-2">{{ $contractor['phone'] }}</span>
                                </div>
                                <div class="flex items-center text-xs text-gray-600">
                                    <i class="fas fa-map-marker-alt w-4"></i>
                                    <span class="ml-2">{{ $contractor['location'] }}</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2 mb-3 text-center">
                                <div class="bg-gray-50 rounded p-2">
                                    <div class="text-sm font-medium text-gray-900">{{ $contractor['projects_completed'] }}</div>
                                    <div class="text-xs text-gray-500">Projects</div>
                                </div>
                                <div class="bg-gray-50 rounded p-2">
                                    <div class="text-sm font-medium text-gray-900">{{ rand(5, 20) }}</div>
                                    <div class="text-xs text-gray-500">Reviews</div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-600 mb-3 p-2 bg-blue-50 rounded">
                                <span><i class="fas fa-calendar-check mr-1"></i> Available</span>
                                <span><i class="fas fa-clock mr-1"></i> 24h response</span>
                            </div>

                            <div class="grid grid-cols-3 gap-1">
                                <button class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="px-2 py-1 text-xs bg-orange-100 text-orange-700 rounded hover:bg-orange-200 transition-colors">
                                    <i class="fas fa-handshake"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-hard-hat text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No contractors found</h3>
                <p class="mt-1 text-sm text-gray-500">Start building your contractor network.</p>
                <div class="mt-6">
                    <button wire:click="$toggle('showAddContractor')" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700">
                        <i class="fas fa-plus mr-1"></i> Add First Contractor
                    </button>
                </div>
            </div>
        @endif
    </div>

    @if($showAddContractor)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-10 mx-auto p-4 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Contractor</h3>
                    <form wire:submit.prevent="addContractor" class="space-y-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Name *</label>
                            <input wire:model="name" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            @error('name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Company</label>
                            <input wire:model="company" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Email *</label>
                            <input wire:model="email" type="email" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            @error('email') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Phone *</label>
                            <input wire:model="phone" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            @error('phone') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Specialization</label>
                            <select wire:model="specialization" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                                <option value="">Select Specialization</option>
                                <option value="Residential Construction">Residential Construction</option>
                                <option value="Commercial Buildings">Commercial Buildings</option>
                                <option value="Renovation">Renovation & Remodeling</option>
                                <option value="Roofing">Roofing</option>
                                <option value="Plumbing">Plumbing</option>
                                <option value="Electrical">Electrical</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Location</label>
                            <input wire:model="location" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button type="submit" class="flex-1 px-3 py-1.5 bg-orange-500 text-white text-sm rounded hover:bg-orange-600">
                                Add Contractor
                            </button>
                            <button type="button" wire:click="$toggle('showAddContractor')" class="px-3 py-1.5 bg-gray-300 text-gray-700 text-sm rounded hover:bg-gray-400">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
