<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServicesPage extends Component
{
    public function render()
    {
        $services = Service::where('is_active', true)
            ->orderBy('display_order')
            ->orderBy('name')
            ->get();

        return view('livewire.services-page', [
            'services' => $services,
        ]);
    }
}
