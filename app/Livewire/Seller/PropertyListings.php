<?php

namespace App\Livewire\Seller;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;

class PropertyListings extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $propertyType = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'propertyType' => ['except' => ''],
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

    public function deleteProperty($propertyId)
    {
        $property = Property::find($propertyId);
        if ($property && $property->user_id === auth()->id()) {
            $property->delete();
            session()->flash('message', 'Property deleted successfully.');
        }
    }

    public function toggleFeatured($propertyId)
    {
        $property = Property::find($propertyId);
        if ($property && $property->user_id === auth()->id()) {
            $property->update(['is_featured' => !$property->is_featured]);
            session()->flash('message', 'Property featured status updated.');
        }
    }

    public $showImageModal = false;
    public $viewingImages = [];
    public $currentImage = '';
    public $currentImageIndex = 0;

    public function viewImages($propertyId)
    {
        $property = Property::with('images')->find($propertyId);
        if ($property && $property->user_id === auth()->id() && $property->images->count() > 0) {
            $this->viewingImages = $property->images->pluck('image_path')->toArray();
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
        $properties = Property::with('images')
            ->where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->when($this->propertyType, function ($query) {
                $query->where('property_type', $this->propertyType);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.seller.property-listings', [
            'properties' => $properties
        ]);
    }
}
