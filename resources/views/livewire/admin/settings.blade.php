<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">System Settings</h1>
                <p class="text-sm text-gray-600">Configure system preferences</p>
            </div>
            <button wire:click="saveSettings" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors">
                <i class="fas fa-save mr-1"></i> Save Changes
            </button>
        </div>
    </div>

    <div class="p-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">General Settings</h3>
                
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Site Name</label>
                        <input wire:model="site_name" type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Site Email</label>
                        <input wire:model="site_email" type="email" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Currency</label>
                        <select wire:model="currency" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            <option value="TZS">TZS - Tanzanian Shilling</option>
                            <option value="USD">USD - US Dollar</option>
                            <option value="EUR">EUR - Euro</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Commission Rate (%)</label>
                        <input wire:model="commission_rate" type="number" min="0" max="100" step="0.1" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">System Controls</h3>
                
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Maintenance Mode</p>
                            <p class="text-xs text-gray-600">Disable public access to the site</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="maintenance_mode" type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-orange-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Allow Registrations</p>
                            <p class="text-xs text-gray-600">Enable new user registration</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="allow_registrations" type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-orange-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                        </label>
                    </div>

                    <div class="border-t border-gray-200 pt-3 mt-3">
                        <button wire:click="clearCache" class="w-full px-3 py-2 text-sm bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                            <i class="fas fa-broom mr-1"></i> Clear Cache
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">Email Settings</h3>
                
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">SMTP Host</label>
                        <input type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500" placeholder="smtp.example.com">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">SMTP Port</label>
                        <input type="number" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500" placeholder="587">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">SMTP Username</label>
                        <input type="text" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">SMTP Password</label>
                        <input type="password" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-4">
                <h3 class="text-sm font-semibold text-gray-900 mb-3">Payment Settings</h3>
                
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Payment Gateway</label>
                        <select class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                            <option>M-Pesa</option>
                            <option>Stripe</option>
                            <option>PayPal</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">API Key</label>
                        <input type="password" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">API Secret</label>
                        <input type="password" class="w-full px-2 py-1.5 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Test Mode</p>
                            <p class="text-xs text-gray-600">Use test credentials</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-orange-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                        </label>
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
