<header x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 bg-background/80 backdrop-blur-lg border-b border-border">
    <div class="container flex items-center justify-between h-16 md:h-20">
        <a href="/" class="flex items-center gap-2 text-primary font-bold text-xl md:text-2xl">
            <i data-lucide="home" class="w-6 h-6 md:w-7 md:h-7"></i>
            <span>SAVANNA</span>
        </a>

        <nav class="hidden md:flex items-center gap-8">
            <a href="/" class="flex items-center gap-1 text-foreground hover:text-primary transition-colors font-medium {{ request()->is('/') ? 'text-primary' : '' }}">
                Buy <i data-lucide="chevron-down" class="w-4 h-4"></i>
            </a>
            <a href="/rent" class="flex items-center gap-1 text-foreground hover:text-primary transition-colors font-medium {{ request()->is('rent') ? 'text-primary' : '' }}">
                Rent <i data-lucide="chevron-down" class="w-4 h-4"></i>
            </a>
            <a href="/materials" class="flex items-center gap-1 text-foreground hover:text-primary transition-colors font-medium {{ request()->is('materials') ? 'text-primary' : '' }}">
                Materials <i data-lucide="chevron-down" class="w-4 h-4"></i>
            </a>
            <a href="/services" class="text-foreground hover:text-primary transition-colors font-medium {{ request()->is('services') ? 'text-primary' : '' }}">
                Services
            </a>
            <a href="/financing" class="text-foreground hover:text-primary transition-colors font-medium {{ request()->is('financing') ? 'text-primary' : '' }}">
                Financing
            </a>
        </nav>

        <div class="hidden md:flex items-center gap-4">
            @auth
                <a href="/system" class="px-4 py-2 rounded-md font-medium border border-border hover:bg-secondary">Dashboard</a>
            @else
                @if(request()->routeIs('home') || request()->routeIs('rent'))
                    <button onclick="window.dispatchEvent(new CustomEvent('showLoginModal'))" class="px-4 py-2 rounded-md font-medium border border-border hover:bg-secondary">Sign In</button>
                    <button onclick="window.dispatchEvent(new CustomEvent('showRegisterModal'))" class="px-4 py-2 rounded-md font-medium bg-primary text-primary-foreground hover:opacity-90">List Property</button>
                @else
                    <a href="/" class="px-4 py-2 rounded-md font-medium border border-border hover:bg-secondary">Sign In</a>
                    <a href="/" class="px-4 py-2 rounded-md font-medium bg-primary text-primary-foreground hover:opacity-90">List Property</a>
                @endif
            @endauth
        </div>

        <button @click="open = !open" class="md:hidden p-2 text-foreground" aria-label="Toggle menu">
            <i :data-lucide="open ? 'x' : 'menu'" class="w-6 h-6"></i>
        </button>
    </div>

    <div x-show="open" x-transition class="md:hidden bg-background border-b border-border">
        <nav class="container py-4 flex flex-col gap-4">
            <a href="/" class="text-foreground hover:text-primary transition-colors font-medium py-2">Buy</a>
            <a href="/rent" class="text-foreground hover:text-primary transition-colors font-medium py-2">Rent</a>
            <a href="/materials" class="text-foreground hover:text-primary transition-colors font-medium py-2">Materials</a>
            <a href="/services" class="text-foreground hover:text-primary transition-colors font-medium py-2">Services</a>
            <a href="/financing" class="text-foreground hover:text-primary transition-colors font-medium py-2">Financing</a>
            <div class="flex flex-col gap-2 pt-4 border-t border-border">
                @auth
                    <a href="/system" class="w-full px-4 py-2 rounded-md font-medium border border-border hover:bg-secondary text-left">Dashboard</a>
                @else
                    @if(request()->routeIs('home') || request()->routeIs('rent'))
                        <button onclick="window.dispatchEvent(new CustomEvent('showLoginModal'))" class="w-full px-4 py-2 rounded-md font-medium border border-border hover:bg-secondary text-left">Sign In</button>
                        <button onclick="window.dispatchEvent(new CustomEvent('showRegisterModal'))" class="w-full px-4 py-2 rounded-md font-medium bg-primary text-primary-foreground hover:opacity-90 text-left">List Property</button>
                    @else
                        <a href="/" class="w-full px-4 py-2 rounded-md font-medium border border-border hover:bg-secondary text-left">Sign In</a>
                        <a href="/" class="w-full px-4 py-2 rounded-md font-medium bg-primary text-primary-foreground hover:opacity-90 text-left">List Property</a>
                    @endif
                @endauth
            </div>
        </nav>
    </div>
</header>

