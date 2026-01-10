<div>
    {{-- Hero Section --}}
    <section class="relative min-h-[400px] md:min-h-[500px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/hero-bg.jpg') }}" alt="Services" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-foreground/60 via-foreground/40 to-foreground/70"></div>
        </div>

        <div class="container relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-primary-foreground mb-4">Property Services</h1>
            <p class="text-lg md:text-xl text-primary-foreground/90 mb-8 max-w-2xl mx-auto">
                Professional services to help you with your property needs
            </p>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="py-16 bg-background">
        <div class="container">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-foreground mb-2">Available Services</h2>
                <p class="text-muted-foreground">Browse our comprehensive list of property-related services</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($services as $service)
                    <div class="bg-card rounded-xl shadow-card p-6 hover:shadow-lg transition-all duration-200">
                        <div class="mb-4">
                            @if($service->category)
                                <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-xs font-semibold">{{ $service->category }}</span>
                            @endif
                        </div>

                        <h3 class="text-foreground font-bold text-xl mb-3">{{ $service->name }}</h3>
                        <p class="text-muted-foreground text-sm mb-4">{{ $service->description }}</p>

                        @if($service->features)
                            <div class="mb-4">
                                <p class="text-xs font-semibold text-foreground mb-2">Features:</p>
                                <ul class="text-sm text-muted-foreground space-y-1">
                                    @foreach(explode("\n", $service->features) as $feature)
                                        @if(trim($feature))
                                            <li class="flex items-start gap-2">
                                                <i class="lucide lucide-check w-4 h-4 text-primary mt-0.5"></i>
                                                <span>{{ trim($feature) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if($service->price)
                            <div class="mb-4 p-4 bg-primary/10 rounded-lg border border-primary/20">
                                <p class="text-xs text-primary mb-1">Price</p>
                                <p class="text-2xl font-bold text-primary">
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
                            <div class="pt-4 border-t border-border">
                                <p class="text-xs font-semibold text-foreground mb-2">Contact Information:</p>
                                @if($service->contact_name)
                                    <p class="text-sm text-foreground flex items-center gap-2 mb-1">
                                        <i class="lucide lucide-user w-4 h-4 text-muted-foreground"></i>
                                        {{ $service->contact_name }}
                                    </p>
                                @endif
                                @if($service->contact_phone)
                                    <p class="text-sm text-foreground flex items-center gap-2 mb-1">
                                        <i class="lucide lucide-phone w-4 h-4 text-muted-foreground"></i>
                                        {{ $service->contact_phone }}
                                    </p>
                                @endif
                                @if($service->contact_email)
                                    <p class="text-sm text-foreground flex items-center gap-2">
                                        <i class="lucide lucide-mail w-4 h-4 text-muted-foreground"></i>
                                        {{ $service->contact_email }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-16">
                        <i class="lucide lucide-briefcase w-24 h-24 text-muted-foreground mb-4"></i>
                        <p class="text-foreground text-lg font-medium">No Services Available</p>
                        <p class="text-muted-foreground text-sm">Check back later for property-related services</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Auth Modals --}}
    @livewire('auth-modals')
</div>
