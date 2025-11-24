<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-gray-900 font-bold text-2xl md:text-3xl">Support Center</h1>
                <p class="text-gray-600 font-normal text-base mt-1">Get help from our support team</p>
            </div>
            @if($activeTab !== 'new')
            <button wire:click="$set('activeTab', 'new')" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Ticket
            </button>
            @endif
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto px-4 py-6">
        @if($activeTab === 'tickets' || $activeTab === 'chat')
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-gray-800 font-semibold text-lg">My Tickets</h2>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">{{ $tickets->count() }}</span>
                </div>

                <div class="space-y-3">
                    @forelse($tickets as $ticket)
                    <div wire:click="selectTicket({{ $ticket->id }})" class="p-4 rounded-lg border-2 cursor-pointer transition-all {{ $selectedTicket == $ticket->id ? 'border-orange-500 bg-orange-50' : 'border-gray-200 hover:border-orange-300 bg-white' }}">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="text-sm font-semibold text-gray-900 line-clamp-1">{{ $ticket->subject }}</h3>
                            @if($ticket->status === 'open')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 ml-2">Open</span>
                            @elseif($ticket->status === 'in_progress')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 ml-2">In Progress</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800 ml-2">Closed</span>
                            @endif
                        </div>
                        <p class="text-xs text-gray-600 mb-2">{{ $ticket->ticket_number }}</p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>{{ $ticket->category }}</span>
                            <span>{{ $ticket->created_at->diffForHumans() }}</span>
                        </div>
                        @if($ticket->messages->where('is_admin', true)->where('read_at', null)->count() > 0)
                        <div class="mt-2 pt-2 border-t border-gray-200">
                            <span class="text-xs font-semibold text-orange-600">{{ $ticket->messages->where('is_admin', true)->where('read_at', null)->count() }} new message(s)</span>
                        </div>
                        @endif
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">No tickets yet</p>
                        <button wire:click="$set('activeTab', 'new')" class="mt-3 text-orange-600 hover:text-orange-700 text-sm font-semibold">Create your first ticket</button>
                    </div>
                    @endforelse
                </div>
            </div>

            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg">
                @if($selectedTicket && $currentTicket)
                <div class="flex flex-col h-[600px]">
                    <div class="p-6 border-b-2 border-gray-100">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h2 class="text-gray-800 font-semibold text-xl mb-2">{{ $currentTicket->subject }}</h2>
                                <div class="flex flex-wrap items-center gap-3 text-sm text-gray-600">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        {{ $currentTicket->ticket_number }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $currentTicket->created_at->format('M d, Y h:i A') }}
                                    </span>
                                    @if($currentTicket->assignedTo)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Assigned to {{ $currentTicket->assignedTo->name }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if($currentTicket->status !== 'closed')
                            <button wire:click="closeTicket" class="px-4 py-2 rounded-lg border-2 border-red-200 text-red-600 font-semibold text-sm hover:bg-red-50 transition-all">
                                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Close Ticket
                            </button>
                            @endif
                        </div>
                    </div>

                    <div class="flex-1 overflow-y-auto p-6 space-y-4" id="messages-container">
                        @foreach($messages as $message)
                        <div class="flex {{ $message->is_admin ? 'justify-start' : 'justify-end' }}">
                            <div class="flex {{ $message->is_admin ? 'flex-row' : 'flex-row-reverse' }} items-start gap-3 max-w-[70%]">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 {{ $message->is_admin ? 'bg-gradient-to-br from-purple-500 to-purple-600' : 'bg-gradient-to-br from-orange-500 to-orange-600' }}">
                                    <span class="text-white font-semibold text-sm">{{ substr($message->user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="p-4 rounded-lg {{ $message->is_admin ? 'bg-gray-100' : 'bg-gradient-to-br from-orange-500 to-orange-600 text-white' }}">
                                        <p class="text-sm font-medium mb-1 {{ $message->is_admin ? 'text-gray-900' : 'text-white' }}">{{ $message->user->name }}</p>
                                        <p class="text-sm {{ $message->is_admin ? 'text-gray-700' : 'text-white' }}">{{ $message->message }}</p>
                                        @if($message->attachment)
                                        <a href="{{ Storage::url($message->attachment) }}" target="_blank" class="mt-2 inline-flex items-center gap-2 text-xs {{ $message->is_admin ? 'text-blue-600 hover:text-blue-700' : 'text-white hover:text-gray-100' }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                            </svg>
                                            View Attachment
                                        </a>
                                        @endif
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1 {{ $message->is_admin ? 'text-left' : 'text-right' }}">{{ $message->created_at->format('M d, h:i A') }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if($currentTicket->status !== 'closed')
                    <div class="p-6 border-t-2 border-gray-100">
                        <form wire:submit.prevent="sendMessage" class="space-y-3">
                            <div>
                                <textarea wire:model="newMessage" rows="3" placeholder="Type your message here..." class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700 resize-none"></textarea>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <label class="cursor-pointer">
                                        <input wire:model="attachment" type="file" class="hidden">
                                        <span class="flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 font-semibold text-sm hover:bg-gray-50 transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                            </svg>
                                            Attach File
                                        </span>
                                    </label>
                                    @if($attachment)
                                    <span class="text-xs text-green-600 font-medium">{{ $attachment->getClientOriginalName() }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
                @else
                <div class="flex items-center justify-center h-[600px]">
                    <div class="text-center">
                        <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <h3 class="text-gray-900 font-semibold text-lg mb-2">Select a ticket</h3>
                        <p class="text-gray-500 text-sm">Choose a ticket from the list to view the conversation</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif

        @if($activeTab === 'new')
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-gray-800 font-semibold text-xl">Create New Ticket</h2>
                        <p class="text-gray-500 text-sm">Submit a support request to our team</p>
                    </div>
                </div>

                <form wire:submit.prevent="createTicket" class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-medium text-sm mb-2">Subject <span class="text-red-500">*</span></label>
                        <input wire:model="subject" type="text" placeholder="Brief description of your issue" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                        @error('subject') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Category <span class="text-red-500">*</span></label>
                            <select wire:model="category" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                                <option value="general">General Inquiry</option>
                                <option value="technical">Technical Support</option>
                                <option value="billing">Billing & Payments</option>
                                <option value="feature">Feature Request</option>
                                <option value="account">Account Issues</option>
                                <option value="other">Other</option>
                            </select>
                            @error('category') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Priority <span class="text-red-500">*</span></label>
                            <select wire:model="priority" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                                <option value="low">Low</option>
                                <option value="normal">Normal</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                            @error('priority') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium text-sm mb-2">Message <span class="text-red-500">*</span></label>
                        <textarea wire:model="initialMessage" rows="6" placeholder="Please describe your issue in detail..." class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700"></textarea>
                        @error('initialMessage') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-between pt-4">
                        @if($tickets->count() > 0)
                        <button type="button" wire:click="$set('activeTab', 'tickets')" class="px-6 py-2.5 rounded-lg border-2 border-gray-300 text-gray-700 font-semibold text-sm hover:bg-gray-50 transition-all">
                            Cancel
                        </button>
                        @else
                        <div></div>
                        @endif
                        <button type="submit" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Create Ticket
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 px-6 py-4 rounded-xl text-white font-semibold shadow-xl z-50" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ session('message') }}
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('message-sent', () => {
                setTimeout(() => {
                    const container = document.getElementById('messages-container');
                    if (container) {
                        container.scrollTop = container.scrollHeight;
                    }
                }, 100);
            });
        });
    </script>
</div>
