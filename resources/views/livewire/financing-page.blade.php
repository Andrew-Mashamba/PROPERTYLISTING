<div>
    {{-- Hero Section --}}
    <section class="relative min-h-[400px] md:min-h-[500px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/hero-bg.jpg') }}" alt="Financing" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-foreground/60 via-foreground/40 to-foreground/70"></div>
        </div>

        <div class="container relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-primary-foreground mb-4">Property Financing</h1>
            <p class="text-lg md:text-xl text-primary-foreground/90 mb-8 max-w-2xl mx-auto">
                Get the financing you need for your dream property
            </p>
        </div>
    </section>

    {{-- Financing Content --}}
    <section class="py-16 bg-background">
        <div class="container">
        
            @if (session()->has('message'))
                <div class="mb-6 p-4 rounded-lg bg-green-50 border-2 border-green-300">
                    <div class="flex items-center gap-3">
                        <i class="lucide lucide-check-circle w-6 h-6 text-green-600"></i>
                        <p class="text-green-800 font-semibold">{{ session('message') }}</p>
                    </div>
                </div>
            @endif
            
            <div class="flex flex-col lg:flex-row gap-6">
                <div class="w-full lg:w-1/3 bg-card rounded-xl shadow-card p-6">
                    <h2 class="text-foreground font-semibold text-lg mb-4">Property Details</h2>
                    
                    @if($property->images->first())
                        <img src="{{ asset('storage/' . $property->images->first()->image_path) }}" alt="{{ $property->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <div class="w-full h-48 bg-secondary rounded-lg mb-4 flex items-center justify-center">
                            <i class="lucide lucide-home w-16 h-16 text-muted-foreground"></i>
                        </div>
                    @endif

                    <h3 class="text-foreground font-bold text-xl mb-2">{{ $property->title }}</h3>
                    <p class="text-muted-foreground text-sm mb-4">{{ $property->address }}, {{ $property->city }}</p>

                    <div class="space-y-3">
                        <div class="p-3 rounded-lg bg-primary/10 border-2 border-primary/20">
                            <p class="text-xs text-primary mb-1">Property Price</p>
                            <p class="text-2xl font-bold text-primary">TZS {{ number_format($property->price) }}</p>
                        </div>

                        @if($property->bedrooms)
                            <div class="flex items-center gap-2 text-sm text-muted-foreground">
                                <i class="lucide lucide-bed-double w-5 h-5"></i>
                                <span>{{ $property->bedrooms }} Bedrooms</span>
                            </div>
                        @endif

                        @if($property->bathrooms)
                            <div class="flex items-center gap-2 text-sm text-muted-foreground">
                                <i class="lucide lucide-bath w-5 h-5"></i>
                                <span>{{ $property->bathrooms }} Bathrooms</span>
                            </div>
                        @endif

                        <div class="border-t-2 border-border pt-3 mt-3">
                            <p class="text-xs text-muted-foreground mb-1">Property Owner</p>
                            <p class="text-sm font-semibold text-foreground">{{ $property->user->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-2/3 space-y-6">
                <!-- Financing products / form -->
                @if(!$selectedLoanProduct)
                <div class="bg-card rounded-xl shadow-card p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-primary">
                            <i class="lucide lucide-dollar-sign w-6 h-6 text-primary-foreground"></i>
                        </div>
                        <div>
                            <h2 class="text-foreground font-semibold text-xl">Available Financing Options</h2>
                            <p class="text-muted-foreground text-sm">Choose the best loan product for your needs</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        @foreach($loanProducts as $product)
                        <div wire:click="selectLoanProduct({{ $product->id }})" class="p-4 rounded-lg border-2 border-border hover:border-primary cursor-pointer transition-all hover:shadow-md">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex-1">
                                    <h3 class="text-foreground font-bold text-lg">{{ $product->name }}</h3>
                                    <p class="text-muted-foreground text-sm">{{ $product->bank->name }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-primary font-bold text-2xl">{{ $product->interest_rate }}%</p>
                                    <p class="text-muted-foreground text-xs">Interest Rate</p>
                                </div>
                            </div>

                            <p class="text-muted-foreground text-sm mb-3">{{ $product->description }}</p>

                            <div class="grid grid-cols-2 gap-3 text-sm">
                                <div class="bg-secondary p-2 rounded">
                                    <p class="text-muted-foreground text-xs">Loan Range</p>
                                    <p class="text-foreground font-semibold">TZS {{ number_format($product->min_amount / 1000000, 1) }}M - {{ number_format($product->max_amount / 1000000, 1) }}M</p>
                                </div>
                                <div class="bg-secondary p-2 rounded">
                                    <p class="text-muted-foreground text-xs">Tenure</p>
                                    <p class="text-foreground font-semibold">{{ $product->min_tenure_months / 12 }}-{{ $product->max_tenure_months / 12 }} years</p>
                                </div>
                                <div class="bg-secondary p-2 rounded">
                                    <p class="text-muted-foreground text-xs">Processing Fee</p>
                                    <p class="text-foreground font-semibold">{{ $product->processing_fee_percentage }}%</p>
                                </div>
                                <div class="bg-secondary p-2 rounded">
                                    <p class="text-muted-foreground text-xs">Monthly Payment*</p>
                                    <p class="text-foreground font-semibold">TZS {{ number_format($this->calculateMonthlyPayment($property->price * 0.8, $product->interest_rate, 240)) }}</p>
                                </div>
                            </div>

                            <div class="mt-3 pt-3 border-t border-border">
                                <p class="text-xs text-muted-foreground mb-2">Key Features:</p>
                                <p class="text-sm text-foreground">{{ $product->features }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="bg-card rounded-xl shadow-card p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-green-500">
                                <i class="lucide lucide-check-circle w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h2 class="text-foreground font-semibold text-xl">{{ $selectedLoanProduct->name }}</h2>
                                <p class="text-muted-foreground text-sm">{{ $selectedLoanProduct->bank->name }}</p>
                            </div>
                        </div>
                        <button wire:click="$set('selectedLoanProduct', null)" class="px-4 py-2 rounded-lg border-2 border-border text-foreground font-semibold text-sm hover:bg-secondary">
                            Change Product
                        </button>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="p-4 rounded-lg bg-primary/10 border-2 border-primary/20">
                            <p class="text-xs text-primary mb-1">Interest Rate</p>
                            <p class="text-2xl font-bold text-primary">{{ $selectedLoanProduct->interest_rate }}%</p>
                        </div>
                        <div class="p-4 rounded-lg bg-green-500/10 border-2 border-green-500/20">
                            <p class="text-xs text-green-600 mb-1">Processing Fee</p>
                            <p class="text-2xl font-bold text-green-600">{{ $selectedLoanProduct->processing_fee_percentage }}%</p>
                        </div>
                        <div class="p-4 rounded-lg bg-purple-500/10 border-2 border-purple-500/20">
                            <p class="text-xs text-purple-600 mb-1">Max Tenure</p>
                            <p class="text-2xl font-bold text-purple-600">{{ $selectedLoanProduct->max_tenure_months / 12 }} yrs</p>
                        </div>
                    </div>                    

                    <form wire:submit.prevent="submitFinancingInquiry" class="space-y-4">
                        
                    <div class="bg-card mb-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-primary">
                                <i class="lucide lucide-calculator w-5 h-5 text-primary-foreground"></i>
                            </div>
                            <div>
                                <h5 class="text-foreground font-semibold text-sm">Quick Loan Calculator</h5>
                                <p class="text-muted-foreground text-xs">Adjust figures to preview payments before submitting</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <div>
                                <label class="block text-foreground font-medium text-xs mb-1">Loan Amount (TZS)</label>
                                <input wire:model.live="calculator_amount" type="number" class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary bg-background text-foreground">
                                <p class="text-[11px] text-muted-foreground mt-1">Recommended: {{ number_format($property->price * 0.8) }}</p>
                                @error('calculator_amount') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-foreground font-medium text-xs mb-1">Tenure (Months)</label>
                                <input wire:model.live="calculator_tenure_months" class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary bg-background text-foreground">                                    
                                <p class="text-[11px] text-muted-foreground mt-1">Recommended: 240 months</p>
                                @error('calculator_tenure_months') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-foreground font-medium text-xs mb-1">Interest Rate</label>
                                <input wire:model.live="calculator_interest_rate" type="number" step="0.01" class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary bg-background text-foreground">
                                <p class="text-[11px] text-muted-foreground mt-1">Default uses selected product rate</p>
                                @error('calculator_interest_rate') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-foreground font-medium text-xs mb-1">Monthly Income (TZS) <span class="text-red-500">*</span></label>
                                <input wire:model.live="calculator_monthly_income" type="number" class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary bg-background text-foreground">
                                <p class="text-[11px] text-muted-foreground mt-1">Used for quick affordability check</p>
                                @error('calculator_monthly_income') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        @if($calculator_amount && $calculator_tenure_months && $calculator_interest_rate !== null)
                        <div class="mt-4 p-3 rounded-lg bg-primary/10 border border-primary/20">
                            <p class="text-sm font-semibold text-primary mb-1">Estimated Monthly Payment</p>
                            <p class="text-2xl font-bold text-primary">TZS {{ number_format($this->calculateMonthlyPayment($calculator_amount, $calculator_interest_rate, $calculator_tenure_months)) }}</p>
                            <p class="text-[11px] text-primary/70 mt-1">Based on {{ $calculator_interest_rate }}% interest over {{ $calculator_tenure_months }} months</p>
                            @if($calculator_monthly_income)
                            @php
                                $estimatedPayment = $this->calculateMonthlyPayment($calculator_amount, $calculator_interest_rate, $calculator_tenure_months);
                                $incomeShare = $calculator_monthly_income > 0 ? ($estimatedPayment / $calculator_monthly_income) * 100 : null;
                            @endphp
                            @if($incomeShare !== null)
                            <div class="mt-3 p-3 rounded-lg {{ $incomeShare <= 40 ? 'bg-green-50 border border-green-200 text-green-800' : 'bg-red-50 border border-red-200 text-red-800' }}">
                                <p class="text-xs font-semibold">Affordability: ~{{ number_format($incomeShare, 1) }}% of income</p>
                                <p class="text-[11px]">{{ $incomeShare <= 40 ? 'Within a typical safe range (≤40%).' : 'Above typical safe range; consider lowering amount or extending tenure.' }}</p>
                            </div>
                            @endif
                            @endif
                        </div>
                        @endif
                    </div>
                    
                    
                    <div class="grid grid-cols-2 md:grid-cols-1 gap-4">
                            <div>
                                <label class="block text-foreground font-medium text-sm mb-2">Full Name <span class="text-red-500">*</span></label>
                                <input wire:model="full_name" type="text" class="w-full px-4 py-2.5 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary bg-background text-foreground">
                                @error('full_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-foreground font-medium text-sm mb-2">Email <span class="text-red-500">*</span></label>
                                <input wire:model="email" type="email" class="w-full px-4 py-2.5 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary bg-background text-foreground">
                                @error('email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-foreground font-medium text-sm mb-2">Phone <span class="text-red-500">*</span></label>
                                <input wire:model="phone" type="tel" class="w-full px-4 py-2.5 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary bg-background text-foreground">
                                @error('phone') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-foreground font-medium text-sm mb-2">Additional Information (Optional)</label>
                                <textarea wire:model="additional_info" rows="3" class="w-full px-4 py-2.5 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary bg-background text-foreground" placeholder="Any additional information you'd like to share..."></textarea>
                            </div>
                        </div>

                       

                        @if($loan_amount && $loan_tenure_months)
                        <div class="p-4 rounded-lg bg-green-500/10 border-2 border-green-500/20">
                            <p class="text-sm font-semibold text-green-600 mb-2">Estimated Monthly Payment</p>
                            <p class="text-3xl font-bold text-green-600">TZS {{ number_format($this->calculateMonthlyPayment($loan_amount, $selectedLoanProduct->interest_rate, $loan_tenure_months)) }}</p>
                            <p class="text-xs text-green-600/70 mt-1">Based on {{ $selectedLoanProduct->interest_rate }}% interest rate over {{ $loan_tenure_months }} months</p>
                        </div>
                        @endif

                        <div class="flex items-center justify-between pt-4">
                            <div></div>
                            <button type="submit" class="px-8 py-3 rounded-lg bg-primary text-primary-foreground font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-200">
                                <i class="lucide lucide-check w-5 h-5 inline-block mr-2"></i>
                                Submit Financing Application
                            </button>
                        </div>
                    </form>
                </div>
                @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Auth Modals -->
    @livewire('auth-modals')
</div>
