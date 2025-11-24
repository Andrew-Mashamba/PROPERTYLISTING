<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserDetails extends Component
{
    public $userId;
    public $user;
    public $kyc_notes = '';

    public function mount($id)
    {
        $this->userId = $id;
        $this->user = User::with(['properties'])->findOrFail($id);
    }

    public function suspendUser()
    {
        session()->flash('message', 'User suspended successfully.');
    }

    public function activateUser()
    {
        session()->flash('message', 'User activated successfully.');
    }

    public function deleteUser()
    {
        session()->flash('message', 'User deletion initiated.');
    }

    public function resetPassword()
    {
        session()->flash('message', 'Password reset email sent successfully.');
    }

    public function verifyEmail()
    {
        $this->user->update(['email_verified_at' => now()]);
        $this->user->refresh();
        session()->flash('message', 'Email verified successfully.');
    }

    public function verifyKyc()
    {
        $this->user->update(['kyc_status' => 'verified']);
        $this->user->refresh();
        session()->flash('message', 'KYC verified successfully.');
    }

    public function rejectKyc()
    {
        $this->user->update([
            'kyc_status' => 'rejected',
            'kyc_notes' => $this->kyc_notes ?: 'KYC documents do not meet requirements.'
        ]);
        $this->user->refresh();
        session()->flash('message', 'KYC rejected.');
    }

    public function render()
    {
        return view('livewire.admin.user-details');
    }
}
