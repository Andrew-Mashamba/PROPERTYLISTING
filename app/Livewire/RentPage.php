<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\Inquiry;
use App\Models\RentalApplication;
use Livewire\Component;
use Livewire\WithPagination;

class RentPage extends Component
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
        // Initialize component - no need to load properties here as they're loaded via getRentalPropertiesProperty()
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

    public $showInquiryModal = false;
    public $inquiryPropertyId = null;
    public $inquirySubject = '';
    public $inquiryMessage = '';
    public $inquiryEmail = '';
    public $inquiryPhone = '';

    public $showApplicationModal = false;
    public $applicationPropertyId = null;
    public $applicantName = '';
    public $applicantEmail = '';
    public $applicantPhone = '';
    public $monthlyIncome = '';
    public $employmentStatus = '';
    public $employer = '';
    public $creditScore = '';
    public $referencesCount = '';
    public $desiredMoveIn = '';
    public $applicationMessage = '';

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

    public function openApplicationModal($propertyId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $property = Property::find($propertyId);
        if ($property) {
            $this->applicationPropertyId = $propertyId;
            $this->applicantName = auth()->user()->name;
            $this->applicantEmail = auth()->user()->email;
            $this->showApplicationModal = true;
        }
    }

    public function closeApplicationModal()
    {
        $this->showApplicationModal = false;
        $this->applicationPropertyId = null;
        $this->applicantName = '';
        $this->applicantEmail = '';
        $this->applicantPhone = '';
        $this->monthlyIncome = '';
        $this->employmentStatus = '';
        $this->employer = '';
        $this->creditScore = '';
        $this->referencesCount = '';
        $this->desiredMoveIn = '';
        $this->applicationMessage = '';
        $this->resetValidation();
    }

    public function submitApplication()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'applicantName' => 'required|string|max:255',
            'applicantEmail' => 'required|email',
            'applicantPhone' => 'required|string',
            'monthlyIncome' => 'required|numeric|min:0',
            'employmentStatus' => 'required|string',
            'employer' => 'required|string|max:255',
            'desiredMoveIn' => 'required|date|after:today',
        ]);

        $property = Property::find($this->applicationPropertyId);
        
        if ($property) {
            RentalApplication::create([
                'user_id' => auth()->id(),
                'property_id' => $this->applicationPropertyId,
                'applicant_name' => $this->applicantName,
                'email' => $this->applicantEmail,
                'phone' => $this->applicantPhone,
                'monthly_income' => $this->monthlyIncome,
                'employment_status' => $this->employmentStatus,
                'employer' => $this->employer,
                'credit_score' => $this->creditScore ?: null,
                'references' => $this->referencesCount ?: 0,
                'desired_move_in' => $this->desiredMoveIn,
                'message' => $this->applicationMessage,
                'status' => 'pending',
            ]);

            session()->flash('message', 'Your rental application has been submitted successfully!');
            $this->closeApplicationModal();
        }
    }

    public function getRentalPropertiesProperty()
    {
        return $this->getPropertiesQuery()
            ->with('images')
            ->whereIn('listing_type', ['rent', 'both'])
            ->whereIn('status', ['Active', 'Pending'])
            ->limit(8)
            ->get();
    }

    public function getPropertiesQuery()
    {
        $query = Property::query()->with('images')->whereIn('listing_type', ['rent', 'both']);

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

        return view('livewire.rent-page', [
            'rentalProperties' => $this->rentalProperties,
            'propertyTypes' => $this->propertyTypes,
            'properties' => $properties,
        ])->layout('layouts.guest');
    }
}