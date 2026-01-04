<div>
    {{-- Hero Section --}}
    <section class="relative min-h-[600px] md:min-h-[700px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/hero-bg.jpg') }}" alt="Beautiful neighborhood" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-foreground/60 via-foreground/40 to-foreground/70"></div>
        </div>

        <div class="container relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-primary-foreground mb-4">Find Your Dream Home</h1>
            <p class="text-lg md:text-xl text-primary-foreground/90 mb-8 max-w-2xl mx-auto">
                Discover millions of homes and find the perfect place to call your own
            </p>

            <div class="max-w-4xl mx-auto">
                <div class="bg-background rounded-xl p-4 shadow-2xl" x-data="{ showFilters: false }">
                    <form wire:submit.prevent="search" class="flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-1">
                            <i class="lucide lucide-map-pin absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground"></i>
                            <input 
                                type="text" 
                                wire:model.live.debounce.300ms="searchQuery"
                                placeholder="Enter an address, city, or ZIP code" 
                                class="pl-12 h-14 text-base border border-border bg-secondary/50 rounded-md w-full"
                            >
                        </div>
                        <button type="submit" class="h-14 px-8 text-base font-semibold rounded-md bg-primary text-primary-foreground flex items-center justify-center gap-2">
                            <i class="lucide lucide-search w-5 h-5"></i>
                            Search
                        </button>
                    </form>

                    {{-- Advanced Filters Panel --}}
                    <div x-show="showFilters" x-transition class="bg-card border border-border rounded-xl p-6 mt-4 shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            {{-- Price Range --}}
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Min Price</label>
                    <input type="number" wire:model.live.debounce.300ms="minPrice" class="w-full border border-border rounded-md px-3 py-2 bg-background" placeholder="Min Price">
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Max Price</label>
                    <input type="number" wire:model.live.debounce.300ms="maxPrice" class="w-full border border-border rounded-md px-3 py-2 bg-background" placeholder="Max Price">
                </div>
                
                            {{-- Bedrooms --}}
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Bedrooms</label>
                    <select wire:model.live="bedrooms" class="w-full border border-border rounded-md px-3 py-2 bg-background">
                        <option value="">Any</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                        <option value="5">5+</option>
                    </select>
                </div>
                
                            {{-- Bathrooms --}}
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Bathrooms</label>
                    <select wire:model.live="bathrooms" class="w-full border border-border rounded-md px-3 py-2 bg-background">
                        <option value="">Any</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                    </select>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            {{-- Property Type --}}
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Property Type</label>
                    <select wire:model.live="propertyType" class="w-full border border-border rounded-md px-3 py-2 bg-background">
                        <option value="">All Types</option>
                        @foreach($propertyTypes as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                
                            {{-- Sort By --}}
                <div class="space-y-2">
                    <label class="text-sm font-medium text-foreground">Sort By</label>
                    <select wire:model.live="sortBy" class="w-full border border-border rounded-md px-3 py-2 bg-background">
                        <option value="created_at">Newest</option>
                        <option value="price">Price</option>
                        <option value="bedrooms">Bedrooms</option>
                        <option value="sqft">Square Feet</option>
                    </select>
                </div>
            </div>
            
            <div class="flex items-center justify-end gap-3 mt-6 pt-6 border-t border-border">
                            <button type="button" wire:click="clearFilters" class="px-4 py-2 rounded-md border border-border hover:bg-secondary">Reset Filters</button>
                            <button type="button" @click="showFilters = false" class="px-4 py-2 rounded-md bg-primary text-primary-foreground">Apply Filters</button>
                        </div>
                    </div>

                    {{-- Filters Toggle Button --}}
                    <div class="flex items-center justify-end mt-4">
                        <button type="button" @click="showFilters = !showFilters" class="gap-2 px-4 py-2 rounded-md border border-border flex items-center text-sm">
                            <i class="lucide lucide-sliders-horizontal w-4 h-4"></i>
                            <span class="hidden sm:inline">Filters</span>
                        </button>
            </div>
        </div>
    </div>

            {{-- Quick Stats --}}
            <div class="flex flex-wrap justify-center gap-8 md:gap-16 mt-12">
                <div class="text-center">
                    <p class="text-3xl md:text-4xl font-bold text-primary-foreground">{{ number_format($featuredProperties->count()) }}+</p>
                    <p class="text-primary-foreground/80 text-sm md:text-base">Active Listings</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl md:text-4xl font-bold text-primary-foreground">{{ number_format($properties instanceof \Illuminate\Pagination\LengthAwarePaginator ? $properties->total() : count($properties)) }}+</p>
                    <p class="text-primary-foreground/80 text-sm md:text-base">Total Properties</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl md:text-4xl font-bold text-primary-foreground">{{ $propertyTypes->count() }}+</p>
                    <p class="text-primary-foreground/80 text-sm md:text-base">Property Types</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Listings --}}
    <section class="py-16 md:py-24 bg-secondary/30">
        <div class="container">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-2">Featured Listings</h2>
                    <p class="text-muted-foreground text-lg">
                        Handpicked properties just for you
                    </p>
                </div>
                <a href="#all-properties" class="px-4 py-2 rounded-md border border-border w-fit flex items-center gap-2">
                    View All Listings
                    <i class="lucide lucide-arrow-right w-4 h-4"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($featuredProperties as $property)
                    <x-property-card :property="$property" />
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-muted flex items-center justify-center">
                            <i class="lucide lucide-search-x w-8 h-8 text-muted-foreground"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-foreground mb-2">No properties found</h3>
                        <p class="text-muted-foreground max-w-md mx-auto">Try adjusting your search filters to find more properties that match your criteria.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Property Types --}}
    <section class="py-16 md:py-24">
        <div class="container">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-3">Explore by Property Type</h2>
                <p class="text-muted-foreground text-lg max-w-2xl mx-auto">
                    Find exactly what you're looking for with our diverse property categories
                </p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-6">
                @php
                    $propertyTypeConfig = [
                        'House' => ['icon' => 'home', 'description' => 'Single-family homes'],
                        'Houses' => ['icon' => 'home', 'description' => 'Single-family homes'],
                        'Apartment' => ['icon' => 'building-2', 'description' => 'Urban living spaces'],
                        'Apartments' => ['icon' => 'building-2', 'description' => 'Urban living spaces'],
                        'Condo' => ['icon' => 'building', 'description' => 'Modern condominiums'],
                        'Condos' => ['icon' => 'building', 'description' => 'Modern condominiums'],
                        'Townhouse' => ['icon' => 'warehouse', 'description' => 'Multi-level living'],
                        'Townhouses' => ['icon' => 'warehouse', 'description' => 'Multi-level living'],
                        'Land' => ['icon' => 'tree-pine', 'description' => 'Build your dream'],
                        'Luxury' => ['icon' => 'castle', 'description' => 'Premium properties'],
                        'Residential' => ['icon' => 'home', 'description' => 'Residential properties'],
                        'Commercial' => ['icon' => 'building-2', 'description' => 'Commercial properties'],
                        'Industrial' => ['icon' => 'warehouse', 'description' => 'Industrial properties'],
                    ];
                    $displayTypes = $propertyTypes->take(6);
                @endphp
                @forelse($displayTypes as $type)
                    @php
                        $config = $propertyTypeConfig[$type] ?? ['icon' => 'home', 'description' => $type . ' properties'];
                        $count = $featuredProperties->where('property_type', $type)->count();
                    @endphp
                    <button 
                        wire:click="$set('propertyType', '{{ $type }}')" 
                        class="group p-6 bg-card rounded-xl border border-border hover:border-primary hover:shadow-lg transition-all duration-300 text-center"
                        x-data="{}"
                        x-init="$nextTick(() => { if (typeof lucide !== 'undefined') { const icon = $el.querySelector('i[data-lucide]'); if (icon) lucide.createIcons(icon); } })"
                    >
                        <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-primary/10 flex items-center justify-center group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                            <i class="lucide lucide-{{ $config['icon'] }} w-7 h-7 text-primary group-hover:text-primary-foreground" data-lucide="{{ $config['icon'] }}"></i>
                        </div>
                        <h3 class="font-semibold text-foreground mb-1">{{ $type }}</h3>
                        <p class="text-sm text-muted-foreground mb-2">{{ $config['description'] }}</p>
                        <p class="text-sm font-medium text-primary">{{ $count }}+ listings</p>
                    </button>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-muted-foreground">No property types available</p>
                    </div>
                @endforelse
            </div>
                </div>
    </section>

    <script>
        // Ensure Property Types icons are initialized
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                setTimeout(() => lucide.createIcons(), 100);
            }
        });
        document.addEventListener('livewire:update', function() {
            if (typeof lucide !== 'undefined') {
                setTimeout(() => lucide.createIcons(), 100);
            }
        });
    </script>

    {{-- Why Choose Us --}}
    <section class="py-16 md:py-24 bg-primary text-primary-foreground">
        <div class="container">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">Why Choose Us</h2>
                <p class="text-primary-foreground/80 text-lg max-w-2xl mx-auto">
                    We're committed to making your home search experience seamless and enjoyable
                </p>
                    </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8" x-data="{}" x-init="$nextTick(() => { if (typeof lucide !== 'undefined') lucide.createIcons(); })">
                @foreach ([
                    ['icon' => 'shield', 'title' => 'Trusted & Secure', 'description' => 'All listings are verified and your transactions are protected with industry-leading security.'],
                    ['icon' => 'clock-3', 'title' => 'Save Time', 'description' => 'Advanced search filters and AI-powered recommendations help you find homes faster.'],
                    ['icon' => 'users', 'title' => 'Expert Agents', 'description' => 'Connect with top-rated local agents who know your neighborhood inside and out.'],
                    ['icon' => 'award', 'title' => 'Best Prices', 'description' => 'Access exclusive deals and get accurate home valuations powered by real market data.'],
                ] as $feature)
                    <div class="text-center p-6 rounded-xl bg-primary-foreground/10 backdrop-blur-sm hover:bg-primary-foreground/15 transition-colors">
                        <div class="w-16 h-16 mx-auto mb-5 rounded-full bg-primary-foreground/20 flex items-center justify-center">
                            <i class="lucide lucide-{{ $feature['icon'] }} w-8 h-8" data-lucide="{{ $feature['icon'] }}"></i>
                </div>
                        <h3 class="text-xl font-semibold mb-3">{{ $feature['title'] }}</h3>
                        <p class="text-primary-foreground/80 leading-relaxed">{{ $feature['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        // Ensure Why Choose Us icons are initialized
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                setTimeout(() => lucide.createIcons(), 100);
            }
        });
        document.addEventListener('livewire:update', function() {
            if (typeof lucide !== 'undefined') {
                setTimeout(() => lucide.createIcons(), 100);
            }
        });
    </script>

    {{-- Auth Modals --}}
    @livewire('auth-modals')

    {{-- Image Gallery Modal --}}
    @if($showImageModal)
        <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background: rgba(0,0,0,0.9); display: flex; flex-direction: column;" wire:click="closeImageModal">
            <div style="position: absolute; top: 1rem; right: 1rem; z-index: 10;">
                <button wire:click="closeImageModal" style="color: white; font-size: 2rem; background: none; border: none; cursor: pointer;">
                    <i class="lucide lucide-x"></i>
                </button>
            </div>
            
            <div style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 2rem; position: relative;" wire:click.stop>
                @if($currentImageIndex > 0)
                    <button wire:click="previousImage" style="position: absolute; left: 1rem; color: white; font-size: 2rem; background: none; border: none; cursor: pointer;">
                        <i class="lucide lucide-chevron-left"></i>
                    </button>
                @endif
                
                <img src="{{ Storage::url($currentImage) }}" alt="Property" style="max-height: 60vh; max-width: 60vw; object-fit: contain;">
                
                @if($currentImageIndex < count($viewingImages) - 1)
                    <button wire:click="nextImage" style="position: absolute; right: 1rem; color: white; font-size: 2rem; background: none; border: none; cursor: pointer;">
                        <i class="lucide lucide-chevron-right"></i>
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

    {{-- Property Details Modal --}}
    @if($showPropertyModal && $selectedProperty)
        <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; padding: 1rem; overflow-y: auto;" wire:click="closePropertyModal">
            <div class="bg-white rounded-xl shadow-xl max-w-4xl w-full my-8" style="background: white; border-radius: 0.75rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); max-width: 56rem; width: 100%;" wire:click.stop>
                {{-- Modal Header --}}
                <div class="flex items-center justify-between p-6 border-b border-gray-200" style="display: flex; align-items: center; justify-content: space-between; padding: 1.5rem; border-bottom: 1px solid #e5e7eb;">
                    <h2 class="text-2xl font-bold text-gray-900" style="font-size: 1.5rem; font-weight: 700; color: #111827;">Property Details</h2>
                    <button wire:click="closePropertyModal" class="text-gray-400 hover:text-gray-600" style="color: #9ca3af; font-size: 1.5rem; background: none; border: none; cursor: pointer;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.5rem; height: 1.5rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- Modal Body --}}
                <div style="padding: 1.5rem; max-height: calc(90vh - 200px); overflow-y: auto;">
                    {{-- Image Gallery --}}
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
                            
                            {{-- Thumbnail Strip --}}
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

                    {{-- Property Title & Price --}}
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

                    {{-- Property Stats --}}
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

                    {{-- Description --}}
                    @if($selectedProperty->description)
                        <div class="mb-6" style="margin-bottom: 1.5rem;">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2" style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 0.5rem;">Description</h4>
                            <p class="text-gray-600" style="color: #4b5563; line-height: 1.625;">{{ $selectedProperty->description }}</p>
                        </div>
                    @endif

                    {{-- Location --}}
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

                    {{-- Owner Information --}}
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

                {{-- Modal Footer --}}
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

    {{-- Inquiry Modal --}}
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

    {{-- Financing Inquiry Modal --}}
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
