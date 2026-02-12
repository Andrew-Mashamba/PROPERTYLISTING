<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <h1 class="text-3xl font-bold text-gray-900">Home Finder Requests</h1>
        <p class="text-base text-gray-600 mt-1">Review requests and send vetted leads to agents</p>
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
            <div class="lg:col-span-1 space-y-4">
                <div class="bg-white rounded-xl shadow-lg p-4">
                    <div class="grid grid-cols-1 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Search</label>
                            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search name, phone, email..."
                                   class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Status</label>
                            <select wire:model.live="status" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                <option value="">All</option>
                                <option value="new">New</option>
                                <option value="reviewed">Reviewed</option>
                                <option value="sent_to_agent">Sent to agent</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    @forelse($requests as $request)
                        <button type="button" wire:click="selectRequest({{ $request->id }})"
                                class="w-full text-left bg-white rounded-xl shadow-lg p-4 border-2 {{ $selectedRequest && $selectedRequest->id === $request->id ? 'border-orange-500' : 'border-transparent' }}">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $request->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $request->phone }} · {{ $request->email }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $request->region }}, {{ $request->district }}</p>
                                </div>
                                <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-700">
                                    {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2 mt-3 text-xs text-gray-500">
                                <span>{{ $request->property_category }} · {{ $request->property_type }}</span>
                                <span>•</span>
                                <span>Agents: {{ $request->assignments_count }}</span>
                                <span>•</span>
                                <span>SMS: {{ $request->sms_leads_count }}</span>
                            </div>
                        </button>
                    @empty
                        <div class="bg-white rounded-xl shadow-lg p-6 text-center text-gray-500 text-sm">
                            No requests found.
                        </div>
                    @endforelse
                </div>

                <div>
                    {{ $requests->links() }}
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                @if($selectedRequest)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">{{ $selectedRequest->name }}</h2>
                                <p class="text-sm text-gray-500">{{ $selectedRequest->phone }} · {{ $selectedRequest->email }}</p>
                            </div>
                            <span class="text-xs px-3 py-1 rounded-full bg-gray-100 text-gray-700">
                                {{ ucfirst(str_replace('_', ' ', $selectedRequest->status)) }}
                            </span>
                        </div>

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
                                <p class="text-sm text-gray-600">Compound: {{ $selectedRequest->compound_type ?? 'Any' }}</p>
                                <p class="text-sm text-gray-600">Condition: {{ $selectedRequest->condition ?? 'Any' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Budget</p>
                                <p class="text-sm text-gray-900">{{ $selectedRequest->budget_min ?? '-' }} - {{ $selectedRequest->budget_max ?? '-' }}</p>
                                <p class="text-sm text-gray-600">Terms: {{ $selectedRequest->payment_terms }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Note</p>
                                <p class="text-sm text-gray-700">{{ $selectedRequest->note ?: 'No additional note' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Assign & Send Lead</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Select Agent</label>
                                <select wire:model="selectedAgentId" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    <option value="">Choose agent</option>
                                    @foreach($agents as $agent)
                                        <option value="{{ $agent->id }}">{{ $agent->name }} ({{ $agent->phone ?? 'no phone' }})</option>
                                    @endforeach
                                </select>
                                @error('selectedAgentId') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Review notes</label>
                                <input wire:model="reviewNotes" type="text" placeholder="Optional notes for the agent"
                                       class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                @error('reviewNotes') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 mt-4">
                            <button type="button" wire:click="assignAgent" class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold">
                                Mark Reviewed & Assign
                            </button>
                            <button type="button" wire:click="sendLead" class="px-4 py-2 rounded-lg bg-orange-500 text-white text-sm font-semibold">
                                Send Lead SMS
                            </button>
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
                            <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Send message</label>
                            <textarea wire:model="messageBody" rows="3" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"></textarea>
                            @error('messageBody') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            <div class="mt-3">
                                <button type="button" wire:click="sendMessage" class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Assignments & SMS</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Agents</p>
                                @forelse($selectedRequest->assignments as $assignment)
                                    <div class="mb-3">
                                        <p class="text-sm text-gray-900 font-semibold">{{ $assignment->agent->name ?? 'Agent' }}</p>
                                        <p class="text-xs text-gray-600">Status: {{ $assignment->status }}</p>
                                        <p class="text-xs text-gray-600">Sent: {{ $assignment->sent_at ? $assignment->sent_at->format('M d, H:i') : 'Not sent' }}</p>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500">No assignments yet.</p>
                                @endforelse
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">SMS Leads</p>
                                @forelse($selectedRequest->smsLeads as $lead)
                                    <div class="mb-3">
                                        <p class="text-sm text-gray-900 font-semibold">{{ $lead->agent->name ?? 'Agent' }}</p>
                                        <p class="text-xs text-gray-600">Phone: {{ $lead->phone }}</p>
                                        <p class="text-xs text-gray-600">Sent: {{ $lead->sent_at ? $lead->sent_at->format('M d, H:i') : 'Pending' }}</p>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500">No SMS leads yet.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center text-gray-500">
                        Select a request to review details and send leads.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
