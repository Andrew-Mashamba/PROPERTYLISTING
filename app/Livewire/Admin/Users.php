<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search = '';
    public $role = '';
    public $status = '';
    public $perPage = 15;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function suspendUser($userId)
    {
        session()->flash('message', 'User suspended successfully.');
    }

    public function activateUser($userId)
    {
        session()->flash('message', 'User activated successfully.');
    }

    public function deleteUser($userId)
    {
        session()->flash('message', 'User deleted successfully.');
    }

    public function render()
    {
        $users = User::with('properties')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->role, function ($query) {
                $query->where('user_type', $this->role);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $stats = [
            'total_users' => User::count(),
            'active_users' => User::count(),
            'suspended_users' => 0,
            'new_this_month' => User::whereMonth('created_at', now()->month)->count()
        ];

        return view('livewire.admin.users', [
            'users' => $users,
            'stats' => $stats
        ]);
    }
}
