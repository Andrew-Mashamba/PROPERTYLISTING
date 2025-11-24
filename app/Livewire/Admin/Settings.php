<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Settings extends Component
{
    public $site_name = 'Property Listing Platform';
    public $site_email = 'admin@example.com';
    public $maintenance_mode = false;
    public $allow_registrations = true;
    public $commission_rate = 5;
    public $currency = 'TZS';

    public function saveSettings()
    {
        session()->flash('message', 'Settings saved successfully.');
    }

    public function clearCache()
    {
        session()->flash('message', 'Cache cleared successfully.');
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
