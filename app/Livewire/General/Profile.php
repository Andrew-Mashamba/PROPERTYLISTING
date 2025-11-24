<?php

namespace App\Livewire\General;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone = '';
    public $address = '';
    public $bio = '';
    public $user_type;
    public $business_type;
    public $current_password = '';
    public $new_password = '';
    public $confirm_password = '';
    
    public $nida_document;
    public $passport_document;
    public $business_license;
    public $certificate_of_incorporation;
    public $tax_clearance_certificate;
    public $memorandum_of_association;
    public $articles_of_association;
    public $board_resolution;
    public $proof_of_address;
    public $bank_statement;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->user_type = $user->user_type;
        $this->business_type = $user->business_type;
        $this->phone = $user->phone ?? '';
        $this->address = $user->address ?? '';
        $this->bio = $user->bio ?? '';
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'business_type' => 'nullable|string|max:255',
        ]);

        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
            'business_type' => $this->business_type,
        ]);

        session()->flash('message', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        session()->flash('message', 'Password changed successfully.');
    }

    public function uploadKycDocuments()
    {
        $data = [];

        if ($this->nida_document) {
            $data['nida_document'] = $this->nida_document->store('kyc-documents', 'public');
        }
        if ($this->passport_document) {
            $data['passport_document'] = $this->passport_document->store('kyc-documents', 'public');
        }
        if ($this->business_license) {
            $data['business_license'] = $this->business_license->store('kyc-documents', 'public');
        }
        if ($this->certificate_of_incorporation) {
            $data['certificate_of_incorporation'] = $this->certificate_of_incorporation->store('kyc-documents', 'public');
        }
        if ($this->tax_clearance_certificate) {
            $data['tax_clearance_certificate'] = $this->tax_clearance_certificate->store('kyc-documents', 'public');
        }
        if ($this->memorandum_of_association) {
            $data['memorandum_of_association'] = $this->memorandum_of_association->store('kyc-documents', 'public');
        }
        if ($this->articles_of_association) {
            $data['articles_of_association'] = $this->articles_of_association->store('kyc-documents', 'public');
        }
        if ($this->board_resolution) {
            $data['board_resolution'] = $this->board_resolution->store('kyc-documents', 'public');
        }
        if ($this->proof_of_address) {
            $data['proof_of_address'] = $this->proof_of_address->store('kyc-documents', 'public');
        }
        if ($this->bank_statement) {
            $data['bank_statement'] = $this->bank_statement->store('kyc-documents', 'public');
        }

        if (!empty($data)) {
            $data['kyc_status'] = 'pending';
        }

        auth()->user()->update($data);

        $this->reset([
            'nida_document',
            'passport_document',
            'business_license',
            'certificate_of_incorporation',
            'tax_clearance_certificate',
            'memorandum_of_association',
            'articles_of_association',
            'board_resolution',
            'proof_of_address',
            'bank_statement'
        ]);

        session()->flash('message', 'KYC documents uploaded successfully and submitted for review.');
    }

    public function render()
    {
        return view('livewire.general.profile');
    }
}
