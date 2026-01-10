<div>
    {{-- Hero Section --}}
    <section class="relative min-h-[500px] md:min-h-[600px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/hero-bg.jpg') }}" alt="Rental properties" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-foreground/60 via-foreground/40 to-foreground/70"></div>
        </div>

        <div class="container relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-primary-foreground mb-4">Find Your Perfect Rental</h1>
            <p class="text-lg md:text-xl text-primary-foreground/90 mb-8 max-w-2xl mx-auto">
                Discover rental properties that fit your budget and lifestyle
            </p>

            <div class="max-w-4xl mx-auto">
                <div class="bg-background rounded-xl p-4 shadow-2xl" x-data="{ showFilters: false }">
                    <form wire:submit.prevent="search" class="flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-1">
                            <i class="lucide lucide-map-pin absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground"></i>
                            <input 
                                type="text" 
                                wire:model.live.debounce.300ms="searchQuery"
                                placeholder="Enter address, city, or ZIP code" 
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

                    <div class="mt-4 text-center">
                        <button @click="showFilters = !showFilters" class="text-sm text-primary hover:underline">
                            <span x-show="!showFilters">Show Advanced Filters</span>
                            <span x-show="showFilters">Hide Advanced Filters</span>
                        </button>
                </div>
                </div>
            </div>
                                </div>
    </section>

    {{-- Properties Section --}}
    <section class="py-16 bg-background">
        <div class="container">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-foreground mb-2">Rental Properties</h2>
                <p class="text-muted-foreground">Available rental properties in your area</p>
                        </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($properties as $property)
                    @include('components.property-card', ['property' => $property])
                @empty
                    <div class="col-span-full text-center py-12">
                        <i class="lucide lucide-home w-16 h-16 text-muted-foreground mx-auto mb-4"></i>
                        <h3 class="text-xl font-semibold text-foreground mb-2">No Properties Found</h3>
                        <p class="text-muted-foreground">Try adjusting your search criteria or filters to find more properties.</p>
                    </div>
                @endforelse
            </div>

            @if($properties->hasPages())
                <div class="mt-8">
                    {{ $properties->links() }}
                </div>
            @endif
        </div>
    </section>

    {{-- Image Gallery Modal --}}
    @if($showImageModal)
        <div class="fixed inset-0 z-50 bg-black/90 flex flex-col" wire:click="closeImageModal">
            <div class="absolute top-4 right-4 z-10">
                <button wire:click="closeImageModal" class="text-white text-2xl bg-none border-none cursor-pointer">
                    <i class="lucide lucide-x w-6 h-6"></i>
                </button>
            </div>
            
            <div class="flex-1 flex items-center justify-center p-8 relative" wire:click.stop>
                @if($currentImageIndex > 0)
                    <button wire:click="previousImage" class="absolute left-4 text-white text-2xl bg-none border-none cursor-pointer">
                        <i class="lucide lucide-chevron-left w-8 h-8"></i>
                    </button>
                @endif
                
                <img src="{{ Storage::url($currentImage) }}" alt="Property" class="max-h-[60vh] max-w-[60vw] object-contain">
                
                @if($currentImageIndex < count($viewingImages) - 1)
                    <button wire:click="nextImage" class="absolute right-4 text-white text-2xl bg-none border-none cursor-pointer">
                        <i class="lucide lucide-chevron-right w-8 h-8"></i>
                    </button>
                @endif
            </div>
            
            <div class="bg-black/80 p-4">
                <div class="text-center text-white text-sm mb-2">
                    {{ $currentImageIndex + 1 }} / {{ count($viewingImages) }}
                </div>
                <div class="flex justify-center gap-2 overflow-x-auto">
                    @foreach($viewingImages as $index => $image)
                        <button wire:click="setCurrentImage({{ $index }})" class="flex-shrink-0 bg-none border-none cursor-pointer">
                            <img src="{{ Storage::url($image) }}" alt="Thumbnail" 
                                 class="w-16 h-16 object-cover rounded {{ $index === $currentImageIndex ? 'border-2 border-primary' : 'opacity-60' }}">
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Inquiry Modal --}}
    @if($showInquiryModal)
        <div class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4" wire:click="closeInquiryModal">
            <div class="bg-background rounded-2xl max-w-md w-full shadow-2xl" wire:click.stop>
                <div class="bg-gradient-to-r from-primary to-primary/80 p-6 rounded-t-2xl">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <i class="lucide lucide-mail w-6 h-6 text-primary-foreground"></i>
                            <h3 class="text-xl font-bold text-primary-foreground">Send Inquiry</h3>
                        </div>
                        <button wire:click="closeInquiryModal" class="text-primary-foreground bg-none border-none cursor-pointer">
                            <i class="lucide lucide-x w-6 h-6"></i>
                        </button>
                    </div>
                </div>

                @if (session()->has('message'))
                    <div class="bg-green-50 border border-green-200 text-green-800 p-3 m-4 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                <form wire:submit.prevent="submitInquiry" class="p-6">
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-foreground mb-2">Subject</label>
                        <input type="text" wire:model="inquirySubject" class="w-full border border-border rounded-lg px-3 py-2 bg-background focus:border-primary focus:ring-1 focus:ring-primary">
                        @error('inquirySubject') 
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-foreground mb-2">Email</label>
                        <input type="email" wire:model="inquiryEmail" class="w-full border border-border rounded-lg px-3 py-2 bg-background focus:border-primary focus:ring-1 focus:ring-primary">
                        @error('inquiryEmail') 
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-foreground mb-2">Phone (Optional)</label>
                        <input type="tel" wire:model="inquiryPhone" class="w-full border border-border rounded-lg px-3 py-2 bg-background focus:border-primary focus:ring-1 focus:ring-primary">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-foreground mb-2">Message</label>
                        <textarea wire:model="inquiryMessage" rows="4" class="w-full border border-border rounded-lg px-3 py-2 bg-background focus:border-primary focus:ring-1 focus:ring-primary resize-y" placeholder="Please provide details about your inquiry..."></textarea>
                        @error('inquiryMessage') 
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex gap-3 justify-end">
                        <button type="button" wire:click="closeInquiryModal" class="px-4 py-2 bg-secondary text-foreground border border-border rounded-lg font-semibold hover:bg-secondary/80">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 py-2 bg-primary text-primary-foreground rounded-lg font-semibold hover:bg-primary/90">
                            Send Inquiry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Application Modal --}}
    @if($showApplicationModal)
        <div class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4 overflow-y-auto" wire:click="closeApplicationModal">
            <div class="bg-background rounded-2xl max-w-2xl w-full shadow-2xl my-8" wire:click.stop>
                <div class="bg-gradient-to-r from-green-500 to-green-600 p-6 rounded-t-2xl">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <i class="lucide lucide-check-circle w-6 h-6 text-white"></i>
                            <h3 class="text-xl font-bold text-white">Rental Application</h3>
                        </div>
                        <button wire:click="closeApplicationModal" class="text-white bg-none border-none cursor-pointer">
                            <i class="lucide lucide-x w-6 h-6"></i>
                        </button>
                    </div>
                </div>

                @if (session()->has('message'))
                    <div class="bg-green-50 border border-green-200 text-green-800 p-3 m-4 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                <form wire:submit.prevent="submitApplication" class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-semibold text-foreground mb-2">Full Name *</label>
                            <input type="text" wire:model="applicantName" class="w-full border border-border rounded-lg px-3 py-2 bg-background">
                            @error('applicantName') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-foreground mb-2">Email *</label>
                            <input type="email" wire:model="applicantEmail" class="w-full border border-border rounded-lg px-3 py-2 bg-background">
                            @error('applicantEmail') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-semibold text-foreground mb-2">Phone *</label>
                            <input type="tel" wire:model="applicantPhone" class="w-full border border-border rounded-lg px-3 py-2 bg-background">
                            @error('applicantPhone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-foreground mb-2">Monthly Income (TZS) *</label>
                            <input type="number" wire:model="monthlyIncome" class="w-full border border-border rounded-lg px-3 py-2 bg-background">
                            @error('monthlyIncome') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-semibold text-foreground mb-2">Employment Status *</label>
                            <select wire:model="employmentStatus" class="w-full border border-border rounded-lg px-3 py-2 bg-background">
                                <option value="">Select Status</option>
                                <option value="Employed">Employed</option>
                                <option value="Self-Employed">Self-Employed</option>
                                <option value="Student">Student</option>
                                <option value="Retired">Retired</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('employmentStatus') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-foreground mb-2">Employer/Business *</label>
                            <input type="text" wire:model="employer" class="w-full border border-border rounded-lg px-3 py-2 bg-background">
                            @error('employer') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-semibold text-foreground mb-2">Credit Score</label>
                            <input type="number" wire:model="creditScore" class="w-full border border-border rounded-lg px-3 py-2 bg-background" placeholder="Optional">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-foreground mb-2">References</label>
                            <input type="number" wire:model="referencesCount" class="w-full border border-border rounded-lg px-3 py-2 bg-background" placeholder="0">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-foreground mb-2">Desired Move-in *</label>
                            <input type="date" wire:model="desiredMoveIn" class="w-full border border-border rounded-lg px-3 py-2 bg-background">
                            @error('desiredMoveIn') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-foreground mb-2">Additional Message</label>
                        <textarea wire:model="applicationMessage" rows="3" class="w-full border border-border rounded-lg px-3 py-2 bg-background resize-y" placeholder="Any additional information you'd like to share..."></textarea>
                    </div>

                    <div class="flex gap-3 justify-end">
                        <button type="button" wire:click="closeApplicationModal" class="px-4 py-2 bg-secondary text-foreground border border-border rounded-lg font-semibold hover:bg-secondary/80">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg font-semibold hover:bg-green-600">
                            Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Auth Modals --}}
    @livewire('auth-modals')
</div>
