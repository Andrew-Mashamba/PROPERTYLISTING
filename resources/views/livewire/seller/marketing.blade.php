<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Marketing Tools</h1>
                <p class="text-sm text-gray-600">Promote your properties effectively</p>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Property Selection -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-medium text-gray-900 mb-4">Select Properties</h3>
                <div class="space-y-2 mb-4">
                    <button wire:click="selectAllProperties" class="text-xs text-orange-600 hover:text-orange-700">Select All</button>
                    <button wire:click="clearSelection" class="text-xs text-gray-600 hover:text-gray-700 ml-4">Clear Selection</button>
                </div>
                <div class="space-y-2 max-h-64 overflow-y-auto">
                    @foreach($properties as $property)
                        <label class="flex items-center p-2 hover:bg-gray-50 rounded cursor-pointer">
                            <input wire:model="selectedProperties" value="{{ $property->id }}" type="checkbox" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                            <div class="ml-3 flex-1">
                                <p class="text-sm font-medium text-gray-900">{{ $property->title }}</p>
                                <p class="text-xs text-gray-600">${{ number_format($property->price) }} • {{ ucfirst($property->property_type) }}</p>
                                @if($property->featured)
                                    <span class="inline-block px-1 py-0.5 text-xs bg-orange-100 text-orange-800 rounded">Featured</span>
                                @endif
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Marketing Options -->
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-medium text-gray-900 mb-4">Marketing Options</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Marketing Type</label>
                        <select wire:model="marketingType" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            <option value="social_media">Social Media</option>
                            <option value="email_campaign">Email Campaign</option>
                            <option value="print_ads">Print Advertising</option>
                            <option value="online_ads">Online Advertising</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Custom Message</label>
                        <textarea wire:model="message" rows="3" placeholder="Add a custom message for your marketing content..." class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                    </div>

                    <div class="flex space-x-2">
                        <button wire:click="generateMarketingContent" class="flex-1 bg-orange-500 hover:bg-orange-600 text-white px-3 py-2 rounded text-sm font-medium transition-colors">
                            Generate Content
                        </button>
                        <button wire:click="shareToSocialMedia" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded text-sm font-medium transition-colors">
                            Share Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Marketing Templates -->
        <div class="mt-6 bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-sm font-medium text-gray-900 mb-4">Marketing Templates</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Social Media Template -->
                <div class="border border-gray-200 rounded-lg p-3">
                    <h4 class="text-xs font-medium text-gray-900 mb-2">Social Media Post</h4>
                    <p class="text-xs text-gray-600 mb-3">Perfect for Facebook, Instagram, and Twitter</p>
                    <button class="w-full bg-orange-100 text-orange-700 px-2 py-1.5 rounded text-xs font-medium hover:bg-orange-200 transition-colors">
                        Use Template
                    </button>
                </div>

                <!-- Email Template -->
                <div class="border border-gray-200 rounded-lg p-3">
                    <h4 class="text-xs font-medium text-gray-900 mb-2">Email Campaign</h4>
                    <p class="text-xs text-gray-600 mb-3">Professional email for your contacts</p>
                    <button class="w-full bg-blue-100 text-blue-700 px-2 py-1.5 rounded text-xs font-medium hover:bg-blue-200 transition-colors">
                        Use Template
                    </button>
                </div>

                <!-- Print Ad Template -->
                <div class="border border-gray-200 rounded-lg p-3">
                    <h4 class="text-xs font-medium text-gray-900 mb-2">Print Advertisement</h4>
                    <p class="text-xs text-gray-600 mb-3">For newspapers and magazines</p>
                    <button class="w-full bg-green-100 text-green-700 px-2 py-1.5 rounded text-xs font-medium hover:bg-green-200 transition-colors">
                        Use Template
                    </button>
                </div>
            </div>
        </div>

        <!-- Marketing Analytics -->
        <div class="mt-6 bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-sm font-medium text-gray-900 mb-4">Marketing Analytics</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="text-center">
                    <p class="text-lg font-semibold text-gray-900">1,250</p>
                    <p class="text-xs text-gray-600">Total Reach</p>
                </div>
                <div class="text-center">
                    <p class="text-lg font-semibold text-gray-900">45</p>
                    <p class="text-xs text-gray-600">Engagements</p>
                </div>
                <div class="text-center">
                    <p class="text-lg font-semibold text-gray-900">12</p>
                    <p class="text-xs text-gray-600">Leads Generated</p>
                </div>
                <div class="text-center">
                    <p class="text-lg font-semibold text-gray-900">3.6%</p>
                    <p class="text-xs text-gray-600">Conversion Rate</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm">
            {{ session('message') }}
        </div>
    @endif
</div>
