<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <a href="/system/admin/properties" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                    <h1 class="text-3xl font-bold text-gray-900">Property Review</h1>
                </div>
                <p class="text-base text-gray-600 ml-9">Review ownership documents and verify property details</p>
            </div>
            <div class="flex items-center gap-3">
                @if($property->verification_status === 'pending')
                    <button wire:click="verifyProperty" class="flex items-center gap-2 text-white px-4 py-2.5 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Verify & Publish
                    </button>
                    <button wire:click="rejectProperty" class="flex items-center gap-2 text-white px-4 py-2.5 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Reject
                    </button>
                @elseif($property->verification_status === 'verified')
                    <button wire:click="pullFromListing" class="flex items-center gap-2 text-white px-4 py-2.5 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Pull from Listing
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Property Information</h2>
                            <p class="text-sm text-gray-500">Basic property details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Property Title</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $property->title }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Listing Type</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ ucfirst($property->listing_type) }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Property Type</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ ucfirst($property->property_type ?? 'N/A') }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Price</label>
                            <p class="text-base font-bold text-gray-900 mt-1">TZS {{ number_format($property->price) }}</p>
                        </div>

                        <div class="col-span-2 p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Address</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $property->address }}</p>
                        </div>

                        @if($property->description)
                            <div class="col-span-2 p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Description</label>
                                <p class="text-sm text-gray-700 mt-1">{{ $property->description }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Owner Information</h2>
                            <p class="text-sm text-gray-500">Property owner details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Owner Name</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $property->user->name ?? 'N/A' }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Owner Email</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $property->owner_email ?? $property->user->email ?? 'N/A' }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Owner Phone</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $property->owner_phone ?? 'N/A' }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Listed On</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $property->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Ownership Proof Documents</h2>
                            <p class="text-sm text-gray-500">Verify ownership documentation</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="p-4 rounded-lg border-2 {{ $property->owner_nida ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50' }}">
                            <div class="flex items-center justify-between">
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">NIDA Number</label>
                                    <p class="text-base font-bold text-gray-900 mt-1">{{ $property->owner_nida ?? 'Not Provided' }}</p>
                                </div>
                                @if($property->owner_nida)
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center bg-green-600">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center bg-red-600">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="p-4 rounded-lg border-2 {{ $property->title_deed_document ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50' }}">
                            <div class="flex items-center justify-between">
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Title Deed Document</label>
                                    @if($property->title_deed_document)
                                        <p class="text-sm text-gray-700 mt-1">{{ basename($property->title_deed_document) }}</p>
                                        <a href="{{ asset('storage/' . $property->title_deed_document) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-semibold mt-1 inline-block">
                                            View Document →
                                        </a>
                                    @else
                                        <p class="text-base font-bold text-gray-900 mt-1">Not Uploaded</p>
                                    @endif
                                </div>
                                @if($property->title_deed_document)
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center bg-green-600">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center bg-red-600">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="p-4 rounded-lg border-2 {{ $property->sales_agreement_document ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50' }}">
                            <div class="flex items-center justify-between">
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Sales Agreement Document</label>
                                    @if($property->sales_agreement_document)
                                        <p class="text-sm text-gray-700 mt-1">{{ basename($property->sales_agreement_document) }}</p>
                                        <a href="{{ asset('storage/' . $property->sales_agreement_document) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-semibold mt-1 inline-block">
                                            View Document →
                                        </a>
                                    @else
                                        <p class="text-base font-bold text-gray-900 mt-1">Not Uploaded</p>
                                    @endif
                                </div>
                                @if($property->sales_agreement_document)
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center bg-green-600">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center bg-red-600">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Verification Notes</h2>
                            <p class="text-sm text-gray-500">Add notes about this property</p>
                        </div>
                    </div>

                    <div>
                        <textarea 
                            wire:model="property.verification_notes"
                            rows="4"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                            placeholder="Add verification notes, reasons for rejection, or any additional comments..."></textarea>
                        <button wire:click="updateVerificationNotes($wire.property.verification_notes)" class="mt-3 flex items-center gap-2 text-white px-4 py-2 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Save Notes
                        </button>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Verification Status</h3>
                    
                    <div class="space-y-4">
                        <div class="p-4 rounded-lg" style="background: linear-gradient(135deg, 
                            @if($property->verification_status === 'verified') rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%); border: 2px solid rgba(16, 185, 129, 0.3)
                            @elseif($property->verification_status === 'pending') rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.1) 100%); border: 2px solid rgba(245, 158, 11, 0.3)
                            @else rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%); border: 2px solid rgba(239, 68, 68, 0.3)
                            @endif;">
                            <p class="text-xs text-gray-600 font-medium mb-1">Current Status</p>
                            <p class="text-2xl font-bold 
                                @if($property->verification_status === 'verified') text-green-600
                                @elseif($property->verification_status === 'pending') text-yellow-600
                                @else text-red-600
                                @endif">
                                {{ ucfirst($property->verification_status) }}
                            </p>
                        </div>

                        <div class="p-4 rounded-lg bg-gray-50 border-2 border-gray-200">
                            <p class="text-xs text-gray-600 font-medium mb-1">Property Status</p>
                            <p class="text-lg font-bold text-gray-900">{{ $property->status }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Document Checklist</h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center {{ $property->owner_nida ? 'bg-green-600' : 'bg-gray-300' }}">
                                @if($property->owner_nida)
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @endif
                            </div>
                            <span class="text-sm font-medium text-gray-700">NIDA Number Provided</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center {{ $property->title_deed_document ? 'bg-green-600' : 'bg-gray-300' }}">
                                @if($property->title_deed_document)
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @endif
                            </div>
                            <span class="text-sm font-medium text-gray-700">Title Deed Uploaded</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center {{ $property->sales_agreement_document ? 'bg-green-600' : 'bg-gray-300' }}">
                                @if($property->sales_agreement_document)
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @endif
                            </div>
                            <span class="text-sm font-medium text-gray-700">Sales Agreement Uploaded</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center {{ $property->owner_phone ? 'bg-green-600' : 'bg-gray-300' }}">
                                @if($property->owner_phone)
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @endif
                            </div>
                            <span class="text-sm font-medium text-gray-700">Contact Info Provided</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Quick Actions</h3>
                    
                    <div class="space-y-3">
                        <a href="mailto:{{ $property->owner_email ?? $property->user->email }}" class="w-full flex items-center justify-center gap-2 text-white px-4 py-3 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Email Owner
                        </a>

                        @if($property->owner_phone)
                            <a href="tel:{{ $property->owner_phone }}" class="w-full flex items-center justify-center gap-2 text-white px-4 py-3 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Call Owner
                            </a>
                        @endif

                        <a href="/admin/users/{{ $property->user_id }}" class="w-full flex items-center justify-center gap-2 text-white px-4 py-3 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            View Owner Profile
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Property Timeline</h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 rounded-full mt-2" style="background: #FF7F00;"></div>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-900">Property Listed</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $property->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 rounded-full mt-2 {{ $property->verification_status === 'verified' ? 'bg-green-500' : ($property->verification_status === 'pending' ? 'bg-yellow-500' : 'bg-red-500') }}"></div>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-900">Verification Status</p>
                                <p class="text-sm text-gray-600 mt-1">{{ ucfirst($property->verification_status) }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 rounded-full mt-2" style="background: #3B82F6;"></div>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-900">Last Updated</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $property->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 px-6 py-4 rounded-xl text-white font-semibold shadow-xl z-50" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
            {{ session('message') }}
        </div>
    @endif
</div>
