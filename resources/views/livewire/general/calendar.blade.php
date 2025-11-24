<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Calendar</h1>
                <p class="text-sm text-gray-600">Manage your schedule and appointments</p>
            </div>
            <button wire:click="createEvent" class="px-3 py-1.5 text-sm bg-orange-500 text-white rounded hover:bg-orange-600 transition-colors">
                <i class="fas fa-plus mr-1"></i> New Event
            </button>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <button wire:click="$set('view', 'month')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $view === 'month' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Month
                </button>
                <button wire:click="$set('view', 'week')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $view === 'week' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Week
                </button>
                <button wire:click="$set('view', 'day')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $view === 'day' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Day
                </button>
            </div>
            <div class="flex items-center gap-2">
                <button class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <span class="text-sm font-medium text-gray-900">{{ $currentMonth }}</span>
                <button class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2 bg-white rounded-lg border border-gray-200 p-4">
                <div class="grid grid-cols-7 gap-1 mb-2">
                    <div class="text-center text-xs font-medium text-gray-600 py-2">Sun</div>
                    <div class="text-center text-xs font-medium text-gray-600 py-2">Mon</div>
                    <div class="text-center text-xs font-medium text-gray-600 py-2">Tue</div>
                    <div class="text-center text-xs font-medium text-gray-600 py-2">Wed</div>
                    <div class="text-center text-xs font-medium text-gray-600 py-2">Thu</div>
                    <div class="text-center text-xs font-medium text-gray-600 py-2">Fri</div>
                    <div class="text-center text-xs font-medium text-gray-600 py-2">Sat</div>
                </div>

                <div class="grid grid-cols-7 gap-1">
                    @for($i = 1; $i <= 35; $i++)
                        @php
                            $day = $i <= 31 ? $i : '';
                            $isToday = $i === 17;
                        @endphp
                        <div class="aspect-square border border-gray-200 rounded p-1 {{ $isToday ? 'bg-orange-50 border-orange-500' : 'bg-white' }} hover:bg-gray-50 cursor-pointer">
                            <div class="text-xs font-medium {{ $isToday ? 'text-orange-600' : 'text-gray-700' }}">{{ $day }}</div>
                            @if($i === 18 || $i === 20 || $i === 25)
                                <div class="mt-0.5">
                                    <div class="w-1 h-1 bg-blue-500 rounded-full mx-auto"></div>
                                </div>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>

            <div class="space-y-3">
                <div class="bg-white rounded-lg border border-gray-200 p-3">
                    <h3 class="text-sm font-semibold text-gray-900 mb-2">Upcoming Events</h3>
                    <div class="space-y-2">
                        @foreach($events as $event)
                            <div class="border border-gray-200 rounded p-2 hover:shadow-md transition-shadow">
                                <div class="flex items-start justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full flex-shrink-0
                                            @if($event->type === 'viewing') bg-blue-500
                                            @elseif($event->type === 'payment') bg-green-500
                                            @elseif($event->type === 'maintenance') bg-yellow-500
                                            @else bg-gray-500
                                            @endif">
                                        </span>
                                        <h4 class="text-xs font-medium text-gray-900">{{ $event->title }}</h4>
                                    </div>
                                    <button wire:click="deleteEvent({{ $event->id }})" class="text-xs text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <p class="text-xs text-gray-600 mb-1">{{ $event->description }}</p>
                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <span><i class="fas fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</span>
                                    <span><i class="fas fa-clock mr-1"></i>{{ $event->time }}</span>
                                </div>
                                @if($event->location)
                                    <p class="text-xs text-gray-500 mt-1">
                                        <i class="fas fa-map-marker-alt mr-1"></i>{{ $event->location }}
                                    </p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-gray-200 p-3">
                    <h3 class="text-sm font-semibold text-gray-900 mb-2">Event Types</h3>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                <span class="text-gray-700">Property Viewings</span>
                            </div>
                            <span class="text-gray-500">3</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                <span class="text-gray-700">Payments Due</span>
                            </div>
                            <span class="text-gray-500">2</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
                                <span class="text-gray-700">Maintenance</span>
                            </div>
                            <span class="text-gray-500">1</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-gray-500 rounded-full"></span>
                                <span class="text-gray-700">Other</span>
                            </div>
                            <span class="text-gray-500">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
