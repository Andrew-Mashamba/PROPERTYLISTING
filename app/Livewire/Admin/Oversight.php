<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Property;
use App\Models\Material;
use App\Models\User;

class Oversight extends Component
{
    use WithPagination;

    public $activeTab = 'properties';
    public $searchTerm = '';
    public $statusFilter = 'pending';
    public $perPage = 10;

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }

    public function verifyProperty($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        $property->update(['verification_status' => 'verified']);
        session()->flash('message', 'Property verified successfully.');
    }

    public function rejectProperty($propertyId, $notes = null)
    {
        $property = Property::findOrFail($propertyId);
        $property->update([
            'verification_status' => 'rejected',
            'verification_notes' => $notes ?? 'Documentation does not meet requirements.'
        ]);
        session()->flash('message', 'Property rejected.');
    }

    public function verifyMaterial($materialId)
    {
        $material = Material::findOrFail($materialId);
        $material->update(['verification_status' => 'verified']);
        session()->flash('message', 'Material verified successfully.');
    }

    public function rejectMaterial($materialId, $notes = null)
    {
        $material = Material::findOrFail($materialId);
        $material->update([
            'verification_status' => 'rejected',
            'verification_notes' => $notes ?? 'Documentation does not meet requirements.'
        ]);
        session()->flash('message', 'Material rejected.');
    }

    public function render()
    {
        $properties = Property::with('user')
            ->when($this->searchTerm, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('owner_nida', 'like', '%' . $this->searchTerm . '%')
                      ->orWhereHas('user', function ($userQuery) {
                          $userQuery->where('name', 'like', '%' . $this->searchTerm . '%');
                      });
                });
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('verification_status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $materials = Material::query()
            ->when($this->searchTerm, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('owner_nida', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('supplier_name', 'like', '%' . $this->searchTerm . '%');
                });
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('verification_status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $users = User::whereIn('user_type', ['seller', 'landlord', 'supplier'])
            ->when($this->searchTerm, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('business_type', 'like', '%' . $this->searchTerm . '%');
                });
            })
            ->withCount(['properties'])
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.oversight', [
            'properties' => $properties,
            'materials' => $materials,
            'users' => $users,
        ]);
    }
}
