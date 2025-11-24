<!-- Sticky Topbar -->
<div class="topbar" id="topbar">
    <div class="topbar-content">
        <div class="topbar-right" style="margin-left: auto;">
            <!-- Search -->
        
            
            <!-- User Profile Dropdown -->
            <div class="relative">
                <button onclick="toggleUserMenu()" class="topbar-btn topbar-btn-secondary">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop&crop=face" 
                         alt="Profile" class="w-7 h-7 rounded-full">
                    <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                
                <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1">
                    <a href="/system/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-user mr-2"></i>My Profile
                    </a>
                    <a href="/system/notifications" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-bell mr-2"></i>Notifications
                    </a>
                    <a href="/system/help" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-question-circle mr-2"></i>Help Center
                    </a>
                    <div class="border-t border-gray-200 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                            <i class="fas fa-sign-out-alt mr-2"></i>Sign Out
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Home Button -->
            <a href="/" class="topbar-btn topbar-btn-primary">
                <i class="fas fa-home"></i>
                <span class="hidden md:inline">Home</span>
            </a>
        </div>

        
    </div>
</div>
