<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('landlord.tenant-screening') }}" class="p-2 rounded-lg hover:bg-gray-100 transition-all duration-300">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Application Details</h1>
                    <p class="text-sm text-gray-600 mt-1">Review tenant application information</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                @if($application->status === 'pending')
                    <span class="px-4 py-2 text-sm font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);">
                        Pending Review
                    </span>
                @elseif($application->status === 'under_review')
                    <span class="px-4 py-2 text-sm font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                        Under Review
                    </span>
                @elseif($application->status === 'approved')
                    <span class="px-4 py-2 text-sm font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                        Approved
                    </span>
                @else
                    <span class="px-4 py-2 text-sm font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                        Rejected
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="p-6 max-w-7xl mx-auto">
        @if (session()->has('message'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-sm">
                {{ session('message') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Applicant Information</h2>
                            <p class="text-sm text-gray-600">Personal and contact details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Full Name</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $application->applicant_name }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Email Address</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $application->email }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Phone Number</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $application->phone }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Desired Move-in Date</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $application->desired_move_in->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Employment & Financial</h2>
                            <p class="text-sm text-gray-600">Income and employment verification</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-lg border-2 border-orange-100" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%);">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Monthly Income</label>
                            <p class="text-2xl font-bold mt-1" style="color: #FF7F00;">TZS {{ number_format($application->monthly_income) }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-blue-100 bg-blue-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Employment Status</label>
                            <p class="text-base font-bold text-blue-900 mt-1">{{ $application->employment_status }}</p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50 md:col-span-2">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Employer / Business</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $application->employer }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Additional Information</h2>
                            <p class="text-sm text-gray-600">Credit score and references</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-lg border-2 border-green-100 bg-green-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Credit Score</label>
                            <p class="text-2xl font-bold mt-1 @if($application->credit_score >= 700) text-green-600 @elseif($application->credit_score >= 600) text-yellow-600 @else text-red-600 @endif">
                                {{ $application->credit_score ?? 'N/A' }}
                            </p>
                        </div>
                        <div class="p-4 rounded-lg border-2 border-purple-100 bg-purple-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">References</label>
                            <p class="text-2xl font-bold text-purple-700 mt-1">{{ $application->references }}</p>
                        </div>
                    </div>

                    @if($application->message)
                        <div class="mt-4 p-4 rounded-lg border-2 border-gray-100 bg-gray-50">
                            <label class="text-xs font-semibold text-gray-500 uppercase">Applicant Message</label>
                            <p class="text-sm text-gray-700 mt-2 leading-relaxed">{{ $application->message }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                            <svg class="w-5 h-5" style="color: #FF7F00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900">Property Details</h3>
                    </div>
                    
                    <div class="space-y-3">
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Property</label>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $application->property->title }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Address</label>
                            <p class="text-sm text-gray-700 mt-1">{{ $application->property->address }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Monthly Rent</label>
                            <p class="text-lg font-bold mt-1" style="color: #FF7F00;">TZS {{ number_format($application->property->price) }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Application Timeline</h3>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 rounded-full mt-2" style="background: #10B981;"></div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">Application Submitted</p>
                                <p class="text-xs text-gray-600">{{ $application->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                        @if($application->updated_at != $application->created_at)
                            <div class="flex items-start gap-3">
                                <div class="w-2 h-2 rounded-full mt-2" style="background: #3B82F6;"></div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Last Updated</p>
                                    <p class="text-xs text-gray-600">{{ $application->updated_at->format('M d, Y h:i A') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Actions</h3>
                    <div class="space-y-3">
                        @if($application->status !== 'approved')
                            <button wire:click="approveApplication" class="w-full flex items-center justify-center gap-2 px-4 py-3 text-sm font-bold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Approve Application
                            </button>
                        @endif

                        @if($application->status !== 'rejected')
                            <button wire:click="rejectApplication" class="w-full flex items-center justify-center gap-2 px-4 py-3 text-sm font-bold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Reject Application
                            </button>
                        @endif

                        @if($application->status === 'pending')
                            <button wire:click="setUnderReview" class="w-full flex items-center justify-center gap-2 px-4 py-3 text-sm font-bold rounded-lg text-white shadow-lg hover:shadow-xl transition-all duration-300" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Mark Under Review
                            </button>
                        @endif

                        <a href="mailto:{{ $application->email }}" class="w-full flex items-center justify-center gap-2 px-4 py-3 text-sm font-bold rounded-lg transition-all duration-300" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%); color: #FF7F00; border: 2px solid #FF7F00;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Contact Applicant
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
