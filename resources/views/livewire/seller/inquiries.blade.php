<div>
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Buyer Inquiries</h1>
                <p class="text-sm text-gray-600 mt-1">Manage and respond to inquiries from potential buyers</p>
            </div>
            <div class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <span class="text-sm font-medium text-gray-700">{{ $inquiries->total() }} Total</span>
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
                Filter Inquiries
            </h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search inquiries..." 
                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select wire:model.live="status" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="">All Status</option>
                    <option value="new">New</option>
                    <option value="read">Read</option>
                    <option value="replied">Replied</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Priority</label>
                <select wire:model.live="priority" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="">All Priority</option>
                    <option value="low">Low</option>
                    <option value="normal">Normal</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Property</label>
                <select wire:model.live="propertyId" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="">All Properties</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Per Page</label>
                <select wire:model.live="perPage" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Inquiries List -->
    @if($inquiries->count() > 0)
        <div class="space-y-4 mb-6">
            @foreach($inquiries as $inquiry)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-200">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $inquiry->subject }}</h3>
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                        @if($inquiry->status === 'new') bg-blue-500 text-white
                                        @elseif($inquiry->status === 'read') bg-yellow-500 text-white
                                        @elseif($inquiry->status === 'replied') bg-green-500 text-white
                                        @else bg-gray-500 text-white
                                        @endif">
                                        {{ ucfirst($inquiry->status) }}
                                    </span>
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                        @if($inquiry->priority === 'urgent') bg-red-500 text-white
                                        @elseif($inquiry->priority === 'high') bg-orange-500 text-white
                                        @elseif($inquiry->priority === 'normal') bg-blue-500 text-white
                                        @else bg-gray-500 text-white
                                        @endif">
                                        {{ ucfirst($inquiry->priority) }}
                                    </span>
                                </div>
                                
                                <div class="text-sm text-gray-700 mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="line-clamp-3">{{ $inquiry->message }}</p>
                                </div>
                                
                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                        <span class="font-medium">{{ $inquiry->fromUser->name }}</span>
                                    </div>
                                    <span class="text-gray-400">•</span>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>
                                        <span>{{ $inquiry->fromUser->email }}</span>
                                    </div>
                                    @if($inquiry->property)
                                        <span class="text-gray-400">•</span>
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                            </svg>
                                            <span>{{ $inquiry->property->title }}</span>
                                        </div>
                                    @endif
                                    <span class="text-gray-400">•</span>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $inquiry->created_at->format('M d, Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap items-center gap-3 pt-4 border-t border-gray-200">
                            <!-- Reply Button -->
                            <button wire:click="openReplyModal({{ $inquiry->id }})" 
                                    class="px-4 py-2 text-sm font-semibold text-white rounded-lg hover:shadow-lg transition-all flex items-center gap-2"
                                    style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                                </svg>
                                Reply
                            </button>
                            
                            <!-- Status Actions -->
                            @if($inquiry->status !== 'replied')
                                <button wire:click="updateStatus({{ $inquiry->id }}, 'replied')" 
                                        class="px-4 py-2 text-sm font-semibold bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Mark Replied
                                </button>
                            @endif
                            @if($inquiry->status !== 'closed')
                                <button wire:click="updateStatus({{ $inquiry->id }}, 'closed')" 
                                        class="px-4 py-2 text-sm font-semibold bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Close
                                </button>
                            @endif
                            
                            <!-- Priority Selector -->
                            <div class="flex items-center gap-2">
                                <label class="text-sm font-medium text-gray-700">Priority:</label>
                                <select wire:change="updatePriority({{ $inquiry->id }}, $event.target.value)" 
                                        class="text-sm border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-white">
                                    <option value="low" {{ $inquiry->priority === 'low' ? 'selected' : '' }}>Low</option>
                                    <option value="normal" {{ $inquiry->priority === 'normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="high" {{ $inquiry->priority === 'high' ? 'selected' : '' }}>High</option>
                                    <option value="urgent" {{ $inquiry->priority === 'urgent' ? 'selected' : '' }}>Urgent</option>
                                </select>
                            </div>
                            
                            <!-- Delete Action -->
                            <button wire:click="deleteInquiry({{ $inquiry->id }})" 
                                    wire:confirm="Are you sure you want to delete this inquiry?"
                                    class="ml-auto px-4 py-2 text-sm font-semibold bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $inquiries->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-lg p-12">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-20 w-20 text-gray-400 mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No inquiries found</h3>
                <p class="text-sm text-gray-500">You don't have any inquiries matching your filters.</p>
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

    @if (session()->has('error'))
        <div class="fixed top-6 right-6 z-50 animate-slide-in">
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-lg max-w-md">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <p class="text-red-700 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Reply Modal -->
    @if($showReplyModal && $replyingToInquiry)
        <div class="fixed inset-0 z-50 overflow-y-auto" style="background: rgba(0,0,0,0.5);">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" wire:click="closeReplyModal"></div>

                <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full" style="margin-top: 100px;">
                    <!-- Modal Header -->
                    <div class="px-6 py-4" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                                </svg>
                                <h3 class="text-xl font-bold text-white">Reply to Inquiry</h3>
                            </div>
                            <button wire:click="closeReplyModal" class="text-white hover:text-gray-200 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="px-6 py-4">
                        <!-- Original Inquiry Details -->
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <h4 class="text-sm font-semibold text-gray-700 mb-2">Original Inquiry</h4>
                            <div class="space-y-2 text-sm">
                                <div><span class="font-medium text-gray-700">From:</span> <span class="text-gray-900">{{ $replyingToInquiry->fromUser->name }}</span></div>
                                <div><span class="font-medium text-gray-700">Email:</span> <span class="text-gray-900">{{ $replyingToInquiry->contact_email ?? $replyingToInquiry->fromUser->email }}</span></div>
                                @if($replyingToInquiry->property)
                                    <div><span class="font-medium text-gray-700">Property:</span> <span class="text-gray-900">{{ $replyingToInquiry->property->title }}</span></div>
                                @endif
                                <div><span class="font-medium text-gray-700">Subject:</span> <span class="text-gray-900">{{ $replyingToInquiry->subject }}</span></div>
                                <div class="pt-2 border-t border-gray-300">
                                    <span class="font-medium text-gray-700">Message:</span>
                                    <p class="text-gray-900 mt-1">{{ $replyingToInquiry->message }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Reply Form -->
                        <form wire:submit.prevent="sendReply">
                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Your Reply</label>
                                <textarea wire:model="replyMessage" rows="8" 
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 resize-vertical"
                                          placeholder="Type your reply here..."></textarea>
                                @error('replyMessage') 
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                                <button type="button" wire:click="closeReplyModal" 
                                        class="px-6 py-2.5 text-sm font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                                    Cancel
                                </button>
                                <button type="submit" 
                                        wire:loading.attr="disabled"
                                        class="px-6 py-2.5 text-sm font-semibold text-white rounded-lg hover:shadow-lg transition-all flex items-center gap-2"
                                        style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                    <svg wire:loading.remove wire:target="sendReply" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                    </svg>
                                    <svg wire:loading wire:target="sendReply" class="animate-spin w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span wire:loading.remove wire:target="sendReply">Send Reply</span>
                                    <span wire:loading wire:target="sendReply">Sending...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
