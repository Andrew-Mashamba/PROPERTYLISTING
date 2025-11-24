<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        
        <style>
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
            
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                height: 100vh;
                width: 18rem;
                background: linear-gradient(180deg, #ffffff 0%, #fafafa 100%);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                border-right: 1px solid #f3f4f6;
                z-index: 1000;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                overflow-y: auto;
                overflow-x: hidden;
                display: flex;
                flex-direction: column;
                padding: 1.5rem 1rem;
            }
            
            .sidebar::-webkit-scrollbar {
                width: 6px;
            }
            
            .sidebar::-webkit-scrollbar-track {
                background: transparent;
            }
            
            .sidebar::-webkit-scrollbar-thumb {
                background: #e5e7eb;
                border-radius: 3px;
            }
            
            .sidebar::-webkit-scrollbar-thumb:hover {
                background: #d1d5db;
            }
            
            .sidebar.collapsed {
                transform: translateX(-18rem);
            }
            
            @media (max-width: 1024px) {
                .sidebar {
                    transform: translateX(-18rem);
                }
                
                .sidebar.mobile-open {
                    transform: translateX(0);
                }
            }
            
            .sidebar-header {
                display: flex;
                align-items: center;
                margin-bottom: 2rem;
                padding: 0.5rem;
            }
            
            .sidebar-logo {
                font-size: 1.625rem;
                font-weight: 800;
                background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-decoration: none;
                margin-left: 0.75rem;
                letter-spacing: -0.02em;
            }
            
            .sidebar-logo-icon {
                width: 2.5rem;
                height: 2.5rem;
                padding: 0.5rem;
                background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
                border-radius: 0.75rem;
                color: white;
                box-shadow: 0 4px 6px -1px rgba(255, 127, 0, 0.2);
            }
            
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
            
            .sidebar-nav {
                flex: 1;
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .nav-section {
                margin-bottom: 1.5rem;
            }
            
            .nav-section:last-of-type {
                margin-bottom: 0;
            }
            
            .nav-section-title {
                padding: 0.5rem 1rem;
                font-size: 0.8125rem;
                font-weight: 600;
                color: #6B7280;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }
            
            .nav-item {
                display: flex;
                align-items: center;
                padding: 0.75rem 1rem;
                border-radius: 0.75rem;
                color: #6B7280;
                text-decoration: none;
                transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
                font-size: 0.9375rem;
                font-weight: 500;
                position: relative;
                overflow: hidden;
            }
            
            .nav-item::before {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                width: 3px;
                height: 100%;
                background: transparent;
                transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .nav-item:hover {
                background: linear-gradient(90deg, rgba(255, 127, 0, 0.05) 0%, rgba(255, 127, 0, 0.02) 100%);
                color: #FF7F00;
                transform: translateX(2px);
            }
            
            .nav-item:hover::before {
                background: linear-gradient(180deg, #FF7F00 0%, #FF4500 100%);
            }
            
            .nav-item.active {
                color: white;
                background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
                box-shadow: 0 10px 15px -3px rgba(255, 127, 0, 0.3), 0 4px 6px -2px rgba(255, 127, 0, 0.2);
                transform: translateX(0);
            }
            
            .nav-item.active::before {
                background: transparent;
            }
            
            .nav-icon {
                margin-right: 0.75rem;
                width: 1.25rem;
                height: 1.25rem;
                flex-shrink: 0;
                transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .nav-item:hover .nav-icon {
                transform: scale(1.1);
            }
            
            .nav-item.active .nav-icon {
                transform: scale(1.05);
            }
            
            .nav-text {
                font-size: 0.9375rem;
                font-weight: 500;
            }
            
            .nav-item.active .nav-text {
                font-weight: 600;
            }
            
            .nav-badge {
                background: linear-gradient(135deg, #FF4500 0%, #FF6347 100%);
                color: white;
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
                border-radius: 1rem;
                margin-left: auto;
                font-weight: 700;
                box-shadow: 0 2px 4px rgba(255, 69, 0, 0.2);
                min-width: 1.5rem;
                text-align: center;
            }
            
            .nav-item.active .nav-badge {
                background: white;
                color: #FF7F00;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            
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
            
            .user-info {
                padding: 1rem;
                border-top: 1px solid #E5E7EB;
                margin-top: auto;
                background: linear-gradient(180deg, transparent 0%, rgba(249, 250, 251, 0.5) 100%);
                border-radius: 0.75rem;
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
                font-size: 0.9375rem;
                font-weight: 600;
                color: #111827;
                margin-bottom: 0.125rem;
            }
            
            .user-role {
                font-size: 0.8125rem;
                color: #6B7280;
            }
            
            .help-card {
                border-radius: 1rem;
                padding: 1.25rem;
                margin-bottom: 1rem;
                background: linear-gradient(135deg, rgba(255, 127, 0, 0.08) 0%, rgba(255, 69, 0, 0.05) 100%);
                border: 1px solid rgba(255, 127, 0, 0.1);
                position: relative;
                overflow: hidden;
            }
            
            .help-card::before {
                content: '';
                position: absolute;
                top: -50%;
                right: -50%;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle, rgba(255, 127, 0, 0.1) 0%, transparent 70%);
            }
            
            .help-icon {
                width: 2.5rem;
                height: 2.5rem;
                margin-bottom: 0.75rem;
                color: #FF7F00;
            }
            
            .help-text {
                color: #374151;
                font-size: 0.9375rem;
                margin-bottom: 0.75rem;
            }
            
            .help-button {
                color: white;
                padding: 0.625rem 1rem;
                border-radius: 0.5rem;
                font-size: 0.9375rem;
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
            
            .main-content {
                background: #f8fafc;
                min-height: 100vh;
                margin-left: 18rem;
                transition: margin-left 0.3s ease;
                padding-top: 3.5rem;
            }
            
            .main-content.expanded {
                margin-left: 0;
            }
            
            .topbar {
                position: fixed;
                top: 0;
                left: 18rem;
                right: 0;
                height: 3.5rem;
                background: white;
                border-bottom: 1px solid #e5e7eb;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                z-index: 999;
                transition: left 0.3s ease;
            }
            
            .topbar.expanded {
                left: 0;
            }
            
            .topbar-content {
                max-width: 100%;
                margin: 0 auto;
                padding: 0 1rem;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            
            .topbar-left {
                display: flex;
                align-items: center;
                gap: 1rem;
            }
            
            .topbar-right {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }
            
            .topbar-btn {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
                border-radius: 0.5rem;
                text-decoration: none;
                transition: all 0.2s ease-in-out;
                display: flex;
                align-items: center;
                gap: 0.5rem;
                font-weight: 600;
            }
            
            .topbar-btn-primary {
                background: linear-gradient(135deg, #FF7F00 0%, #FF4500 100%);
                color: white;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }
            
            .topbar-btn-primary:hover {
                background: linear-gradient(135deg, #e67200 0%, #e63e00 100%);
            }
            
            .topbar-btn-secondary {
                background: #f3f4f6;
                color: #374151;
            }
            
            .topbar-btn-secondary:hover {
                background: #e5e7eb;
            }
            
            .content-wrapper {
                max-width: 1280px;
                margin: 0 auto;
                padding: 1.5rem 1rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        

        <!-- Modern Minimalistic Sidebar -->
        <div class="sidebar" id="sidebar">
            <button class="sidebar-toggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="sidebar-header">
                <div class="sidebar-logo-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                    </svg>
                </div>
                <a href="/" class="sidebar-logo">SAVANNA</a>
            </div>
            
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-section-title">Dashboard</div>
                    <a href="/system" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                        <span class="nav-text">Overview</span>
                    </a>
                </div>
                
                @if(Auth::check() && (Auth::user()->user_type === 'seller' || Auth::user()->user_type === 'savanna'))
                <div class="nav-section">
                    <div class="nav-section-title">Property Seller Tools</div>
                    <a href="/system/seller/listings" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <span class="nav-text">My Property Listings</span>
                        @if(isset($sidebarCounts['my_properties']) && $sidebarCounts['my_properties'] > 0)
                        <span class="nav-badge">{{ $sidebarCounts['my_properties'] }}</span>
                        @endif
                    </a>
                    <a href="/system/seller/add-property" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="nav-text">Add New Property</span>
                    </a>
                    <a href="/system/seller/inquiries" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        <span class="nav-text">Buyer Inquiries</span>
                        @if(isset($sidebarCounts['buyer_inquiries']) && $sidebarCounts['buyer_inquiries'] > 0)
                        <span class="nav-badge">{{ $sidebarCounts['buyer_inquiries'] }}</span>
                        @endif
                    </a>
                </div>
                @endif
                
                @if(Auth::check() && (Auth::user()->user_type === 'supplier' || Auth::user()->user_type === 'savanna'))
                <div class="nav-section">
                    <div class="nav-section-title">Materials Supplier Tools</div>
                    <a href="/system/supplier/catalog" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                        <span class="nav-text">Product Catalog</span>
                    </a>
                    <a href="/system/supplier/add-product" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span class="nav-text">Add New Product</span>
                    </a>
                    <a href="/system/supplier/orders" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        <span class="nav-text">Customer Orders</span>
                        @if(isset($sidebarCounts['customer_orders']) && $sidebarCounts['customer_orders'] > 0)
                        <span class="nav-badge">{{ $sidebarCounts['customer_orders'] }}</span>
                        @endif
                    </a>
                    <a href="/system/supplier/inventory" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                        </svg>
                        <span class="nav-text">Inventory Management</span>
                    </a>
                </div>
                @endif
                
                @if(Auth::check() && (Auth::user()->user_type === 'landlord' || Auth::user()->user_type === 'savanna'))
                <div class="nav-section">
                    <div class="nav-section-title">Property Landlord Tools</div>
                    <a href="/system/landlord/rentals" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="nav-text">Rental Properties</span>
                        @if(isset($sidebarCounts['rental_properties']) && $sidebarCounts['rental_properties'] > 0)
                        <span class="nav-badge">{{ $sidebarCounts['rental_properties'] }}</span>
                        @endif
                    </a>
                    <a href="/system/landlord/tenants" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                        <span class="nav-text">Tenant Management</span>
                    </a>
                    <a href="/system/landlord/tenant-screening" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                        <span class="nav-text">Tenant Screening</span>
                    </a>
                </div>
                @endif
                
                @if(Auth::check() && (Auth::user()->user_type === 'agent' || Auth::user()->user_type === 'savanna'))
                <div class="nav-section">
                    <div class="nav-section-title">Real Estate Agent Tools</div>
                    <a href="/system/agent/assigned-properties" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                        <span class="nav-text">Assigned Properties</span>
                        <span class="nav-badge">12</span>
                    </a>
                </div>
                @endif
                
                @if(Auth::check() && Auth::user()->user_type === 'savanna')
                <div class="nav-section">
                    <div class="nav-section-title">System Management</div>
                    <a href="/system/admin/users" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span class="nav-text">User Management</span>
                        @if(isset($sidebarCounts['total_users']) && $sidebarCounts['total_users'] > 0)
                        <span class="nav-badge">{{ $sidebarCounts['total_users'] }}</span>
                        @endif
                    </a>
                    <a href="/system/admin/properties" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>
                        <span class="nav-text">Property Oversight</span>
                    </a>
                    <a href="/system/admin/oversight" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        <span class="nav-text">Documentation Oversight</span>
                    </a>
                    <a href="/system/admin/financing-inquiries" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="nav-text">Financing Inquiries</span>
                        @if(isset($sidebarCounts['pending_financing']) && $sidebarCounts['pending_financing'] > 0)
                        <span class="nav-badge">{{ $sidebarCounts['pending_financing'] }}</span>
                        @endif
                    </a>
                    <a href="/system/admin/services" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                        </svg>
                        <span class="nav-text">Other Services</span>
                    </a>
                </div>
                @endif
                
                <div class="nav-section">
                    <div class="nav-section-title">General</div>
                    <a href="/system/profile" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="nav-text">My Profile</span>
                    </a>
                    <a href="/system/support" class="nav-item">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <span class="nav-text">Support</span>
                    </a>
                </div>
            </nav>
            
            <!-- Help Card -->
            <div class="help-card">
                <svg class="help-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                </svg>
                <div class="help-text">Need assistance? Our support team is here to help you.</div>
                <button class="help-button" onclick="window.location.href='/system/support'">Get Help</button>
            </div>
            
            <div class="user-info">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" 
                         alt="Profile" class="user-avatar">
                    <div class="user-details">
                        <div class="user-name">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</div>
                        <div class="user-role">{{ Auth::check() ? ucfirst(Auth::user()->user_type) : 'Visitor' }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-400 hover:text-red-500 ml-2 transition-colors" title="Logout">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <x-topbar />

        <div class="main-content" id="main-content">
            <div class="content-wrapper">
                {{ $slot }}
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('main-content');
                const topbar = document.getElementById('topbar');
                
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
                topbar.classList.toggle('expanded');
            }
            
            function toggleUserMenu() {
                const userMenu = document.getElementById('userMenu');
                userMenu.classList.toggle('hidden');
            }
            
            document.addEventListener('click', function(event) {
                const sidebar = document.getElementById('sidebar');
                const sidebarToggle = document.querySelector('.sidebar-toggle');
                const userMenu = document.getElementById('userMenu');
                const userMenuButton = userMenu?.previousElementSibling;
                
                if (window.innerWidth <= 768 && 
                    !sidebar.contains(event.target) && 
                    !sidebarToggle.contains(event.target)) {
                    sidebar.classList.add('collapsed');
                    document.getElementById('main-content').classList.add('expanded');
                    document.getElementById('topbar').classList.add('expanded');
                }
                
                if (userMenu && !userMenu.contains(event.target) && !userMenuButton?.contains(event.target)) {
                    userMenu.classList.add('hidden');
                }
            });
            
            window.addEventListener('resize', function() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('main-content');
                const topbar = document.getElementById('topbar');
                
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                    topbar.classList.remove('expanded');
                } else {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                    topbar.classList.add('expanded');
                }
            });
            
            document.addEventListener('DOMContentLoaded', function() {
                if (window.innerWidth <= 768) {
                    document.getElementById('sidebar').classList.add('collapsed');
                    document.getElementById('main-content').classList.add('expanded');
                    document.getElementById('topbar').classList.add('expanded');
                }
            });
        </script>
    </body>
</html>
