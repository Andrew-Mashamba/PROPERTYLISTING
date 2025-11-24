<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class Services extends Component
{
    use WithFileUploads;

    public $services;
    public $showModal = false;
    public $editMode = false;
    
    public $serviceId;
    public $name;
    public $description;
    public $category;
    public $price;
    public $price_type = 'fixed';
    public $contact_name;
    public $contact_phone;
    public $contact_email;
    public $features;
    public $is_active = true;
    public $icon;
    public $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'nullable|string|max:255',
        'price' => 'nullable|numeric|min:0',
        'price_type' => 'required|in:fixed,hourly,negotiable',
        'contact_name' => 'nullable|string|max:255',
        'contact_phone' => 'nullable|string|max:255',
        'contact_email' => 'nullable|email|max:255',
        'features' => 'nullable|string',
        'is_active' => 'boolean',
    ];

    public function mount()
    {
        $this->loadServices();
    }

    public function loadServices()
    {
        $this->services = Service::orderBy('display_order')->orderBy('created_at', 'desc')->get();
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->editMode = false;
        $this->showModal = true;
    }

    public function openEditModal($serviceId)
    {
        $this->resetForm();
        $service = Service::findOrFail($serviceId);
        
        $this->serviceId = $service->id;
        $this->name = $service->name;
        $this->description = $service->description;
        $this->category = $service->category;
        $this->price = $service->price;
        $this->price_type = $service->price_type;
        $this->contact_name = $service->contact_name;
        $this->contact_phone = $service->contact_phone;
        $this->contact_email = $service->contact_email;
        $this->features = $service->features;
        $this->is_active = $service->is_active;
        
        $this->editMode = true;
        $this->showModal = true;
    }

    public function saveService()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'price' => $this->price,
            'price_type' => $this->price_type,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'contact_email' => $this->contact_email,
            'features' => $this->features,
            'is_active' => $this->is_active,
        ];

        if ($this->editMode) {
            Service::findOrFail($this->serviceId)->update($data);
            session()->flash('message', 'Service updated successfully!');
        } else {
            Service::create($data);
            session()->flash('message', 'Service created successfully!');
        }

        $this->closeModal();
        $this->loadServices();
    }

    public function deleteService($serviceId)
    {
        Service::findOrFail($serviceId)->delete();
        session()->flash('message', 'Service deleted successfully!');
        $this->loadServices();
    }

    public function toggleActive($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $service->update(['is_active' => !$service->is_active]);
        $this->loadServices();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->serviceId = null;
        $this->name = '';
        $this->description = '';
        $this->category = '';
        $this->price = null;
        $this->price_type = 'fixed';
        $this->contact_name = '';
        $this->contact_phone = '';
        $this->contact_email = '';
        $this->features = '';
        $this->is_active = true;
        $this->icon = null;
        $this->image = null;
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.services')->layout('components.layouts.app');
    }
}
