<?php

namespace App\Livewire\Supplier;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithPagination;

class Catalog extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $status = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 12;
    
    public $showImageModal = false;
    public $viewingImages = [];
    public $currentImage = '';
    public $currentImageIndex = 0;

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'status' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function deleteMaterial($materialId)
    {
        $material = Material::find($materialId);
        if ($material) {
            $material->delete();
            session()->flash('message', 'Material deleted successfully.');
        }
    }

    public function toggleFeatured($materialId)
    {
        $material = Material::find($materialId);
        if ($material) {
            $material->update(['is_featured' => !$material->is_featured]);
            session()->flash('message', 'Material featured status updated.');
        }
    }

    public function toggleStatus($materialId)
    {
        $material = Material::find($materialId);
        if ($material) {
            $material->update(['is_available' => !$material->is_available]);
            session()->flash('message', 'Material status updated.');
        }
    }

    public function viewImages($materialId)
    {
        $material = Material::find($materialId);
        if ($material && $material->images) {
            $this->viewingImages = is_array($material->images) ? $material->images : json_decode($material->images, true);
            $this->currentImageIndex = 0;
            $this->currentImage = $this->viewingImages[0] ?? '';
            $this->showImageModal = true;
        }
    }

    public function closeImageModal()
    {
        $this->showImageModal = false;
        $this->viewingImages = [];
        $this->currentImage = '';
        $this->currentImageIndex = 0;
    }

    public function nextImage()
    {
        if ($this->currentImageIndex < count($this->viewingImages) - 1) {
            $this->currentImageIndex++;
            $this->currentImage = $this->viewingImages[$this->currentImageIndex];
        }
    }

    public function previousImage()
    {
        if ($this->currentImageIndex > 0) {
            $this->currentImageIndex--;
            $this->currentImage = $this->viewingImages[$this->currentImageIndex];
        }
    }

    public function setCurrentImage($index)
    {
        $this->currentImageIndex = $index;
        $this->currentImage = $this->viewingImages[$index];
    }

    public function render()
    {
        $materials = Material::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%')
                      ->orWhere('brand', 'like', '%' . $this->search . '%')
                      ->orWhere('sku', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->category, function ($query) {
                $query->where('category', $this->category);
            })
            ->when($this->status === 'available', function ($query) {
                $query->where('is_available', true);
            })
            ->when($this->status === 'unavailable', function ($query) {
                $query->where('is_available', false);
            })
            ->when($this->status === 'low_stock', function ($query) {
                $query->whereRaw('stock_quantity <= min_stock_level');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        $categories = Material::distinct('category')->pluck('category');

        return view('livewire.supplier.catalog', [
            'materials' => $materials,
            'categories' => $categories
        ]);
    }
}
