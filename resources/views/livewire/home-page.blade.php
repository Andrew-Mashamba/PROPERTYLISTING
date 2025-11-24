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
                    <a href="/" class="nav-item nav-active">BUY</a>
                    <a href="/rent" class="nav-item">RENT</a>
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
                    Find Your Dream Home
                </h1>
                <p class="hero-subtitle">Discover properties that match your lifestyle</p>
                
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
                    <h2 class="section-title">Featured Properties</h2>
                    <p class="section-subtitle">Handpicked properties in your area</p>
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
                @forelse($featuredProperties as $property)
                    <div class="property-card" wire:click="openPropertyModal({{ $property->id }})" style="cursor: pointer;">
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
                                TZS {{ number_format($property->price) }}
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

                            <!-- Inquiry Buttons -->
                            <div class="mt-3 grid grid-cols-2 gap-2">
                                <button wire:click="openInquiryModal({{ $property->id }})" 
                                        class="inquiry-btn flex items-center justify-center gap-2 bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200"
                                        style="background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 600; font-size: 0.875rem; border: none; cursor: pointer; transition: all 0.2s;">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Inquire
                                </button>
                                <a href="/financing?property={{ $property->id }}" 
                                   class="inquiry-btn flex items-center justify-center gap-2 text-white px-4 py-2 rounded-lg font-semibold text-sm hover:shadow-lg transition-all duration-200"
                                   style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 600; font-size: 0.875rem; border: none; cursor: pointer; transition: all 0.2s; text-decoration: none;">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Financing
                                </a>
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
                    View More Properties
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
                <!-- Buy Section -->
                <div class="service-card">
                    <div class="service-icon" style="background-color: #FF7F00;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">Buy a Home</h3>
                    <p class="service-description">Find your dream home with comprehensive listings and advanced search tools.</p>
                </div>

                <!-- Rent Section -->
                <div class="service-card">
                    <div class="service-icon" style="background-color: #28A745;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">Rent a Property</h3>
                    <p class="service-description">Discover rental properties that match your budget and lifestyle preferences.</p>
                </div>

                <!-- Sell Section -->
                <div class="service-card">
                    <div class="service-icon" style="background-color: #007BFF;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">Sell Your Home</h3>
                    <p class="service-description">List your property and connect with qualified buyers through our platform.</p>
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

    <!-- Property Details Modal -->
    @if($showPropertyModal && $selectedProperty)
        <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; padding: 1rem; overflow-y: auto;" wire:click="closePropertyModal">
            <div class="bg-white rounded-xl shadow-xl max-w-4xl w-full my-8" style="background: white; border-radius: 0.75rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); max-width: 56rem; width: 100%;" wire:click.stop>
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-6 border-b border-gray-200" style="display: flex; align-items: center; justify-content: space-between; padding: 1.5rem; border-bottom: 1px solid #e5e7eb;">
                    <h2 class="text-2xl font-bold text-gray-900" style="font-size: 1.5rem; font-weight: 700; color: #111827;">Property Details</h2>
                    <button wire:click="closePropertyModal" class="text-gray-400 hover:text-gray-600" style="color: #9ca3af; font-size: 1.5rem; background: none; border: none; cursor: pointer;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.5rem; height: 1.5rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div style="padding: 1.5rem; max-height: calc(90vh - 200px); overflow-y: auto;">
                    <!-- Image Gallery -->
                    <div class="mb-6" style="margin-bottom: 1.5rem;">
                        @if($selectedProperty->images->count() > 0)
                            <div style="position: relative; border-radius: 0.75rem; overflow: hidden; height: 400px;">
                                <img src="{{ Storage::url($selectedPropertyImages[$selectedPropertyImageIndex] ?? $selectedProperty->images->first()->image_path) }}" 
                                     alt="{{ $selectedProperty->title }}"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                                
                                @if($selectedProperty->images->count() > 1)
                                    <button wire:click="previousPropertyImage" 
                                            style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.5); color: white; border: none; border-radius: 50%; width: 3rem; height: 3rem; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                        <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <button wire:click="nextPropertyImage" 
                                            style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.5); color: white; border: none; border-radius: 50%; width: 3rem; height: 3rem; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                        <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                    <div style="position: absolute; bottom: 1rem; left: 50%; transform: translateX(-50%); background: rgba(0,0,0,0.5); color: white; padding: 0.5rem 1rem; border-radius: 1rem; font-size: 0.875rem;">
                                        {{ $selectedPropertyImageIndex + 1 }} / {{ $selectedProperty->images->count() }}
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Thumbnail Strip -->
                            @if($selectedProperty->images->count() > 1)
                                <div style="display: flex; gap: 0.5rem; margin-top: 1rem; overflow-x: auto;">
                                    @foreach($selectedPropertyImages as $index => $image)
                                        <button wire:click="setPropertyImage({{ $index }})" 
                                                style="flex-shrink: 0; width: 80px; height: 60px; border-radius: 0.5rem; overflow: hidden; border: {{ $selectedPropertyImageIndex === $index ? '2px solid #FF7F00' : '2px solid transparent' }}; cursor: pointer; background: none; padding: 0;">
                                            <img src="{{ Storage::url($image) }}" alt="Thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    </div>

                    <!-- Property Title & Price -->
                    <div class="mb-4" style="margin-bottom: 1rem;">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2" style="font-size: 1.5rem; font-weight: 700; color: #111827; margin-bottom: 0.5rem;">
                            {{ $selectedProperty->title }}
                        </h3>
                        <div class="text-3xl font-bold mb-2" style="font-size: 1.875rem; font-weight: 700; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 0.5rem;">
                            TZS {{ number_format($selectedProperty->price) }}
                        </div>
                        <div class="flex items-center gap-2" style="display: flex; align-items: center; gap: 0.5rem;">
                            <span class="px-3 py-1 rounded-full text-sm font-semibold" style="padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; background: {{ $selectedProperty->status === 'Active' ? '#28A745' : '#FFD700' }}; color: white;">
                                {{ $selectedProperty->status }}
                            </span>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-200 text-gray-700" style="padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; background: #e5e7eb; color: #374151;">
                                {{ ucfirst($selectedProperty->property_type) }}
                            </span>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-700" style="padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; background: #dbeafe; color: #1d4ed8;">
                                {{ ucfirst($selectedProperty->listing_type) }}
                            </span>
                        </div>
                    </div>

                    <!-- Property Stats -->
                    <div class="grid grid-cols-3 gap-4 mb-6" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1.5rem;">
                        @if($selectedProperty->bedrooms)
                            <div class="bg-gray-50 rounded-lg p-4 text-center" style="background: #f9fafb; border-radius: 0.5rem; padding: 1rem; text-align: center;">
                                <div class="text-2xl font-bold text-gray-900" style="font-size: 1.5rem; font-weight: 700; color: #111827;">{{ $selectedProperty->bedrooms }}</div>
                                <div class="text-sm text-gray-600" style="font-size: 0.875rem; color: #4b5563;">Bedrooms</div>
                            </div>
                        @endif
                        @if($selectedProperty->bathrooms)
                            <div class="bg-gray-50 rounded-lg p-4 text-center" style="background: #f9fafb; border-radius: 0.5rem; padding: 1rem; text-align: center;">
                                <div class="text-2xl font-bold text-gray-900" style="font-size: 1.5rem; font-weight: 700; color: #111827;">{{ $selectedProperty->bathrooms }}</div>
                                <div class="text-sm text-gray-600" style="font-size: 0.875rem; color: #4b5563;">Bathrooms</div>
                            </div>
                        @endif
                        @if($selectedProperty->sqft)
                            <div class="bg-gray-50 rounded-lg p-4 text-center" style="background: #f9fafb; border-radius: 0.5rem; padding: 1rem; text-align: center;">
                                <div class="text-2xl font-bold text-gray-900" style="font-size: 1.5rem; font-weight: 700; color: #111827;">{{ number_format($selectedProperty->sqft) }}</div>
                                <div class="text-sm text-gray-600" style="font-size: 0.875rem; color: #4b5563;">Sqft</div>
                            </div>
                        @endif
                    </div>

                    <!-- Description -->
                    @if($selectedProperty->description)
                        <div class="mb-6" style="margin-bottom: 1.5rem;">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2" style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 0.5rem;">Description</h4>
                            <p class="text-gray-600" style="color: #4b5563; line-height: 1.625;">{{ $selectedProperty->description }}</p>
                        </div>
                    @endif

                    <!-- Location -->
                    <div class="mb-6" style="margin-bottom: 1.5rem;">
                        <h4 class="text-lg font-semibold text-gray-900 mb-2" style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 0.5rem;">Location</h4>
                        <div class="flex items-start gap-2" style="display: flex; align-items: flex-start; gap: 0.5rem;">
                            <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem; color: #9ca3af; margin-top: 0.125rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <div class="text-gray-900 font-medium" style="color: #111827; font-weight: 500;">{{ $selectedProperty->address }}</div>
                                <div class="text-gray-600 text-sm" style="color: #4b5563; font-size: 0.875rem;">
                                    {{ $selectedProperty->city }}, {{ $selectedProperty->state }} {{ $selectedProperty->zip_code }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Owner Information -->
                    @if($selectedProperty->owner_phone || $selectedProperty->owner_email)
                        <div class="bg-gradient-to-r from-orange-50 to-red-50 rounded-lg p-4 mb-6" style="background: linear-gradient(to right, #fff7ed, #fef2f2); border-radius: 0.5rem; padding: 1rem; margin-bottom: 1.5rem;">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2" style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 0.5rem;">Contact Information</h4>
                            <div class="space-y-2" style="display: flex; flex-direction: column; gap: 0.5rem;">
                                @if($selectedProperty->owner_phone)
                                    <div class="flex items-center gap-2" style="display: flex; align-items: center; gap: 0.5rem;">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem; color: #ea580c;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <span class="text-gray-700" style="color: #374151;">{{ $selectedProperty->owner_phone }}</span>
                                    </div>
                                @endif
                                @if($selectedProperty->owner_email)
                                    <div class="flex items-center gap-2" style="display: flex; align-items: center; gap: 0.5rem;">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem; color: #ea580c;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="text-gray-700" style="color: #374151;">{{ $selectedProperty->owner_email }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Modal Footer -->
                <div class="flex gap-3 p-6 border-t border-gray-200" style="display: flex; gap: 0.75rem; padding: 1.5rem; border-top: 1px solid #e5e7eb;">
                    <button wire:click="openInquiryModalFromProperty" 
                            class="flex-1 flex items-center justify-center gap-2 px-6 py-3 rounded-lg font-semibold text-white transition-all duration-200"
                            style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; color: white; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); border: none; cursor: pointer; box-shadow: 0 4px 6px -1px rgba(255, 127, 0, 0.3);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Send Inquiry
                    </button>
                    <button wire:click="openFinancingModalFromProperty" 
                            class="flex-1 flex items-center justify-center gap-2 px-6 py-3 rounded-lg font-semibold text-white transition-all duration-200"
                            style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; color: white; background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%); border: none; cursor: pointer; box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Get Financing
                    </button>
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

    <!-- Financing Inquiry Modal -->
    @if($showFinancingModal)
        <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; padding: 1rem;" wire:click="closeFinancingModal">
            <div style="background: white; border-radius: 1rem; max-width: 32rem; width: 100%; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);" wire:click.stop>
                <div style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%); padding: 1.5rem; border-radius: 1rem 1rem 0 0;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <svg class="w-6 h-6" style="width: 1.5rem; height: 1.5rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: white;">Financing Inquiry</h3>
                        </div>
                        <button wire:click="closeFinancingModal" style="color: white; background: none; border: none; cursor: pointer; font-size: 1.5rem;">
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

                <form wire:submit.prevent="submitFinancingInquiry" style="padding: 1.5rem;">
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Full Name <span style="color: #ef4444;">*</span></label>
                        <input type="text" wire:model="financingFullName" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#3B82F6'" onblur="this.style.borderColor='#d1d5db'">
                        @error('financingFullName') 
                            <span style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Email <span style="color: #ef4444;">*</span></label>
                        <input type="email" wire:model="financingEmail" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#3B82F6'" onblur="this.style.borderColor='#d1d5db'">
                        @error('financingEmail') 
                            <span style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Phone <span style="color: #ef4444;">*</span></label>
                        <input type="tel" wire:model="financingPhone" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#3B82F6'" onblur="this.style.borderColor='#d1d5db'">
                        @error('financingPhone') 
                            <span style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Monthly Income (TZS) <span style="color: #ef4444;">*</span></label>
                        <input type="number" wire:model="financingIncome" placeholder="e.g., 1000000" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#3B82F6'" onblur="this.style.borderColor='#d1d5db'">
                        @error('financingIncome') 
                            <span style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Employment Status <span style="color: #ef4444;">*</span></label>
                        <select wire:model="financingEmployment" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s; background: white;" onfocus="this.style.borderColor='#3B82F6'" onblur="this.style.borderColor='#d1d5db'">
                            <option value="">Select employment status</option>
                            <option value="Employed Full-Time">Employed Full-Time</option>
                            <option value="Employed Part-Time">Employed Part-Time</option>
                            <option value="Self-Employed">Self-Employed</option>
                            <option value="Business Owner">Business Owner</option>
                            <option value="Retired">Retired</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('financingEmployment') 
                            <span style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Additional Information (Optional)</label>
                        <textarea wire:model="financingMessage" rows="3" style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; outline: none; transition: border-color 0.2s; resize: vertical;" onfocus="this.style.borderColor='#3B82F6'" onblur="this.style.borderColor='#d1d5db'" placeholder="Tell us more about your financing needs..."></textarea>
                    </div>

                    <div style="display: flex; gap: 0.75rem; justify-content: flex-end;">
                        <button type="button" wire:click="closeFinancingModal" style="padding: 0.5rem 1rem; background: #f3f4f6; color: #374151; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600; cursor: pointer; transition: background-color 0.2s;">
                            Cancel
                        </button>
                        <button type="submit" style="padding: 0.5rem 1.5rem; background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%); color: white; border: none; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600; cursor: pointer; transition: box-shadow 0.2s;" onmouseover="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.2)'" onmouseout="this.style.boxShadow='none'">
                            Submit Inquiry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
</div>