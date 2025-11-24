<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-screen-xl mx-auto">
        <div class="mb-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-gray-900 font-bold text-2xl">Financing Inquiries</h1>
                    <p class="text-gray-600 text-sm">Manage and review financing applications</p>
                </div>
            </div>

        @if (session()->has('message'))
            <div class="mb-4 p-4 rounded-lg bg-green-50 border-2 border-green-300">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-green-800 font-semibold">{{ session('message') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium text-sm mb-2">Search</label>
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="search" 
                        placeholder="Search by name, email, phone, or property..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 text-gray-700 text-sm placeholder-gray-400 transition-all duration-200"
                        style="focus:ring-color: #FF7F00;"
                    >
                </div>
                <div>
                    <label class="block text-gray-700 font-medium text-sm mb-2">Status Filter</label>
                    <select 
                        wire:model.live="statusFilter"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 text-gray-700 text-sm transition-all duration-200"
                        style="focus:ring-color: #FF7F00;"
                    >
                        <option value="">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                        <option value="in_progress">In Progress</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Property</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Loan Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($inquiries as $inquiry)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $inquiry->full_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $inquiry->email }}</div>
                                    <div class="text-sm text-gray-500">{{ $inquiry->phone }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $inquiry->property->title ?? 'N/A' }}</div>
                            <div class="text-sm text-gray-500">TZS {{ number_format($inquiry->property->price ?? 0) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $inquiry->loanProduct->name ?? 'N/A' }}</div>
                            <div class="text-sm text-gray-500">{{ $inquiry->loanProduct->bank->name ?? 'N/A' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-gray-900">TZS {{ number_format($inquiry->loan_amount) }}</div>
                            <div class="text-sm text-gray-500">{{ $inquiry->loan_tenure_months }} months</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($inquiry->status === 'pending')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @elseif($inquiry->status === 'approved')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Approved
                                </span>
                            @elseif($inquiry->status === 'rejected')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Rejected
                                </span>
                            @else
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ ucfirst($inquiry->status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $inquiry->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button 
                                wire:click="viewInquiry({{ $inquiry->id }})"
                                class="px-4 py-2 rounded-lg text-white font-semibold transition-all duration-200 shadow-md hover:shadow-lg text-sm"
                                style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);"
                            >
                                View Details
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-gray-500 text-lg font-medium">No financing inquiries found</p>
                                <p class="text-gray-400 text-sm">Applications will appear here when submitted</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $inquiries->links() }}
        </div>
    </div>

    @if($selectedInquiry)
    <div class="fixed inset-0 z-50 overflow-y-auto" wire:click="closeModal">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div class="inline-block w-full max-w-4xl overflow-hidden text-left align-middle transition-all transform bg-white rounded-xl shadow-xl" wire:click.stop>
                <div class="px-6 py-4" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">Financing Inquiry Details</h3>
                        <button wire:click="closeModal" class="text-white hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-3">Applicant Information</h4>
                            <div class="space-y-2 text-sm">
                                <div><span class="font-medium text-gray-700">Name:</span> {{ $selectedInquiry->full_name }}</div>
                                <div><span class="font-medium text-gray-700">Email:</span> {{ $selectedInquiry->email }}</div>
                                <div><span class="font-medium text-gray-700">Phone:</span> {{ $selectedInquiry->phone }}</div>
                                <div><span class="font-medium text-gray-700">Monthly Income:</span> TZS {{ number_format($selectedInquiry->monthly_income) }}</div>
                                <div><span class="font-medium text-gray-700">Employment:</span> {{ $selectedInquiry->employment_status }}</div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-3">Property Information</h4>
                            <div class="space-y-2 text-sm">
                                <div><span class="font-medium text-gray-700">Property:</span> {{ $selectedInquiry->property->title ?? 'N/A' }}</div>
                                <div><span class="font-medium text-gray-700">Price:</span> TZS {{ number_format($selectedInquiry->property->price ?? 0) }}</div>
                                <div><span class="font-medium text-gray-700">Owner:</span> {{ $selectedInquiry->property->user->name ?? 'N/A' }}</div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-3">Loan Information</h4>
                            <div class="space-y-2 text-sm">
                                <div><span class="font-medium text-gray-700">Product:</span> {{ $selectedInquiry->loanProduct->name ?? 'N/A' }}</div>
                                <div><span class="font-medium text-gray-700">Bank:</span> {{ $selectedInquiry->loanProduct->bank->name ?? 'N/A' }}</div>
                                <div><span class="font-medium text-gray-700">Interest Rate:</span> {{ $selectedInquiry->loanProduct->interest_rate ?? 'N/A' }}%</div>
                                <div><span class="font-medium text-gray-700">Loan Amount:</span> TZS {{ number_format($selectedInquiry->loan_amount) }}</div>
                                <div><span class="font-medium text-gray-700">Tenure:</span> {{ $selectedInquiry->loan_tenure_months }} months ({{ $selectedInquiry->loan_tenure_months / 12 }} years)</div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-3">Status & Actions</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Update Status</label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <button wire:click="updateStatus('pending')" class="px-3 py-2 text-xs font-semibold rounded-lg {{ $selectedInquiry->status === 'pending' ? 'bg-yellow-600 text-white' : 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' }}">
                                            Pending
                                        </button>
                                        <button wire:click="updateStatus('in_progress')" class="px-3 py-2 text-xs font-semibold rounded-lg {{ $selectedInquiry->status === 'in_progress' ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-800 hover:bg-blue-200' }}">
                                            In Progress
                                        </button>
                                        <button wire:click="updateStatus('approved')" class="px-3 py-2 text-xs font-semibold rounded-lg {{ $selectedInquiry->status === 'approved' ? 'bg-green-600 text-white' : 'bg-green-100 text-green-800 hover:bg-green-200' }}">
                                            Approved
                                        </button>
                                        <button wire:click="updateStatus('rejected')" class="px-3 py-2 text-xs font-semibold rounded-lg {{ $selectedInquiry->status === 'rejected' ? 'bg-red-600 text-white' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                                            Rejected
                                        </button>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-600">
                                    <span class="font-medium">Submitted:</span> {{ $selectedInquiry->created_at->format('M d, Y g:i A') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($selectedInquiry->additional_info)
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="font-semibold text-gray-900 mb-2">Additional Information</h4>
                        <p class="text-sm text-gray-700">{{ $selectedInquiry->additional_info }}</p>
                    </div>
                    @endif

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="font-semibold text-gray-900 mb-3">Admin Notes</h4>
                        <textarea 
                            wire:model="adminNotes"
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Add internal notes about this inquiry..."
                        ></textarea>
                        <div class="mt-3 flex justify-end">
                            <button 
                                wire:click="saveNotes"
                                class="px-4 py-2 rounded-lg text-white font-semibold transition-all duration-200 shadow-md hover:shadow-lg text-sm"
                                style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);"
                            >
                                Save Notes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
