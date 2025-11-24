<?php

namespace App\Livewire\Seller;

use Livewire\Component;
use App\Models\Property;
use App\Models\PropertyImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AddProperty extends Component
{
    use WithFileUploads;

    public $propertyId = null;
    public $title = '';
    public $description = '';
    public $property_type = 'residential';
    public $listing_type = 'sale';
    public $price = '';
    public $price_type = 'fixed';
    public $bedrooms = '';
    public $bathrooms = '';
    public $area_sqft = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $zip_code = '';
    public $country = 'USA';
    public $latitude = '';
    public $longitude = '';
    public $status = 'Active';
    public $featured = false;
    
    public $images = [];
    public $uploadedImages;
    public $imageUrl = '';
    public $imageUrls = [];
    
    public $owner_nida = '';
    public $title_deed_document;
    public $sales_agreement_document;
    public $owner_phone = '';
    public $owner_email = '';
    
    public $existing_title_deed = null;
    public $existing_sales_agreement = null;

    public function __construct()
    {
        $this->uploadedImages = collect([]);
    }

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'property_type' => 'required|in:residential,commercial,land,industrial',
        'listing_type' => 'required|in:sale,rent,both',
        'price' => 'required|numeric|min:0',
        'price_type' => 'required|in:fixed,negotiable,auction',
        'bedrooms' => 'nullable|integer|min:0',
        'bathrooms' => 'nullable|integer|min:0',
        'area_sqft' => 'nullable|numeric|min:0',
        'address' => 'required|string',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'zip_code' => 'required|string|max:20',
        'country' => 'required|string|max:100',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'status' => 'required|in:Active,Pending,Sold,Rented',
        'featured' => 'boolean',
        'owner_nida' => 'required|string|max:255',
        'title_deed_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        'sales_agreement_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        'owner_phone' => 'required|string|max:20',
        'owner_email' => 'required|email|max:255',
    ];

    public function mount()
    {
        $this->uploadedImages = collect([]);
        
        $edit = request()->query('edit');
        
        if ($edit) {
            $this->propertyId = $edit;
            
            $query = Property::where('id', $edit);
            
            if (auth()->check() && auth()->user()->user_type !== 'savanna') {
                $query->where('user_id', auth()->id());
            }
            
            $property = $query->first();
            
            if (!$property) {
                session()->flash('error', 'Property not found or you do not have permission to edit it.');
                return redirect()->route('seller.listings');
            }
            
            $this->title = $property->title ?? '';
            $this->description = $property->description ?? '';
            $this->property_type = $property->property_type ?? 'residential';
            $this->listing_type = $property->listing_type ?? 'sale';
            $this->price = $property->price ?? '';
            $this->price_type = $property->price_type ?? 'fixed';
            $this->bedrooms = $property->bedrooms ?? '';
            $this->bathrooms = $property->bathrooms ?? '';
            $this->area_sqft = $property->sqft ?? '';
            $this->address = $property->address ?? '';
            $this->city = $property->city ?? '';
            $this->state = $property->state ?? '';
            $this->zip_code = $property->zip_code ?? '';
            $this->country = $property->country ?? 'USA';
            $this->latitude = $property->latitude ?? '';
            $this->longitude = $property->longitude ?? '';
            $this->status = $property->status ?? 'Active';
            $this->featured = $property->is_featured ?? false;
            $this->owner_nida = $property->owner_nida ?? '';
            $this->owner_phone = $property->owner_phone ?? '';
            $this->owner_email = $property->owner_email ?? '';
            $this->existing_title_deed = $property->title_deed_document ?? null;
            $this->existing_sales_agreement = $property->sales_agreement_document ?? null;
            $this->uploadedImages = $property->images ?? collect([]);
            
        } else {
            $this->owner_email = auth()->user()->email ?? '';
        }
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|max:2048',
        ]);
    }

    public function addImageUrl()
    {
        if (!empty($this->imageUrl)) {
            $this->imageUrls[] = $this->imageUrl;
            $this->imageUrl = '';
        }
    }

    public function removeImage($index)
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }

    public function removeImageUrl($index)
    {
        array_splice($this->imageUrls, $index, 1);
    }

    public function removeUploadedImage($imageId)
    {
        $image = PropertyImage::find($imageId);
        if ($image && $image->property->user_id === auth()->id()) {
            Storage::delete($image->image_path);
            $image->delete();
            $this->uploadedImages = Property::find($this->propertyId)->images ?? collect([]);
        }
    }

    public function save()
    {
        $this->validate();

        $titleDeedPath = null;
        if ($this->title_deed_document) {
            $titleDeedPath = $this->title_deed_document->store('ownership-documents', 'public');
        }

        $salesAgreementPath = null;
        if ($this->sales_agreement_document) {
            $salesAgreementPath = $this->sales_agreement_document->store('ownership-documents', 'public');
        }

        $data = [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'property_type' => $this->property_type,
            'listing_type' => $this->listing_type,
            'price' => $this->price,
            'price_type' => $this->price_type,
            'bedrooms' => $this->bedrooms ?: null,
            'bathrooms' => $this->bathrooms ?: null,
            'sqft' => $this->area_sqft ?: null,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zip_code,
            'country' => $this->country,
            'latitude' => $this->latitude ?: null,
            'longitude' => $this->longitude ?: null,
            'status' => $this->status,
            'is_featured' => $this->featured,
            'owner_nida' => $this->owner_nida,
            'owner_phone' => $this->owner_phone,
            'owner_email' => $this->owner_email,
            'verification_status' => 'pending',
        ];

        if ($titleDeedPath) {
            $data['title_deed_document'] = $titleDeedPath;
        }

        if ($salesAgreementPath) {
            $data['sales_agreement_document'] = $salesAgreementPath;
        }
        
        if ($this->propertyId) {
            
            $query = Property::where('id', $this->propertyId);
            
            if (auth()->user()->user_type !== 'savanna') {
                $query->where('user_id', auth()->id());
            }
            
            $property = $query->first();
            
            if ($property) {
                $property->update($data);
            }
        } else {
            $property = Property::create($data);
            $this->propertyId = $property->id;
        }

        // Handle image uploads
        $allImages = [];
        
        // Process uploaded files
        if ($this->images) {
            foreach ($this->images as $image) {
                $path = $image->store('properties', 'public');
                $allImages[] = $path;
            }
        }
        
        // Add URL images
        if ($this->imageUrls) {
            $allImages = array_merge($allImages, $this->imageUrls);
        }
        
        // Create PropertyImage records
        foreach ($allImages as $index => $imagePath) {
            PropertyImage::create([
                'property_id' => $property->id,
                'image_path' => $imagePath,
                'image_type' => $index === 0 ? 'main' : 'gallery',
                'sort_order' => $index,
                'is_primary' => $index === 0,
            ]);
        }

        session()->flash('message', $this->propertyId ? 'Property updated successfully!' : 'Property created successfully!');
        return redirect()->route('seller.listings');
    }

    public function render()
    {
        return view('livewire.seller.add-property');
    }
}
