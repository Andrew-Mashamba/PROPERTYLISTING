<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Backup Management</h1>
                <p class="text-sm text-gray-600">Manage database backups and restore points</p>
            </div>
            <button wire:click="createBackup" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-database mr-1"></i> Create Backup
            </button>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Backups</p>
                        <p class="text-xl font-bold text-gray-900">{{ $stats['total_backups'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-database text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Total Size</p>
                        <p class="text-xl font-bold text-orange-600">{{ $stats['total_size'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hdd text-orange-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Last Backup</p>
                        <p class="text-xl font-bold text-green-600">{{ $stats['last_backup'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-green-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Next Scheduled</p>
                        <p class="text-sm font-bold text-purple-600">{{ $stats['next_scheduled'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-purple-600"></i>
                    </div>
                </div>
            </div>
        </div>

        @if($backups && count($backups) > 0)
            <div class="grid grid-cols-1 gap-3">
                @foreach($backups as $backup)
                    <div class="bg-white rounded-lg border border-gray-200 p-3 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <i class="fas fa-file-archive text-gray-400"></i>
                                    <h3 class="font-medium text-gray-900 text-sm">{{ $backup->name }}</h3>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        @if($backup->type === 'Full Backup') bg-blue-100 text-blue-800
                                        @else bg-green-100 text-green-800
                                        @endif">
                                        {{ $backup->type }}
                                    </span>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                        {{ ucfirst($backup->status) }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-4 text-xs text-gray-600">
                                    <span><i class="fas fa-hdd w-3"></i> {{ $backup->size }}</span>
                                    <span><i class="fas fa-calendar w-3"></i> {{ \Carbon\Carbon::parse($backup->created_at)->format('M d, Y H:i') }}</span>
                                    <span><i class="fas fa-clock w-3"></i> {{ \Carbon\Carbon::parse($backup->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-1">
                                <button wire:click="downloadBackup({{ $backup->id }})" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-download"></i> Download
                                </button>
                                <button wire:click="restoreBackup({{ $backup->id }})" class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                                    <i class="fas fa-undo"></i> Restore
                                </button>
                                <button wire:click="deleteBackup({{ $backup->id }})" class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-database text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No backups found</h3>
                <p class="mt-1 text-sm text-gray-500">Create your first backup to secure your data.</p>
                <div class="mt-6">
                    <button wire:click="createBackup" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700">
                        <i class="fas fa-database mr-1"></i> Create Backup
                    </button>
                </div>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
