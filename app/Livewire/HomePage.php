<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\Inquiry;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;

    public $searchQuery = '';
    public $minPrice = '';
    public $maxPrice = '';
    public $bedrooms = '';
    public $bathrooms = '';
    public $propertyType = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = [
        'searchQuery' => ['except' => ''],
        'minPrice' => ['except' => ''],
        'maxPrice' => ['except' => ''],
        'bedrooms' => ['except' => ''],
        'bathrooms' => ['except' => ''],
        'propertyType' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function mount()
    {
        // Initialize component - no need to load properties here as they're loaded via getFeaturedPropertiesProperty()
    }

    public function updatedSearchQuery()
    {
        $this->resetPage();
    }

    public function updatedMinPrice()
    {
        $this->resetPage();
    }

    public function updatedMaxPrice()
    {
        $this->resetPage();
    }

    public function updatedBedrooms()
    {
        $this->resetPage();
    }

    public function updatedBathrooms()
    {
        $this->resetPage();
    }

    public function updatedPropertyType()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function updatedSortDirection()
    {
        $this->resetPage();
    }


    public function clearFilters()
    {
        $this->searchQuery = '';
        $this->minPrice = '';
        $this->maxPrice = '';
        $this->bedrooms = '';
        $this->bathrooms = '';
        $this->propertyType = '';
        $this->sortBy = 'created_at';
        $this->sortDirection = 'desc';
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public $showImageModal = false;
    public $viewingImages = [];
    public $currentImage = '';
    public $currentImageIndex = 0;

    // Property details modal
    public $showPropertyModal = false;
    public $selectedProperty = null;
    public $selectedPropertyImages = [];
    public $selectedPropertyImageIndex = 0;

    // Inquiry modal
    public $showInquiryModal = false;
    public $inquiryPropertyId = null;
    public $inquirySubject = '';
    public $inquiryMessage = '';
    public $inquiryEmail = '';
    public $inquiryPhone = '';

    // Financing modal
    public $showFinancingModal = false;
    public $financingPropertyId = null;
    public $financingFullName = '';
    public $financingEmail = '';
    public $financingPhone = '';
    public $financingIncome = '';
    public $financingEmployment = '';
    public $financingMessage = '';

    public function viewImages($propertyId)
    {
        $property = Property::with('images')->find($propertyId);
        if ($property && $property->images->count() > 0) {
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

    public function openPropertyModal($propertyId)
    {
        $this->selectedProperty = Property::with('images')->find($propertyId);
        if ($this->selectedProperty) {
            $this->selectedPropertyImages = $this->selectedProperty->images->pluck('image_path')->toArray();
            $this->selectedPropertyImageIndex = 0;
            $this->showPropertyModal = true;
        }
    }

    public function closePropertyModal()
    {
        $this->showPropertyModal = false;
        $this->selectedProperty = null;
        $this->selectedPropertyImages = [];
        $this->selectedPropertyImageIndex = 0;
    }

    public function nextPropertyImage()
    {
        if ($this->selectedPropertyImageIndex < count($this->selectedPropertyImages) - 1) {
            $this->selectedPropertyImageIndex++;
        }
    }

    public function previousPropertyImage()
    {
        if ($this->selectedPropertyImageIndex > 0) {
            $this->selectedPropertyImageIndex--;
        }
    }

    public function setPropertyImage($index)
    {
        $this->selectedPropertyImageIndex = $index;
    }

    public function openInquiryModalFromProperty()
    {
        if ($this->selectedProperty) {
            $this->inquiryPropertyId = $this->selectedProperty->id;
            $this->closePropertyModal();
            $this->openInquiryModal($this->inquiryPropertyId);
        }
    }

    public function openFinancingModalFromProperty()
    {
        if ($this->selectedProperty) {
            $this->financingPropertyId = $this->selectedProperty->id;
            $this->closePropertyModal();
            $this->openFinancingModal($this->financingPropertyId);
        }
    }

    public function openInquiryModal($propertyId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $property = Property::find($propertyId);
        if ($property) {
            $this->inquiryPropertyId = $propertyId;
            $this->inquirySubject = 'Inquiry about: ' . $property->title;
            $this->inquiryEmail = auth()->user()->email;
            $this->showInquiryModal = true;
        }
    }

    public function closeInquiryModal()
    {
        $this->showInquiryModal = false;
        $this->inquiryPropertyId = null;
        $this->inquirySubject = '';
        $this->inquiryMessage = '';
        $this->inquiryEmail = '';
        $this->inquiryPhone = '';
        $this->resetValidation();
    }

    public function submitInquiry()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'inquirySubject' => 'required|string|max:255',
            'inquiryMessage' => 'required|string',
            'inquiryEmail' => 'required|email',
        ]);

        $property = Property::find($this->inquiryPropertyId);
        
        if ($property) {
            Inquiry::create([
                'from_user_id' => auth()->id(),
                'to_user_id' => $property->user_id,
                'property_id' => $this->inquiryPropertyId,
                'subject' => $this->inquirySubject,
                'message' => $this->inquiryMessage,
                'contact_email' => $this->inquiryEmail,
                'contact_phone' => $this->inquiryPhone,
                'status' => 'new',
                'priority' => 'normal',
            ]);

            session()->flash('message', 'Your inquiry has been sent successfully!');
            $this->closeInquiryModal();
        }
    }

    public function openFinancingModal($propertyId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $property = Property::find($propertyId);
        if ($property) {
            $this->financingPropertyId = $propertyId;
            $this->financingFullName = auth()->user()->name;
            $this->financingEmail = auth()->user()->email;
            $this->showFinancingModal = true;
        }
    }

    public function closeFinancingModal()
    {
        $this->showFinancingModal = false;
        $this->financingPropertyId = null;
        $this->financingFullName = '';
        $this->financingEmail = '';
        $this->financingPhone = '';
        $this->financingIncome = '';
        $this->financingEmployment = '';
        $this->financingMessage = '';
        $this->resetValidation();
    }

    public function submitFinancingInquiry()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'financingFullName' => 'required|string|max:255',
            'financingEmail' => 'required|email',
            'financingPhone' => 'required|string',
            'financingIncome' => 'required|numeric|min:0',
            'financingEmployment' => 'required|string',
        ]);

        $property = Property::find($this->financingPropertyId);
        
        if ($property) {
            Inquiry::create([
                'from_user_id' => auth()->id(),
                'to_user_id' => $property->user_id,
                'property_id' => $this->financingPropertyId,
                'subject' => 'Financing Inquiry: ' . $property->title,
                'message' => "Financing Inquiry\n\nFull Name: {$this->financingFullName}\nEmail: {$this->financingEmail}\nPhone: {$this->financingPhone}\nMonthly Income: TZS " . number_format($this->financingIncome) . "\nEmployment Status: {$this->financingEmployment}\n\nAdditional Information:\n{$this->financingMessage}",
                'contact_email' => $this->financingEmail,
                'contact_phone' => $this->financingPhone,
                'status' => 'new',
                'priority' => 'high',
            ]);

            session()->flash('message', 'Your financing inquiry has been sent successfully! We will contact you soon.');
            $this->closeFinancingModal();
        }
    }

    public function getFeaturedPropertiesProperty()
    {
        return $this->getPropertiesQuery()
            ->with('images')
            ->whereIn('status', ['Active', 'Pending'])
            ->limit(8)
            ->get();
    }

    public function getPropertiesQuery()
    {
        $query = Property::query()->with('images');

        // Search functionality
        if (!empty($this->searchQuery)) {
            $query->search($this->searchQuery);
        }

        // Price filtering
        if (!empty($this->minPrice) || !empty($this->maxPrice)) {
            $query->filterByPrice($this->minPrice, $this->maxPrice);
        }

        // Bedrooms filtering
        if (!empty($this->bedrooms)) {
            $query->filterByBedrooms($this->bedrooms);
        }

        // Bathrooms filtering
        if (!empty($this->bathrooms)) {
            $query->filterByBathrooms($this->bathrooms);
        }

        // Property type filtering
        if (!empty($this->propertyType)) {
            $query->filterByPropertyType($this->propertyType);
        }

        // Sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        return $query;
    }

    public function getPropertyTypesProperty()
    {
        return Property::distinct()->pluck('property_type')->filter()->values();
    }

    public function render()
    {
        $properties = $this->getPropertiesQuery()
            ->whereIn('status', ['Active', 'Pending'])
            ->paginate(12);

        return view('livewire.home-page', [
            'featuredProperties' => $this->featuredProperties,
            'propertyTypes' => $this->propertyTypes,
            'properties' => $properties,
        ])->layout('layouts.guest');
    }
}