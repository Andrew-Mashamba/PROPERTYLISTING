<?php

namespace App\Livewire\Admin;

use App\Models\Property;
use Livewire\Component;

class PropertyDetails extends Component
{
    public $propertyId;
    public $property;

    public function mount($id)
    {
        $this->propertyId = $id;
        $this->property = Property::with(['user', 'images'])->findOrFail($id);
    }

    public function verifyProperty()
    {
        $this->property->update(['verification_status' => 'verified']);
        $this->property->refresh();
        session()->flash('message', 'Property verified and published to listing.');
    }

    public function rejectProperty()
    {
        $this->property->update(['verification_status' => 'rejected']);
        $this->property->refresh();
        session()->flash('message', 'Property rejected. Owner will be notified.');
    }

    public function pullFromListing()
    {
        $this->property->update(['verification_status' => 'rejected', 'status' => 'Pending']);
        $this->property->refresh();
        session()->flash('message', 'Property pulled from listing successfully.');
    }

    public function updateVerificationNotes($notes)
    {
        $this->property->update(['verification_notes' => $notes]);
        $this->property->refresh();
        session()->flash('message', 'Verification notes updated.');
    }

    public function render()
    {
        return view('livewire.admin.property-details');
    }
}
