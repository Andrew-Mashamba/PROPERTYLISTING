<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Notifications</h1>
                <p class="text-sm text-gray-600">Stay updated with your activity</p>
            </div>
            <button wire:click="markAllAsRead" class="px-3 py-1.5 text-sm bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                <i class="fas fa-check-double mr-1"></i> Mark All Read
            </button>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="flex items-center gap-2">
            <button wire:click="$set('filter', 'all')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $filter === 'all' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                All
            </button>
            <button wire:click="$set('filter', 'unread')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $filter === 'unread' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Unread
            </button>
            <button wire:click="$set('filter', 'payment')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $filter === 'payment' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Payments
            </button>
            <button wire:click="$set('filter', 'property')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $filter === 'property' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Properties
            </button>
            <button wire:click="$set('filter', 'system')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $filter === 'system' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                System
            </button>
        </div>
    </div>

    <div class="p-4">
        @if($notifications->count() > 0)
            <div class="space-y-2">
                @foreach($notifications as $notification)
                    <div class="bg-white rounded-lg border border-gray-200 p-3 hover:shadow-md transition-shadow {{ !$notification->read ? 'border-l-4 border-l-orange-500' : '' }}">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-3 flex-1">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0
                                    @if($notification->type === 'payment') bg-green-100
                                    @elseif($notification->type === 'property') bg-blue-100
                                    @else bg-gray-100
                                    @endif">
                                    <i class="fas 
                                        @if($notification->type === 'payment') fa-money-bill text-green-600
                                        @elseif($notification->type === 'property') fa-home text-blue-600
                                        @else fa-bell text-gray-600
                                        @endif">
                                    </i>
                                </div>

                                <div class="flex-1">
                                    <div class="flex items-start justify-between mb-1">
                                        <h3 class="text-sm font-medium text-gray-900">{{ $notification->title }}</h3>
                                        @if(!$notification->read)
                                            <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                                        @endif
                                    </div>
                                    <p class="text-xs text-gray-600 mb-1">{{ $notification->message }}</p>
                                    <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-1 ml-3">
                                @if(!$notification->read)
                                    <button wire:click="markAsRead({{ $notification->id }})" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                                        <i class="fas fa-check"></i>
                                    </button>
                                @endif
                                <button wire:click="deleteNotification({{ $notification->id }})" class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $notifications->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-bell text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No notifications</h3>
                <p class="mt-1 text-sm text-gray-500">You're all caught up!</p>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
