<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-6 py-6">
        <h1 class="text-3xl font-bold text-gray-900">User Management</h1>
        <p class="text-base text-gray-600 mt-1">Manage system users and permissions</p>
    </div>

    <div class="p-6 rounded-xl mb-6 mx-6 mt-6" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 69, 0, 0.05) 100%); border: 3px solid #FF7F00;">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Search Users</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search by name or email..." 
                       class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Filter by Role</label>
                <select wire:model.live="role" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <option value="">All Roles</option>
                    <option value="savanna">Savanna</option>
                    <option value="landlord">Landlord</option>
                    <option value="supplier">Supplier</option>
                    <option value="seller">Seller</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Filter by Status</label>
                <select wire:model.live="status" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="suspended">Suspended</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Per Page</label>
                <select wire:model.live="perPage" class="w-full px-4 py-2.5 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                    <option value="15">15 per page</option>
                    <option value="30">30 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>
    </div>

    <div class="px-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Total Users</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['total_users'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Active Users</p>
                        <p class="text-3xl font-bold text-green-600">{{ $stats['active_users'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Suspended</p>
                        <p class="text-3xl font-bold text-red-600">{{ $stats['suspended_users'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">New This Month</p>
                        <p class="text-3xl font-bold" style="color: #FF7F00;">{{ $stats['new_this_month'] }}</p>
                    </div>
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($users->count() > 0)
        <div class="px-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($users as $user)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-white text-lg" style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-base font-bold text-gray-900">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-500 uppercase">Role</span>
                                <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg
                                    @if($user->user_type === 'savanna') {{ 'style=background:linear-gradient(135deg,#8B5CF6 0%,#6D28D9 100%);' }}
                                    @elseif($user->user_type === 'landlord') {{ 'style=background:linear-gradient(135deg,#3B82F6 0%,#1D4ED8 100%);' }}
                                    @elseif($user->user_type === 'supplier') {{ 'style=background:linear-gradient(135deg,#F59E0B 0%,#D97706 100%);' }}
                                    @elseif($user->user_type === 'seller') {{ 'style=background:linear-gradient(135deg,#10B981 0%,#059669 100%);' }}
                                    @endif">
                                    {{ ucfirst($user->user_type) }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-500 uppercase">Status</span>
                                <span class="px-3 py-1.5 text-xs font-bold rounded-full text-white shadow-lg" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                    Active
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-500 uppercase">Properties</span>
                                <span class="text-sm font-bold text-gray-900">{{ $user->properties->count() }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-500 uppercase">Email Status</span>
                                <span class="text-xs font-medium {{ $user->email_verified_at ? 'text-green-600' : 'text-yellow-600' }}">
                                    {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                                </span>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex items-center justify-between mb-3">
                                <div>
                                    <p class="text-xs text-gray-500">Joined</p>
                                    <p class="text-sm font-semibold text-gray-900">{{ $user->created_at->format('M d, Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Last Active</p>
                                    <p class="text-sm font-semibold text-gray-900">{{ $user->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-2">
                                <a href="/admin/users/{{ $user->id }}" class="flex items-center justify-center gap-1 text-white px-3 py-2 rounded-lg font-semibold text-xs hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View
                                </a>
                                <button wire:click="suspendUser({{ $user->id }})" class="flex items-center justify-center gap-1 text-white px-3 py-2 rounded-lg font-semibold text-xs hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                    </svg>
                                    Ban
                                </button>
                                <button wire:click="deleteUser({{ $user->id }})" class="flex items-center justify-center gap-1 text-white px-3 py-2 rounded-lg font-semibold text-xs hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="px-6 pb-6">
            {{ $users->links() }}
        </div>
    @else
        <div class="mx-6 mb-6">
            <div class="text-center py-16 bg-white rounded-xl shadow-lg">
                <div class="w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%);">
                    <svg class="w-10 h-10" style="color: #FF7F00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">No Users Found</h3>
                <p class="text-gray-500">No users match your search criteria. Try adjusting your filters.</p>
            </div>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 px-6 py-4 rounded-xl text-white font-semibold shadow-xl z-50" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
            {{ session('message') }}
        </div>
    @endif
</div>
