<?php

namespace App\Livewire\Landlord;

use App\Models\RentalApplication;
use App\Models\Tenant;
use Livewire\Component;

class ApplicationDetails extends Component
{
    public $applicationId;
    public $application;

    public function mount($id)
    {
        $this->applicationId = $id;
        $this->application = RentalApplication::with(['user', 'property'])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->findOrFail($id);
    }

    public function approveApplication()
    {
        $this->application->update(['status' => 'approved']);
        
        Tenant::create([
            'user_id' => $this->application->user_id,
            'property_id' => $this->application->property_id,
            'rental_application_id' => $this->application->id,
            'lease_start' => $this->application->desired_move_in,
            'lease_end' => $this->application->desired_move_in->addYear(),
            'rent_amount' => $this->application->property->price,
            'payment_status' => 'unpaid',
            'status' => 'active',
            'emergency_contact' => null,
            'notes' => null,
        ]);
        
        session()->flash('message', 'Application approved and tenant created successfully.');
        return redirect()->route('landlord.tenant-screening');
    }

    public function rejectApplication()
    {
        $this->application->update(['status' => 'rejected']);
        session()->flash('message', 'Application rejected.');
        return redirect()->route('landlord.tenant-screening');
    }

    public function setUnderReview()
    {
        $this->application->update(['status' => 'under_review']);
        session()->flash('message', 'Application status updated to under review.');
    }

    public function render()
    {
        return view('livewire.landlord.application-details');
    }
}
