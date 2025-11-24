<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div>
            <h1 class="text-lg font-semibold text-gray-900">System Reports</h1>
            <p class="text-sm text-gray-600">Generate and export system reports</p>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            <div>
                <select wire:model.live="reportType" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="users">User Activity</option>
                    <option value="financial">Financial Summary</option>
                    <option value="properties">Property Performance</option>
                    <option value="system">System Health</option>
                </select>
            </div>
            <div>
                <select wire:model.live="dateRange" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    <option value="7">Last 7 Days</option>
                    <option value="30">Last 30 Days</option>
                    <option value="90">Last 90 Days</option>
                    <option value="365">Last Year</option>
                </select>
            </div>
            <div>
                <button wire:click="generateReport" class="w-full bg-orange-500 hover:bg-orange-600 text-white px-2 py-1.5 rounded text-sm font-medium transition-colors">
                    <i class="fas fa-file-alt mr-1"></i> Generate Report
                </button>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            @foreach($reports as $report)
                <div class="bg-white rounded-lg border border-gray-200 p-3 hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between mb-2">
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 text-sm">{{ $report['name'] }}</h3>
                            <p class="text-xs text-gray-600 mt-1">{{ $report['description'] }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium rounded-full
                            @if($report['type'] === 'users') bg-blue-100 text-blue-800
                            @elseif($report['type'] === 'financial') bg-green-100 text-green-800
                            @elseif($report['type'] === 'properties') bg-orange-100 text-orange-800
                            @else bg-purple-100 text-purple-800
                            @endif">
                            {{ ucfirst($report['type']) }}
                        </span>
                    </div>

                    <div class="bg-gray-50 rounded p-2 mb-2">
                        <p class="text-xs text-gray-600">Last Generated</p>
                        <p class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($report['last_generated'])->diffForHumans() }}</p>
                    </div>

                    <div class="grid grid-cols-3 gap-1">
                        <button wire:click="generateReport" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                            <i class="fas fa-sync"></i> Generate
                        </button>
                        <button wire:click="exportReport('pdf')" class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                            <i class="fas fa-file-pdf"></i> PDF
                        </button>
                        <button wire:click="exportReport('excel')" class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                            <i class="fas fa-file-excel"></i> Excel
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
