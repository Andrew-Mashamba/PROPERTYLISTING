<?php

namespace App\Livewire\Landlord;

use Livewire\Component;
use App\Models\MaintenanceRequest;
use Livewire\WithPagination;

class Maintenance extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $priority = '';
    public $perPage = 12;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateStatus($requestId, $status)
    {
        $request = MaintenanceRequest::find($requestId);
        if ($request && $request->landlord_id === auth()->id()) {
            $request->update(['status' => $status]);
            session()->flash('message', 'Maintenance request status updated.');
        }
    }

    public function render()
    {
        $requests = MaintenanceRequest::where('landlord_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->when($this->priority, function ($query) {
                $query->where('priority', $this->priority);
            })
            ->with(['property', 'tenant'])
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $stats = [
            'open' => MaintenanceRequest::where('landlord_id', auth()->id())->where('status', 'open')->count(),
            'in_progress' => MaintenanceRequest::where('landlord_id', auth()->id())->where('status', 'in_progress')->count(),
            'completed' => MaintenanceRequest::where('landlord_id', auth()->id())->where('status', 'completed')->count(),
        ];

        return view('livewire.landlord.maintenance', [
            'requests' => $requests,
            'stats' => $stats
        ]);
    }
}
