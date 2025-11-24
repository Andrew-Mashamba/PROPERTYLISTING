<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Backup extends Component
{
    public function createBackup()
    {
        session()->flash('message', 'Backup created successfully.');
    }

    public function restoreBackup($backupId)
    {
        session()->flash('message', 'Backup restored successfully.');
    }

    public function deleteBackup($backupId)
    {
        session()->flash('message', 'Backup deleted successfully.');
    }

    public function downloadBackup($backupId)
    {
        session()->flash('message', 'Backup download started.');
    }

    public function render()
    {
        $backups = [
            (object)[
                'id' => 1,
                'name' => 'full-backup-2024-10-17.sql',
                'type' => 'Full Backup',
                'size' => '245 MB',
                'created_at' => '2024-10-17 02:00:00',
                'status' => 'completed'
            ],
            (object)[
                'id' => 2,
                'name' => 'full-backup-2024-10-16.sql',
                'type' => 'Full Backup',
                'size' => '242 MB',
                'created_at' => '2024-10-16 02:00:00',
                'status' => 'completed'
            ],
            (object)[
                'id' => 3,
                'name' => 'incremental-backup-2024-10-15.sql',
                'type' => 'Incremental',
                'size' => '58 MB',
                'created_at' => '2024-10-15 14:30:00',
                'status' => 'completed'
            ]
        ];

        $stats = [
            'total_backups' => 45,
            'total_size' => '12.5 GB',
            'last_backup' => '2 hours ago',
            'next_scheduled' => 'Tomorrow 2:00 AM'
        ];

        return view('livewire.admin.backup', [
            'backups' => $backups,
            'stats' => $stats
        ]);
    }
}
