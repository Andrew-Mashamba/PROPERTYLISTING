<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <h1 class="text-3xl font-bold text-gray-900">Home Finder Leads</h1>
        <p class="text-base text-gray-600 mt-1">Leads assigned by Savanna</p>
    </div>

    <div class="px-6 py-6 space-y-6">
        @if (session()->has('message'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1 space-y-3">
                @forelse($assignments as $assignment)
                    <button type="button" wire:click="selectRequest({{ $assignment->home_finder_request_id }})"
                            class="w-full text-left bg-white rounded-xl shadow-lg p-4 border-2 {{ $selectedRequest && $selectedRequest->id === $assignment->home_finder_request_id ? 'border-orange-500' : 'border-transparent' }}">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $assignment->request->name ?? 'Request' }}</p>
                                <p class="text-xs text-gray-500">{{ $assignment->request->phone ?? '' }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $assignment->request->region ?? '' }}, {{ $assignment->request->district ?? '' }}</p>
                            </div>
                            <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-700">
                                {{ ucfirst($assignment->status) }}
                            </span>
                        </div>
                    </button>
                @empty
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center text-gray-500 text-sm">
                        No leads assigned yet.
                    </div>
                @endforelse

                <div>
                    {{ $assignments->links() }}
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                @if($selectedRequest)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900">{{ $selectedRequest->name }}</h2>
                        <p class="text-sm text-gray-500">{{ $selectedRequest->phone }} · {{ $selectedRequest->email }}</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Location</p>
                                <p class="text-sm text-gray-900">{{ $selectedRequest->region }}, {{ $selectedRequest->district }}</p>
                                <p class="text-sm text-gray-600">{{ $selectedRequest->ward }}</p>
                                <p class="text-sm text-gray-600">{{ $selectedRequest->street }}</p>
                                <p class="text-sm text-gray-600">Postcode: {{ $selectedRequest->postcode }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Property</p>
                                <p class="text-sm text-gray-900">{{ $selectedRequest->property_category }} · {{ $selectedRequest->property_type }}</p>
                                <p class="text-sm text-gray-600">Rooms: {{ $selectedRequest->rooms ?? 'N/A' }}</p>
                                <p class="text-sm text-gray-600">Area: {{ $selectedRequest->area_sqm ?? 'N/A' }} sqm</p>
                                <p class="text-sm text-gray-600">Budget: {{ $selectedRequest->budget_min ?? '-' }} - {{ $selectedRequest->budget_max ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Conversation</h3>
                        <div class="border border-gray-200 rounded-lg p-4 h-64 overflow-y-auto bg-gray-50 space-y-3">
                            @forelse($conversationMessages as $message)
                                <div>
                                    <p class="text-xs text-gray-500">{{ $message->sender->name ?? 'User' }} · {{ $message->created_at->format('M d, H:i') }}</p>
                                    <p class="text-sm text-gray-800 whitespace-pre-line">{{ $message->message }}</p>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500">No messages yet.</p>
                            @endforelse
                        </div>
                        <div class="mt-4">
                            <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Reply to Savanna</label>
                            <textarea wire:model="messageBody" rows="3" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"></textarea>
                            @error('messageBody') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            <div class="mt-3">
                                <button type="button" wire:click="sendMessage" class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold">
                                    Send Reply
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center text-gray-500">
                        Select a lead to view details and reply.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
