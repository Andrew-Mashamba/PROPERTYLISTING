<div>
    <!-- Login Modal -->
    @if($showLoginModal)
    <div class="modal-overlay" wire:click="closeModals">
        <div class="modal-container" wire:click.stop>
            <div class="modal-header">
                <h2 class="modal-title">Login to Your Account</h2>
                <button wire:click="closeModals" class="modal-close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                
                <form wire:submit="login">
                    <div class="form-group">
                        <label for="loginEmail" class="form-label">Email Address</label>
                        <input type="email" wire:model="loginEmail" id="loginEmail" class="form-input" placeholder="Enter your email">
                        @error('loginEmail') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" wire:model="loginPassword" id="loginPassword" class="form-input" placeholder="Enter your password">
                        @error('loginPassword') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" wire:model="rememberMe" class="checkbox-input">
                            <span class="checkbox-text">Remember me</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-primary w-full">
                        Login
                    </button>
                </form>
                
                <div class="modal-footer">
                    <button wire:click="showForgotPassword" class="text-link">Forgot Password?</button>
                    <div class="divider">or</div>
                    <button wire:click="switchToRegister" class="text-link">Create New Account</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Registration Modal -->
    @if($showRegisterModal)
    <div class="modal-overlay" wire:click="closeModals">
        <div class="modal-container modal-large" wire:click.stop>
            <div class="modal-header">
                <h2 class="modal-title">Create Your Account</h2>
                <button wire:click="closeModals" class="modal-close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                
                <form wire:submit="register">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="registerName" class="form-label">Full Name</label>
                            <input type="text" wire:model="registerName" id="registerName" class="form-input" placeholder="Enter your full name">
                            @error('registerName') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="registerEmail" class="form-label">Email Address</label>
                            <input type="email" wire:model="registerEmail" id="registerEmail" class="form-input" placeholder="Enter your email">
                            @error('registerEmail') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" wire:model="registerPassword" id="registerPassword" class="form-input" placeholder="Create a password">
                            @error('registerPassword') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="registerPasswordConfirmation" class="form-label">Confirm Password</label>
                            <input type="password" wire:model="registerPasswordConfirmation" id="registerPasswordConfirmation" class="form-input" placeholder="Confirm your password">
                            @error('registerPasswordConfirmation') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="registerUserType" class="form-label">I am a:</label>
                        <select wire:model="registerUserType" id="registerUserType" class="form-select">
                            <option value="seller">Property Seller</option>
                            <option value="landlord">Property Landlord</option>
                            <option value="agent">Real Estate Agent</option>
                            <option value="supplier">Materials Supplier</option>
                        </select>
                        @error('registerUserType') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" wire:model="agreeToTerms" class="checkbox-input">
                            <span class="checkbox-text">I agree to the <a href="#" class="text-link">Terms of Service</a> and <a href="#" class="text-link">Privacy Policy</a></span>
                        </label>
                        @error('agreeToTerms') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    
                    <button type="submit" class="btn-primary w-full">
                        Create Account
                    </button>
                </form>
                
                <div class="modal-footer">
                    <div class="divider">or</div>
                    <button wire:click="switchToLogin" class="text-link">Already have an account? Login</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Forgot Password Modal -->
    @if($showForgotPasswordModal)
    <div class="modal-overlay" wire:click="closeModals">
        <div class="modal-container" wire:click.stop>
            <div class="modal-header">
                <h2 class="modal-title">Reset Your Password</h2>
                <button wire:click="closeModals" class="modal-close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                <p class="modal-description">Enter your email address and we'll send you a link to reset your password.</p>
                
                <form wire:submit="forgotPassword">
                    <div class="form-group">
                        <label for="forgotPasswordEmail" class="form-label">Email Address</label>
                        <input type="email" wire:model="forgotPasswordEmail" id="forgotPasswordEmail" class="form-input" placeholder="Enter your email">
                        @error('forgotPasswordEmail') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    
                    <button type="submit" class="btn-primary w-full">
                        Send Reset Link
                    </button>
                </form>
                
                <div class="modal-footer">
                    <button wire:click="switchToLogin" class="text-link">Back to Login</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <style>
        /* Modal Overlay */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 1rem;
        }

        /* Modal Container */
        .modal-container {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            max-width: 400px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-large {
            max-width: 600px;
        }

        /* Modal Header */
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 1.5rem 0 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            padding: 0.25rem;
            border-radius: 0.25rem;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: #374151;
        }

        /* Modal Body */
        .modal-body {
            padding: 0 1.5rem 1.5rem 1.5rem;
        }

        .modal-description {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: #FF7F00;
            box-shadow: 0 0 0 3px rgba(255, 127, 0, 0.1);
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .checkbox-input {
            width: 1rem;
            height: 1rem;
            accent-color: #FF7F00;
        }

        .checkbox-text {
            font-size: 0.875rem;
            color: #374151;
        }

        .error-message {
            display: block;
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        /* Buttons */
        .btn-primary {
            background: #FF7F00;
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background: #e06a00;
        }

        .w-full {
            width: 100%;
        }

        /* Modal Footer */
        .modal-footer {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
            text-align: center;
        }

        .text-link {
            color: #FF7F00;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.2s;
        }

        .text-link:hover {
            color: #e06a00;
        }

        .divider {
            color: #6b7280;
            font-size: 0.875rem;
            margin: 1rem 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
            z-index: -1;
        }

        /* Alert Messages */
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .modal-container {
                margin: 1rem;
                max-width: calc(100vw - 2rem);
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .modal-header {
                padding: 1rem 1rem 0 1rem;
            }

            .modal-body {
                padding: 0 1rem 1rem 1rem;
            }
        }
    </style>
</div>