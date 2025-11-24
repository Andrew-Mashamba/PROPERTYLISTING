<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Maintenance Requests</h1>
                <p class="text-sm text-gray-600">Track and manage property maintenance</p>
            </div>
            <a href="/landlord/create-maintenance-request" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-tools mr-1"></i> New Request
            </a>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search requests..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="status" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Status</option>
                    <option value="open">Open</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div>
                <select wire:model.live="priority" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Priorities</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Open Requests</p>
                        <p class="text-xl font-bold text-blue-600">{{ $stats['open'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-envelope-open text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">In Progress</p>
                        <p class="text-xl font-bold text-yellow-600">{{ $stats['in_progress'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-spinner text-yellow-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Completed</p>
                        <p class="text-xl font-bold text-green-600">{{ $stats['completed'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                </div>
            </div>
        </div>

        @if($requests->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($requests as $request)
                    <div class="bg-white rounded-lg border border-gray-200 p-3 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900 text-sm">{{ $request->title }}</h3>
                                <p class="text-xs text-gray-600">{{ $request->property->title ?? 'N/A' }}</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                @if($request->priority === 'urgent') bg-red-100 text-red-800
                                @elseif($request->priority === 'high') bg-orange-100 text-orange-800
                                @elseif($request->priority === 'medium') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($request->priority) }}
                            </span>
                        </div>

                        <p class="text-xs text-gray-600 mb-2 line-clamp-2">{{ $request->description }}</p>

                        <div class="space-y-1 mb-2">
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-user w-4"></i>
                                <span class="ml-1">{{ $request->tenant->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-calendar w-4"></i>
                                <span class="ml-1">{{ $request->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>

                        <div class="mb-2">
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                @if($request->status === 'completed') bg-green-100 text-green-800
                                @elseif($request->status === 'in_progress') bg-blue-100 text-blue-800
                                @else bg-yellow-100 text-yellow-800
                                @endif">
                                {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                            </span>
                        </div>

                        <div class="grid grid-cols-3 gap-1">
                            <a href="/landlord/maintenance/{{ $request->id }}" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors text-center">
                                <i class="fas fa-eye"></i>
                            </a>
                            <button wire:click="updateStatus({{ $request->id }}, 'in_progress')" class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition-colors text-center">
                                <i class="fas fa-play"></i>
                            </button>
                            <button wire:click="updateStatus({{ $request->id }}, 'completed')" class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors text-center">
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $requests->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-tools text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No maintenance requests found</h3>
                <p class="mt-1 text-sm text-gray-500">Maintenance requests will appear here.</p>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
