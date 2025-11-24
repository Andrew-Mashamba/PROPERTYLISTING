<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVANNA - Property Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Materials Page Inspired Design with Savanna Color Scheme */
        :root {
            --savanna-orange: #FF7F00;
            --vibrant-red: #FF4500;
            --yellow-gold: #FFD700;
            --success-green: #28A745;
            --info-blue: #007BFF;
            --dark-gray: #333333;
            --medium-gray: #6C757D;
            --white: #FFFFFF;
        }
        
        /* Top Bar - Materials Page Style */
        .top-bar {
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            color: white;
            padding: 0.5rem 0;
            font-size: 0.875rem;
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
            align-items: center;
            gap: 1rem;
        }
        
        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .top-bar-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .top-bar-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            transition: background-color 0.2s;
        }
        
        .top-bar-link:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        /* Navigation - Materials Page Style */
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
        
        /* Hero Section - Materials Page Style */
        .hero-section {
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            position: relative;
        }
        
        .hero-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
            position: relative;
        }
        
        .hero-text {
            text-align: center;
            color: white;
        }
        
        .hero-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        /* Sidebar Container - Updated from design.md */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 16rem;
            height: 100vh;
            background: white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-top-right-radius: 0.75rem;
            border-bottom-right-radius: 0.75rem;
            padding: 1.5rem 1rem;
            display: flex;
            flex-direction: column;
            z-index: 50;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }
        
        .sidebar.collapsed {
            transform: translateX(-16rem);
        }
        
        /* Logo Section */
        .sidebar-logo {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .sidebar-logo-text {
            color: #111827;
            font-size: 1.25rem;
            font-weight: bold;
            margin-left: 0.75rem;
        }
        
        .sidebar-logo-icon {
            color: #FF7F00;
            font-size: 1.5rem;
        }
        
        /* Sidebar Toggle Button */
        .sidebar-toggle {
            position: absolute;
            top: 1rem;
            right: -3rem;
            background: #FF7F00;
            color: white;
            border: none;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-toggle:hover {
            background: linear-gradient(135deg, #e67200 0%, #e63e00 100%);
            transform: scale(1.1);
        }
        
        /* Navigation Menu */
        .sidebar-nav {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .nav-section {
            margin-bottom: 1rem;
        }
        
        .nav-section-title {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        /* Navigation Items - Updated from design.md */
        .nav-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: #4B5563;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .nav-item:hover {
            background: #F3F4F6;
            color: #1F2937;
        }
        
        .nav-item.active {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: white;
            background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .nav-item-icon {
            margin-right: 0.75rem;
            font-size: 1.125rem;
            width: 1.25rem;
            text-align: center;
        }
        
        .nav-item-text {
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .nav-item.active .nav-item-text {
            font-weight: 600;
        }
        
        .nav-badge {
            background: #FF4500;
            color: white;
            font-size: 0.75rem;
            padding: 0.125rem 0.5rem;
            border-radius: 0.75rem;
            margin-left: auto;
            font-weight: 600;
        }
        
        .nav-item.active .nav-badge {
            background: white;
            color: #FF7F00;
        }
        
        /* Sub-navigation */
        .nav-sub-item {
            margin-left: 1.5rem;
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            color: #6B7280;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
            font-size: 0.875rem;
        }
        
        .nav-sub-item:hover {
            background: #F9FAFB;
            color: #374151;
        }
        
        /* User Info Section */
        .user-info {
            padding: 1rem;
            border-top: 1px solid #E5E7EB;
            margin-top: auto;
        }
        
        .user-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            margin-right: 0.75rem;
            object-fit: cover;
        }
        
        .user-details {
            flex: 1;
        }
        
        .user-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.125rem;
        }
        
        .user-role {
            font-size: 0.75rem;
            color: #6B7280;
        }
        
        /* Help Card - Updated from design.md */
        .help-card {
            border-radius: 0.75rem;
            padding: 1rem;
            margin-top: 1rem;
            background-color: rgba(255, 127, 0, 0.1);
        }
        
        .help-icon {
            font-size: 1.875rem;
            margin-bottom: 0.5rem;
            color: #FF7F00;
        }
        
        .help-text {
            color: #374151;
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
        }
        
        .help-button {
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
            background-color: #FF7F00;
            border: none;
            width: 100%;
            cursor: pointer;
        }
        
        .help-button:hover {
            background-color: #e67200;
        }
        
        /* Main Content */
        .main-content {
            background: #f8fafc;
            min-height: 100vh;
            margin-left: 16rem;
            transition: margin-left 0.3s ease;
        }
        
        .main-content.expanded {
            margin-left: 0;
        }
        
        .content-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        /* KPI Cards - Materials Page Style */
        .kpi-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.2s;
            padding: 1.5rem;
        }
        
        .kpi-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .kpi-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-gray);
        }
        
        .kpi-change.positive {
            color: var(--success-green);
        }
        
        .kpi-change.negative {
            color: var(--vibrant-red);
        }
        
        /* Properties Grid - Materials Page Style */
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
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
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .tag-residential {
            background: rgba(0, 123, 255, 0.1);
            color: var(--info-blue);
        }
        
        .tag-commercial {
            background: rgba(255, 127, 0, 0.1);
            color: var(--savanna-orange);
        }
        
        .property-content {
            padding: 1rem;
        }
        
        .property-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 0.5rem;
        }
        
        .property-location {
            font-size: 0.875rem;
            color: var(--medium-gray);
            margin-bottom: 0.75rem;
        }
        
        .property-stats {
            display: flex;
            gap: 1rem;
            font-size: 0.75rem;
            color: var(--medium-gray);
        }
        
        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        /* Filters - Materials Page Style */
        .filters-panel {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 1px solid #dee2e6;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .filters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #FF7F00;
        }
        
        .filters-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #FF7F00;
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
        
        .filter-select {
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            background: white;
            cursor: pointer;
        }
        
        .btn-primary {
            background: #FF7F00;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .btn-primary:hover {
            background: #e66a00;
        }
        
        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn-secondary:hover {
            background: #e5e7eb;
        }
        
        /* Map Container */
        .map-container {
            background: #e8f4f8;
            border-radius: 0.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .map-marker {
            position: absolute;
            width: 10px;
            height: 10px;
            background: var(--savanna-orange);
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        }
        
        /* Section Headers */
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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Modern Minimalistic Sidebar -->
    <div class="sidebar" id="sidebar">
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Logo Section -->
        <div class="sidebar-logo">
            <i class="fas fa-layer-group sidebar-logo-icon"></i>
            <span class="sidebar-logo-text">SAVANNA</span>
        </div>
        
        <!-- Sidebar Navigation -->
        <nav class="sidebar-nav">
            <!-- Dashboard Section -->
            <div class="nav-section">
                <div class="nav-section-title">Dashboard</div>
                <a href="/system" class="nav-item active">
                    <i class="fas fa-tachometer-alt nav-item-icon"></i>
                    <span class="nav-item-text">Overview</span>
                </a>
            </div>
            
            <!-- SELLER MENU ITEMS -->
            @if(Auth::user()->user_type === 'seller' || Auth::user()->user_type === 'savanna')
            <div class="nav-section">
                <div class="nav-section-title">🏠 Property Seller Tools</div>
                <a href="/system/seller/listings" class="nav-item">
                    <i class="fas fa-list nav-item-icon"></i>
                    <span class="nav-item-text">My Property Listings</span>
                    <span class="nav-badge">8</span>
                </a>
                <a href="/system/seller/add-property" class="nav-item">
                    <i class="fas fa-plus-circle nav-item-icon"></i>
                    <span class="nav-item-text">Add New Property</span>
                </a>
                <a href="/system/seller/inquiries" class="nav-item">
                    <i class="fas fa-envelope nav-item-icon"></i>
                    <span class="nav-item-text">Buyer Inquiries</span>
                    <span class="nav-badge">12</span>
                </a>
                <a href="/system/seller/viewings" class="nav-item">
                    <i class="fas fa-calendar-check nav-item-icon"></i>
                    <span class="nav-item-text">Property Viewings</span>
                    <span class="nav-badge">3</span>
                </a>
                <a href="/system/seller/offers" class="nav-item">
                    <i class="fas fa-handshake nav-item-icon"></i>
                    <span class="nav-item-text">Purchase Offers</span>
                    <span class="nav-badge">5</span>
                </a>
                <a href="/system/seller/performance" class="nav-item">
                    <i class="fas fa-chart-line nav-item-icon"></i>
                    <span class="nav-item-text">Sales Performance</span>
                </a>
                <a href="/system/seller/marketing" class="nav-item">
                    <i class="fas fa-bullhorn nav-item-icon"></i>
                    <span class="nav-item-text">Marketing Tools</span>
                </a>
                <a href="/system/seller/commission" class="nav-item">
                    <i class="fas fa-dollar-sign nav-item-icon"></i>
                    <span class="nav-item-text">Commission Tracking</span>
                </a>
            </div>
            @endif
            
            <!-- SUPPLIER MENU ITEMS -->
            @if(Auth::user()->user_type === 'supplier' || Auth::user()->user_type === 'savanna')
            <div class="nav-section">
                <div class="nav-section-title">📦 Materials Supplier Tools</div>
                <a href="/system/supplier/catalog" class="nav-item">
                    <i class="fas fa-boxes nav-item-icon"></i>
                    <span class="nav-item-text">Product Catalog</span>
                </a>
                <a href="/system/supplier/add-product" class="nav-item">
                    <i class="fas fa-plus nav-item-icon"></i>
                    <span class="nav-item-text">Add New Product</span>
                </a>
                <a href="/system/supplier/orders" class="nav-item">
                    <i class="fas fa-shopping-cart nav-item-icon"></i>
                    <span class="nav-item-text">Customer Orders</span>
                    <span class="nav-badge">24</span>
                </a>
                <a href="/system/supplier/inventory" class="nav-item">
                    <i class="fas fa-warehouse nav-item-icon"></i>
                    <span class="nav-item-text">Inventory Management</span>
                </a>
                <a href="/system/supplier/pricing" class="nav-item">
                    <i class="fas fa-tags nav-item-icon"></i>
                    <span class="nav-item-text">Pricing & Discounts</span>
                </a>
                <a href="/system/supplier/suppliers" class="nav-item">
                    <i class="fas fa-truck nav-item-icon"></i>
                    <span class="nav-item-text">Supplier Network</span>
                </a>
                <a href="/system/supplier/analytics" class="nav-item">
                    <i class="fas fa-chart-bar nav-item-icon"></i>
                    <span class="nav-item-text">Sales Analytics</span>
                </a>
                <a href="/system/supplier/contractors" class="nav-item">
                    <i class="fas fa-users nav-item-icon"></i>
                    <span class="nav-item-text">Contractor Partners</span>
                </a>
            </div>
            @endif
            
            <!-- LANDLORD MENU ITEMS -->
            @if(Auth::user()->user_type === 'landlord' || Auth::user()->user_type === 'savanna')
            <div class="nav-section">
                <div class="nav-section-title">🏘️ Property Landlord Tools</div>
                <a href="/system/landlord/rentals" class="nav-item">
                    <i class="fas fa-home nav-item-icon"></i>
                    <span class="nav-item-text">Rental Properties</span>
                    <span class="nav-badge">15</span>
                </a>
                <a href="/system/landlord/tenants" class="nav-item">
                    <i class="fas fa-users nav-item-icon"></i>
                    <span class="nav-item-text">Tenant Management</span>
                </a>
                <a href="/system/landlord/rent-collection" class="nav-item">
                    <i class="fas fa-credit-card nav-item-icon"></i>
                    <span class="nav-item-text">Rent Collection</span>
                    <span class="nav-badge">8</span>
                </a>
                <a href="/system/landlord/lease-agreements" class="nav-item">
                    <i class="fas fa-file-contract nav-item-icon"></i>
                    <span class="nav-item-text">Lease Agreements</span>
                </a>
                <a href="/system/landlord/maintenance" class="nav-item">
                    <i class="fas fa-tools nav-item-icon"></i>
                    <span class="nav-item-text">Maintenance Requests</span>
                    <span class="nav-badge">6</span>
                </a>
                <a href="/system/landlord/financials" class="nav-item">
                    <i class="fas fa-chart-pie nav-item-icon"></i>
                    <span class="nav-item-text">Financial Reports</span>
                </a>
                <a href="/system/landlord/vacancies" class="nav-item">
                    <i class="fas fa-door-open nav-item-icon"></i>
                    <span class="nav-item-text">Vacancy Management</span>
                </a>
                <a href="/system/landlord/tenant-screening" class="nav-item">
                    <i class="fas fa-user-check nav-item-icon"></i>
                    <span class="nav-item-text">Tenant Screening</span>
                </a>
            </div>
            @endif
            
            <!-- AGENT MENU ITEMS -->
            @if(Auth::user()->user_type === 'agent' || Auth::user()->user_type === 'savanna')
            <div class="nav-section">
                <div class="nav-section-title">🏢 Real Estate Agent Tools</div>
                <a href="/system/agent/assigned-properties" class="nav-item">
                    <i class="fas fa-clipboard-list nav-item-icon"></i>
                    <span class="nav-item-text">Assigned Properties</span>
                    <span class="nav-badge">12</span>
                </a>
            </div>
            @endif
            
            <!-- SAVANNA SYSTEM MANAGEMENT -->
            @if(Auth::user()->user_type === 'savanna')
            <div class="nav-section">
                <div class="nav-section-title">⚙️ System Management</div>
                <a href="/system/admin/users" class="nav-item">
                    <i class="fas fa-user-cog nav-item-icon"></i>
                    <span class="nav-item-text">User Management</span>
                    <span class="nav-badge">4</span>
                </a>
                <a href="/system/admin/transactions" class="nav-item">
                    <i class="fas fa-exchange-alt nav-item-icon"></i>
                    <span class="nav-item-text">All Transactions</span>
                </a>
                <a href="/system/admin/properties" class="nav-item">
                    <i class="fas fa-building nav-item-icon"></i>
                    <span class="nav-item-text">Property Oversight</span>
                </a>
                <a href="/system/admin/analytics" class="nav-item">
                    <i class="fas fa-chart-line nav-item-icon"></i>
                    <span class="nav-item-text">System Analytics</span>
                </a>
                <a href="/system/admin/reports" class="nav-item">
                    <i class="fas fa-file-alt nav-item-icon"></i>
                    <span class="nav-item-text">System Reports</span>
                </a>
                <a href="/system/admin/security" class="nav-item">
                    <i class="fas fa-shield-alt nav-item-icon"></i>
                    <span class="nav-item-text">Security & Logs</span>
                </a>
                <a href="/system/admin/settings" class="nav-item">
                    <i class="fas fa-cogs nav-item-icon"></i>
                    <span class="nav-item-text">System Settings</span>
                </a>
                <a href="/system/admin/backup" class="nav-item">
                    <i class="fas fa-database nav-item-icon"></i>
                    <span class="nav-item-text">Backup & Recovery</span>
                </a>
            </div>
            @endif
            
            <!-- COMMON SECTION -->
            <div class="nav-section">
                <div class="nav-section-title">🔧 General</div>
                <a href="/system/profile" class="nav-item">
                    <i class="fas fa-user nav-item-icon"></i>
                    <span class="nav-item-text">My Profile</span>
                </a>
                <a href="/system/notifications" class="nav-item">
                    <i class="fas fa-bell nav-item-icon"></i>
                    <span class="nav-item-text">Notifications</span>
                    <span class="nav-badge">7</span>
                </a>
                <a href="/system/messages" class="nav-item">
                    <i class="fas fa-envelope nav-item-icon"></i>
                    <span class="nav-item-text">Messages</span>
                    <span class="nav-badge">4</span>
                </a>
                <a href="/system/calendar" class="nav-item">
                    <i class="fas fa-calendar nav-item-icon"></i>
                    <span class="nav-item-text">Calendar</span>
                </a>
                <a href="/system/documents" class="nav-item">
                    <i class="fas fa-file-alt nav-item-icon"></i>
                    <span class="nav-item-text">Documents</span>
                </a>
                <a href="/system/help" class="nav-item">
                    <i class="fas fa-question-circle nav-item-icon"></i>
                    <span class="nav-item-text">Help Center</span>
                </a>
                <a href="/system/support" class="nav-item">
                    <i class="fas fa-headset nav-item-icon"></i>
                    <span class="nav-item-text">Support</span>
                </a>
            </div>
        </nav>
        
        <!-- User Info -->
        <div class="user-info">
            <div class="flex items-center">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" 
                     alt="Profile" class="user-avatar">
                <div class="user-details">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">{{ ucfirst(Auth::user()->user_type) }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-400 hover:text-red-300 ml-2">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Hero Section - Materials Page Style -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                @if(Auth::user()->user_type === 'seller')
                    <h1 class="hero-title">Property Seller Dashboard</h1>
                    <p class="hero-subtitle">Manage your listings, track inquiries, and close more sales</p>
                @elseif(Auth::user()->user_type === 'landlord')
                    <h1 class="hero-title">Landlord Dashboard</h1>
                    <p class="hero-subtitle">Manage rentals, collect rent, and maintain tenant relationships</p>
                @elseif(Auth::user()->user_type === 'agent')
                    <h1 class="hero-title">Real Estate Agent Dashboard</h1>
                    <p class="hero-subtitle">Manage assigned properties, track commissions, and close deals</p>
                @elseif(Auth::user()->user_type === 'supplier')
                    <h1 class="hero-title">Materials Supplier Dashboard</h1>
                    <p class="hero-subtitle">Manage inventory, process orders, and grow your business</p>
                @elseif(Auth::user()->user_type === 'savanna')
                    <h1 class="hero-title">System Admin Dashboard</h1>
                    <p class="hero-subtitle">Monitor platform performance, manage users, and oversee operations</p>
                @else
                    <h1 class="hero-title">Property Management Dashboard</h1>
                    <p class="hero-subtitle">Manage your properties, track performance, and analyze market trends</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-container">

            <!-- Success Message -->
            @if (session('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-3 py-2 rounded mb-4 text-xs">
                    {{ session('message') }}
                </div>
            @endif

            <!-- KPI Cards Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                @if(Auth::user()->user_type === 'seller')
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">My Listings</p>
                                <p class="kpi-value">8</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +2 this month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-list text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Active Inquiries</p>
                                <p class="kpi-value">12</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +5 new
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Purchase Offers</p>
                                <p class="kpi-value">5</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +2 pending
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-handshake text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Total Sales Value</p>
                                <p class="kpi-value">TZS 2.5M</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +15% from last month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-orange-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                @elseif(Auth::user()->user_type === 'landlord')
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Rental Properties</p>
                                <p class="kpi-value">15</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +1 new property
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-home text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Occupied Units</p>
                                <p class="kpi-value">12/15</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-check mr-1"></i>
                                    80% occupancy
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Rent Collected</p>
                                <p class="kpi-value">TZS 8.5M</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    This month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-credit-card text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Maintenance Requests</p>
                                <p class="kpi-value">6</p>
                                <p class="text-sm kpi-change negative mt-2">
                                    <i class="fas fa-exclamation mr-1"></i>
                                    Pending action
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-tools text-orange-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                @elseif(Auth::user()->user_type === 'agent')
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Assigned Properties</p>
                                <p class="kpi-value">12</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +3 new assignments
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clipboard-list text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Active Deals</p>
                                <p class="kpi-value">5</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    2 closing soon
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-handshake text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">This Month Commission</p>
                                <p class="kpi-value">TZS 1.2M</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +25% from last month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Property Showings</p>
                                <p class="kpi-value">7</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-calendar mr-1"></i>
                                    Scheduled this week
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-orange-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                @elseif(Auth::user()->user_type === 'supplier')
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Total Products</p>
                                <p class="kpi-value">245</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +12 new items
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-boxes text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Pending Orders</p>
                                <p class="kpi-value">24</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +8 today
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-shopping-cart text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Monthly Sales</p>
                                <p class="kpi-value">TZS 15M</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +18% from last month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Low Stock Items</p>
                                <p class="kpi-value">18</p>
                                <p class="text-sm kpi-change negative mt-2">
                                    <i class="fas fa-exclamation mr-1"></i>
                                    Need restocking
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-warehouse text-orange-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Total Properties</p>
                                <p class="kpi-value">36,340</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    From last month +12.9%
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-building text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Total Users</p>
                                <p class="kpi-value">1,284</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +45 new users
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Total Transactions</p>
                                <p class="kpi-value">TZS 125M</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +22% this month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-exchange-alt text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="kpi-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-2">Active Listings</p>
                                <p class="kpi-value">934</p>
                                <p class="text-sm kpi-change positive mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +14.9% growth
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-list text-orange-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @if(Auth::user()->user_type !== 'supplier')
            <!-- Filters Panel - Materials Page Style -->
            <div class="filters-panel">
                <div class="filters-header">
                    <h3 class="filters-title">
                        @if(Auth::user()->user_type === 'seller')
                            My Property Filters
                        @elseif(Auth::user()->user_type === 'landlord')
                            Rental Property Filters
                        @elseif(Auth::user()->user_type === 'agent')
                            Assigned Property Filters
                        @else
                            Property Filters
                        @endif
                    </h3>
                </div>
                <div class="filters-content">
                    <div class="filters-row">
                        <div class="relative">
                            <select class="filter-select w-full">
                                <option>Property Type</option>
                                <option>Residential</option>
                                <option>Commercial</option>
                                <option>Plots</option>
                            </select>
                        </div>
                        <div class="relative">
                            <select class="filter-select w-full">
                                <option>Location</option>
                                <option>Dar es Salaam</option>
                                <option>Arusha</option>
                                <option>Mwanza</option>
                            </select>
                        </div>
                        <div class="relative">
                            <select class="filter-select w-full">
                                @if(Auth::user()->user_type === 'landlord')
                                    <option>Rent Range</option>
                                    <option>Under TZS 500K</option>
                                    <option>TZS 500K - 1M</option>
                                    <option>TZS 1M - 2M</option>
                                    <option>Over TZS 2M</option>
                                @else
                                    <option>Price Range</option>
                                    <option>Under $100K</option>
                                    <option>$100K - $500K</option>
                                    <option>$500K - $1M</option>
                                    <option>Over $1M</option>
                                @endif
                            </select>
                        </div>
                        <div class="filter-actions">
                            <button class="btn-secondary">Clear</button>
                            <button class="btn-primary">Apply Filters</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Properties Section -->
            <div class="section-header">
                <div>
                    @if(Auth::user()->user_type === 'seller')
                        <h2 class="section-title">My Property Listings</h2>
                        <p class="section-subtitle">Manage and track your property sales</p>
                    @elseif(Auth::user()->user_type === 'landlord')
                        <h2 class="section-title">My Rental Properties</h2>
                        <p class="section-subtitle">Manage your rental portfolio</p>
                    @elseif(Auth::user()->user_type === 'agent')
                        <h2 class="section-title">Assigned Properties</h2>
                        <p class="section-subtitle">Properties you are managing for clients</p>
                    @elseif(Auth::user()->user_type === 'supplier')
                        <h2 class="section-title">Top Selling Materials</h2>
                        <p class="section-subtitle">Your most popular building materials</p>
                    @else
                        <h2 class="section-title">Featured Properties</h2>
                        <p class="section-subtitle">Discover our latest property listings</p>
                    @endif
                </div>
                @if(Auth::user()->user_type === 'seller' || Auth::user()->user_type === 'savanna')
                    <a href="{{ route('seller.add-property') }}" class="btn-primary">+ Add Property</a>
                @elseif(Auth::user()->user_type === 'supplier')
                    <a href="/system/supplier/add-product" class="btn-primary">+ Add Product</a>
                @endif
            </div>

            <!-- Properties Grid - Materials Page Style -->
            <div class="properties-grid">

                <!-- Property 1: Dungu Farm -->
                <div class="property-card">
                    <div class="property-image-container">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=400&h=300&fit=crop" 
                             alt="Dungu Farm" class="property-image">
                        <span class="property-tag tag-residential">Residential</span>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Dungu Farm</h3>
                        <p class="property-location">Toangoma, Dar es Salaam</p>
                        <div class="property-stats">
                            <div class="stat-item">
                                <i class="fas fa-bed"></i>
                                <span>4 Beds</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-bath"></i>
                                <span>3 Baths</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-dollar-sign"></i>
                                <span>$450K</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property 2: Millenium Towers -->
                <div class="property-card">
                    <div class="property-image-container">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=400&h=300&fit=crop" 
                             alt="Millenium Towers" class="property-image">
                        <span class="property-tag tag-commercial">Commercial</span>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Millenium Towers</h3>
                        <p class="property-location">Millenium Business Tower, Bagamoyo Rd. Dar es Salaam</p>
                        <div class="property-stats">
                            <div class="stat-item">
                                <i class="fas fa-building"></i>
                                <span>Office</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-expand-arrows-alt"></i>
                                <span>2,500 sqft</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-dollar-sign"></i>
                                <span>$1.2M</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property 3: Kambarage House -->
                <div class="property-card">
                    <div class="property-image-container">
                        <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=400&h=300&fit=crop" 
                             alt="Kambarage House" class="property-image">
                        <span class="property-tag tag-commercial">Commercial</span>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Kambarage House</h3>
                        <p class="property-location">Millenium Business Tower, Bagamoyo Rd. Dar es Salaam</p>
                        <div class="property-stats">
                            <div class="stat-item">
                                <i class="fas fa-building"></i>
                                <span>Office</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-expand-arrows-alt"></i>
                                <span>1,800 sqft</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-dollar-sign"></i>
                                <span>$850K</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property 4: Kijichi Apartments -->
                <div class="property-card">
                    <div class="property-image-container">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=400&h=300&fit=crop" 
                             alt="Kijichi Apartments" class="property-image">
                        <span class="property-tag tag-residential">Residential</span>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Kijichi Apartments</h3>
                        <p class="property-location">Kijichi, Dar es Salaam</p>
                        <div class="property-stats">
                            <div class="stat-item">
                                <i class="fas fa-bed"></i>
                                <span>3 Beds</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-bath"></i>
                                <span>2 Baths</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-dollar-sign"></i>
                                <span>$320K</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property 5: Modern Villa -->
                <div class="property-card">
                    <div class="property-image-container">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=400&h=300&fit=crop" 
                             alt="Modern Villa" class="property-image">
                        <span class="property-tag tag-residential">Residential</span>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Modern Villa</h3>
                        <p class="property-location">Masaki, Dar es Salaam</p>
                        <div class="property-stats">
                            <div class="stat-item">
                                <i class="fas fa-bed"></i>
                                <span>5 Beds</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-bath"></i>
                                <span>4 Baths</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-dollar-sign"></i>
                                <span>$750K</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property 6: Business Center -->
                <div class="property-card">
                    <div class="property-image-container">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&h=300&fit=crop" 
                             alt="Business Center" class="property-image">
                        <span class="property-tag tag-commercial">Commercial</span>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Business Center</h3>
                        <p class="property-location">CBD, Dar es Salaam</p>
                        <div class="property-stats">
                            <div class="stat-item">
                                <i class="fas fa-building"></i>
                                <span>Office</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-expand-arrows-alt"></i>
                                <span>3,200 sqft</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-dollar-sign"></i>
                                <span>$1.5M</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Sidebar Toggle -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        }
        
        // Close sidebar on mobile when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !sidebarToggle.contains(event.target)) {
                sidebar.classList.add('collapsed');
                document.querySelector('.main-content').classList.add('expanded');
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            
            if (window.innerWidth > 768) {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
            } else {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
            }
        });
        
        // Initialize sidebar state on page load
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth <= 768) {
                document.getElementById('sidebar').classList.add('collapsed');
                document.querySelector('.main-content').classList.add('expanded');
            }
        });
    </script>
</body>
</html>