<?php

namespace App\Livewire\Supplier;

use Livewire\Component;

class Contractors extends Component
{
    public $contractors = [];
    public $search = '';
    public $name = '';
    public $company = '';
    public $email = '';
    public $phone = '';
    public $specialization = '';
    public $location = '';

    public function mount()
    {
        $this->loadContractors();
    }

    public function loadContractors()
    {
        $this->contractors = [
            [
                'id' => 1,
                'name' => 'David Moshi',
                'company' => 'Moshi Construction Ltd',
                'email' => 'david@moshiconstruction.co.tz',
                'phone' => '+255 754 123 456',
                'specialization' => 'Residential Construction',
                'location' => 'Dar es Salaam',
                'projects_completed' => 45,
                'rating' => 4.7,
                'status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'Sarah Kilimo',
                'company' => 'Kilimo Builders',
                'email' => 'sarah@kilimobuilders.com',
                'phone' => '+255 755 234 567',
                'specialization' => 'Commercial Buildings',
                'location' => 'Arusha',
                'projects_completed' => 32,
                'rating' => 4.9,
                'status' => 'active'
            ],
        ];
    }

    public function addContractor()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        session()->flash('message', 'Contractor added successfully.');
        $this->reset(['name', 'company', 'email', 'phone', 'specialization', 'location']);
        $this->loadContractors();
    }

    public function render()
    {
        $filteredContractors = $this->contractors;
        if ($this->search) {
            $filteredContractors = array_filter($this->contractors, function($contractor) {
                return stripos($contractor['name'], $this->search) !== false ||
                       stripos($contractor['company'], $this->search) !== false;
            });
        }

        return view('livewire.supplier.contractors', [
            'filteredContractors' => $filteredContractors
        ]);
    }
}
