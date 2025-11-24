<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Tenant Screening</h1>
                <p class="text-base text-gray-600 mt-1">Review and process rental applications</p>
            </div>
        </div>
    </div>

    <div class="bg-white border-b px-6 py-4" style="border-color: rgba(255, 127, 0, 0.2);">
        <div class="p-6 rounded-xl" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%); border: 3px solid #FF7F00;">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Search Applications</label>
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search by name, email, property..." 
                           class="w-full px-4 py-2.5 text-sm border-2 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300" style="border-color: #FF7F00;">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status Filter</label>
                    <select wire:model.live="status" class="w-full px-4 py-2.5 text-sm border-2 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300" style="border-color: #FF7F00;">
                        <option value="pending">Pending</option>
                        <option value="under_review">Under Review</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Items Per Page</label>
                    <select wire:model.live="perPage" class="w-full px-4 py-2.5 text-sm border-2 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300" style="border-color: #FF7F00;">
                        <option value="12">12 per page</option>
                        <option value="24">24 per page</option>
                        <option value="48">48 per page</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6">
        @if($applications->count() > 0)
            <div class="grid grid-cols-1 gap-6">
                @foreach($applications as $application)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                            <div class="lg:col-span-1">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex-1">
                                        <h3 class="font-bold text-gray-900 text-lg mb-1">{{ $application->applicant_name }}</h3>
                                        <div class="flex items-start gap-1">
                                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                            <p class="text-sm text-gray-600 font-medium">{{ $application->property->title }}</p>
                                        </div>
                                    </div>
                                    @if($application->status === 'pending')
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);">
                                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                        </span>
                                    @elseif($application->status === 'under_review')
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                        </span>
                                    @elseif($application->status === 'approved')
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                        </span>
                                    @else
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                        </span>
                                    @endif
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>{{ $application->email }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <span>{{ $application->phone }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-2">
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <div class="rounded-lg p-3" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%); border: 2px solid rgba(255, 127, 0, 0.2);">
                                        <p class="text-xs text-gray-600 font-medium mb-1">Monthly Income</p>
                                        <p class="text-base font-bold" style="color: #FF7F00;">TZS {{ number_format($application->monthly_income) }}</p>
                                    </div>
                                    <div class="rounded-lg p-3" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(29, 78, 216, 0.05) 100%); border: 2px solid rgba(59, 130, 246, 0.2);">
                                        <p class="text-xs text-gray-600 font-medium mb-1">Employment</p>
                                        <p class="text-base font-bold text-blue-700">{{ $application->employment_status }}</p>
                                    </div>
                                    <div class="rounded-lg p-3" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(5, 150, 105, 0.05) 100%); border: 2px solid rgba(16, 185, 129, 0.2);">
                                        <p class="text-xs text-gray-600 font-medium mb-1">Credit Score</p>
                                        <p class="text-xl font-bold 
                                            @if($application->credit_score >= 700) text-green-600
                                            @elseif($application->credit_score >= 600) text-yellow-600
                                            @else text-red-600
                                            @endif">
                                            {{ $application->credit_score }}
                                        </p>
                                    </div>
                                    <div class="rounded-lg p-3" style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(124, 58, 237, 0.05) 100%); border: 2px solid rgba(139, 92, 246, 0.2);">
                                        <p class="text-xs text-gray-600 font-medium mb-1">References</p>
                                        <p class="text-xl font-bold text-purple-700">{{ $application->references }}</p>
                                    </div>
                                </div>
                                <div class="mt-3 space-y-2">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="font-medium">{{ $application->employer }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Applied: {{ $application->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Move-in: {{ $application->desired_move_in->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-1 flex flex-col gap-2">
                                <button wire:click="approveApplication({{ $application->id }})" class="flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Approve
                                </button>
                                <button wire:click="rejectApplication({{ $application->id }})" class="flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Reject
                                </button>
                                <button wire:click="requestMoreInfo({{ $application->id }})" class="flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Request Info
                                </button>
                                <a href="/landlord/applications/{{ $application->id }}" class="flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-xl shadow-lg">
                <div class="w-20 h-20 rounded-full mx-auto mb-6 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                    <svg class="w-10 h-10" style="color: #FF7F00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">No applications found</h3>
                <p class="text-sm text-gray-500">Rental applications will appear here when tenants apply.</p>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
