<?php

namespace App\Livewire\Supplier;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithPagination;

class Pricing extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $perPage = 12;
    public $bulkDiscount = 0;
    public $selectedMaterials = [];

    public function applyBulkDiscount()
    {
        if (count($this->selectedMaterials) > 0 && $this->bulkDiscount >= 0 && $this->bulkDiscount <= 100) {
            Material::whereIn('id', $this->selectedMaterials)
                ->update(['discount_percentage' => $this->bulkDiscount]);
            
            session()->flash('message', 'Bulk discount applied successfully.');
            $this->selectedMaterials = [];
            $this->bulkDiscount = 0;
        }
    }

    public function updatePrice($materialId, $newPrice)
    {
        $material = Material::find($materialId);
        if ($material && $newPrice > 0) {
            $material->update(['price' => $newPrice]);
            session()->flash('message', 'Price updated successfully.');
        }
    }

    public function render()
    {
        $materials = Material::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('sku', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->category, function ($query) {
                $query->where('category', $this->category);
            })
            ->orderBy('name')
            ->paginate($this->perPage);

        $categories = Material::distinct('category')->pluck('category');

        return view('livewire.supplier.pricing', [
            'materials' => $materials,
            'categories' => $categories
        ]);
    }
}
