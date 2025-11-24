<?php

namespace App\Livewire\Landlord;

use Livewire\Component;
use App\Models\Tenant;
use Livewire\WithPagination;

class Tenants extends Component
{
    use WithPagination;

    public $search = '';
    public $status = 'active';
    public $perPage = 12;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatePaymentStatus($tenantId, $status)
    {
        $tenant = Tenant::find($tenantId);
        if ($tenant && $tenant->property->user_id === auth()->id()) {
            $tenant->update(['payment_status' => $status]);
            session()->flash('message', 'Payment status updated successfully.');
        }
    }

    public function updateTenantStatus($tenantId, $status)
    {
        $tenant = Tenant::find($tenantId);
        if ($tenant && $tenant->property->user_id === auth()->id()) {
            $tenant->update(['status' => $status]);
            session()->flash('message', 'Tenant status updated successfully.');
        }
    }

    public function render()
    {
        $tenants = Tenant::with(['user', 'property', 'rentalApplication'])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->when($this->search, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('property', function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $stats = [
            'total' => Tenant::whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })->count(),
            'active' => Tenant::whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })->where('status', 'active')->count(),
            'inactive' => Tenant::whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })->where('status', 'inactive')->count(),
            'overdue' => Tenant::whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })->where('payment_status', 'overdue')->count(),
        ];

        return view('livewire.landlord.tenants', [
            'tenants' => $tenants,
            'stats' => $stats
        ]);
    }
}
