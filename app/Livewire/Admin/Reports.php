<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Reports extends Component
{
    public $reportType = 'users';
    public $dateRange = '30';

    public function generateReport()
    {
        session()->flash('message', 'Report generated successfully.');
    }

    public function exportReport($format)
    {
        session()->flash('message', 'Report exported as ' . strtoupper($format));
    }

    public function render()
    {
        $reports = [
            [
                'name' => 'User Activity Report',
                'description' => 'Detailed user activity and engagement metrics',
                'type' => 'users',
                'last_generated' => '2024-10-17 09:00:00'
            ],
            [
                'name' => 'Financial Summary',
                'description' => 'Revenue, transactions, and financial overview',
                'type' => 'financial',
                'last_generated' => '2024-10-16 18:30:00'
            ],
            [
                'name' => 'Property Performance',
                'description' => 'Listing views, inquiries, and conversion rates',
                'type' => 'properties',
                'last_generated' => '2024-10-15 14:20:00'
            ],
            [
                'name' => 'System Health',
                'description' => 'Server performance, errors, and uptime',
                'type' => 'system',
                'last_generated' => '2024-10-17 08:00:00'
            ]
        ];

        return view('livewire.admin.reports', [
            'reports' => $reports
        ]);
    }
}
