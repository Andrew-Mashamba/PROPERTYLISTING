<?php

namespace App\Livewire\Landlord;

use App\Models\RentalApplication;
use Livewire\Component;
use Livewire\WithPagination;

class TenantScreening extends Component
{
    use WithPagination;

    public $search = '';
    public $status = 'pending';
    public $perPage = 12;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function approveApplication($applicationId)
    {
        session()->flash('message', 'Application approved successfully.');
    }

    public function rejectApplication($applicationId)
    {
        session()->flash('message', 'Application rejected.');
    }

    public function requestMoreInfo($applicationId)
    {
        session()->flash('message', 'Information request sent to applicant.');
    }

    public function render()
    {
        $applications = RentalApplication::with(['user', 'property'])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('applicant_name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhereHas('property', function ($pq) {
                          $pq->where('title', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.landlord.tenant-screening', [
            'applications' => $applications
        ]);
    }
}
