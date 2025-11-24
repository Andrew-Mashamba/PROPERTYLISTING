<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class Security extends Component
{
    use WithPagination;

    public $search = '';
    public $type = '';
    public $perPage = 20;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function blockIp($ip)
    {
        session()->flash('message', 'IP address blocked successfully.');
    }

    public function render()
    {
        $securityLogs = collect([
            (object)[
                'id' => 1,
                'type' => 'failed_login',
                'user' => 'john@example.com',
                'ip' => '192.168.1.100',
                'severity' => 'medium',
                'description' => 'Failed login attempt',
                'timestamp' => '2024-10-17 10:30:00'
            ],
            (object)[
                'id' => 2,
                'type' => 'suspicious_activity',
                'user' => 'unknown',
                'ip' => '45.123.45.67',
                'severity' => 'high',
                'description' => 'Multiple failed attempts from same IP',
                'timestamp' => '2024-10-17 09:15:00'
            ],
            (object)[
                'id' => 3,
                'type' => 'unauthorized_access',
                'user' => 'jane@example.com',
                'ip' => '192.168.1.150',
                'severity' => 'critical',
                'description' => 'Attempted access to admin panel',
                'timestamp' => '2024-10-16 22:45:00'
            ]
        ]);

        $stats = [
            'total_alerts' => 245,
            'critical' => 12,
            'blocked_ips' => 34,
            'failed_logins' => 156
        ];

        return view('livewire.admin.security', [
            'securityLogs' => $securityLogs,
            'stats' => $stats
        ]);
    }
}
