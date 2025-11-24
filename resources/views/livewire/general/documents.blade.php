<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Documents</h1>
                <p class="text-sm text-gray-600">Manage your files and documents</p>
            </div>
            <button wire:click="uploadDocument" class="px-3 py-1.5 text-sm bg-orange-500 text-white rounded hover:bg-orange-600 transition-colors">
                <i class="fas fa-upload mr-1"></i> Upload Document
            </button>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <button wire:click="$set('category', 'all')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $category === 'all' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    All
                </button>
                <button wire:click="$set('category', 'contracts')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $category === 'contracts' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Contracts
                </button>
                <button wire:click="$set('category', 'invoices')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $category === 'invoices' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Invoices
                </button>
                <button wire:click="$set('category', 'reports')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $category === 'reports' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Reports
                </button>
                <button wire:click="$set('category', 'other')" class="px-3 py-1.5 text-xs rounded transition-colors {{ $category === 'other' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Other
                </button>
            </div>
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search documents..." 
                   class="px-2 py-1.5 text-xs border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mb-4">
            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded flex items-center justify-center">
                        <i class="fas fa-file-alt text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Total Documents</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded flex items-center justify-center">
                        <i class="fas fa-file-contract text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Contracts</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $stats['contracts'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-yellow-100 rounded flex items-center justify-center">
                        <i class="fas fa-file-invoice text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Invoices</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $stats['invoices'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-purple-100 rounded flex items-center justify-center">
                        <i class="fas fa-chart-bar text-purple-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Reports</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $stats['reports'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($documents->count() > 0)
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-600">Document Name</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-600">Category</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-600">Size</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-600">Uploaded</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($documents as $document)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded flex items-center justify-center flex-shrink-0
                                                @if($document->extension === 'pdf') bg-red-100
                                                @elseif($document->extension === 'doc' || $document->extension === 'docx') bg-blue-100
                                                @elseif($document->extension === 'xls' || $document->extension === 'xlsx') bg-green-100
                                                @else bg-gray-100
                                                @endif">
                                                <i class="fas 
                                                    @if($document->extension === 'pdf') fa-file-pdf text-red-600
                                                    @elseif($document->extension === 'doc' || $document->extension === 'docx') fa-file-word text-blue-600
                                                    @elseif($document->extension === 'xls' || $document->extension === 'xlsx') fa-file-excel text-green-600
                                                    @else fa-file text-gray-600
                                                    @endif text-sm">
                                                </i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ $document->name }}</p>
                                                <p class="text-xs text-gray-500">{{ $document->extension }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="px-2 py-1 text-xs rounded-full
                                            @if($document->category === 'contracts') bg-green-100 text-green-800
                                            @elseif($document->category === 'invoices') bg-yellow-100 text-yellow-800
                                            @elseif($document->category === 'reports') bg-purple-100 text-purple-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst($document->category) }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2 text-sm text-gray-900">{{ $document->size }}</td>
                                    <td class="px-3 py-2 text-xs text-gray-500">{{ \Carbon\Carbon::parse($document->uploaded_at)->format('M d, Y') }}</td>
                                    <td class="px-3 py-2">
                                        <div class="flex items-center gap-1">
                                            <button wire:click="downloadDocument({{ $document->id }})" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button wire:click="shareDocument({{ $document->id }})" class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                                                <i class="fas fa-share"></i>
                                            </button>
                                            <button wire:click="deleteDocument({{ $document->id }})" class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $documents->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                <i class="fas fa-folder-open text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-sm font-medium text-gray-900">No documents found</h3>
                <p class="mt-1 text-sm text-gray-500">Upload your first document to get started</p>
                <button wire:click="uploadDocument" class="mt-4 px-4 py-2 text-sm bg-orange-500 text-white rounded hover:bg-orange-600 transition-colors">
                    <i class="fas fa-upload mr-1"></i> Upload Document
                </button>
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
