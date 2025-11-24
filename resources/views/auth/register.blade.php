<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="user_type" value="{{ __('I am a') }}" />
                <select id="user_type" name="user_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required onchange="updateBusinessTypeOptions()">
                    <option value="">Select Role</option>
                    <option value="seller">Property Seller</option>
                    <option value="landlord">Property Landlord</option>
                    <option value="agent">Real Estate Agent</option>
                    <option value="supplier">Materials Supplier</option>
                    <option value="buyer">Property Buyer</option>
                </select>
            </div>

            <div class="mt-4" id="business_type_container" style="display: none;">
                <x-label for="business_type" value="{{ __('Business Type') }}" />
                <select id="business_type" name="business_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Select Business Type</option>
                </select>
            </div>

            <script>
                const businessTypes = {
                    seller: [
                        'Individual',
                        'Limited Company',
                        'Financial Institution',
                        'Real Estate Agencies',
                        'Insolvency Practitioners',
                        'Auctioneers',
                        'Debt Recovery & Collection Agencies'
                    ],
                    landlord: [
                        'Individual',
                        'Limited Company'
                    ],
                    agent: [
                        'Independent Agent',
                        'Real Estate Agency',
                        'Brokerage Firm'
                    ],
                    supplier: [
                        'Individual',
                        'Limited Company'
                    ]
                };

                function updateBusinessTypeOptions() {
                    const userType = document.getElementById('user_type').value;
                    const businessTypeContainer = document.getElementById('business_type_container');
                    const businessTypeSelect = document.getElementById('business_type');

                    if (userType && businessTypes[userType]) {
                        businessTypeContainer.style.display = 'block';
                        businessTypeSelect.innerHTML = '<option value="">Select Business Type</option>';
                        
                        businessTypes[userType].forEach(type => {
                            const option = document.createElement('option');
                            option.value = type;
                            option.textContent = type;
                            businessTypeSelect.appendChild(option);
                        });
                        
                        businessTypeSelect.required = true;
                    } else {
                        businessTypeContainer.style.display = 'none';
                        businessTypeSelect.required = false;
                    }
                }
            </script>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
