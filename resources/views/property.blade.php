@extends('layouts.template')

@section('title', $property ? $property->title : 'Property Not Found')

@section('content')
<div class="min-h-screen flex flex-col">
    @include('partials.header')

    <main class="flex-1 pt-20">
        @if(!$property)
            <div class="container py-20 text-center">
                <h1 class="text-2xl font-bold text-foreground mb-2">Property Not Found</h1>
                <p class="text-muted-foreground mb-4">The property you're looking for doesn't exist.</p>
                <a href="/" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-primary text-primary-foreground">
                    <i data-lucide="home" class="w-4 h-4"></i>
                    Back to Home
                </a>
            </div>
        @else
            <div class="container py-4">
                <a href="/" class="inline-flex items-center text-sm text-muted-foreground hover:text-foreground transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    Back to listings
                </a>
            </div>

            @php
                $images = $property->images->pluck('image_path')->map(function($path) {
                    return \Illuminate\Support\Facades\Storage::url($path);
                })->toArray();
                if (empty($images)) {
                    $images = [asset('images/placeholder.jpg')];
                }
            @endphp

            <div class="container mb-8" x-data="gallery({ images: @json($images), address: '{{ addslashes($property->address) }}' })">
                <div class="relative">
                    <div class="relative aspect-[16/9] md:aspect-[2/1] overflow-hidden rounded-xl">
                        <img :src="images[currentIndex]" :alt="`${address} - Image ${currentIndex + 1}`" class="w-full h-full object-cover cursor-pointer" @click="isFullscreen = true">
                        <button type="button" class="absolute left-4 top-1/2 -translate-y-1/2 rounded-full bg-background/90 hover:bg-background shadow-lg p-2" @click="prev">
                            <i data-lucide="chevron-left" class="w-5 h-5"></i>
                        </button>
                        <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 rounded-full bg-background/90 hover:bg-background shadow-lg p-2" @click="next">
                            <i data-lucide="chevron-right" class="w-5 h-5"></i>
                        </button>
                        <button type="button" class="absolute bottom-4 right-4 rounded-full bg-background/90 hover:bg-background shadow-lg p-2" @click="isFullscreen = true">
                            <i data-lucide="expand" class="w-5 h-5"></i>
                        </button>
                        <div class="absolute bottom-4 left-4 bg-background/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-sm font-medium">
                            <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-3 overflow-x-auto pb-2">
                        <template x-for="(image, index) in images" :key="index">
                            <button @click="currentIndex = index" class="relative flex-shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-lg overflow-hidden transition-all" :class="index === currentIndex ? 'ring-2 ring-primary ring-offset-2' : 'opacity-70 hover:opacity-100'">
                                <img :src="image" :alt="`Thumbnail ${index + 1}`" class="w-full h-full object-cover">
                            </button>
                        </template>
                    </div>
                </div>

                <div x-show="isFullscreen" class="fixed inset-0 z-50 bg-foreground/95 flex items-center justify-center">
                    <button type="button" class="absolute top-4 right-4 text-background hover:bg-background/20 rounded-full p-2" @click="isFullscreen = false">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                    <button type="button" class="absolute left-4 top-1/2 -translate-y-1/2 text-background hover:bg-background/20 rounded-full p-2" @click="prev">
                        <i data-lucide="chevron-left" class="w-8 h-8"></i>
                    </button>
                    <img :src="images[currentIndex]" :alt="`${address} - Image ${currentIndex + 1}`" class="max-h-[90vh] max-w-[90vw] object-contain">
                    <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-background hover:bg-background/20 rounded-full p-2" @click="next">
                        <i data-lucide="chevron-right" class="w-8 h-8"></i>
                    </button>
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-background/20 backdrop-blur-sm px-4 py-2 rounded-full text-background text-sm font-medium">
                        <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
                    </div>
                </div>
            </div>

            <div class="container pb-16">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-8">
                        <div>
                            <div class="flex flex-wrap items-start justify-between gap-4 mb-4">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        @if($property->is_featured)
                                            <span class="bg-primary text-primary-foreground px-2.5 py-1 rounded-md text-xs font-semibold">FEATURED</span>
                                        @endif
                                        <span class="px-2.5 py-1 rounded-md text-xs font-semibold bg-secondary text-secondary-foreground">{{ $property->property_type }}</span>
                                    </div>
                                    <h1 class="text-3xl md:text-4xl font-bold text-foreground mb-2">TZS {{ number_format($property->price, 0, '.', ',') }}</h1>
                                    <div class="flex items-center text-muted-foreground">
                                        <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
                                        <span>{{ $property->address }}{{ $property->city ? ', ' . $property->city : '' }}{{ $property->state ? ', ' . $property->state : '' }}</span>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="px-3 py-2 rounded-md border border-border">
                                        <i data-lucide="heart" class="w-5 h-5"></i>
                                    </button>
                                    <button class="px-3 py-2 rounded-md border border-border" onclick="navigator.share ? navigator.share({ title: '{{ $property->title }}', url: window.location.href }) : navigator.clipboard.writeText(window.location.href)">
                                        <i data-lucide="share-2" class="w-5 h-5"></i>
                                    </button>
                                    <button class="px-3 py-2 rounded-md border border-border" onclick="window.print()">
                                        <i data-lucide="printer" class="w-5 h-5"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-6 py-4 border-y border-border">
                                @if($property->bedrooms)
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="bed-double" class="w-5 h-5 text-muted-foreground"></i>
                                        <span class="font-semibold">{{ $property->bedrooms }}</span>
                                        <span class="text-muted-foreground">Beds</span>
                                    </div>
                                @endif
                                @if($property->bathrooms)
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="bath" class="w-5 h-5 text-muted-foreground"></i>
                                        <span class="font-semibold">{{ $property->bathrooms }}</span>
                                        <span class="text-muted-foreground">Baths</span>
                                    </div>
                                @endif
                                @if($property->sqft)
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="square" class="w-5 h-5 text-muted-foreground"></i>
                                        <span class="font-semibold">{{ number_format($property->sqft) }}</span>
                                        <span class="text-muted-foreground">Sq Ft</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if($property->description)
                            <div>
                                <h2 class="text-xl font-semibold text-foreground mb-4">About This Property</h2>
                                <p class="text-muted-foreground leading-relaxed">{{ $property->description }}</p>
                            </div>
                        @endif

                        <div>
                            <h2 class="text-xl font-semibold text-foreground mb-4">Property Details</h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach ([
                                    ['icon' => 'home', 'label' => 'Property Type', 'value' => $property->property_type],
                                    ['icon' => 'tag', 'label' => 'Listing Type', 'value' => $property->listing_type ?? '—'],
                                    ['icon' => 'map-pin', 'label' => 'Location', 'value' => $property->city ?? '—'],
                                    ['icon' => 'calendar', 'label' => 'Status', 'value' => $property->status ?? '—'],
                                ] as $detail)
                                    <div class="bg-secondary/50 rounded-lg p-4">
                                        <div class="flex items-center gap-2 text-muted-foreground mb-1">
                                            <i data-lucide="{{ $detail['icon'] }}" class="w-4 h-4"></i>
                                            <span class="text-sm">{{ $detail['label'] }}</span>
                                        </div>
                                        <p class="font-semibold text-foreground">{{ $detail['value'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-card border border-border rounded-xl p-6">
                            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-border">
                                @if($property->user && $property->user->profile_photo_path)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($property->user->profile_photo_path) }}" alt="{{ $property->user->name }}" class="w-16 h-16 rounded-full object-cover">
                                @else
                                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center">
                                        <i data-lucide="user" class="w-8 h-8 text-primary"></i>
                                    </div>
                                @endif
                                <div>
                                    <h3 class="font-semibold text-foreground">{{ $property->user->name ?? $property->agent_name ?? 'Property Owner' }}</h3>
                                    <p class="text-sm text-muted-foreground">Listing Agent</p>
                                    @if($property->owner_phone)
                                        <div class="flex items-center gap-4 mt-2">
                                            <a href="tel:{{ $property->owner_phone }}" class="text-sm text-primary hover:underline flex items-center gap-1">
                                                <i data-lucide="phone" class="w-3 h-3"></i>
                                                {{ $property->owner_phone }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if(auth()->check())
                                <form class="space-y-4" action="{{ route('inquiry.create') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium">Subject</label>
                                        <input type="text" name="subject" value="Inquiry about: {{ $property->title }}" class="w-full border border-border rounded-md px-3 py-2" required>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium">Email</label>
                                        <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full border border-border rounded-md px-3 py-2" required>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium">Phone (optional)</label>
                                        <input type="tel" name="phone" class="w-full border border-border rounded-md px-3 py-2" placeholder="(255) 123-456-789">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium">Message</label>
                                        <textarea name="message" class="w-full border border-border rounded-md px-3 py-2" rows="4" required>Hi, I'm interested in the property at {{ $property->address }}. Please contact me with more information.</textarea>
                                    </div>
                                    <button type="submit" class="w-full px-4 py-2 rounded-md bg-primary text-primary-foreground flex items-center justify-center gap-2">
                                        <i data-lucide="send" class="w-4 h-4"></i>
                                        Contact Agent
                                    </button>
                                    <p class="text-xs text-muted-foreground text-center">By submitting, you agree to our Terms of Service and Privacy Policy.</p>
                                </form>
                            @else
                                <div class="space-y-4">
                                    <p class="text-sm text-muted-foreground">Please <a href="/" class="text-primary hover:underline">sign in</a> to contact the agent.</p>
                                    <a href="/" class="w-full px-4 py-2 rounded-md bg-primary text-primary-foreground flex items-center justify-center gap-2">
                                        <i data-lucide="log-in" class="w-4 h-4"></i>
                                        Sign In to Contact
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="bg-card border border-border rounded-xl p-6" x-data="mortgage({ propertyPrice: {{ $property->price }} })">
                            <div class="flex items-center gap-2 mb-6">
                                <i data-lucide="calculator" class="w-5 h-5 text-primary"></i>
                                <h3 class="text-lg font-semibold text-foreground">Mortgage Calculator</h3>
                            </div>

                            <div class="space-y-6">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium">Home Price</label>
                                        <span class="text-sm text-muted-foreground" x-text="formatCurrency(homePrice)"></span>
                                    </div>
                                    <div class="relative">
                                        <i data-lucide="dollar-sign" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground"></i>
                                        <input type="number" x-model.number="homePrice" class="pl-9 w-full border border-border rounded-md px-3 py-2">
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium">Down Payment</label>
                                        <span class="text-sm text-muted-foreground" x-text="downPaymentPercent + '% (' + formatCurrency(downPaymentAmount()) + ')'"></span>
                                    </div>
                                    <input type="range" min="0" max="50" step="1" x-model.number="downPaymentPercent" class="w-full">
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium">Interest Rate</label>
                                        <span class="text-sm text-muted-foreground" x-text="interestRate + '%'"></span>
                                    </div>
                                    <div class="relative">
                                        <i data-lucide="percent" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground"></i>
                                        <input type="number" step="0.1" x-model.number="interestRate" class="pl-9 w-full border border-border rounded-md px-3 py-2">
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-medium">Loan Term</label>
                                        <span class="text-sm text-muted-foreground" x-text="loanTerm + ' years'"></span>
                                    </div>
                                    <div class="flex gap-2">
                                        <template x-for="term in [15, 20, 30]" :key="term">
                                            <button type="button" @click="loanTerm = term" :class="loanTerm === term ? 'bg-primary text-primary-foreground' : 'bg-secondary text-secondary-foreground hover:bg-secondary/80'" class="flex-1 py-2 px-4 rounded-lg text-sm font-medium transition-colors" x-text="term + ' yr'"></button>
                                        </template>
                                    </div>
                                </div>

                                <div class="pt-6 border-top border-border">
                                    <div class="bg-primary/10 rounded-xl p-5 text-center">
                                        <p class="text-sm text-muted-foreground mb-1">Estimated Monthly Payment</p>
                                        <p class="text-3xl font-bold text-primary" x-text="formatCurrency(monthlyPayment())"></p>
                                        <p class="text-xs text-muted-foreground mt-2">Principal & Interest only. Excludes taxes, insurance, and HOA.</p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4 mt-4">
                                        <div class="bg-secondary/50 rounded-lg p-3 text-center">
                                            <p class="text-xs text-muted-foreground">Loan Amount</p>
                                            <p class="text-sm font-semibold text-foreground" x-text="formatCurrency(loanAmount())"></p>
                                        </div>
                                        <div class="bg-secondary/50 rounded-lg p-3 text-center">
                                            <p class="text-xs text-muted-foreground">Total Interest</p>
                                            <p class="text-sm font-semibold text-foreground" x-text="formatCurrency(totalInterest())"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>

    @include('partials.footer')
</div>
@endsection

@section('scripts')
<script>
    window.gallery = function(params) {
        const { images = [], address = '' } = params || {};
        return {
            images: Array.isArray(images) ? images : [],
            address: address || '',
            currentIndex: 0,
            isFullscreen: false,
            next() { 
                if (this.images.length > 0) {
                    this.currentIndex = this.currentIndex === this.images.length - 1 ? 0 : this.currentIndex + 1; 
                }
            },
            prev() { 
                if (this.images.length > 0) {
                    this.currentIndex = this.currentIndex === 0 ? this.images.length - 1 : this.currentIndex - 1; 
                }
            },
        };
    };

    window.mortgage = function(params) {
        const { propertyPrice = 0 } = params || {};
        return {
            homePrice: Number(propertyPrice) || 0,
            downPaymentPercent: 20,
            interestRate: 6.5,
            loanTerm: 30,
            monthlyPayment() {
                const principal = this.loanAmount();
                const monthlyRate = this.interestRate / 100 / 12;
                const numberOfPayments = this.loanTerm * 12;
                if (monthlyRate === 0) return principal / numberOfPayments;
                const payment = (principal * (monthlyRate * Math.pow(1 + monthlyRate, numberOfPayments))) / (Math.pow(1 + monthlyRate, numberOfPayments) - 1);
                return payment;
            },
            downPaymentAmount() { return this.homePrice * (this.downPaymentPercent / 100); },
            loanAmount() { return this.homePrice - this.downPaymentAmount(); },
            totalInterest() { return this.monthlyPayment() * this.loanTerm * 12 - this.loanAmount(); },
            formatCurrency(value) { return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'TZS', maximumFractionDigits: 0 }).format(value); },
        };
    };
</script>
@endsection

