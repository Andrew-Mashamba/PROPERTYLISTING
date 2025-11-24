<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div>
            <h1 class="text-lg font-semibold text-gray-900">Security Monitoring</h1>
            <p class="text-sm text-gray-600">Monitor system security and threats</p>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            <div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search logs..." 
                       class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="type" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="">All Types</option>
                    <option value="failed_login">Failed Login</option>
                    <option value="suspicious_activity">Suspicious Activity</option>
                    <option value="unauthorized_access">Unauthorized Access</option>
                </select>
            </div>
            <div>
                <select wire:model.live="perPage" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="20">20 per page</option>
                    <option value="50">50 per page</option>
                    <option value="100">100 per page</option>
                </select>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Alerts</p>
                        <p class="text-xl font-bold text-gray-900">{{ $stats['total_alerts'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-alt text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Critical</p>
                        <p class="text-xl font-bold text-red-600">{{ $stats['critical'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Blocked IPs</p>
                        <p class="text-xl font-bold text-orange-600">{{ $stats['blocked_ips'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-ban text-orange-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Failed Logins</p>
                        <p class="text-xl font-bold text-yellow-600">{{ $stats['failed_logins'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user-times text-yellow-600"></i>
                    </div>
                </div>
            </div>
        </div>

        @if($securityLogs->count() > 0)
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Type</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">User</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">IP Address</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Severity</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Description</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Timestamp</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($securityLogs as $log)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                            {{ ucfirst(str_replace('_', ' ', $log->type)) }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-sm text-gray-900">{{ $log->user }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-xs font-mono text-gray-900">{{ $log->ip }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full
                                            @if($log->severity === 'critical') bg-red-100 text-red-800
                                            @elseif($log->severity === 'high') bg-orange-100 text-orange-800
                                            @elseif($log->severity === 'medium') bg-yellow-100 text-yellow-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst($log->severity) }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-xs text-gray-600">{{ $log->description }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-xs text-gray-600">{{ \Carbon\Carbon::parse($log->timestamp)->format('M d, Y H:i') }}</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <button wire:click="blockIp('{{ $log->ip }}')" class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                                            <i class="fas fa-ban"></i> Block
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $securityLogs->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-shield-alt text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No security logs found</h3>
                <p class="mt-1 text-sm text-gray-500">System is secure.</p>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
