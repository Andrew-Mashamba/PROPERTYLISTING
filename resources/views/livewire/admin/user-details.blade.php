<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <a href="/system/admin/users" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                    <h1 class="text-3xl font-bold text-gray-900">User Details</h1>
                </div>
                <p class="text-base text-gray-600 ml-9">Complete user information and account management</p>
            </div>
            <div class="flex items-center gap-3">
                <button wire:click="suspendUser" class="flex items-center gap-2 text-white px-4 py-2.5 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                    Suspend User
                </button>
                <button wire:click="deleteUser" class="flex items-center gap-2 text-white px-4 py-2.5 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Delete User
                </button>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">User Information</h2>
                            <p class="text-sm text-gray-500">Basic account details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Full Name</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $user->name }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Email Address</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $user->email }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">User Type</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ ucfirst($user->user_type) }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Email Status</label>
                            <p class="text-base font-bold mt-1 {{ $user->email_verified_at ? 'text-green-600' : 'text-yellow-600' }}">
                                {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                            </p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Account Created</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $user->created_at->format('M d, Y') }}</p>
                        </div>

                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Last Activity</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $user->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Properties</h2>
                            <p class="text-sm text-gray-500">User's property listings</p>
                        </div>
                    </div>

                    @if($user->properties->count() > 0)
                        <div class="space-y-3">
                            @foreach($user->properties as $property)
                                <div class="p-4 rounded-lg border-2 border-gray-100 hover:border-orange-200 transition-all">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-base font-bold text-gray-900">{{ $property->title }}</p>
                                            <p class="text-sm text-gray-500 mt-1">{{ ucfirst($property->listing_type) }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold" style="color: #FF7F00;">TZS {{ number_format($property->price) }}</p>
                                            <span class="px-3 py-1 text-xs font-bold rounded-full text-white shadow-sm mt-1 inline-block
                                                @if($property->status === 'available') {{ 'style=background:linear-gradient(135deg,#10B981 0%,#059669 100%);' }}
                                                @elseif($property->status === 'sold') {{ 'style=background:linear-gradient(135deg,#EF4444 0%,#DC2626 100%);' }}
                                                @else {{ 'style=background:linear-gradient(135deg,#F59E0B 0%,#D97706 100%);' }}
                                                @endif">
                                                {{ ucfirst($property->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <p class="text-gray-500 font-medium">No properties listed</p>
                        </div>
                    @endif
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Account Activity</h2>
                            <p class="text-sm text-gray-500">Recent account events</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-start gap-3 p-4 rounded-lg bg-gray-50">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900">Account Created</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $user->created_at->format('M d, Y \a\t h:i A') }}</p>
                            </div>
                        </div>

                        @if($user->email_verified_at)
                            <div class="flex items-start gap-3 p-4 rounded-lg bg-gray-50">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Email Verified</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $user->email_verified_at->format('M d, Y \a\t h:i A') }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="flex items-start gap-3 p-4 rounded-lg bg-gray-50">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900">Last Activity</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $user->updated_at->format('M d, Y \a\t h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KYC Documents Section -->
                @if(in_array($user->user_type, ['seller', 'landlord', 'supplier']))
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">KYC Documents</h2>
                                <p class="text-sm text-gray-500">Know Your Customer verification</p>
                            </div>
                        </div>
                        <div>
                            @if($user->kyc_status === 'pending')
                                <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending Review</span>
                            @elseif($user->kyc_status === 'verified')
                                <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-green-100 text-green-800">Verified</span>
                            @else
                                <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-6 p-4 rounded-lg bg-purple-50 border-2 border-purple-100">
                        <p class="text-sm font-semibold text-purple-900 mb-2">Business Type: {{ $user->business_type ?? 'Not specified' }}</p>
                        <p class="text-xs text-purple-700">Required documents vary based on business type</p>
                    </div>

                    <!-- Existing Documents -->
                    <div class="mb-6">
                        <h3 class="text-sm font-bold text-gray-900 mb-3">Uploaded Documents</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @if($user->nida_document)
                                <a href="{{ Storage::url($user->nida_document) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">NIDA Document</span>
                                </a>
                            @endif
                            @if($user->passport_document)
                                <a href="{{ Storage::url($user->passport_document) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Passport</span>
                                </a>
                            @endif
                            @if($user->business_license)
                                <a href="{{ Storage::url($user->business_license) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Business License</span>
                                </a>
                            @endif
                            @if($user->certificate_of_incorporation)
                                <a href="{{ Storage::url($user->certificate_of_incorporation) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Certificate of Incorporation</span>
                                </a>
                            @endif
                            @if($user->tax_clearance_certificate)
                                <a href="{{ Storage::url($user->tax_clearance_certificate) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Tax Clearance Certificate</span>
                                </a>
                            @endif
                            @if($user->memorandum_of_association)
                                <a href="{{ Storage::url($user->memorandum_of_association) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Memorandum of Association</span>
                                </a>
                            @endif
                            @if($user->articles_of_association)
                                <a href="{{ Storage::url($user->articles_of_association) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Articles of Association</span>
                                </a>
                            @endif
                            @if($user->board_resolution)
                                <a href="{{ Storage::url($user->board_resolution) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Board Resolution</span>
                                </a>
                            @endif
                            @if($user->proof_of_address)
                                <a href="{{ Storage::url($user->proof_of_address) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Proof of Address</span>
                                </a>
                            @endif
                            @if($user->bank_statement)
                                <a href="{{ Storage::url($user->bank_statement) }}" target="_blank" class="flex items-center gap-2 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Bank Statement</span>
                                </a>
                            @endif
                        </div>
                        @if(!$user->nida_document && !$user->passport_document && !$user->business_license && !$user->certificate_of_incorporation)
                            <p class="text-sm text-gray-500 text-center py-4">No documents uploaded yet</p>
                        @endif
                    </div>

                    <!-- Admin Actions -->
                    @if($user->kyc_status === 'pending')
                    <div class="border-t-2 border-gray-100 pt-6">
                        <h3 class="text-sm font-bold text-gray-900 mb-4">Review & Verify</h3>
                        
                        <div class="mb-4">
                            <label class="block text-xs font-medium text-gray-700 mb-2">Admin Notes (Optional)</label>
                            <textarea wire:model="kyc_notes" rows="3" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Add notes about verification..."></textarea>
                        </div>

                        <div class="flex items-center gap-3">
                            <button type="button" wire:click="verifyKyc" class="flex items-center gap-2 text-white px-4 py-2.5 rounded-lg font-semibold text-sm hover:shadow-lg transition-all" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Verify KYC
                            </button>

                            <button type="button" wire:click="rejectKyc" class="flex items-center gap-2 text-white px-4 py-2.5 rounded-lg font-semibold text-sm hover:shadow-lg transition-all" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Reject KYC
                            </button>
                        </div>
                    </div>
                    @endif

                    @if($user->kyc_notes)
                    <div class="mt-4 p-4 rounded-lg bg-yellow-50 border-2 border-yellow-200">
                        <p class="text-xs font-semibold text-yellow-900 mb-1">Admin Notes:</p>
                        <p class="text-sm text-yellow-800">{{ $user->kyc_notes }}</p>
                    </div>
                    @endif
                </div>
                @endif
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Account Statistics</h3>
                    
                    <div class="space-y-4">
                        <div class="p-4 rounded-lg" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%); border: 2px solid rgba(255, 127, 0, 0.2);">
                            <p class="text-xs text-gray-600 font-medium mb-1">Total Properties</p>
                            <p class="text-2xl font-bold" style="color: #FF7F00;">{{ $user->properties->count() }}</p>
                        </div>

                        <div class="p-4 rounded-lg" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(5, 150, 105, 0.05) 100%); border: 2px solid rgba(16, 185, 129, 0.2);">
                            <p class="text-xs text-gray-600 font-medium mb-1">Available</p>
                            <p class="text-2xl font-bold text-green-600">{{ $user->properties->where('status', 'available')->count() }}</p>
                        </div>

                        <div class="p-4 rounded-lg" style="background: linear-gradient(135deg, rgba(239, 68, 68, 0.05) 0%, rgba(220, 38, 38, 0.05) 100%); border: 2px solid rgba(239, 68, 68, 0.2);">
                            <p class="text-xs text-gray-600 font-medium mb-1">Sold</p>
                            <p class="text-2xl font-bold text-red-600">{{ $user->properties->where('status', 'sold')->count() }}</p>
                        </div>

                        <div class="p-4 rounded-lg" style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.05) 0%, rgba(217, 119, 6, 0.05) 100%); border: 2px solid rgba(245, 158, 11, 0.2);">
                            <p class="text-xs text-gray-600 font-medium mb-1">Pending</p>
                            <p class="text-2xl font-bold text-yellow-600">{{ $user->properties->where('status', 'pending')->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Quick Actions</h3>
                    
                    <div class="space-y-3">
                        @if(!$user->email_verified_at)
                            <button wire:click="verifyEmail" class="w-full flex items-center justify-center gap-2 text-white px-4 py-3 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Verify Email
                            </button>
                        @endif

                        <button wire:click="resetPassword" class="w-full flex items-center justify-center gap-2 text-white px-4 py-3 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            Reset Password
                        </button>

                        <a href="mailto:{{ $user->email }}" class="w-full flex items-center justify-center gap-2 text-white px-4 py-3 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Send Email
                        </a>

                        <button wire:click="activateUser" class="w-full flex items-center justify-center gap-2 text-white px-4 py-3 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Activate Account
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Account Timeline</h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 rounded-full mt-2" style="background: #FF7F00;"></div>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-900">Member for</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 rounded-full mt-2" style="background: #10B981;"></div>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-900">Properties Listed</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $user->properties->count() }} total</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 rounded-full mt-2" style="background: #3B82F6;"></div>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-900">Last Updated</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $user->updated_at->diffForHumans() }}</p>
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
