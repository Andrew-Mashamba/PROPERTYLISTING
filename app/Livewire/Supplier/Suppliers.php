<?php

namespace App\Livewire\Supplier;

use Livewire\Component;
use App\Models\Material;

class Suppliers extends Component
{
    public $suppliers = [];
    public $name = '';
    public $contact_person = '';
    public $email = '';
    public $phone = '';
    public $address = '';
    public $products = '';
    public $rating = 5;

    public function mount()
    {
        $this->loadSuppliers();
    }

    public function loadSuppliers()
    {
        $this->suppliers = [
            [
                'id' => 1,
                'name' => 'Tanzania Cement Company',
                'contact_person' => 'John Mwamba',
                'email' => 'john@tanzaniacement.co.tz',
                'phone' => '+255 22 123 4567',
                'products' => 'Cement, Concrete',
                'rating' => 4.8,
                'status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'East Africa Steel',
                'contact_person' => 'Mary Ndosi',
                'email' => 'mary@eastafricasteel.com',
                'phone' => '+255 22 234 5678',
                'products' => 'Steel, Iron',
                'rating' => 4.5,
                'status' => 'active'
            ],
        ];
    }

    public function addSupplier()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        session()->flash('message', 'Supplier added successfully.');
        $this->reset(['name', 'contact_person', 'email', 'phone', 'address', 'products']);
        $this->loadSuppliers();
    }

    public function render()
    {
        return view('livewire.supplier.suppliers');
    }
}
