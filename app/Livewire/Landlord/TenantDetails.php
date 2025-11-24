<?php

namespace App\Livewire\Landlord;

use App\Models\Tenant;
use Livewire\Component;

class TenantDetails extends Component
{
    public $tenantId;
    public $tenant;

    public function mount($id)
    {
        $this->tenantId = $id;
        $this->tenant = Tenant::with(['user', 'property', 'rentalApplication'])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->findOrFail($id);
    }

    public function updatePaymentStatus($status)
    {
        $this->tenant->update(['payment_status' => $status]);
        $this->tenant->refresh();
        session()->flash('message', 'Payment status updated successfully.');
    }

    public function updateTenantStatus($status)
    {
        $this->tenant->update(['status' => $status]);
        $this->tenant->refresh();
        session()->flash('message', 'Tenant status updated successfully.');
    }

    public function updateEmergencyContact($contact)
    {
        $this->tenant->update(['emergency_contact' => $contact]);
        $this->tenant->refresh();
        session()->flash('message', 'Emergency contact updated successfully.');
    }

    public function render()
    {
        return view('livewire.landlord.tenant-details');
    }
}
