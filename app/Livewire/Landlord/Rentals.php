<?php

namespace App\Livewire\Landlord;

use Livewire\Component;
use App\Models\Rental;
use App\Models\Property;
use Livewire\WithPagination;

class Rentals extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $propertyType = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 12;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'propertyType' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateStatus($rentalId, $status)
    {
        $rental = Rental::find($rentalId);
        if ($rental && $rental->landlord_id === auth()->id()) {
            $rental->update(['status' => $status]);
            session()->flash('message', 'Rental status updated successfully.');
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
        $rentals = Property::where('user_id', auth()->id())
            ->whereIn('listing_type', ['rent', 'both'])
            ->with('images')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
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

        $stats = [
            'total' => Property::where('user_id', auth()->id())->whereIn('listing_type', ['rent', 'both'])->count(),
            'occupied' => Property::where('user_id', auth()->id())->whereIn('listing_type', ['rent', 'both'])->where('status', 'Rented')->count(),
            'available' => Property::where('user_id', auth()->id())->whereIn('listing_type', ['rent', 'both'])->where('status', 'Active')->count(),
            'maintenance' => Property::where('user_id', auth()->id())->whereIn('listing_type', ['rent', 'both'])->where('status', 'Pending')->count(),
        ];

        return view('livewire.landlord.rentals', [
            'rentals' => $rentals,
            'stats' => $stats
        ]);
    }
}
