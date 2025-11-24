<div>
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Documentation Oversight</h1>
        <p class="text-sm text-gray-600 mt-1">Verify seller, landlord, and supplier documentation</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-50 border-2 border-green-200 rounded-lg">
            <p class="text-sm font-semibold text-green-800">{{ session('message') }}</p>
        </div>
    @endif

    <!-- Tabs -->
    <div class="mb-6 border-b-2 border-gray-200">
        <div class="flex gap-4">
            <button 
                wire:click="setTab('properties')"
                class="px-4 py-3 text-sm font-semibold transition-all {{ $activeTab === 'properties' ? 'border-b-2 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}"
                style="{{ $activeTab === 'properties' ? 'border-color: #FF7F00;' : '' }}">
                <svg class="w-5 h-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Properties
            </button>
            <button 
                wire:click="setTab('materials')"
                class="px-4 py-3 text-sm font-semibold transition-all {{ $activeTab === 'materials' ? 'border-b-2 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}"
                style="{{ $activeTab === 'materials' ? 'border-color: #FF7F00;' : '' }}">
                <svg class="w-5 h-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
                Materials
            </button>
            <button 
                wire:click="setTab('users')"
                class="px-4 py-3 text-sm font-semibold transition-all {{ $activeTab === 'users' ? 'border-b-2 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}"
                style="{{ $activeTab === 'users' ? 'border-color: #FF7F00;' : '' }}">
                <svg class="w-5 h-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                Users
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="mb-6 bg-white rounded-xl shadow-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                <input wire:model.live="searchTerm" type="text" placeholder="Search..." class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
            </div>
            @if($activeTab !== 'users')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Verification Status</label>
                <select wire:model.live="statusFilter" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="verified">Verified</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            @endif
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Per Page</label>
                <select wire:model.live="perPage" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Content -->
    @if($activeTab === 'properties')
        <!-- Properties Tab -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Property</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIDA</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documents</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($properties as $property)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $property->title }}</div>
                                <div class="text-xs text-gray-500">{{ $property->city }}, {{ $property->state }}</div>
                                <div class="text-xs text-gray-500">TZS {{ number_format($property->price, 2) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $property->user->name ?? 'N/A' }}</div>
                                <div class="text-xs text-gray-500">{{ $property->user->email ?? 'N/A' }}</div>
                                <div class="text-xs text-gray-500">{{ $property->user->business_type ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $property->owner_nida ?? 'N/A' }}</div>
                                <div class="text-xs text-gray-500">{{ $property->owner_phone ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    @if($property->title_deed_document)
                                        <a href="{{ Storage::url($property->title_deed_document) }}" target="_blank" class="flex items-center gap-1 text-xs text-blue-600 hover:text-blue-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Title Deed
                                        </a>
                                    @endif
                                    @if($property->sales_agreement_document)
                                        <a href="{{ Storage::url($property->sales_agreement_document) }}" target="_blank" class="flex items-center gap-1 text-xs text-blue-600 hover:text-blue-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Sales Agreement
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($property->verification_status === 'pending')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                @elseif($property->verification_status === 'verified')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Verified</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="/admin/properties/{{ $property->id }}" class="px-3 py-1.5 text-xs font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                                        View
                                    </a>
                                    @if($property->verification_status === 'pending')
                                        <button wire:click="verifyProperty({{ $property->id }})" class="px-3 py-1.5 text-xs font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                                            Verify
                                        </button>
                                        <button wire:click="rejectProperty({{ $property->id }})" class="px-3 py-1.5 text-xs font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors">
                                            Reject
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                No properties found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $properties->links() }}
            </div>
        </div>

    @elseif($activeTab === 'materials')
        <!-- Materials Tab -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Supplier</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIDA</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documents</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($materials as $material)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $material->name }}</div>
                                <div class="text-xs text-gray-500">{{ $material->category }} - {{ $material->brand }}</div>
                                <div class="text-xs text-gray-500">TZS {{ number_format($material->price, 2) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $material->supplier_name ?? 'N/A' }}</div>
                                <div class="text-xs text-gray-500">SKU: {{ $material->sku }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $material->owner_nida ?? 'N/A' }}</div>
                                <div class="text-xs text-gray-500">{{ $material->owner_phone ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    @if($material->business_license_document)
                                        <a href="{{ Storage::url($material->business_license_document) }}" target="_blank" class="flex items-center gap-1 text-xs text-blue-600 hover:text-blue-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Business License
                                        </a>
                                    @endif
                                    @if($material->supplier_certificate)
                                        <a href="{{ Storage::url($material->supplier_certificate) }}" target="_blank" class="flex items-center gap-1 text-xs text-blue-600 hover:text-blue-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Supplier Certificate
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($material->verification_status === 'pending')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                @elseif($material->verification_status === 'verified')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Verified</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    @if($material->verification_status === 'pending')
                                        <button wire:click="verifyMaterial({{ $material->id }})" class="px-3 py-1.5 text-xs font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                                            Verify
                                        </button>
                                        <button wire:click="rejectMaterial({{ $material->id }})" class="px-3 py-1.5 text-xs font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors">
                                            Reject
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                No materials found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $materials->links() }}
            </div>
        </div>

    @else
        <!-- Users Tab -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Business Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Properties</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-white text-sm" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $user->user_type === 'seller' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $user->user_type === 'landlord' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $user->user_type === 'supplier' ? 'bg-green-100 text-green-800' : '' }}">
                                    {{ ucfirst($user->user_type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $user->business_type ?? 'Not specified' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $user->properties_count }} properties</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/admin/users/{{ $user->id }}" class="px-3 py-1.5 text-xs font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                                    View Details
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                No users found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $users->links() }}
            </div>
        </div>
    @endif
</div>
