<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\Inquiry;
use App\Models\RentalApplication;
use App\Models\HomeFinderRequest;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

    public $showHomeFinderModal = false;
    public $homeFinderStep = 1;
    public $homeFinderName = '';
    public $homeFinderPhone = '';
    public $homeFinderEmail = '';
    public $homeFinderPostcode = '';
    public $homeFinderRegion = '';
    public $homeFinderDistrict = '';
    public $homeFinderWard = '';
    public $homeFinderRegionId = '';
    public $homeFinderDistrictId = '';
    public $homeFinderWardId = '';
    public $homeFinderRegions = [];
    public $homeFinderDistricts = [];
    public $homeFinderWards = [];
    public $homeFinderStreet = '';
    public $homeFinderCategory = '';
    public $homeFinderType = '';
    public $homeFinderAreaSqm = '';
    public $homeFinderRooms = '';
    public $homeFinderCompound = '';
    public $homeFinderCondition = 'any';
    public $homeFinderBudgetMin = '';
    public $homeFinderBudgetMax = '';
    public $homeFinderPaymentTerms = '';
    public $homeFinderNote = '';

    protected $homeFinderTypeMap = [
        'Residential' => [
            'Room',
            'Self-contained',
            'House',
            'Apartment',
            'Condo',
            'Floor',
        ],
        'Commercial' => [
            'Shop',
            'Office',
            'Warehouse',
            'Showroom',
            'Square meter',
        ],
        'Land' => [
            'Plot',
            'Farm',
            'Industrial',
            'Square meter',
        ],
    ];

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

    public function openHomeFinderModal()
    {
        $this->showHomeFinderModal = true;
        $this->homeFinderStep = 1;
        if (empty($this->homeFinderRegions)) {
            $this->homeFinderRegions = $this->fetchRegions();
        }
    }

    public function closeHomeFinderModal()
    {
        $this->showHomeFinderModal = false;
        $this->resetHomeFinderForm();
        $this->resetValidation();
    }

    public function nextHomeFinderStep()
    {
        $this->validate($this->homeFinderRulesForStep($this->homeFinderStep));
        $this->homeFinderStep = min(3, $this->homeFinderStep + 1);
    }

    public function previousHomeFinderStep()
    {
        $this->homeFinderStep = max(1, $this->homeFinderStep - 1);
    }

    public function submitHomeFinder()
    {
        $this->validate($this->homeFinderRulesForStep(3));

        $this->hydrateHomeFinderLocationNames();
        if ($this->homeFinderRegion === '' || $this->homeFinderDistrict === '' || $this->homeFinderWard === '') {
            if ($this->homeFinderRegion === '') {
                $this->addError('homeFinderRegionId', 'Please select a valid region.');
            }
            if ($this->homeFinderDistrict === '') {
                $this->addError('homeFinderDistrictId', 'Please select a valid district.');
            }
            if ($this->homeFinderWard === '') {
                $this->addError('homeFinderWardId', 'Please select a valid ward.');
            }
            return;
        }

        if ($this->homeFinderCategory === 'Residential' && $this->homeFinderType === 'Square meter') {
            $this->addError('homeFinderType', 'Residential rentals cannot be estimated by square meter.');
            return;
        }

        if ($this->homeFinderBudgetMin !== '' && $this->homeFinderBudgetMax !== '') {
            if ((int) $this->homeFinderBudgetMin > (int) $this->homeFinderBudgetMax) {
                $this->addError('homeFinderBudgetMax', 'Max budget must be greater than min budget.');
                return;
            }
        }

        HomeFinderRequest::create([
            'name' => $this->homeFinderName,
            'phone' => $this->homeFinderPhone,
            'email' => $this->homeFinderEmail,
            'postcode' => $this->homeFinderPostcode ?: null,
            'region' => $this->homeFinderRegion,
            'district' => $this->homeFinderDistrict,
            'ward' => $this->homeFinderWard,
            'street' => $this->homeFinderStreet ?: null,
            'property_category' => $this->homeFinderCategory,
            'property_type' => $this->homeFinderType,
            'area_sqm' => $this->homeFinderAreaSqm !== '' ? (int) $this->homeFinderAreaSqm : null,
            'rooms' => $this->homeFinderRooms !== '' ? (int) $this->homeFinderRooms : null,
            'compound_type' => $this->homeFinderCompound ?: null,
            'condition' => $this->homeFinderCondition ?: 'any',
            'budget_min' => $this->homeFinderBudgetMin !== '' ? (int) $this->homeFinderBudgetMin : null,
            'budget_max' => $this->homeFinderBudgetMax !== '' ? (int) $this->homeFinderBudgetMax : null,
            'payment_terms' => $this->homeFinderPaymentTerms,
            'note' => $this->homeFinderNote ?: null,
            'status' => 'new',
        ]);

        session()->flash('homeFinderMessage', 'Your home request has been submitted. We will contact you soon.');
        $this->closeHomeFinderModal();
    }

    protected function homeFinderRulesForStep($step)
    {
        if ($step === 1) {
            return [
                'homeFinderName' => 'required|string|max:255',
                'homeFinderPhone' => 'required|string|max:50',
                'homeFinderEmail' => 'required|email|max:255',
            ];
        }

        if ($step === 2) {
            return [
                'homeFinderRegionId' => 'required|integer|min:1',
                'homeFinderDistrictId' => 'required|integer|min:1',
                'homeFinderWardId' => 'required|integer|min:1',
                'homeFinderStreet' => 'nullable|string|max:150',
                'homeFinderPostcode' => 'nullable|string|max:20',
            ];
        }

        $rules = [
            'homeFinderCategory' => 'required|string|max:50',
            'homeFinderType' => 'required|string|max:100',
            'homeFinderAreaSqm' => 'nullable|integer|min:1',
            'homeFinderRooms' => 'nullable|integer|min:1',
            'homeFinderCompound' => 'nullable|string|max:50',
            'homeFinderCondition' => 'nullable|string|max:50',
            'homeFinderBudgetMin' => 'nullable|integer|min:0',
            'homeFinderBudgetMax' => 'nullable|integer|min:0',
            'homeFinderPaymentTerms' => 'required|string|max:30',
            'homeFinderNote' => 'nullable|string|max:1000',
        ];

        if ($this->homeFinderCategory === 'Residential') {
            $rules['homeFinderRooms'] = 'required|integer|min:1';
            $rules['homeFinderAreaSqm'] = 'nullable|integer|min:1';
        }

        if (in_array($this->homeFinderCategory, ['Commercial', 'Land'], true)) {
            $rules['homeFinderAreaSqm'] = 'required|integer|min:1';
            $rules['homeFinderRooms'] = 'nullable|integer|min:1';
        }

        return $rules;
    }

    public function updatedHomeFinderCategory()
    {
        $this->homeFinderType = '';
        $this->homeFinderRooms = '';
        $this->homeFinderAreaSqm = '';
        $this->homeFinderCompound = '';
        $this->homeFinderCondition = 'any';
    }

    public function updatedHomeFinderRegionId($value)
    {
        $this->homeFinderRegion = $this->findOptionName($this->homeFinderRegions, $value);
        $this->homeFinderDistrictId = '';
        $this->homeFinderWardId = '';
        $this->homeFinderDistrict = '';
        $this->homeFinderWard = '';
        $this->homeFinderPostcode = '';
        $this->homeFinderDistricts = [];
        $this->homeFinderWards = [];

        if (!empty($value)) {
            $this->homeFinderDistricts = $this->fetchDistricts($value);
        }
    }

    public function updatedHomeFinderDistrictId($value)
    {
        $this->homeFinderDistrict = $this->findOptionName($this->homeFinderDistricts, $value);
        $this->homeFinderWardId = '';
        $this->homeFinderWard = '';
        $this->homeFinderPostcode = '';
        $this->homeFinderWards = [];

        if (!empty($value)) {
            $this->homeFinderWards = $this->fetchWards($value);
        }
    }

    public function updatedHomeFinderWardId($value)
    {
        $wardOption = $this->findOptionById($this->homeFinderWards, $value);
        $this->homeFinderWard = $wardOption['name'] ?? '';
        $this->homeFinderPostcode = $wardOption['postcode'] ?? '';
    }

    public function getHomeFinderTypeOptionsProperty()
    {
        return $this->homeFinderTypeMap[$this->homeFinderCategory] ?? [];
    }

    protected function resetHomeFinderForm()
    {
        $this->homeFinderStep = 1;
        $this->homeFinderName = '';
        $this->homeFinderPhone = '';
        $this->homeFinderEmail = '';
        $this->homeFinderPostcode = '';
        $this->homeFinderRegion = '';
        $this->homeFinderDistrict = '';
        $this->homeFinderWard = '';
        $this->homeFinderRegionId = '';
        $this->homeFinderDistrictId = '';
        $this->homeFinderWardId = '';
        $this->homeFinderRegions = $this->homeFinderRegions ?: $this->fetchRegions();
        $this->homeFinderDistricts = [];
        $this->homeFinderWards = [];
        $this->homeFinderStreet = '';
        $this->homeFinderCategory = '';
        $this->homeFinderType = '';
        $this->homeFinderAreaSqm = '';
        $this->homeFinderRooms = '';
        $this->homeFinderCompound = '';
        $this->homeFinderCondition = 'any';
        $this->homeFinderBudgetMin = '';
        $this->homeFinderBudgetMax = '';
        $this->homeFinderPaymentTerms = '';
        $this->homeFinderNote = '';
    }

    protected function fetchRegions()
    {
        return Cache::remember('tcra.regions', 86400, function () {
            return $this->fetchTcra('postcode-get-all-regions');
        });
    }

    protected function fetchDistricts($regionId)
    {
        return Cache::remember('tcra.districts.' . $regionId, 86400, function () use ($regionId) {
            return $this->fetchTcra('postcode-get-district-by-region', ['keyword' => $regionId]);
        });
    }

    protected function fetchWards($districtId)
    {
        return Cache::remember('tcra.wards.' . $districtId, 86400, function () use ($districtId) {
            return $this->fetchTcra('postcode-get-ward-by-district', ['keyword' => $districtId], true);
        });
    }

    protected function fetchTcra($endpoint, array $params = [], $includePostcode = false)
    {
        try {
        $baseUrl = rtrim(config('services.tcra.base_url', 'https://www.tcra.go.tz/api'), '/');
        $response = Http::timeout(10)->retry(2, 200)->get($baseUrl . '/' . ltrim($endpoint, '/'), $params);

        if (!$response->ok()) {
            return [];
        }

        $data = $response->json();
        if (!is_array($data)) {
            return [];
        }

        $mapped = [];
        foreach ($data as $item) {
            $id = $item['id'] ?? null;
            $name = $item['name'] ?? null;

            if ($id === null || $name === null) {
                continue;
            }

            $row = [
                'id' => $id,
                'name' => $name,
            ];

            if ($includePostcode && !empty($item['postcode'])) {
                $row['postcode'] = $item['postcode'];
            }

            $mapped[] = $row;
        }

        return $mapped;
        } catch (\Exception $e) {            
            if ($e->getCode() === 504) {
                session()->flash('tcraMessage', 'Service is currently unavailable. Please try again later.');
                return [];
            }
            Log::error('TCRA API Error: ' . $e->getMessage());
            session()->flash('tcraMessage', 'Service is currently unavailable. Please try again later.');
            return [];
        }
    }

    protected function findOptionName(array $options, $id)
    {
        foreach ($options as $option) {
            if ((string) ($option['id'] ?? '') === (string) $id) {
                return (string) $option['name'];
            }
        }

        return '';
    }

    protected function findOptionById(array $options, $id)
    {
        foreach ($options as $option) {
            if ((string) ($option['id'] ?? '') === (string) $id) {
                return $option;
            }
        }

        return [];
    }

    protected function hydrateHomeFinderLocationNames()
    {
        if ($this->homeFinderRegion === '') {
            if (empty($this->homeFinderRegions)) {
                $this->homeFinderRegions = $this->fetchRegions();
            }
            $this->homeFinderRegion = $this->findOptionName($this->homeFinderRegions, $this->homeFinderRegionId);
        }

        if ($this->homeFinderDistrict === '') {
            if (empty($this->homeFinderDistricts) && !empty($this->homeFinderRegionId)) {
                $this->homeFinderDistricts = $this->fetchDistricts($this->homeFinderRegionId);
            }
            $this->homeFinderDistrict = $this->findOptionName($this->homeFinderDistricts, $this->homeFinderDistrictId);
        }

        if ($this->homeFinderWard === '') {
            if (empty($this->homeFinderWards) && !empty($this->homeFinderDistrictId)) {
                $this->homeFinderWards = $this->fetchWards($this->homeFinderDistrictId);
            }
            $wardOption = $this->findOptionById($this->homeFinderWards, $this->homeFinderWardId);
            $this->homeFinderWard = $wardOption['name'] ?? '';
            $this->homeFinderPostcode = $wardOption['postcode'] ?? $this->homeFinderPostcode;
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
            'homeFinderTypeOptions' => $this->homeFinderTypeOptions,
        ])->layout('layouts.guest');
    }
}