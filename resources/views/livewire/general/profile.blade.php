<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-gray-900 font-bold text-2xl md:text-3xl">Profile Settings</h1>
                <p class="text-gray-600 font-normal text-base mt-1">Manage your account information and preferences</p>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="text-center mb-6">
                    <div class="w-32 h-32 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="text-gray-900 font-semibold text-lg">{{ $name }}</h3>
                    <p class="text-gray-600 font-normal text-sm mt-1">{{ $email }}</p>
                    <button class="mt-4 px-4 py-2 rounded-lg text-white font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Change Photo
                    </button>
                </div>

                <div class="border-t-2 border-gray-100 pt-4">
                    <div class="space-y-4">
                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-gray-500 text-xs font-medium mb-1">Member Since</p>
                            <p class="text-gray-900 text-base font-semibold">{{ auth()->user()->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-gray-500 text-xs font-medium mb-1">Account Status</p>
                            <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-green-100 text-green-800 inline-block">Active</span>
                        </div>
                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-gray-500 text-xs font-medium mb-1">Email Verification</p>
                            @if(auth()->user()->email_verified_at)
                                <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-green-100 text-green-800 inline-block">Verified</span>
                            @else
                                <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 inline-block">Unverified</span>
                            @endif
                        </div>
                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-gray-500 text-xs font-medium mb-1">Account Type</p>
                            <p class="text-gray-900 text-base font-semibold">{{ ucfirst($user_type) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-gray-800 font-semibold text-xl">Personal Information</h2>
                            <p class="text-gray-500 text-sm">Update your personal details</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Full Name</label>
                            <input wire:model="name" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Email Address</label>
                            <input wire:model="email" type="email" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Phone Number</label>
                            <input wire:model="phone" type="tel" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Address</label>
                            <input wire:model="address" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                        </div>

                        @if(in_array($user_type, ['seller', 'landlord', 'supplier']))
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium text-sm mb-2">Business Type</label>
                            <select wire:model="business_type" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                                <option value="">Select Business Type</option>
                                @if($user_type === 'seller')
                                    <option value="Individual">Individual</option>
                                    <option value="Limited Company">Limited Company</option>
                                    <option value="Financial Institution">Financial Institution</option>
                                    <option value="Real Estate Agencies">Real Estate Agencies</option>
                                    <option value="Insolvency Practitioners">Insolvency Practitioners</option>
                                    <option value="Auctioneers">Auctioneers</option>
                                    <option value="Debt Recovery & Collection Agencies">Debt Recovery & Collection Agencies</option>
                                @elseif(in_array($user_type, ['landlord', 'supplier']))
                                    <option value="Individual">Individual</option>
                                    <option value="Limited Company">Limited Company</option>
                                @endif
                            </select>
                        </div>
                        @endif

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium text-sm mb-2">Bio</label>
                            <textarea wire:model="bio" rows="3" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700"></textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button wire:click="updateProfile" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-gray-800 font-semibold text-xl">Change Password</h2>
                            <p class="text-gray-500 text-sm">Update your account password</p>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Current Password</label>
                            <input wire:model="current_password" type="password" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">New Password</label>
                            <input wire:model="new_password" type="password" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium text-sm mb-2">Confirm New Password</label>
                            <input wire:model="confirm_password" type="password" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button wire:click="changePassword" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            Update Password
                        </button>
                    </div>
                </div>

                @if(in_array($user_type, ['seller', 'landlord', 'supplier', 'savanna']))
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-gray-800 font-semibold text-xl">KYC Documents</h2>
                                <p class="text-gray-500 text-sm">Know Your Customer verification</p>
                            </div>
                        </div>
                        <div>
                            @if(auth()->user()->kyc_status === 'pending')
                                <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending Review</span>
                            @elseif(auth()->user()->kyc_status === 'verified')
                                <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-green-100 text-green-800">Verified</span>
                            @elseif(auth()->user()->kyc_status === 'rejected')
                                <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-6 p-4 rounded-lg" style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(124, 58, 237, 0.1) 100%); border: 2px solid rgba(139, 92, 246, 0.2);">
                        <p class="text-sm font-semibold text-purple-900 mb-2">Business Type: {{ $business_type ?? 'Not specified' }}</p>
                        <p class="text-xs text-purple-700">Upload required documents for verification. All documents must be clear and valid.</p>
                    </div>

                    @php
                        $user = auth()->user();
                        $hasDocuments = $user->nida_document || $user->passport_document || $user->business_license || 
                                       $user->certificate_of_incorporation || $user->tax_clearance_certificate ||
                                       $user->memorandum_of_association || $user->articles_of_association ||
                                       $user->board_resolution || $user->proof_of_address || $user->bank_statement;
                    @endphp

                    @if($hasDocuments)
                    <div class="mb-6">
                        <h4 class="text-sm font-bold text-gray-900 mb-3">Uploaded Documents</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @if($user->nida_document)
                                <a href="{{ Storage::url($user->nida_document) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">NIDA Document</span>
                                </a>
                            @endif
                            @if($user->passport_document)
                                <a href="{{ Storage::url($user->passport_document) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Passport</span>
                                </a>
                            @endif
                            @if($user->business_license)
                                <a href="{{ Storage::url($user->business_license) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Business License</span>
                                </a>
                            @endif
                            @if($user->certificate_of_incorporation)
                                <a href="{{ Storage::url($user->certificate_of_incorporation) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Certificate of Incorporation</span>
                                </a>
                            @endif
                            @if($user->tax_clearance_certificate)
                                <a href="{{ Storage::url($user->tax_clearance_certificate) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Tax Clearance Certificate</span>
                                </a>
                            @endif
                            @if($user->memorandum_of_association)
                                <a href="{{ Storage::url($user->memorandum_of_association) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Memorandum of Association</span>
                                </a>
                            @endif
                            @if($user->articles_of_association)
                                <a href="{{ Storage::url($user->articles_of_association) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Articles of Association</span>
                                </a>
                            @endif
                            @if($user->board_resolution)
                                <a href="{{ Storage::url($user->board_resolution) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Board Resolution</span>
                                </a>
                            @endif
                            @if($user->proof_of_address)
                                <a href="{{ Storage::url($user->proof_of_address) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Proof of Address</span>
                                </a>
                            @endif
                            @if($user->bank_statement)
                                <a href="{{ Storage::url($user->bank_statement) }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg border-2 border-green-100 bg-green-50 hover:border-green-300 transition-all">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-green-900">Bank Statement</span>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endif

                    <form wire:submit.prevent="uploadKycDocuments">
                        <h4 class="text-sm font-bold text-gray-900 mb-4">Upload New Documents</h4>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 font-medium text-sm mb-2">NIDA Document <span class="text-red-500">*</span></label>
                                <input wire:model="nida_document" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, JPG, PNG (Max 5MB)</p>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium text-sm mb-2">Passport</label>
                                <input wire:model="passport_document" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, JPG, PNG (Max 5MB)</p>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium text-sm mb-2">Proof of Address <span class="text-red-500">*</span></label>
                                <input wire:model="proof_of_address" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, JPG, PNG (Max 5MB)</p>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium text-sm mb-2">Bank Statement <span class="text-red-500">*</span></label>
                                <input wire:model="bank_statement" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, JPG, PNG (Max 5MB)</p>
                            </div>

                            @if($business_type === 'Limited Company' || in_array($business_type, ['Financial Institution', 'Real Estate Agencies', 'Debt Recovery & Collection Agencies']))
                            <div class="border-t-2 border-gray-100 pt-4">
                                <h5 class="text-sm font-semibold text-gray-800 mb-4">Additional Company Documents</h5>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-gray-700 font-medium text-sm mb-2">Business License <span class="text-red-500">*</span></label>
                                        <input wire:model="business_license" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 font-medium text-sm mb-2">Certificate of Incorporation <span class="text-red-500">*</span></label>
                                        <input wire:model="certificate_of_incorporation" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 font-medium text-sm mb-2">Tax Clearance Certificate</label>
                                        <input wire:model="tax_clearance_certificate" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 font-medium text-sm mb-2">Memorandum of Association</label>
                                        <input wire:model="memorandum_of_association" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 font-medium text-sm mb-2">Articles of Association</label>
                                        <input wire:model="articles_of_association" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 font-medium text-sm mb-2">Board Resolution</label>
                                        <input wire:model="board_resolution" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);">
                                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                Upload Documents
                            </button>
                        </div>
                    </form>

                    @if(auth()->user()->kyc_notes)
                    <div class="mt-6 p-4 rounded-lg border-2 border-yellow-200" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.1) 0%, rgba(245, 158, 11, 0.1) 100%);">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-yellow-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-yellow-900 mb-1">Admin Feedback:</p>
                                <p class="text-sm text-yellow-800">{{ auth()->user()->kyc_notes }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
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
</div>
