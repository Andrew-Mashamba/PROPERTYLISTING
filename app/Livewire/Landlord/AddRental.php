<?php

namespace App\Livewire\Landlord;

use Livewire\Component;
use App\Models\Property;
use App\Models\PropertyImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AddRental extends Component
{
    use WithFileUploads;

    public $propertyId = null;
    public $title = '';
    public $description = '';
    public $property_type = 'residential';
    public $listing_type = 'rent';
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
    ];

    public function mount($edit = null)
    {
        $this->uploadedImages = collect([]);
        
        if ($edit) {
            $this->propertyId = $edit;
            $property = Property::where('id', $edit)->where('user_id', auth()->id())->first();
            if ($property) {
                $this->fill($property->toArray());
                $this->uploadedImages = $property->images ?? collect([]);
            }
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
        ];

        if ($this->propertyId) {
            $property = Property::where('id', $this->propertyId)->where('user_id', auth()->id())->first();
            if ($property) {
                $property->update($data);
            }
        } else {
            $property = Property::create($data);
            $this->propertyId = $property->id;
        }

        $allImages = [];
        
        if ($this->images) {
            foreach ($this->images as $image) {
                $path = $image->store('properties', 'public');
                $allImages[] = $path;
            }
        }
        
        if ($this->imageUrls) {
            $allImages = array_merge($allImages, $this->imageUrls);
        }
        
        foreach ($allImages as $index => $imagePath) {
            PropertyImage::create([
                'property_id' => $property->id,
                'image_path' => $imagePath,
                'image_type' => $index === 0 ? 'main' : 'gallery',
                'sort_order' => $index,
                'is_primary' => $index === 0,
            ]);
        }

        session()->flash('message', $this->propertyId ? 'Rental property updated successfully!' : 'Rental property created successfully!');
        return redirect()->route('landlord.rentals');
    }

    public function render()
    {
        return view('livewire.landlord.add-rental');
    }
}
