<?php

namespace App\Livewire\Supplier;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = 'all';
    public $perPage = 15;
    public $category = '';
    public $stockAlert = '';
    public $sortBy = 'name';
    public $showBulkUpdate = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function exportInventory()
    {
        session()->flash('message', 'Export functionality coming soon.');
    }

    public $stockUpdates = [];

    public function updateStock($materialId)
    {
        $material = Material::find($materialId);
        if ($material && isset($this->stockUpdates[$materialId])) {
            $material->update(['stock_quantity' => $this->stockUpdates[$materialId]]);
            unset($this->stockUpdates[$materialId]);
            session()->flash('message', 'Stock updated successfully.');
        }
    }

    public function addStock($materialId, $amount)
    {
        $material = Material::find($materialId);
        if ($material) {
            $material->increment('stock_quantity', $amount);
            session()->flash('message', 'Stock increased by ' . $amount . ' units.');
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
            ->when($this->stockAlert === 'low', function ($query) {
                $query->where('stock_quantity', '<=', 5)->where('stock_quantity', '>', 2);
            })
            ->when($this->stockAlert === 'critical', function ($query) {
                $query->where('stock_quantity', '<=', 2)->where('stock_quantity', '>', 0);
            })
            ->when($this->stockAlert === 'out', function ($query) {
                $query->where('stock_quantity', 0);
            })
            ->when($this->filter === 'low_stock', function ($query) {
                $query->whereRaw('stock_quantity <= min_stock_level');
            })
            ->when($this->filter === 'out_of_stock', function ($query) {
                $query->where('stock_quantity', 0);
            })
            ->when($this->filter === 'in_stock', function ($query) {
                $query->where('stock_quantity', '>', 0);
            })
            ->orderBy($this->sortBy, $this->sortBy === 'name' ? 'asc' : 'desc')
            ->paginate($this->perPage);

        $totalMaterials = Material::count();
        $lowStockCount = Material::whereRaw('stock_quantity <= min_stock_level')->count();
        $criticalStockCount = Material::where('stock_quantity', '<=', 2)->where('stock_quantity', '>', 0)->count();
        $outOfStockCount = Material::where('stock_quantity', 0)->count();
        $totalValue = Material::selectRaw('SUM(stock_quantity * price) as total')->value('total');

        return view('livewire.supplier.inventory', [
            'materials' => $materials,
            'totalMaterials' => $totalMaterials,
            'lowStockCount' => $lowStockCount,
            'criticalStockCount' => $criticalStockCount,
            'outOfStockCount' => $outOfStockCount,
            'totalValue' => $totalValue ?? 0
        ]);
    }
}
