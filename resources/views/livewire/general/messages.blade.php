<div class="min-h-screen bg-gray-50 flex">
    <div class="w-80 bg-white border-r border-gray-200 flex flex-col">
        <div class="border-b border-gray-200 px-4 py-3">
            <h1 class="text-lg font-semibold text-gray-900">Messages</h1>
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search conversations..." 
                   class="w-full mt-2 px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
        </div>

        <div class="flex-1 overflow-y-auto">
            @foreach($conversations as $conversation)
                <div wire:click="selectConversation({{ $conversation->id }})" 
                     class="p-3 border-b border-gray-200 hover:bg-gray-50 cursor-pointer {{ $selectedConversation === $conversation->id ? 'bg-orange-50' : '' }}">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between mb-1">
                                <h3 class="text-sm font-medium text-gray-900 truncate">{{ $conversation->user }}</h3>
                                @if($conversation->unread > 0)
                                    <span class="px-2 py-0.5 text-xs bg-orange-500 text-white rounded-full">{{ $conversation->unread }}</span>
                                @endif
                            </div>
                            <p class="text-xs text-gray-600 truncate">{{ $conversation->last_message }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($conversation->timestamp)->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex-1 flex flex-col">
        @if($selectedConversation)
            <div class="bg-white border-b border-gray-200 px-4 py-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">John Mwamba</h3>
                        <p class="text-xs text-gray-500">Active now</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-3">
                @foreach($messages as $message)
                    <div class="flex {{ $message->is_mine ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-md">
                            @if(!$message->is_mine)
                                <p class="text-xs text-gray-600 mb-1">{{ $message->sender }}</p>
                            @endif
                            <div class="px-3 py-2 rounded-lg {{ $message->is_mine ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-900' }}">
                                <p class="text-sm">{{ $message->message }}</p>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($message->timestamp)->format('H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="bg-white border-t border-gray-200 p-4">
                <div class="flex items-center gap-2">
                    <input wire:model="messageText" type="text" placeholder="Type a message..." 
                           class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500"
                           wire:keydown.enter="sendMessage">
                    <button wire:click="sendMessage" class="px-4 py-2 text-sm bg-orange-500 text-white rounded hover:bg-orange-600 transition-colors">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        @else
            <div class="flex-1 flex items-center justify-center text-center">
                <div>
                    <i class="fas fa-comments text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-sm font-medium text-gray-900">No conversation selected</h3>
                    <p class="mt-1 text-sm text-gray-500">Select a conversation to start messaging</p>
                </div>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
