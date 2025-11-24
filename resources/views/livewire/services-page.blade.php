<div>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="top-bar-left">
                <span class="top-bar-text">Free Shipping for orders over 50,000 TZS in materials</span>
                <span class="top-bar-email">hello@savannaproperty.com</span>
            </div>
            <div class="top-bar-right">
                <div class="social-links">
                    <a href="#" class="social-link">Facebook</a>
                    <a href="#" class="social-link">Twitter</a>
                    <a href="#" class="social-link">LinkedIn</a>
                </div>
                <div class="top-bar-actions pr-2">
                    <button wire:click="$dispatch('showLoginModal')" class="top-bar-link text-xl font-bold border-2 border-orange-500 rounded-md px-2 py-1 m-0" style="color: #FF7F00;">Login</button>
                    <button wire:click="$dispatch('showRegisterModal')" class="top-bar-link text-xl font-bold border-2 border-blue-500 rounded-md px-2 py-1 m-0" style="color: #007BFF;">Sell Property</button>
                    <button wire:click="$dispatch('showRegisterModal')" class="top-bar-link text-xl font-bold border-2 border-green-500 rounded-md px-2 py-1 m-0" style="color: #28A745;">Post Rental</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="main-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="main-logo">SAVANNA</h1>
            </div>
            <div class="header-center">
                <nav class="main-nav">
                    <a href="/" class="nav-item">BUY</a>
                    <a href="/rent" class="nav-item">RENT</a>
                    <a href="/materials" class="nav-item">MATERIALS</a>
                    <a href="/services" class="nav-item nav-active">SERVICES</a>
                </nav>
            </div>
            <div class="header-right">
                <div class="search-bar">
                    <select class="search-category mr-4">
                        <option>All Categories</option>
                        <option>Construction</option>
                        <option>Legal</option>
                        <option>Moving</option>
                        <option>Inspection</option>
                    </select>
                    <input type="text" class="search-input mr-4" 
                    placeholder="Search for services">
                    <button class="search-btn">SEARCH</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .top-bar {
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            padding: 0.5rem 0;
            font-size: 0.875rem;
            height: 40px;
        }
        
        .top-bar-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .top-bar-left {
            display: flex;
            gap: 2rem;
        }
        
        .top-bar-text {
            color: #6C757D;
        }
        
        .top-bar-email {
            color: #FF7F00;
        }
        
        .top-bar-right {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            color: #6C757D;
            text-decoration: none;
            font-size: 0.75rem;
        }
        
        .top-bar-actions {
            display: flex;
            gap: 1rem;
        }
        
        .top-bar-link {
            color: #6C757D;
            text-decoration: none;
            font-size: 0.75rem;
        }
        
        .main-header {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 0.5rem 0;
            min-height: 60px;
        }
        
        .header-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 0.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .main-logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: #FF7F00;
            margin: 0;
        }
        
        .main-nav {
            display: flex;
            gap: 1rem;
        }
        
        .nav-item {
            color: #333333;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            transition: color 0.2s;
            padding: 0.25rem 0.5rem;
        }
        
        .nav-item:hover,
        .nav-active {
            color: #FF7F00;
        }
        
        .search-bar {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 0.25rem;
            padding: 0.25rem;
        }
        
        .search-category {
            border: none;
            background: transparent;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            color: #6C757D;
        }
        
        .search-input {
            border: none;
            background: transparent;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            min-width: 150px;
        }
        
        .search-btn {
            background: #FF7F00;
            color: white;
            border: none;
            padding: 0.25rem 0.75rem;
            border-radius: 0.25rem;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
        }
    </style>

    <!-- Services Content -->
    <div class="bg-gray-50 min-h-screen py-8">
        <div style="max-width: 1280px; margin: 0 auto; padding: 0 1rem;">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Property-Related Services</h1>
                <p class="text-gray-600">Professional services to help with your property needs</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($services as $service)
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-200">
                    <div class="mb-4">
                        @if($service->category)
                        <span class="px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-xs font-semibold">{{ $service->category }}</span>
                        @endif
                    </div>

                    <h3 class="text-gray-900 font-bold text-xl mb-3">{{ $service->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $service->description }}</p>

                    @if($service->features)
                    <div class="mb-4">
                        <p class="text-xs font-semibold text-gray-700 mb-2">Features:</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            @foreach(explode("\n", $service->features) as $feature)
                                @if(trim($feature))
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>{{ trim($feature) }}</span>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($service->price)
                    <div class="mb-4 p-4 bg-gradient-to-r from-orange-50 to-orange-100 rounded-lg border-2 border-orange-200">
                        <p class="text-xs text-orange-700 mb-1">Price</p>
                        <p class="text-2xl font-bold text-orange-600">
                            @if($service->price_type === 'negotiable')
                                Negotiable
                            @else
                                TZS {{ number_format($service->price) }}
                                @if($service->price_type === 'hourly')
                                    <span class="text-sm font-normal">/hour</span>
                                @endif
                            @endif
                        </p>
                    </div>
                    @endif

                    @if($service->contact_name || $service->contact_phone || $service->contact_email)
                    <div class="pt-4 border-t border-gray-200">
                        <p class="text-xs font-semibold text-gray-700 mb-2">Contact Information:</p>
                        @if($service->contact_name)
                            <p class="text-sm text-gray-700 flex items-center gap-2 mb-1">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $service->contact_name }}
                            </p>
                        @endif
                        @if($service->contact_phone)
                            <p class="text-sm text-gray-700 flex items-center gap-2 mb-1">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                {{ $service->contact_phone }}
                            </p>
                        @endif
                        @if($service->contact_email)
                            <p class="text-sm text-gray-700 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                {{ $service->contact_email }}
                            </p>
                        @endif
                    </div>
                    @endif
                </div>
                @empty
                <div class="col-span-full flex flex-col items-center justify-center py-16">
                    <svg class="w-24 h-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <p class="text-gray-500 text-lg font-medium">No Services Available</p>
                    <p class="text-gray-400 text-sm">Check back later for property-related services</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Auth Modals -->
    @livewire('auth-modals')
</div>
