<div>
    <style>
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
            border-radius: 0.5rem;
            font-size: 0.875rem;
            background: white;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .filter-select:focus {
            outline: none;
            border-color: #FF7F00;
            box-shadow: 0 0 0 3px rgba(255, 127, 0, 0.1);
        }
        
        /* Materials-specific filter styles */
        .materials-filters {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .filters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid #FF7F00;
        }
        
        .filters-title {
            font-size: 1.25rem;
            font-weight: 700;
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
        }
        
        .filters-content {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .filters-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .btn-clear-compact {
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .btn-clear-compact:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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
                    <a href="/materials" class="nav-item nav-active">MATERIALS</a>
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

    <!-- Hero Section with Sidebar -->
    <div class="hero-layout">
        <!-- Department Sidebar -->
        <div class="department-sidebar">
            <button class="departments-btn">
                <span>All Departments</span>
                <svg class="dropdown-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div class="department-list">
                <a href="#" class="department-item">Steel & Metal</a>
                <a href="#" class="department-item">Concrete & Cement</a>
                <a href="#" class="department-item">Bricks & Blocks</a>
                <a href="#" class="department-item">Roofing Materials</a>
                <a href="#" class="department-item">Plumbing</a>
                <a href="#" class="department-item">Electrical</a>
                <a href="#" class="department-item">Tools & Equipment</a>
                <a href="#" class="department-item">Safety Gear</a>
                <a href="#" class="department-item">Hardware</a>
                <a href="#" class="department-item">Insulation</a>
                <a href="#" class="department-item">Flooring</a>
            </div>
        </div>

        <!-- Hero Banner -->
        <div class="hero-banner">
            <div class="banner-content">
                <div class="banner-text">
                    <span class="banner-tag">PREMIUM QUALITY</span>
                    <h1 class="banner-title">Building Materials</h1>
                    <h2 class="banner-subtitle">100% Professional Grade</h2>
                    <p class="banner-description">Free Delivery and Expert Consultation Available</p>
                    <button class="banner-btn">SHOP NOW</button>
                </div>
                <div class="banner-image">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=600&h=400&fit=crop" alt="Building Materials">
                </div>
            </div>
        </div>
    </div>



    <style>
        .properties-section {
            background-color: #f9fafb;
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
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            grid-auto-rows: masonry;
        }
        
        @media (min-width: 768px) {
            .properties-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }
        
        @media (min-width: 1024px) {
            .properties-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
            }
        }
        
        /* Materials-specific card variations */
        .property-card:nth-child(3n+1) {
            grid-row: span 2;
        }
        
        .property-card:nth-child(3n+2) {
            grid-column: span 1;
        }
        
        .property-card:nth-child(3n+3) {
            grid-column: span 1;
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
        
        /* Materials-specific styles */
        .materials-showcase {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-top: 3px solid #FF7F00;
        }
        
        .materials-header {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .materials-title-section {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .materials-title {
            color: #FF7F00;
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
        }
        
        .materials-subtitle {
            color: #6C757D;
            font-size: 1.1rem;
            margin: 0;
        }
        
        .materials-stats {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
        }
        
        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 0.5rem;
            border: 2px solid #FF7F00;
        }
        
        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #FF7F00;
        }
        
        .stat-label {
            font-size: 0.875rem;
            color: #6C757D;
            font-weight: 600;
        }
        
        .materials-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .materials-action-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: #FF7F00;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .materials-action-btn:hover {
            background: #e06a00;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 127, 0, 0.3);
        }
        
        .action-icon {
            width: 1.25rem;
            height: 1.25rem;
        }
        
        /* Materials Services Styles */
        .materials-services {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-top: 3px solid #FF7F00;
        }
        
        .services-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .services-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #FF7F00;
            margin: 0 0 1rem 0;
        }
        
        .services-subtitle {
            font-size: 1.2rem;
            color: #6C757D;
            margin: 0;
        }
        
        .materials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }
        
        .materials-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .materials-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1);
            border-color: #FF7F00;
        }
        
        .materials-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .materials-icon svg {
            width: 2rem;
            height: 2rem;
            color: white;
        }
        
        .service-content {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .service-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        
        .feature-tag {
            background: #FF7F00;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        /* OGANI-Inspired Layout Styles */
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
        
        .hero-layout {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 1rem;
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 0.5rem;
        }
        
        .department-sidebar {
            background: white;
            border-radius: 0.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .departments-btn {
            width: 100%;
            background: #FF7F00;
            color: white;
            border: none;
            padding: 0.5rem 0.75rem;
            font-weight: 600;
            font-size: 0.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }
        
        .dropdown-icon {
            width: 0.75rem;
            height: 0.75rem;
        }
        
        .department-list {
            padding: 0.5rem 0;
        }
        
        .department-item {
            display: block;
            padding: 0.25rem 0.75rem;
            color: #333333;
            text-decoration: none;
            font-size: 0.75rem;
            border-bottom: 1px solid #f8f9fa;
            transition: background-color 0.2s;
        }
        
        .department-item:hover {
            background: #f8f9fa;
            color: #FF7F00;
        }
        
        .hero-banner {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: 0.25rem;
            overflow: hidden;
        }
        
        .banner-content {
            display: flex;
            align-items: center;
            padding: 1rem;
        }
        
        .banner-text {
            flex: 1;
            padding-right: 1rem;
        }
        
        .banner-tag {
            color: #FF7F00;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .banner-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: #333333;
            margin: 0.25rem 0;
        }
        
        .banner-subtitle {
            font-size: 1rem;
            color: #6C757D;
            margin: 0.25rem 0;
        }
        
        .banner-description {
            color: #6C757D;
            font-size: 0.75rem;
            margin: 0.5rem 0 1rem 0;
        }
        
        .banner-btn {
            background: #FF7F00;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
            text-transform: uppercase;
        }
        
        .banner-image {
            flex: 1;
        }
        
        .banner-image img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 0.25rem;
        }
        
        .category-showcase {
            background: white;
            padding: 1rem 0;
        }
        
        .showcase-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 0.5rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.5rem;
        }
        
        .category-card {
            background: white;
            border-radius: 0.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }
        
        .category-card:hover {
            transform: translateY(-2px);
        }
        
        .category-image {
            height: 80px;
            overflow: hidden;
        }
        
        .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .category-title {
            padding: 0.5rem;
            text-align: center;
            font-weight: 700;
            color: #333333;
            margin: 0;
            font-size: 0.75rem;
        }
        
        .featured-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0 0.5rem;
        }
        
        .category-tabs {
            display: flex;
            gap: 0.5rem;
        }
        
        .tab-btn {
            padding: 0.25rem 0.5rem;
            border: 1px solid #e9ecef;
            background: white;
            color: #6C757D;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.75rem;
        }
        
        .tab-btn.active,
        .tab-btn:hover {
            background: #FF7F00;
            color: white;
            border-color: #FF7F00;
        }
        
        .promotional-banners {
            background: #f8f9fa;
            padding: 1rem 0;
        }
        
        .banners-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 0.5rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
        }
        
        .promo-banner {
            border-radius: 0.25rem;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .promo-left {
            background: linear-gradient(135deg, #28A745, #66D9A3);
        }
        
        .promo-right {
            background: white;
        }
        
        .promo-content {
            display: flex;
            align-items: center;
            padding: 0.75rem;
        }
        
        .promo-text {
            flex: 1;
            color: white;
        }
        
        .promo-right .promo-text {
            color: #333333;
        }
        
        .promo-tag {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            opacity: 0.9;
        }
        
        .promo-title {
            font-size: 1rem;
            font-weight: 700;
            margin: 0.25rem 0;
        }
        
        .promo-subtitle {
            margin: 0.25rem 0 0.5rem 0;
            opacity: 0.9;
            font-size: 0.75rem;
        }
        
        .promo-btn {
            background: white;
            color: #28A745;
            border: none;
            padding: 0.25rem 0.75rem;
            border-radius: 0.25rem;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.75rem;
        }
        
        .promo-right .promo-btn {
            background: #FF7F00;
            color: white;
        }
        
        .promo-image {
            flex: 1;
            text-align: center;
        }
        
        .promo-image img {
            width: 100px;
            height: 80px;
            object-fit: cover;
            border-radius: 0.25rem;
        }
        
        .materials-sections {
            background: white;
            padding: 1rem 0;
        }
        
        .sections-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 0.5rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.5rem;
        }
        
        .materials-section {
            background: #f8f9fa;
            border-radius: 0.25rem;
            padding: 0.75rem;
        }
        
        .materials-section .section-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: #333333;
            margin-bottom: 0.5rem;
        }
        
        .materials-list {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .material-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            background: white;
            border-radius: 0.25rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .material-item img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 0.25rem;
        }
        
        .material-info {
            flex: 1;
        }
        
        .material-name {
            font-size: 0.75rem;
            font-weight: 600;
            color: #333333;
            margin: 0 0 0.125rem 0;
        }
        
        .material-price {
            font-size: 0.75rem;
            font-weight: 700;
            color: #FF7F00;
        }
        
        /* Modern Materials Grid Styles */
        .modern-materials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
            padding: 1rem 0;
        }
        
        .material-card-modern {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            position: relative;
        }
        
        .material-card-modern:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border-color: #FF7F00;
        }
        
        .material-image-wrapper {
            position: relative;
            height: 150px;
            overflow: hidden;
            background: #f8f9fa;
        }
        
        .material-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .material-card-modern:hover .material-image {
            transform: scale(1.05);
        }
        
        .floating-badge {
            position: absolute;
            top: 0.5rem;
            left: 0.5rem;
            z-index: 2;
        }
        
        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.625rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .badge-discount {
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            color: white;
        }
        
        .badge-featured {
            background: linear-gradient(135deg, #007BFF 0%, #0056b3 100%);
            color: white;
        }
        
        .badge-stock {
            background: linear-gradient(135deg, #28A745 0%, #1e7e34 100%);
            color: white;
        }
        
        .badge-out {
            background: #6C757D;
            color: white;
        }
        
        .quick-actions {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            opacity: 0;
            transform: translateX(10px);
            transition: all 0.3s ease;
        }
        
        .material-card-modern:hover .quick-actions {
            opacity: 1;
            transform: translateX(0);
        }
        
        .action-btn {
            width: 1.75rem;
            height: 1.75rem;
            border-radius: 50%;
            background: white;
            border: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .action-btn:hover {
            background: #FF7F00;
            color: white;
            transform: scale(1.1);
        }
        
        .action-icon {
            width: 0.875rem;
            height: 0.875rem;
        }
        
        .material-content {
            padding: 0.75rem;
        }
        
        .material-meta {
            display: flex;
            gap: 0.25rem;
            margin-bottom: 0.5rem;
        }
        
        .category-tag {
            background: #f1f5f9;
            color: #6C757D;
            padding: 0.125rem 0.25rem;
            border-radius: 0.125rem;
            font-size: 0.625rem;
            font-weight: 600;
        }
        
        .brand-tag {
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            color: white;
            padding: 0.125rem 0.375rem;
            border-radius: 0.25rem;
            font-size: 0.625rem;
            font-weight: 600;
        }
        
        .material-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: #333333;
            margin: 0 0 0.5rem 0;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .material-specs {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            margin-bottom: 0.5rem;
        }
        
        .spec-item {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.75rem;
            color: #6C757D;
        }
        
        .spec-icon {
            width: 0.75rem;
            height: 0.75rem;
            color: #FF7F00;
        }
        
        .price-section {
            margin-bottom: 0.5rem;
        }
        
        .price-container {
            display: flex;
            flex-direction: column;
            gap: 0.125rem;
        }
        
        .original-price {
            font-size: 0.75rem;
            color: #6C757D;
            text-decoration: line-through;
        }
        
        .discounted-price {
            font-size: 1rem;
            font-weight: 800;
            color: #FF4500;
        }
        
        .current-price {
            font-size: 1rem;
            font-weight: 800;
            color: #FF7F00;
        }
        
        .savings {
            font-size: 0.625rem;
            color: #28A745;
            font-weight: 600;
        }
        
        .supplier-info {
            border-top: 1px solid #f1f5f9;
            padding-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .supplier-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .supplier-name {
            font-size: 0.75rem;
            color: #6C757D;
            font-weight: 600;
        }
        
        .sku-info {
            font-size: 0.625rem;
            color: #6C757D;
        }
        
        .material-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-primary {
            flex: 1;
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            color: white;
            border: none;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-weight: 600;
            font-size: 0.625rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.2rem;
            transition: all 0.2s ease;
            text-transform: uppercase;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #e67200 0%, #e63e00 100%);
        }
        
        .btn-secondary {
            background: white;
            color: #6C757D;
            border: 1px solid #e2e8f0;
            padding: 0.25rem 0.375rem;
            border-radius: 0.25rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            font-size: 0.625rem;
        }
        
        .btn-secondary:hover {
            background: rgba(255, 127, 0, 0.1);
            border-color: #FF7F00;
            color: #FF7F00;
        }
        
        .btn-icon {
            width: 0.625rem;
            height: 0.625rem;
        }
        
        .btn-add-cart {
            flex: 1;
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            color: white;
            border: none;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-weight: 600;
            font-size: 0.625rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.2rem;
            transition: all 0.2s ease;
            text-transform: uppercase;
        }
        
        .btn-add-cart:hover {
            background: linear-gradient(135deg, #e67200 0%, #e63e00 100%);
        }
        
        .btn-quick-view {
            background: white;
            color: #6C757D;
            border: 1px solid #e2e8f0;
            padding: 0.25rem 0.375rem;
            border-radius: 0.25rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            font-size: 0.625rem;
        }
        
        .btn-quick-view:hover {
            background: rgba(255, 127, 0, 0.1);
            border-color: #FF7F00;
            color: #FF7F00;
        }
        
        .no-materials-state {
            grid-column: 1 / -1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 4rem 2rem;
        }
        
        .empty-state-content {
            text-align: center;
            max-width: 400px;
        }
        
        .empty-state-icon {
            width: 4rem;
            height: 4rem;
            margin: 0 auto 1.5rem;
            color: #94a3b8;
        }
        
        .empty-state-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 0.5rem 0;
        }
        
        .empty-state-text {
            color: #64748b;
            margin: 0 0 1.5rem 0;
        }
        
        .empty-state-btn {
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .empty-state-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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


    <div class="properties-content">
            <!-- Section Header with Tabs -->
            <div class="section-header featured-header" style="background: white; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); margin-bottom: 1.5rem;">
                <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <div style="width: 3rem; height: 3rem; border-radius: 0.5rem; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); display: flex; align-items: center; justify-content: center;">
                            <svg style="width: 1.5rem; height: 1.5rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="section-title" style="margin: 0; font-size: 1.5rem; font-weight: 700; color: #1f2937;">Featured Materials</h2>
                            <p style="margin: 0; font-size: 0.875rem; color: #6b7280;">{{ $materials->total() }} products available</p>
                        </div>
                    </div>
                   
                </div>
                <div class="category-tabs justify-end" style="width: 100%;">
                <button wire:click="openCartModal" style="position: relative; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white; border-radius: 0.5rem; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; font-weight: 600; box-shadow: 0 4px 6px -1px rgba(255, 127, 0, 0.3);">
                        <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span>View Cart</span>
                        @if($this->cartCount > 0)
                            <span style="position: absolute; top: -0.5rem; right: -0.5rem; background: #ef4444; color: white; font-size: 0.875rem; font-weight: 700; padding: 0.25rem 0.5rem; border-radius: 9999px; min-width: 1.5rem; text-align: center; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">{{ $this->cartCount }}</span>
                        @endif
                    </button>
                </div>
            </div>

            <!-- Modern Materials Grid -->
            <div class="modern-materials-grid">
                @forelse($materials as $material)
                    <div class="material-card-modern">
                        <!-- Material Image with Overlay -->
                        <div class="material-image-wrapper group">
                            @php
                                $productImages = $material->images ? (is_array($material->images) ? $material->images : json_decode($material->images, true)) : [];
                                $firstImage = !empty($productImages) ? $productImages[0] : $material->image_url;
                                $imageCount = count($productImages);
                            @endphp
                            
                            <img 
                                src="{{ asset('storage/' . $firstImage) }}" 
                                alt="{{ $material->name }}"
                                class="material-image"
                            >
                            
                            @if($imageCount > 1)
                                <button wire:click="viewImages({{ $material->id }})" 
                                        style="position: absolute; bottom: 0.5rem; right: 0.5rem; padding: 0.25rem 0.5rem; font-size: 0.75rem; background: rgba(0, 0, 0, 0.7); color: white; border-radius: 0.25rem; border: none; cursor: pointer; opacity: 0; transition: opacity 0.2s;"
                                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                                    <i class="fas fa-images" style="margin-right: 0.25rem;"></i> +{{ $imageCount - 1 }} more
                                </button>
                            @endif
                            
                            <!-- Floating Badge -->
                            <div class="floating-badge">
                                @if($material->discount_percentage > 0)
                                    <span class="badge badge-discount">{{ $material->discount_percentage }}% OFF</span>
                                @elseif($material->is_featured)
                                    <span class="badge badge-featured">Featured</span>
                                @elseif($material->stock_quantity > 0)
                                    <span class="badge badge-stock">In Stock</span>
                                @else
                                    <span class="badge badge-out">Out of Stock</span>
                                @endif
                            </div>
                            
                            <!-- Quick Actions -->
                            <div class="quick-actions">
                                <button class="action-btn wishlist-btn" title="Add to Wishlist">
                                    <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="action-btn compare-btn" title="Compare">
                                    <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Material Content -->
                        <div class="material-content">
                            <!-- Category & Brand -->
                            <div class="material-meta">
                                <span class="category-tag">{{ $material->category }}</span>
                                <span class="brand-tag">{{ $material->brand }}</span>
                            </div>

                            <!-- Material Name -->
                            <h3 class="material-title">{{ $material->name }}</h3>

                            <!-- Material Specs -->
                            <div class="material-specs">
                                <div class="spec-item">
                                    <svg class="spec-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <span>{{ $material->stock_quantity }} {{ $material->unit }}</span>
                                </div>
                                <div class="spec-item">
                                    <svg class="spec-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $material->is_available ? 'Available' : 'Unavailable' }}</span>
                                </div>
                            </div>

                            <!-- Price Section -->
                            <div class="price-section">
                                @if($material->discount_percentage > 0)
                                    <div class="price-container">
                                        <span class="original-price">TZS {{ number_format($material->price, 0) }}</span>
                                        <span class="discounted-price">TZS {{ number_format($material->discounted_price, 0) }}</span>
                                        <span class="savings">Save TZS {{ number_format($material->price - $material->discounted_price, 0) }}</span>
                                    </div>
                                @else
                                    <div class="price-container">
                                        <span class="current-price">TZS {{ number_format($material->price, 0) }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Supplier Info -->
                            <div class="supplier-info">
                                <div class="supplier-details">
                                    <span class="supplier-name">{{ $material->supplier_name }}</span>
                                    <span class="sku-info">SKU: {{ $material->sku }}</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="material-actions">
                                <button wire:click="promptAddToCart({{ $material->id }})" class="btn-add-cart">
                                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                                    </svg>
                                    Add to Cart
                                </button>
                                <button wire:click="viewImages({{ $material->id }})" class="btn-quick-view">
                                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Quick View
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="no-materials-state">
                        <div class="empty-state-content">
                            <div class="empty-state-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <h3 class="empty-state-title">No Materials Found</h3>
                            <p class="empty-state-text">Try adjusting your search criteria or filters to find more materials.</p>
                            <button class="empty-state-btn">Clear Filters</button>
                        </div>
                    </div>
                @endforelse
            </div>

      


    </div>
    


    <!-- Promotional Banners -->
    <div class="promotional-bannersx mt-10">
        <div class="banners-content">
            <div class="promo-banner promo-left">
                <div class="promo-content">
                    <div class="promo-text">
                        <span class="promo-tag">PREMIUM STEEL</span>
                        <h3 class="promo-title">Steel & Metal</h3>
                        <p class="promo-subtitle">100% Professional Grade Steel</p>
                        <button class="promo-btn">SHOP NOW</button>
                    </div>
                    <div class="promo-image">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=300&fit=crop" alt="Steel Materials">
                    </div>
                </div>
            </div>
            <div class="promo-banner promo-right">
                <div class="promo-content">
                    <div class="promo-text">
                        <span class="promo-tag">CONCRETE & CEMENT</span>
                        <h3 class="promo-title">Building Materials</h3>
                        <p class="promo-subtitle">With 25% Off All Concrete</p>
                        <button class="promo-btn">SHOP NOW</button>
                    </div>
                    <div class="promo-image">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=300&fit=crop" alt="Concrete Materials">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest/Top Rated Materials -->
    <div class="materials-sections">
        <div class="sections-content">
            <div class="materials-section">
                <h3 class="section-title">Latest Materials</h3>
                <div class="materials-list">
                    <div class="material-item">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=80&h=80&fit=crop" alt="Material">
                        <div class="material-info">
                            <h4 class="material-name">Steel Rebar 12mm</h4>
                            <span class="material-price">$45.50</span>
                        </div>
                    </div>
                    <div class="material-item">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=80&h=80&fit=crop" alt="Material">
                        <div class="material-info">
                            <h4 class="material-name">Concrete Mix C25/30</h4>
                            <span class="material-price">$120.00</span>
                        </div>
                    </div>
                    <div class="material-item">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=80&h=80&fit=crop" alt="Material">
                        <div class="material-info">
                            <h4 class="material-name">Red Clay Bricks</h4>
                            <span class="material-price">$0.85</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="materials-section">
                <h3 class="section-title">Top Rated</h3>
                <div class="materials-list">
                    <div class="material-item">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=80&h=80&fit=crop" alt="Material">
                        <div class="material-info">
                            <h4 class="material-name">Steel I-Beam 200x100mm</h4>
                            <span class="material-price">$85.00</span>
                        </div>
                    </div>
                    <div class="material-item">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=80&h=80&fit=crop" alt="Material">
                        <div class="material-info">
                            <h4 class="material-name">Roofing Sheets</h4>
                            <span class="material-price">$25.00</span>
                        </div>
                    </div>
                    <div class="material-item">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=80&h=80&fit=crop" alt="Material">
                        <div class="material-info">
                            <h4 class="material-name">PVC Pipes 110mm</h4>
                            <span class="material-price">$15.50</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="materials-section">
                <h3 class="section-title">Review Products</h3>
                <div class="materials-list">
                    <div class="material-item">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=80&h=80&fit=crop" alt="Material">
                        <div class="material-info">
                            <h4 class="material-name">Electrical Cable 2.5mm²</h4>
                            <span class="material-price">$3.20</span>
                        </div>
                    </div>
                    <div class="material-item">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=80&h=80&fit=crop" alt="Material">
                        <div class="material-info">
                            <h4 class="material-name">Cement Portland Type I</h4>
                            <span class="material-price">$8.50</span>
                        </div>
                    </div>
                    <div class="material-item">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=80&h=80&fit=crop" alt="Material">
                        <div class="material-info">
                            <h4 class="material-name">Insulation Materials</h4>
                            <span class="material-price">$12.00</span>
                        </div>
                    </div>
                </div>
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
    
    <!-- Materials Services Section -->
    <div class="services-section materials-services">
        <div class="services-content">
            <div class="services-header">
                <h2 class="services-title">Materials & Services</h2>
                <p class="services-subtitle">Everything you need for your construction projects</p>
            </div>
            
            <div class="services-grid materials-grid">
                <!-- Construction Materials -->
                <div class="service-card materials-card">
                    <div class="service-icon materials-icon" style="background: linear-gradient(135deg, #FF7F00, #FFB366);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Construction Materials</h3>
                        <p class="service-description">Premium building materials for residential and commercial construction projects.</p>
                        <div class="service-features">
                            <span class="feature-tag">Steel & Metal</span>
                            <span class="feature-tag">Concrete</span>
                            <span class="feature-tag">Bricks</span>
                        </div>
                    </div>
                </div>

                <!-- Tools & Equipment -->
                <div class="service-card materials-card">
                    <div class="service-icon materials-icon" style="background: linear-gradient(135deg, #007BFF, #66B3FF);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Tools & Equipment</h3>
                        <p class="service-description">Professional-grade tools and equipment for construction and renovation projects.</p>
                        <div class="service-features">
                            <span class="feature-tag">Power Tools</span>
                            <span class="feature-tag">Hand Tools</span>
                            <span class="feature-tag">Safety Gear</span>
                        </div>
                    </div>
                </div>

                <!-- Bulk Orders -->
                <div class="service-card materials-card">
                    <div class="service-icon materials-icon" style="background: linear-gradient(135deg, #28A745, #66D9A3);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Bulk Orders</h3>
                        <p class="service-description">Special pricing and delivery for large construction projects and contractors.</p>
                        <div class="service-features">
                            <span class="feature-tag">Volume Discounts</span>
                            <span class="feature-tag">Delivery</span>
                            <span class="feature-tag">Custom Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Auth Modals -->
    @livewire('auth-modals')

    <!-- Add to Cart Confirmation Modal -->
    @if($showAddToCartConfirm)
        <div style="position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5);" wire:click="closeAddToCartConfirm">
            <div style="position: relative; max-width: 28rem; width: 100%; margin: 0 1rem;" wire:click.stop>
                <div style="background: white; border-radius: 1rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); padding: 2rem;">
                    <div style="text-align: center; margin-bottom: 1.5rem;">
                        <div style="width: 4rem; height: 4rem; border-radius: 50%; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center;">
                            <svg style="width: 2rem; height: 2rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin: 0 0 0.5rem 0;">Add item to cart?</h3>
                        <p style="font-size: 0.875rem; color: #6b7280; margin: 0;">Do you want to add this item to your shopping cart?</p>
                    </div>
                    
                    <div style="display: flex; gap: 0.75rem;">
                        <button wire:click="closeAddToCartConfirm" style="flex: 1; padding: 0.75rem; border: 2px solid #e5e7eb; color: #6b7280; border-radius: 0.5rem; font-weight: 600; cursor: pointer; background: white; transition: all 0.2s;">
                            Cancel
                        </button>
                        <button wire:click="addToCart" style="flex: 1; padding: 0.75rem; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white; border-radius: 0.5rem; font-weight: 600; cursor: pointer; border: none; transition: all 0.2s; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Cart Modal -->
    @if($showCartModal)
        <div style="position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5);" wire:click="closeCartModal">
            <div style="position: relative; max-width: 48rem; width: 100%; margin: 0 1rem; max-height: 90vh; overflow-y: auto;" wire:click.stop>
                <div style="background: white; border-radius: 1rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 1.5rem; border-bottom: 3px solid #FF7F00;">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <div style="width: 3rem; height: 3rem; border-radius: 0.5rem; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); display: flex; align-items: center; justify-content: center;">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #1f2937;">Shopping Cart</h3>
                                    <p style="font-size: 0.875rem; color: #6b7280;">{{ $this->cartCount }} items</p>
                                </div>
                            </div>
                            <button wire:click="closeCartModal" style="color: #9ca3af; font-size: 1.5rem; background: none; border: none; cursor: pointer;">×</button>
                        </div>
                    </div>

                    <div style="padding: 1.5rem;">
                        @if(empty($cart))
                            <div style="text-align: center; padding: 3rem 0;">
                                <svg class="w-16 h-16" style="margin: 0 auto; color: #d1d5db;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <p style="margin-top: 1rem; color: #6b7280; font-size: 1.125rem;">Your cart is empty</p>
                            </div>
                        @else
                            <div style="display: flex; flex-direction: column; gap: 1rem;">
                                @foreach($cart as $key => $item)
                                    <div style="display: flex; gap: 1rem; padding: 1rem; border: 1px solid #e5e7eb; border-radius: 0.5rem;">
                                        @if($item['image'])
                                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 5rem; height: 5rem; object-fit: cover; border-radius: 0.5rem;">
                                        @else
                                            <div style="width: 5rem; height: 5rem; background: #f3f4f6; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center;">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                        
                                        <div style="flex: 1;">
                                            <h4 style="font-weight: 600; color: #1f2937;">{{ $item['name'] }}</h4>
                                            <p style="font-size: 0.875rem; color: #6b7280;">SKU: {{ $item['sku'] }}</p>
                                            <p style="font-weight: 600; color: #FF7F00; margin-top: 0.5rem;">TSh {{ number_format($item['price'], 0) }}</p>
                                            
                                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-top: 0.75rem;">
                                                <button wire:click="updateQuantity('{{ $key }}', {{ $item['quantity'] - 1 }})" style="width: 2rem; height: 2rem; border: 1px solid #d1d5db; border-radius: 0.25rem; background: white; cursor: pointer;">-</button>
                                                <input type="number" value="{{ $item['quantity'] }}" wire:change="updateQuantity('{{ $key }}', $event.target.value)" style="width: 4rem; text-align: center; border: 1px solid #d1d5db; border-radius: 0.25rem; padding: 0.25rem;">
                                                <button wire:click="updateQuantity('{{ $key }}', {{ $item['quantity'] + 1 }})" style="width: 2rem; height: 2rem; border: 1px solid #d1d5db; border-radius: 0.25rem; background: white; cursor: pointer;">+</button>
                                            </div>
                                        </div>
                                        
                                        <div style="display: flex; flex-direction: column; align-items: flex-end; justify-content: space-between;">
                                            <button wire:click="removeFromCart('{{ $key }}')" style="color: #ef4444; background: none; border: none; cursor: pointer;">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                            <p style="font-weight: 700; color: #1f2937;">TSh {{ number_format($item['price'] * $item['quantity'], 0) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 2px solid #e5e7eb;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                    <span style="color: #6b7280;">Subtotal</span>
                                    <span style="font-weight: 600;">TSh {{ number_format($this->cartTotal, 0) }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                    <span style="color: #6b7280;">Tax (18%)</span>
                                    <span style="font-weight: 600;">TSh {{ number_format($this->cartTotal * 0.18, 0) }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                    <span style="color: #6b7280;">Shipping</span>
                                    <span style="font-weight: 600;">TSh 5,000</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; padding-top: 0.75rem; border-top: 1px solid #e5e7eb;">
                                    <span style="font-size: 1.125rem; font-weight: 700;">Total</span>
                                    <span style="font-size: 1.125rem; font-weight: 700; color: #FF7F00;">TSh {{ number_format($this->cartTotal * 1.18 + 5000, 0) }}</span>
                                </div>
                            </div>

                            <div style="margin-top: 1.5rem; display: flex; gap: 0.75rem;">
                                <button wire:click="clearCart" style="flex: 1; padding: 0.75rem; border: 2px solid #FF7F00; color: #FF7F00; border-radius: 0.5rem; font-weight: 600; cursor: pointer; background: white;">Clear Cart</button>
                                <button wire:click="proceedToCheckout" style="flex: 2; padding: 0.75rem; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white; border-radius: 0.5rem; font-weight: 600; cursor: pointer; border: none;">Proceed to Checkout</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Checkout Modal -->
    @if($showCheckoutModal)
        <div style="position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5);" wire:click="closeCheckoutModal">
            <div style="position: relative; max-width: 48rem; width: 100%; margin: 0 1rem; max-height: 90vh; overflow-y: auto;" wire:click.stop>
                <div style="background: white; border-radius: 1rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 1.5rem; border-bottom: 3px solid #FF7F00;">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <div style="width: 3rem; height: 3rem; border-radius: 0.5rem; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); display: flex; align-items: center; justify-content: center;">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #1f2937;">Checkout</h3>
                                    <p style="font-size: 0.875rem; color: #6b7280;">Complete your order</p>
                                </div>
                            </div>
                            <button wire:click="closeCheckoutModal" style="color: #9ca3af; font-size: 1.5rem; background: none; border: none; cursor: pointer;">×</button>
                        </div>
                    </div>

                    <div style="padding: 1.5rem;">
                        <form wire:submit.prevent="placeOrder">
                            <div style="margin-bottom: 1.5rem;">
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Shipping Address *</label>
                                <textarea wire:model="shippingAddress" required style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; min-height: 5rem;" placeholder="Enter your full shipping address"></textarea>
                                @error('shippingAddress') <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span> @enderror
                            </div>

                            <div style="margin-bottom: 1.5rem;">
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Billing Address (Optional)</label>
                                <textarea wire:model="billingAddress" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; min-height: 5rem;" placeholder="Same as shipping address if left empty"></textarea>
                            </div>

                            <div style="margin-bottom: 1.5rem;">
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Payment Method *</label>
                                <select wire:model="paymentMethod" required style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
                                    <option value="lipa_namba">Lipa Namba</option>
                                    <option value="cash">Cash on Delivery</option>
                                </select>
                            </div>

                            @if($paymentMethod === 'lipa_namba')
                                <div style="margin-bottom: 1.5rem; padding: 1rem; background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 69, 0, 0.1) 100%); border: 2px solid #FF7F00; border-radius: 0.5rem;">
                                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                                        <div style="width: 3rem; height: 3rem; border-radius: 0.5rem; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); display: flex; align-items: center; justify-content: center;">
                                            <svg style="width: 1.5rem; height: 1.5rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 style="font-weight: 700; color: #1f2937; margin: 0;">Lipa Namba Payment</h4>
                                            <p style="font-size: 0.875rem; color: #6b7280; margin: 0;">Pay via mobile money</p>
                                        </div>
                                    </div>
                                    
                                    <div style="background: white; border-radius: 0.5rem; padding: 1rem; margin-bottom: 1rem;">
                                        <h5 style="font-weight: 600; color: #374151; margin: 0 0 0.5rem 0; font-size: 0.875rem;">Payment Instructions:</h5>
                                        <ol style="margin: 0; padding-left: 1.25rem; color: #4b5563; font-size: 0.875rem; line-height: 1.5;">
                                            <li>Dial <strong>*150*00#</strong> on your mobile phone</li>
                                            <li>Select <strong>Lipa Namba</strong></li>
                                            <li>Enter Business Number: <strong style="color: #FF7F00;">888000</strong></li>
                                            <li>Enter Amount: <strong style="color: #FF7F00;">TZS {{ number_format($this->cartTotal * 1.18 + 5000, 0) }}</strong></li>
                                            <li>Enter your PIN to complete payment</li>
                                            <li>You will receive an SMS with reference number</li>
                                            <li>Enter the reference number below</li>
                                        </ol>
                                    </div>

                                    <div>
                                        <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Payment Reference Number *</label>
                                        <input type="text" wire:model="lipaNambaReference" required style="width: 100%; padding: 0.75rem; border: 2px solid #FF7F00; border-radius: 0.5rem; font-weight: 600;" placeholder="e.g., ABC123XYZ456">
                                        @error('lipaNambaReference') <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span> @enderror
                                        <p style="font-size: 0.75rem; color: #6b7280; margin-top: 0.25rem;">Enter the reference number from your payment confirmation SMS</p>
                                    </div>
                                </div>
                            @endif

                            <div style="margin-bottom: 1.5rem;">
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Order Notes (Optional)</label>
                                <textarea wire:model="notes" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; min-height: 4rem;" placeholder="Any special instructions or notes"></textarea>
                            </div>

                            <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                                <h4 style="font-weight: 700; margin-bottom: 0.75rem;">Order Summary</h4>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                    <span style="color: #6b7280;">Subtotal</span>
                                    <span style="font-weight: 600;">TSh {{ number_format($this->cartTotal, 0) }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                    <span style="color: #6b7280;">Tax (18%)</span>
                                    <span style="font-weight: 600;">TSh {{ number_format($this->cartTotal * 0.18, 0) }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                    <span style="color: #6b7280;">Shipping</span>
                                    <span style="font-weight: 600;">TSh 5,000</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; padding-top: 0.75rem; border-top: 2px solid #e5e7eb;">
                                    <span style="font-size: 1.125rem; font-weight: 700;">Total</span>
                                    <span style="font-size: 1.125rem; font-weight: 700; color: #FF7F00;">TSh {{ number_format($this->cartTotal * 1.18 + 5000, 0) }}</span>
                                </div>
                            </div>

                            <div style="display: flex; gap: 0.75rem;">
                                <button type="button" wire:click="closeCheckoutModal" style="flex: 1; padding: 0.75rem; border: 2px solid #d1d5db; color: #6b7280; border-radius: 0.5rem; font-weight: 600; cursor: pointer; background: white;">Cancel</button>
                                <button type="submit" wire:loading.attr="disabled" style="flex: 2; padding: 0.75rem; background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%); color: white; border-radius: 0.5rem; font-weight: 600; cursor: pointer; border: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                    <svg wire:loading wire:target="placeOrder" class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span wire:loading.remove wire:target="placeOrder">Place Order</span>
                                    <span wire:loading wire:target="placeOrder">Processing...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Image Viewer Modal -->
    @if($showImageModal)
        <div style="position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.85);" wire:click="closeImageModal">
            <div style="position: relative; max-width: 64rem; width: 100%; margin: 0 1rem;" wire:click.stop>
                <button wire:click="closeImageModal" style="position: absolute; top: -2.5rem; right: 0; color: white; font-size: 1.5rem; background: none; border: none; cursor: pointer;">
                    <i class="fas fa-times"></i>
                </button>
                
                <div style="background: white; border-radius: 0.5rem; overflow: hidden;">
                    <!-- Main Image -->
                    <div style="position: relative; height: 24rem; background: #1a1a1a; display: flex; align-items: center; justify-content: center;">
                        @if($currentImage)
                            <img src="{{ asset('storage/' . $currentImage) }}" alt="Product Image" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                        @endif
                        
                        @if($currentImageIndex > 0)
                            <button wire:click="previousImage" style="position: absolute; left: 0.5rem; top: 50%; transform: translateY(-50%); background: rgba(0, 0, 0, 0.5); color: white; padding: 0.5rem; border-radius: 50%; border: none; cursor: pointer; width: 2.5rem; height: 2.5rem;">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @endif
                        
                        @if($currentImageIndex < count($viewingImages) - 1)
                            <button wire:click="nextImage" style="position: absolute; right: 0.5rem; top: 50%; transform: translateY(-50%); background: rgba(0, 0, 0, 0.5); color: white; padding: 0.5rem; border-radius: 50%; border: none; cursor: pointer; width: 2.5rem; height: 2.5rem;">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
                        
                        <div style="position: absolute; bottom: 0.5rem; left: 50%; transform: translateX(-50%); background: rgba(0, 0, 0, 0.5); color: white; padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.75rem;">
                            {{ $currentImageIndex + 1 }} / {{ count($viewingImages) }}
                        </div>
                    </div>
                    
                    <!-- Thumbnail Strip -->
                    <div style="padding: 0.75rem; background: #f3f4f6;">
                        <div style="display: flex; gap: 0.5rem; overflow-x: auto;">
                            @foreach($viewingImages as $index => $image)
                                <button wire:click="setCurrentImage({{ $index }})" 
                                        style="flex-shrink: 0; width: 4rem; height: 4rem; border-radius: 0.25rem; overflow: hidden; border: 2px solid {{ $currentImageIndex === $index ? '#FF7F00' : 'transparent' }}; cursor: pointer;">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
</div>