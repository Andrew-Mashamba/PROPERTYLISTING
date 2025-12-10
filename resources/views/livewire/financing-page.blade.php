<div>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="top-bar-left">
                <span class="top-bar-text">Free Shipping for orders over 50,000 TZS in materials</span>
                <span class="top-bar-email">hello@savannaproperty.com</span>
            </div>
            <div class="top-bar-right">
                <div class="social-links">
                    <a href="#" class="social-link">Facebook</a>
                    <a href="#" class="social-link">Twitter</a>
                    <a href="#" class="social-link">LinkedIn</a>
                </div>
                <div class="top-bar-actions pr-2">
                <button wire:click="$dispatch('showLoginModal')" class="top-bar-link text-xl font-bold border-2 border-orange-500 rounded-md px-2 py-1 m-0" style="color: #FF7F00;">Login</button>
                        <button wire:click="$dispatch('showRegisterModal')" class="top-bar-link text-xl font-bold border-2 border-blue-500 rounded-md px-2 py-1 m-0" style="color: #007BFF;">Sell Property</button>
                    <button wire:click="$dispatch('showRegisterModal')" class="top-bar-link text-xl font-bold border-2 border-green-500 rounded-md px-2 py-1 m-0" style="color: #28A745;">Post Rental</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="main-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="main-logo">SAVANNA</h1>
            </div>
            <div class="header-center">
                <nav class="main-nav">
                    <a href="/" class="nav-item">BUY</a>
                    <a href="/rent" class="nav-item">RENT</a>
                    <a href="/materials" class="nav-item">MATERIALS</a>
                    <a href="/services" class="nav-item">SERVICES</a>
                </nav>
            </div>
            <div class="header-right">
                <div class="search-bar">
                    <select class="search-category mr-4">
                        <option>All Categories</option>
                        <option>Residential</option>
                        <option>Commercial</option>
                        <option>Land</option>
                        <option>Investment</option>
                    </select>
                    <input type="text" class="search-input mr-4" 
                    placeholder="Search for properties">
                    <button class="search-btn">SEARCH</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .top-bar {
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            padding: 0.5rem 0;
            font-size: 0.875rem;
            height: 40px;
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
            gap: 2rem;
        }
        
        .top-bar-text {
            color: #6C757D;
        }
        
        .top-bar-email {
            color: #FF7F00;
        }
        
        .top-bar-right {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            color: #6C757D;
            text-decoration: none;
            font-size: 0.75rem;
        }
        
        .top-bar-actions {
            display: flex;
            gap: 1rem;
        }
        
        .top-bar-link {
            color: #6C757D;
            text-decoration: none;
            font-size: 0.75rem;
        }
        
        .main-header {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 0.5rem 0;
            min-height: 60px;
        }
        
        .header-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 0.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .main-logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: #FF7F00;
            margin: 0;
        }
        
        .main-nav {
            display: flex;
            gap: 1rem;
        }
        
        .nav-item {
            color: #333333;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            transition: color 0.2s;
            padding: 0.25rem 0.5rem;
        }
        
        .nav-item:hover,
        .nav-active {
            color: #FF7F00;
        }
        
        .search-bar {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 0.25rem;
            padding: 0.25rem;
        }
        
        .search-category {
            border: none;
            background: transparent;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            color: #6C757D;
        }
        
        .search-input {
            border: none;
            background: transparent;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            min-width: 150px;
        }
        
        .search-btn {
            background: #FF7F00;
            color: white;
            border: none;
            padding: 0.25rem 0.75rem;
            border-radius: 0.25rem;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
        }
    </style>

    <div class="bg-gray-50 min-h-screen py-6">
        <div style="max-width: 1280px; margin: 0 auto; padding: 0 1rem;">
        
        @if (session()->has('message'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 border-2 border-green-300">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-green-800 font-semibold">{{ session('message') }}</p>
                </div>
            </div>
        @endif
        
        <div class="flex gap-6">
            <div class="w-1/3 bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-gray-800 font-semibold text-lg mb-4">Property Details</h2>
                
                @if($property->images->first())
                <img src="{{ asset('storage/' . $property->images->first()->image_path) }}" alt="{{ $property->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
                @else
                <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                @endif

                <h3 class="text-gray-900 font-bold text-xl mb-2">{{ $property->title }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ $property->address }}, {{ $property->city }}</p>

                <div class="space-y-3">
                    <div class="p-3 rounded-lg bg-orange-50 border-2 border-orange-200">
                        <p class="text-xs text-orange-700 mb-1">Property Price</p>
                        <p class="text-2xl font-bold text-orange-600">TZS {{ number_format($property->price) }}</p>
                    </div>

                    @if($property->bedrooms)
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>{{ $property->bedrooms }} Bedrooms</span>
                    </div>
                    @endif

                    @if($property->bathrooms)
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                        <span>{{ $property->bathrooms }} Bathrooms</span>
                    </div>
                    @endif

                    <div class="border-t-2 border-gray-100 pt-3 mt-3">
                        <p class="text-xs text-gray-600 mb-1">Property Owner</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $property->user->name }}</p>
                    </div>
                </div>
            </div>

            <div class="w-2/3 space-y-6">
                <!-- Financing products / form -->
                @if(!$selectedLoanProduct)
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-gray-800 font-semibold text-xl">Available Financing Options</h2>
                            <p class="text-gray-500 text-sm">Choose the best loan product for your needs</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        @foreach($loanProducts as $product)
                        <div wire:click="selectLoanProduct({{ $product->id }})" class="p-4 rounded-lg border-2 border-gray-200 hover:border-blue-500 cursor-pointer transition-all hover:shadow-md">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex-1">
                                    <h3 class="text-gray-900 font-bold text-lg">{{ $product->name }}</h3>
                                    <p class="text-gray-600 text-sm">{{ $product->bank->name }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-blue-600 font-bold text-2xl">{{ $product->interest_rate }}%</p>
                                    <p class="text-gray-500 text-xs">Interest Rate</p>
                                </div>
                            </div>

                            <p class="text-gray-600 text-sm mb-3">{{ $product->description }}</p>

                            <div class="grid grid-cols-2 gap-3 text-sm">
                                <div class="bg-gray-50 p-2 rounded">
                                    <p class="text-gray-500 text-xs">Loan Range</p>
                                    <p class="text-gray-900 font-semibold">TZS {{ number_format($product->min_amount / 1000000, 1) }}M - {{ number_format($product->max_amount / 1000000, 1) }}M</p>
                                </div>
                                <div class="bg-gray-50 p-2 rounded">
                                    <p class="text-gray-500 text-xs">Tenure</p>
                                    <p class="text-gray-900 font-semibold">{{ $product->min_tenure_months / 12 }}-{{ $product->max_tenure_months / 12 }} years</p>
                                </div>
                                <div class="bg-gray-50 p-2 rounded">
                                    <p class="text-gray-500 text-xs">Processing Fee</p>
                                    <p class="text-gray-900 font-semibold">{{ $product->processing_fee_percentage }}%</p>
                                </div>
                                <div class="bg-gray-50 p-2 rounded">
                                    <p class="text-gray-500 text-xs">Monthly Payment*</p>
                                    <p class="text-gray-900 font-semibold">TZS {{ number_format($this->calculateMonthlyPayment($property->price * 0.8, $product->interest_rate, 240)) }}</p>
                                </div>
                            </div>

                            <div class="mt-3 pt-3 border-t border-gray-200">
                                <p class="text-xs text-gray-500 mb-2">Key Features:</p>
                                <p class="text-sm text-gray-700">{{ $product->features }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-gray-800 font-semibold text-xl">{{ $selectedLoanProduct->name }}</h2>
                                <p class="text-gray-500 text-sm">{{ $selectedLoanProduct->bank->name }}</p>
                            </div>
                        </div>
                        <button wire:click="$set('selectedLoanProduct', null)" class="px-4 py-2 rounded-lg border-2 border-gray-300 text-gray-700 font-semibold text-sm hover:bg-gray-50">
                            Change Product
                        </button>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="p-4 rounded-lg bg-blue-50 border-2 border-blue-200">
                            <p class="text-xs text-blue-700 mb-1">Interest Rate</p>
                            <p class="text-2xl font-bold text-blue-600">{{ $selectedLoanProduct->interest_rate }}%</p>
                        </div>
                        <div class="p-4 rounded-lg bg-green-50 border-2 border-green-200">
                            <p class="text-xs text-green-700 mb-1">Processing Fee</p>
                            <p class="text-2xl font-bold text-green-600">{{ $selectedLoanProduct->processing_fee_percentage }}%</p>
                        </div>
                        <div class="p-4 rounded-lg bg-purple-50 border-2 border-purple-200">
                            <p class="text-xs text-purple-700 mb-1">Max Tenure</p>
                            <p class="text-2xl font-bold text-purple-600">{{ $selectedLoanProduct->max_tenure_months / 12 }} yrs</p>
                        </div>
                    </div>                    

                    <form wire:submit.prevent="submitFinancingInquiry" class="space-y-4">
                        
                    <div class="bg-white mb-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h5 class="text-gray-800 font-semibold text-sm">Quick Loan Calculator</h5>
                                <p class="text-gray-500 text-xs">Adjust figures to preview payments before submitting</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <div>
                                <label class="block text-gray-700 font-medium text-xs mb-1">Loan Amount (TZS)</label>
                                <input wire:model.live="calculator_amount" type="number" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                                <p class="text-[11px] text-gray-500 mt-1">Recommended: {{ number_format($property->price * 0.8) }}</p>
                                @error('calculator_amount') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium text-xs mb-1">Tenure (Months)</label>
                                <input wire:model.live="calculator_tenure_months" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">                                    
                                <p class="text-[11px] text-gray-500 mt-1">Recommended: 240 months</p>
                                @error('calculator_tenure_months') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium text-xs mb-1">Interest Rate</label>
                                <input wire:model.live="calculator_interest_rate" type="number" step="0.01" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                                <p class="text-[11px] text-gray-500 mt-1">Default uses selected product rate</p>
                                @error('calculator_interest_rate') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium text-xs mb-1">Monthly Income (TZS) <span class="text-red-500">*</span></label>
                                <input wire:model.live="calculator_monthly_income" type="number" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-700">
                                <p class="text-[11px] text-gray-500 mt-1">Used for quick affordability check</p>
                                @error('calculator_monthly_income') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        @if($calculator_amount && $calculator_tenure_months && $calculator_interest_rate !== null)
                        <div class="mt-4 p-3 rounded-lg bg-gradient-to-r from-orange-50 to-orange-100 border border-orange-200">
                            <p class="text-sm font-semibold text-orange-900 mb-1">Estimated Monthly Payment</p>
                            <p class="text-2xl font-bold text-orange-600">TZS {{ number_format($this->calculateMonthlyPayment($calculator_amount, $calculator_interest_rate, $calculator_tenure_months)) }}</p>
                            <p class="text-[11px] text-orange-700 mt-1">Based on {{ $calculator_interest_rate }}% interest over {{ $calculator_tenure_months }} months</p>
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
                                <label class="block text-gray-700 font-medium text-sm mb-2">Full Name <span class="text-red-500">*</span></label>
                                <input wire:model="full_name" type="text" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                                @error('full_name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium text-sm mb-2">Email <span class="text-red-500">*</span></label>
                                <input wire:model="email" type="email" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                                @error('email') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium text-sm mb-2">Phone <span class="text-red-500">*</span></label>
                                <input wire:model="phone" type="tel" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                                @error('phone') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-gray-700 font-medium text-sm mb-2">Additional Information (Optional)</label>
                                <textarea wire:model="additional_info" rows="3" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700" placeholder="Any additional information you'd like to share..."></textarea>
                            </div>
                        </div>

                       

                        @if($loan_amount && $loan_tenure_months)
                        <div class="p-4 rounded-lg bg-gradient-to-r from-green-50 to-green-100 border-2 border-green-300">
                            <p class="text-sm font-semibold text-green-900 mb-2">Estimated Monthly Payment</p>
                            <p class="text-3xl font-bold text-green-600">TZS {{ number_format($this->calculateMonthlyPayment($loan_amount, $selectedLoanProduct->interest_rate, $loan_tenure_months)) }}</p>
                            <p class="text-xs text-green-700 mt-1">Based on {{ $selectedLoanProduct->interest_rate }}% interest rate over {{ $loan_tenure_months }} months</p>
                        </div>
                        @endif

                        <div class="flex items-center justify-between pt-4">
                            <div></div>
                            <button type="submit" class="px-8 py-3 rounded-lg text-white font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);">
                                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Submit Financing Application
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
        </div>
    </div>

    <!-- Auth Modals -->
    @livewire('auth-modals')
</div>
