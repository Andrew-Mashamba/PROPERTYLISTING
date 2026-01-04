<footer class="bg-foreground text-background">
    <div class="container py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <div>
                <a href="/" class="flex items-center gap-2 text-background font-bold text-xl mb-4">
                    <i data-lucide="home" class="w-6 h-6"></i>
                    <span>SAVANNA</span>
                </a>
                <p class="text-background/70 mb-6 leading-relaxed">
                    Your trusted partner in finding the perfect property. We make real estate simple, transparent, and stress-free.
                </p>
                <div class="flex gap-3">
                    @foreach (['facebook','twitter','instagram','linkedin'] as $icon)
                        <a href="#" class="w-10 h-10 rounded-full bg-background/10 flex items-center justify-center hover:bg-background/20 transition-colors">
                            <i data-lucide="{{ $icon }}" class="w-5 h-5"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h4 class="font-semibold text-lg mb-4">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="/" class="text-background/70 hover:text-background transition-colors">Buy a Home</a></li>
                    <li><a href="/rent" class="text-background/70 hover:text-background transition-colors">Rent a Home</a></li>
                    <li><a href="/materials" class="text-background/70 hover:text-background transition-colors">Materials</a></li>
                    <li><a href="/services" class="text-background/70 hover:text-background transition-colors">Services</a></li>
                    <li><a href="/financing" class="text-background/70 hover:text-background transition-colors">Financing</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-lg mb-4">Contact Us</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-5 h-5 mt-0.5 text-background/70"></i>
                        <span class="text-background/70">Dar es Salaam, Tanzania</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i data-lucide="phone" class="w-5 h-5 text-background/70"></i>
                        <a href="tel:+255-123-456-789" class="text-background/70 hover:text-background transition-colors">+255-123-456-789</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i data-lucide="mail" class="w-5 h-5 text-background/70"></i>
                        <a href="mailto:hello@savannaproperty.com" class="text-background/70 hover:text-background transition-colors">hello@savannaproperty.com</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-lg mb-4">Stay Updated</h4>
                <p class="text-background/70 mb-4">
                    Subscribe to get the latest listings and market updates.
                </p>
                <div class="flex gap-2">
                    <input type="email" placeholder="Your email" class="bg-background/10 border border-background/20 text-background placeholder:text-background/50 px-3 py-2 rounded-md w-full">
                    <button class="px-3 py-2 rounded-md bg-secondary text-secondary-foreground">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-background/10">
        <div class="container py-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-background/60 text-sm">© {{ date('Y') }} SAVANNA. All rights reserved.</p>
            <div class="flex gap-6 text-sm">
                <a href="#" class="text-background/60 hover:text-background transition-colors">Privacy Policy</a>
                <a href="#" class="text-background/60 hover:text-background transition-colors">Terms of Service</a>
                <a href="#" class="text-background/60 hover:text-background transition-colors">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>

