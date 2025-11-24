<?php

namespace App\Livewire\Supplier;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    public $materialId;
    public $name = '';
    public $description = '';
    public $category = '';
    public $brand = '';
    public $price = '';
    public $unit = 'piece';
    public $stock_quantity = 0;
    public $min_stock_level = 5;
    public $sku = '';
    public $supplier_name = '';
    public $discount_percentage = 0;
    public $is_featured = false;
    public $is_available = true;
    public $image_url = '';
    public $images = [];
    public $imageUrls = [];
    
    public $owner_nida = '';
    public $business_license_document;
    public $supplier_certificate;
    public $owner_phone = '';
    public $owner_email = '';
    
    public $existing_business_license = null;
    public $existing_supplier_certificate = null;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:10',
        'category' => 'required',
        'price' => 'required|numeric|min:0',
        'unit' => 'required',
        'stock_quantity' => 'required|integer|min:0',
        'min_stock_level' => 'required|integer|min:0',
        'sku' => 'required|unique:materials,sku',
        'owner_nida' => 'required|string|max:255',
        'business_license_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        'supplier_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        'owner_phone' => 'required|string|max:20',
        'owner_email' => 'required|email|max:255',
    ];

    public function mount()
    {
        $edit = request()->query('edit');
        
        if ($edit) {
            $material = Material::find($edit);
            if ($material) {
                $this->materialId = $material->id;
                $this->name = $material->name;
                $this->description = $material->description;
                $this->category = $material->category;
                $this->brand = $material->brand;
                $this->price = $material->price;
                $this->unit = $material->unit;
                $this->stock_quantity = $material->stock_quantity;
                $this->min_stock_level = $material->min_stock_level ?? 5;
                $this->sku = $material->sku;
                $this->supplier_name = $material->supplier_name;
                $this->discount_percentage = $material->discount_percentage ?? 0;
                $this->is_featured = $material->is_featured;
                $this->is_available = $material->is_available;
                $this->image_url = $material->image_url;
                $this->owner_nida = $material->owner_nida ?? '';
                $this->owner_phone = $material->owner_phone ?? '';
                $this->owner_email = $material->owner_email ?? '';
                $this->existing_business_license = $material->business_license_document ?? null;
                $this->existing_supplier_certificate = $material->supplier_certificate ?? null;
            }
        } else {
            $this->sku = 'MAT-' . strtoupper(uniqid());
            $this->owner_email = auth()->user()->email ?? '';
        }
    }

    public function addImageUrl()
    {
        if (!empty($this->image_url)) {
            $this->imageUrls[] = $this->image_url;
            $this->image_url = '';
        }
    }

    public function removeImage($index)
    {
        array_splice($this->images, $index, 1);
    }

    public function removeImageUrl($index)
    {
        array_splice($this->imageUrls, $index, 1);
    }

    public function save()
    {
        if ($this->materialId) {
            $this->rules['sku'] = 'required|unique:materials,sku,' . $this->materialId;
        }

        $this->validate();

        $businessLicensePath = null;
        if ($this->business_license_document) {
            $businessLicensePath = $this->business_license_document->store('business-documents', 'public');
        }

        $supplierCertPath = null;
        if ($this->supplier_certificate) {
            $supplierCertPath = $this->supplier_certificate->store('business-documents', 'public');
        }

        $imageData = [];
        
        if ($this->images) {
            foreach ($this->images as $image) {
                $path = $image->store('product-images', 'public');
                $imageData[] = $path;
            }
        }
        
        if ($this->imageUrls) {
            $imageData = array_merge($imageData, $this->imageUrls);
        }

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'brand' => $this->brand,
            'price' => $this->price,
            'unit' => $this->unit,
            'stock_quantity' => $this->stock_quantity,
            'min_stock_level' => $this->min_stock_level,
            'sku' => $this->sku,
            'supplier_name' => $this->supplier_name,
            'discount_percentage' => $this->discount_percentage,
            'is_featured' => $this->is_featured,
            'is_available' => $this->is_available,
            'image_url' => !empty($imageData) ? $imageData[0] : '',
            'images' => json_encode($imageData),
            'owner_nida' => $this->owner_nida,
            'owner_phone' => $this->owner_phone,
            'owner_email' => $this->owner_email,
            'verification_status' => 'pending',
        ];

        if ($businessLicensePath) {
            $data['business_license_document'] = $businessLicensePath;
        }

        if ($supplierCertPath) {
            $data['supplier_certificate'] = $supplierCertPath;
        }

        if ($this->materialId) {
            Material::find($this->materialId)->update($data);
            session()->flash('message', 'Material updated successfully.');
        } else {
            Material::create($data);
            session()->flash('message', 'Material added successfully.');
        }

        return redirect()->route('supplier.catalog');
    }

    public function render()
    {
        return view('livewire.supplier.add-product');
    }
}
