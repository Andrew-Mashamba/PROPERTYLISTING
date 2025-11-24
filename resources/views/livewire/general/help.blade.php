<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Help Center</h1>
                <p class="text-sm text-gray-600">Find answers and learn how to use the platform</p>
            </div>
            <button wire:click="contactSupport" class="px-3 py-1.5 text-sm bg-orange-500 text-white rounded hover:bg-orange-600 transition-colors">
                <i class="fas fa-headset mr-1"></i> Contact Support
            </button>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center gap-2">
            <div class="flex-1">
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search help articles..." 
                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mb-4">
            <button wire:click="$set('category', 'getting-started')" class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-left {{ $category === 'getting-started' ? 'border-orange-500 bg-orange-50' : '' }}">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mb-2">
                    <i class="fas fa-rocket text-blue-600"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-900">Getting Started</h3>
                <p class="text-xs text-gray-600 mt-1">{{ $articleCounts['getting-started'] }} articles</p>
            </button>

            <button wire:click="$set('category', 'account')" class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-left {{ $category === 'account' ? 'border-orange-500 bg-orange-50' : '' }}">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mb-2">
                    <i class="fas fa-user-circle text-green-600"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-900">Account</h3>
                <p class="text-xs text-gray-600 mt-1">{{ $articleCounts['account'] }} articles</p>
            </button>

            <button wire:click="$set('category', 'properties')" class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-left {{ $category === 'properties' ? 'border-orange-500 bg-orange-50' : '' }}">
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mb-2">
                    <i class="fas fa-home text-yellow-600"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-900">Properties</h3>
                <p class="text-xs text-gray-600 mt-1">{{ $articleCounts['properties'] }} articles</p>
            </button>

            <button wire:click="$set('category', 'payments')" class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-left {{ $category === 'payments' ? 'border-orange-500 bg-orange-50' : '' }}">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mb-2">
                    <i class="fas fa-credit-card text-purple-600"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-900">Payments</h3>
                <p class="text-xs text-gray-600 mt-1">{{ $articleCounts['payments'] }} articles</p>
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2">
                @if($articles->count() > 0)
                    <div class="space-y-3">
                        @foreach($articles as $article)
                            <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow cursor-pointer">
                                <div class="flex items-start justify-between mb-2">
                                    <div class="flex-1">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-1">{{ $article->title }}</h3>
                                        <p class="text-xs text-gray-600 mb-2">{{ $article->excerpt }}</p>
                                        <div class="flex items-center gap-3 text-xs text-gray-500">
                                            <span class="px-2 py-1 rounded-full
                                                @if($article->category === 'getting-started') bg-blue-100 text-blue-800
                                                @elseif($article->category === 'account') bg-green-100 text-green-800
                                                @elseif($article->category === 'properties') bg-yellow-100 text-yellow-800
                                                @else bg-purple-100 text-purple-800
                                                @endif">
                                                {{ ucwords(str_replace('-', ' ', $article->category)) }}
                                            </span>
                                            <span><i class="fas fa-eye mr-1"></i>{{ $article->views }} views</span>
                                            <span><i class="fas fa-clock mr-1"></i>{{ $article->read_time }} min read</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1 ml-3">
                                        @if($article->helpful)
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                                <i class="fas fa-thumbs-up"></i>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        {{ $articles->links() }}
                    </div>
                @else
                    <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                        <i class="fas fa-search text-6xl text-gray-400 mb-4"></i>
                        <h3 class="text-sm font-medium text-gray-900">No articles found</h3>
                        <p class="mt-1 text-sm text-gray-500">Try searching with different keywords</p>
                    </div>
                @endif
            </div>

            <div class="space-y-3">
                <div class="bg-white rounded-lg border border-gray-200 p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Popular Articles</h3>
                    <div class="space-y-2">
                        <a href="#" class="block p-2 rounded hover:bg-gray-50 transition-colors">
                            <p class="text-xs font-medium text-gray-900">How to list a property</p>
                            <p class="text-xs text-gray-500 mt-0.5">1,234 views</p>
                        </a>
                        <a href="#" class="block p-2 rounded hover:bg-gray-50 transition-colors">
                            <p class="text-xs font-medium text-gray-900">Setting up payment methods</p>
                            <p class="text-xs text-gray-500 mt-0.5">987 views</p>
                        </a>
                        <a href="#" class="block p-2 rounded hover:bg-gray-50 transition-colors">
                            <p class="text-xs font-medium text-gray-900">Understanding verification process</p>
                            <p class="text-xs text-gray-500 mt-0.5">856 views</p>
                        </a>
                        <a href="#" class="block p-2 rounded hover:bg-gray-50 transition-colors">
                            <p class="text-xs font-medium text-gray-900">Managing tenant applications</p>
                            <p class="text-xs text-gray-500 mt-0.5">745 views</p>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-gray-200 p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Need More Help?</h3>
                    <div class="space-y-2">
                        <button wire:click="contactSupport" class="w-full px-3 py-2 text-xs bg-orange-500 text-white rounded hover:bg-orange-600 transition-colors">
                            <i class="fas fa-headset mr-1"></i> Contact Support
                        </button>
                        <button class="w-full px-3 py-2 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                            <i class="fas fa-comments mr-1"></i> Live Chat
                        </button>
                        <button class="w-full px-3 py-2 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200 transition-colors">
                            <i class="fas fa-book mr-1"></i> Video Tutorials
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-gray-200 p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Quick Links</h3>
                    <div class="space-y-1">
                        <a href="#" class="block text-xs text-gray-700 hover:text-orange-600 py-1">
                            <i class="fas fa-chevron-right text-xs mr-2"></i>User Guide
                        </a>
                        <a href="#" class="block text-xs text-gray-700 hover:text-orange-600 py-1">
                            <i class="fas fa-chevron-right text-xs mr-2"></i>API Documentation
                        </a>
                        <a href="#" class="block text-xs text-gray-700 hover:text-orange-600 py-1">
                            <i class="fas fa-chevron-right text-xs mr-2"></i>Terms of Service
                        </a>
                        <a href="#" class="block text-xs text-gray-700 hover:text-orange-600 py-1">
                            <i class="fas fa-chevron-right text-xs mr-2"></i>Privacy Policy
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
