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
                    <a href="/rent" class="nav-item nav-active">RENT</a>
                    <a href="/materials" class="nav-item">MATERIALS</a>
                    <a href="/services" class="nav-item">SERVICES</a>
                </nav>
            </div>
            <div class="header-right">
                <div class="search-bar">
                    <select class="search-category mr-4">
                        <option>All Categories</option>
                        <option>Residential</option>
                        <option>Commercial</option>
                        <option>Land</option>
                        <option>Investment</option>
                    </select>
                    <input type="text" wire:model.live.debounce.300ms="searchQuery" class="search-input mr-4" 
                    placeholder="Search for properties">
                    <button class="search-btn">SEARCH</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .content {
        
        }
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
        
        .nav-container {
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #e5e7eb;
        }
        
        .nav-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .nav-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 3rem;
        }
        
        .nav-left, .nav-right {
            display: flex;
            align-items: center;
        }
        
        .nav-left {
            gap: 1rem;
        }
        
        .nav-right {
            gap: 0.75rem;
        }
        
        .nav-link {
            font-size: 0.875rem;
            color: #374151;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .nav-link:hover {
            color: #FF7F00;
        }
        
        .nav-link-active {
            color: #FF7F00 !important;
            font-weight: 600;
            position: relative;
        }
        
        .nav-link-active::after {
            content: '';
            position: absolute;
            bottom: -0.5rem;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #FF7F00;
            border-radius: 1px;
        }
        
        .logo {
            font-size: 1.25rem;
            font-weight: bold;
            color: #FF7F00;
        }
        
        .btn-dashboard {
            font-size: 0.75rem;
            background-color: #FF7F00;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        
        .btn-dashboard:hover {
            background-color: #e66a00;
        }
    </style>
    

    <style>
        .hero-section {
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            position: relative;
        }
        
        .hero-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 3rem 1rem;
            position: relative;
        }
        
        .hero-text {
            text-align: center;
        }
        
        .hero-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: white;
        }
        
        .hero-subtitle {
            font-size: 1.125rem;
            color: #fed7aa;
            margin-bottom: 1.5rem;
        }
        
        .search-container {
            max-width: 28rem;
            margin: 0 auto;
        }
        
        .search-form {
            position: relative;
        }
        
        .search-input-group {
            display: flex;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .search-input {
            flex: 1;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            border: 0;
            outline: none;
            color: #111827;
        }
        
        .search-button {
            padding: 0.5rem 0.75rem;
            background-color: #FF7F00;
            color: white;
            border: 0;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .search-button:hover {
            background-color: #e66a00;
        }
        
        .search-icon {
            width: 1rem;
            height: 1rem;
        }
        
        
        .filters-panel {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-top: 1rem;
        }
        
        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
        }
        
        .filter-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.25rem;
        }
        
        .filter-input {
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.2s;
        }
        
        .filter-input:focus {
            outline: none;
            border-color: #FF7F00;
            box-shadow: 0 0 0 3px rgba(255, 127, 0, 0.1);
        }
        
        .filter-select {
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            background: white;
            cursor: pointer;
        }
        
        .filter-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-end;
        }
        
        .btn-clear {
            padding: 0.5rem 1rem;
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn-clear:hover {
            background: #e5e7eb;
        }
        
    </style>
    
    <!-- Hero Section -->
    <div class="hero-section container mx-auto" style="max-width: 1280px;">
        <div class="hero-content">
            <div class="hero-text">
                <!-- Hero Text -->
                <h1 class="hero-title">
                    Find Your Perfect Rental
                </h1>
                <p class="hero-subtitle">Discover rental properties that fit your budget and lifestyle</p>
                
                <!-- Advanced Search Bar -->
                <div class="search-container">
                    <form wire:submit.prevent="search" class="search-form">
                        <div class="search-input-group">
                            <input 
                                type="text" 
                                wire:model.live.debounce.300ms="searchQuery"
                                placeholder="Enter address, city, or ZIP"
                                class="search-input"
                            >
                            <button type="submit" class="search-button">
                                <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Filters Panel -->
    <div class="filters-panel container mx-auto" style="max-width: 1280px;">
        <div class="filters-grid">
            <!-- Price Range -->
            <div class="filter-group">
                <label class="filter-label">Min Price</label>
                <input type="number" wire:model.live.debounce.300ms="minPrice" class="filter-input" placeholder="Min Price">
            </div>
            <div class="filter-group">
                <label class="filter-label">Max Price</label>
                <input type="number" wire:model.live.debounce.300ms="maxPrice" class="filter-input" placeholder="Max Price">
            </div>
            
            <!-- Bedrooms -->
            <div class="filter-group">
                <label class="filter-label">Bedrooms</label>
                <select wire:model.live="bedrooms" class="filter-select">
                    <option value="">Any</option>
                    <option value="1">1+</option>
                    <option value="2">2+</option>
                    <option value="3">3+</option>
                    <option value="4">4+</option>
                    <option value="5">5+</option>
                </select>
            </div>
            
            <!-- Bathrooms -->
            <div class="filter-group">
                <label class="filter-label">Bathrooms</label>
                <select wire:model.live="bathrooms" class="filter-select">
                    <option value="">Any</option>
                    <option value="1">1+</option>
                    <option value="2">2+</option>
                    <option value="3">3+</option>
                    <option value="4">4+</option>
                </select>
            </div>
            
            <!-- Property Type -->
            <div class="filter-group">
                <label class="filter-label">Property Type</label>
                <select wire:model.live="propertyType" class="filter-select">
                    <option value="">All Types</option>
                    @foreach($propertyTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Sort By -->
            <div class="filter-group">
                <label class="filter-label">Sort By</label>
                <select wire:model.live="sortBy" class="filter-select">
                    <option value="created_at">Newest</option>
                    <option value="price">Price</option>
                    <option value="bedrooms">Bedrooms</option>
                    <option value="sqft">Square Feet</option>
                </select>
            </div>
        </div>
        
        <div class="filter-actions">
            <button wire:click="clearFilters" class="btn-clear">Clear All</button>
        </div>
    </div>

    <style>
        .properties-section {
            background-color: white;
            padding: 2rem 0;
        }
        
        .properties-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333333;
        }
        
        .section-subtitle {
            font-size: 0.875rem;
            color: #6C757D;
            margin-top: 0.25rem;
        }
        
        .nav-arrows {
            display: flex;
            gap: 0.25rem;
        }
        
        .nav-button {
            padding: 0.25rem;
            border-radius: 50%;
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 0;
            cursor: pointer;
            transition: box-shadow 0.2s;
        }
        
        .nav-button:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .nav-icon {
            width: 1rem;
            height: 1rem;
            color: #6C757D;
        }
        
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
        }
        
        @media (min-width: 768px) {
            .properties-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (min-width: 1024px) {
            .properties-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        .property-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: box-shadow 0.2s;
        }
        
        .property-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .property-image-container {
            position: relative;
        }
        
        .property-image {
            width: 100%;
            height: 10rem;
            object-fit: cover;
        }
        
        .property-tag {
            position: absolute;
            top: 0.5rem;
            left: 0.5rem;
        }
        
        .tag {
            font-size: 0.75rem;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-weight: 500;
        }
        
        .tag-success {
            background-color: #28A745;
        }
        
        .tag-danger {
            background-color: #FF4500;
        }
        
        .tag-info {
            background-color: #007BFF;
        }
        
        .tag-warning {
            background-color: #FFD700;
            color: #333;
        }
        
        .property-details {
            padding: 0.75rem;
        }
        
        .property-price {
            font-size: 1.125rem;
            font-weight: bold;
            margin-bottom: 0.25rem;
            color: #333333;
        }
        
        .property-specs {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            margin-bottom: 0.5rem;
            color: #6C757D;
        }
        
        .property-specs span {
            margin-right: 0.75rem;
        }
        
        .property-address {
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #333333;
        }
        
        .property-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
        }
        
        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            background-color: #28A745;
            color: white;
        }
        
        .agent-name {
            color: #6C757D;
        }
        
        .mls-id {
            font-size: 0.75rem;
            margin-top: 0.25rem;
            color: #AAAAAA;
        }
        
        .view-more-container {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .view-more-button {
            display: inline-flex;
            align-items: center;
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            border: 0;
            border-radius: 0.375rem;
            font-weight: 500;
            color: white;
            background-color: #FF7F00;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        
        .view-more-button:hover {
            background-color: #e66a00;
        }
        
        .view-more-icon {
            width: 1rem;
            height: 1rem;
            margin-left: 0.25rem;
        }
        
        .no-properties {
            grid-column: 1 / -1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 3rem 1rem;
        }
        
        .no-properties-content {
            text-align: center;
        }
        
        .no-properties-icon {
            width: 4rem;
            height: 4rem;
            color: #9ca3af;
            margin: 0 auto 1rem;
        }
        
        .no-properties-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        
        .no-properties-text {
            color: #6b7280;
            font-size: 0.875rem;
        }
    </style>
    
    <!-- Trending Properties Section -->
    <div class="properties-section">
        <div class="properties-content">
            <!-- Section Header -->
            <div class="section-header">
                <div>
                    <h2 class="section-title">Rental Properties</h2>
                    <p class="section-subtitle">Available rental properties in your area</p>
                </div>
                
                <!-- Navigation Arrows -->
                <div class="nav-arrows">
                    <button class="nav-button">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button class="nav-button">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Property Cards Grid -->
            <div class="properties-grid">
                @forelse($rentalProperties as $property)
                    <div class="property-card">
                        <!-- Property Image -->
                        <div class="property-image-container">
                            @php
                                $firstImage = $property->images->first();
                                $imageCount = $property->images->count();
                            @endphp
                            
                            @if($firstImage)
                                <img 
                                    src="{{ Storage::url($firstImage->image_path) }}" 
                                    alt="{{ $property->title }}"
                                    class="property-image"
                                >
                                
                                @if($imageCount > 1)
                                    <button wire:click="viewImages({{ $property->id }})" 
                                            class="absolute bottom-2 right-2 bg-black bg-opacity-60 text-white px-2 py-1 rounded text-xs hover:bg-opacity-80 transition-opacity"
                                            style="position: absolute; bottom: 0.5rem; right: 0.5rem; background: rgba(0,0,0,0.6); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem;">
                                        <i class="fas fa-images"></i> +{{ $imageCount - 1 }} more
                                    </button>
                                @endif
                            @else
                                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #e5e7eb; color: #9ca3af;">
                                    <svg style="width: 3rem; height: 3rem;" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Property Tag -->
                            @if($property->is_featured)
                                <div class="property-tag">
                                    <span class="tag tag-info">Featured</span>
                                </div>
                            @endif
                        </div>

                        <!-- Property Details -->
                        <div class="property-details">
                            <!-- Price -->
                            <div class="property-price">
                                TZS {{ number_format($property->price) }}/month
                            </div>

                            <!-- Property Specs -->
                            <div class="property-specs">
                                @if($property->bedrooms)
                                    <span>{{ $property->bedrooms }} bds</span>
                                @endif
                                @if($property->bathrooms)
                                    <span>{{ $property->bathrooms }} ba</span>
                                @endif
                                @if($property->sqft)
                                    <span>{{ number_format($property->sqft) }} sqft</span>
                                @endif
                            </div>

                            <!-- Address -->
                            <div class="property-address">
                                {{ $property->address }}
                            </div>

                            <!-- Status -->
                            <div class="property-footer">
                                <span class="status-badge">{{ $property->status }}</span>
                                <span class="agent-name">{{ ucfirst($property->property_type) }}</span>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 mt-3">
                                <button wire:click="openApplicationModal({{ $property->id }})" 
                                        class="flex items-center justify-center gap-2 text-white px-4 py-2.5 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200"
                                        style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Apply Now
                                </button>
                                <button wire:click="openInquiryModal({{ $property->id }})" 
                                        class="flex items-center justify-center gap-2 text-white px-4 py-2.5 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200"
                                        style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Inquiry
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="no-properties">
                        <div class="no-properties-content">
                            <svg class="no-properties-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <h3 class="no-properties-title">No Properties Found</h3>
                            <p class="no-properties-text">Try adjusting your search criteria or filters to find more properties.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- View More Button -->
            <div class="view-more-container">
                <a href="#" class="view-more-button">
                    View More Rentals
                    <svg class="view-more-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <style>
        .services-section {
            background: white;
            padding: 2rem 0;
        }
        
        .services-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .service-card {
            text-align: center;
            padding: 1rem;
        }
        
        .service-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.75rem;
        }
        
        .service-icon svg {
            width: 1.5rem;
            height: 1.5rem;
            color: white;
        }
        
        .service-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333333;
        }
        
        .service-description {
            font-size: 0.875rem;
            color: #6C757D;
        }
    </style>
    
    <!-- Services Section -->
    <div class="services-section">
        <div class="services-content">
            <div class="services-grid">
                <!-- Rent Section -->
                <div class="service-card">
                    <div class="service-icon" style="background-color: #28A745;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">Find Rentals</h3>
                    <p class="service-description">Browse available rental properties with detailed search and filtering options.</p>
                </div>

                <!-- Short Term Rentals -->
                <div class="service-card">
                    <div class="service-icon" style="background-color: #FF7F00;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">Short Term Rentals</h3>
                    <p class="service-description">Find furnished apartments and short-term rental options for your needs.</p>
                </div>

                <!-- Property Management -->
                <div class="service-card">
                    <div class="service-icon" style="background-color: #007BFF;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">Property Management</h3>
                    <p class="service-description">Professional property management services for landlords and tenants.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Auth Modals -->
    @livewire('auth-modals')

    <!-- Image Gallery Modal -->
    @if($showImageModal)
        <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background: rgba(0,0,0,0.9); display: flex; flex-direction: column;" wire:click="closeImageModal">
            <div style="position: absolute; top: 1rem; right: 1rem; z-index: 10;">
                <button wire:click="closeImageModal" style="color: white; font-size: 2rem; background: none; border: none; cursor: pointer;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 2rem; position: relative;" wire:click.stop>
                @if($currentImageIndex > 0)
                    <button wire:click="previousImage" style="position: absolute; left: 1rem; color: white; font-size: 2rem; background: none; border: none; cursor: pointer;">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @endif
                
                <img src="{{ Storage::url($currentImage) }}" alt="Property" style="max-height: 60vh; max-width: 60vw; object-fit: contain;">
                
                @if($currentImageIndex < count($viewingImages) - 1)
                    <button wire:click="nextImage" style="position: absolute; right: 1rem; color: white; font-size: 2rem; background: none; border: none; cursor: pointer;">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                @endif
            </div>
            
            <div style="background: rgba(0,0,0,0.8); padding: 1rem;">
                <div style="text-align: center; color: white; font-size: 0.875rem; margin-bottom: 0.5rem;">
                    {{ $currentImageIndex + 1 }} / {{ count($viewingImages) }}
                </div>
                <div style="display: flex; justify-content: center; gap: 0.5rem; overflow-x: auto;">
                    @foreach($viewingImages as $index => $image)
                        <button wire:click="setCurrentImage({{ $index }})" style="flex-shrink: 0; background: none; border: none; cursor: pointer;">
                            <img src="{{ Storage::url($image) }}" alt="Thumbnail" 
                                 style="width: 4rem; height: 4rem; object-fit: cover; border-radius: 0.25rem; {{ $index === $currentImageIndex ? 'border: 2px solid #FF7F00;' : 'opacity: 0.6;' }}">
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Inquiry Modal -->
    @if($showInquiryModal)
        <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; padding: 1rem;" wire:click="closeInquiryModal">
            <div style="background: white; border-radius: 1rem; max-width: 32rem; width: 100%; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);" wire:click.stop>
                <div style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); padding: 1.5rem; border-radius: 1rem 1rem 0 0;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <svg class="w-6 h-6" style="width: 1.5rem; height: 1.5rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: white;">Send Inquiry</h3>
                        </div>
                        <button wire:click="closeInquiryModal" style="color: white; background: none; border: none; cursor: pointer; font-size: 1.5rem;">
                            <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                @if (session()->has('message'))
                    <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 0.75rem 1rem; margin: 1rem 1.5rem 0; border-radius: 0.5rem;">
                        {{ session('message') }}
                    </div>
                @endif

                <form wire:submit.prevent="submitInquiry" style="padding: 1.5rem;">
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Subject</label>
                        <input type="text" wire:model="inquirySubject" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#FF7F00'" onblur="this.style.borderColor='#d1d5db'">
                        @error('inquirySubject') 
                            <span style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Email</label>
                        <input type="email" wire:model="inquiryEmail" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#FF7F00'" onblur="this.style.borderColor='#d1d5db'">
                        @error('inquiryEmail') 
                            <span style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Phone (Optional)</label>
                        <input type="tel" wire:model="inquiryPhone" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#FF7F00'" onblur="this.style.borderColor='#d1d5db'">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Message</label>
                        <textarea wire:model="inquiryMessage" rows="4" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s; resize: vertical;" onfocus="this.style.borderColor='#FF7F00'" onblur="this.style.borderColor='#d1d5db'" placeholder="Please provide details about your inquiry..."></textarea>
                        @error('inquiryMessage') 
                            <span style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="display: flex; gap: 0.75rem; justify-content: flex-end;">
                        <button type="button" wire:click="closeInquiryModal" style="padding: 0.5rem 1rem; background: #f3f4f6; color: #374151; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600; cursor: pointer; transition: background-color 0.2s;">
                            Cancel
                        </button>
                        <button type="submit" style="padding: 0.5rem 1.5rem; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white; border: none; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600; cursor: pointer; transition: box-shadow 0.2s;" onmouseover="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.2)'" onmouseout="this.style.boxShadow='none'">
                            Send Inquiry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- Application Modal -->
    @if($showApplicationModal)
        <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; padding: 1rem; overflow-y: auto;" wire:click="closeApplicationModal">
            <div style="background: white; border-radius: 1rem; max-width: 42rem; width: 100%; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); margin: 2rem 0;" wire:click.stop>
                <div style="background: linear-gradient(135deg, #10B981 0%, #059669 100%); padding: 1.5rem; border-radius: 1rem 1rem 0 0;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <svg style="width: 1.5rem; height: 1.5rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: white;">Rental Application</h3>
                        </div>
                        <button wire:click="closeApplicationModal" style="color: white; background: none; border: none; cursor: pointer;">
                            <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                @if (session()->has('message'))
                    <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 0.75rem 1rem; margin: 1rem 1.5rem 0; border-radius: 0.5rem;">
                        {{ session('message') }}
                    </div>
                @endif

                <form wire:submit.prevent="submitApplication" style="padding: 1.5rem;">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-bottom: 1rem;">
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Full Name *</label>
                            <input type="text" wire:model="applicantName" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;">
                            @error('applicantName') <span style="color: #ef4444; font-size: 0.75rem;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Email *</label>
                            <input type="email" wire:model="applicantEmail" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;">
                            @error('applicantEmail') <span style="color: #ef4444; font-size: 0.75rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-bottom: 1rem;">
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Phone *</label>
                            <input type="tel" wire:model="applicantPhone" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;">
                            @error('applicantPhone') <span style="color: #ef4444; font-size: 0.75rem;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Monthly Income (TZS) *</label>
                            <input type="number" wire:model="monthlyIncome" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;">
                            @error('monthlyIncome') <span style="color: #ef4444; font-size: 0.75rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-bottom: 1rem;">
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Employment Status *</label>
                            <select wire:model="employmentStatus" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;">
                                <option value="">Select Status</option>
                                <option value="Employed">Employed</option>
                                <option value="Self-Employed">Self-Employed</option>
                                <option value="Student">Student</option>
                                <option value="Retired">Retired</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('employmentStatus') <span style="color: #ef4444; font-size: 0.75rem;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Employer/Business *</label>
                            <input type="text" wire:model="employer" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;">
                            @error('employer') <span style="color: #ef4444; font-size: 0.75rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1rem;">
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Credit Score</label>
                            <input type="number" wire:model="creditScore" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;" placeholder="Optional">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">References</label>
                            <input type="number" wire:model="referencesCount" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;" placeholder="0">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Desired Move-in *</label>
                            <input type="date" wire:model="desiredMoveIn" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;">
                            @error('desiredMoveIn') <span style="color: #ef4444; font-size: 0.75rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Additional Message</label>
                        <textarea wire:model="applicationMessage" rows="3" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; resize: vertical;" placeholder="Any additional information you'd like to share..."></textarea>
                    </div>

                    <div style="display: flex; gap: 0.75rem; justify-content: flex-end;">
                        <button type="button" wire:click="closeApplicationModal" style="padding: 0.5rem 1rem; background: #f3f4f6; color: #374151; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600; cursor: pointer;">
                            Cancel
                        </button>
                        <button type="submit" style="padding: 0.5rem 1.5rem; background: linear-gradient(135deg, #10B981 0%, #059669 100%); color: white; border: none; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600; cursor: pointer;">
                            Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
</div>