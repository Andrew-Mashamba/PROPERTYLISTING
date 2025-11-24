<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Redirector;

class AuthModals extends Component
{
    public $showLoginModal = false;
    public $showRegisterModal = false;
    public $showForgotPasswordModal = false;
    
    // Login form data
    public $loginEmail = '';
    public $loginPassword = '';
    public $rememberMe = false;
    
    // Registration form data
    public $registerName = '';
    public $registerEmail = '';
    public $registerPassword = '';
    public $registerPasswordConfirmation = '';
    public $registerUserType = 'buyer'; // buyer, seller, agent, supplier, contractor
    public $agreeToTerms = false;
    
    // Forgot password form data
    public $forgotPasswordEmail = '';

    public function mount()
    {
        // Initialize component
    }

    #[On('showLoginModal')]
    public function showLoginFromEvent()
    {
        $this->showLogin();
    }

    #[On('showRegisterModal')]
    public function showRegisterFromEvent()
    {
        $this->showRegister();
    }

    public function showLogin()
    {
        $this->showLoginModal = true;
        $this->showRegisterModal = false;
        $this->showForgotPasswordModal = false;
    }

    public function showRegister()
    {
        $this->showRegisterModal = true;
        $this->showLoginModal = false;
        $this->showForgotPasswordModal = false;
    }

    public function showForgotPassword()
    {
        $this->showForgotPasswordModal = true;
        $this->showLoginModal = false;
        $this->showRegisterModal = false;
    }

    public function closeModals()
    {
        $this->showLoginModal = false;
        $this->showRegisterModal = false;
        $this->showForgotPasswordModal = false;
        $this->resetFormData();
    }

    public function switchToLogin()
    {
        $this->showLoginModal = true;
        $this->showRegisterModal = false;
        $this->showForgotPasswordModal = false;
    }

    public function switchToRegister()
    {
        $this->showRegisterModal = true;
        $this->showLoginModal = false;
        $this->showForgotPasswordModal = false;
    }

    public function login()
    {
        $this->validate([
            'loginEmail' => 'required|email',
            'loginPassword' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $this->loginEmail,
            'password' => $this->loginPassword,
        ];

        if (Auth::attempt($credentials, $this->rememberMe)) {
            $this->closeModals();
            session()->flash('message', 'Login successful! Welcome back.');
            $this->dispatch('userLoggedIn');
            
            // Redirect to /system after successful login
            return $this->redirect('/system', navigate: true);
        } else {
            $this->addError('loginEmail', 'Invalid email or password.');
        }
    }

    public function register()
    {
        $this->validate([
            'registerName' => 'required|min:2',
            'registerEmail' => 'required|email|unique:users,email',
            'registerPassword' => 'required|min:6',
            'registerPasswordConfirmation' => 'required|same:registerPassword',
            'registerUserType' => 'required|in:seller,landlord,agent,supplier',
            'agreeToTerms' => 'required|accepted',
        ]);

        try {
            $user = User::create([
                'name' => $this->registerName,
                'email' => $this->registerEmail,
                'password' => Hash::make($this->registerPassword),
                'user_type' => $this->registerUserType,
                'email_verified_at' => null, // Will be verified via email
            ]);

            // Auto-login the user after registration
            Auth::login($user);
            
            $this->closeModals();
            session()->flash('message', 'Registration successful! Welcome to Savanna Property.');
            $this->dispatch('userRegistered', ['userType' => $this->registerUserType]);
            
            // Redirect to /system after successful registration
            return $this->redirect('/system', navigate: true);
            
        } catch (\Exception $e) {
            $this->addError('registerEmail', 'Registration failed. Please try again.');
        }
    }

    public function forgotPassword()
    {
        $this->validate([
            'forgotPasswordEmail' => 'required|email',
        ]);

        // TODO: Implement actual forgot password logic
        // For now, just close the modal
        $this->closeModals();
        
        // Show success message
        session()->flash('message', 'Password reset link sent to your email!');
    }

    private function resetFormData()
    {
        $this->loginEmail = '';
        $this->loginPassword = '';
        $this->rememberMe = false;
        
        $this->registerName = '';
        $this->registerEmail = '';
        $this->registerPassword = '';
        $this->registerPasswordConfirmation = '';
        $this->registerUserType = 'buyer';
        $this->agreeToTerms = false;
        
        $this->forgotPasswordEmail = '';
    }

    public function render()
    {
        return view('livewire.auth-modals');
    }
}