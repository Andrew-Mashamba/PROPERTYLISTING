<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'sku',
        'category',
        'brand',
        'image_url',
        'images',
        'stock_quantity',
        'min_stock_level',
        'unit',
        'specifications',
        'is_featured',
        'is_available',
        'discount_percentage',
        'supplier_name',
        'owner_nida',
        'business_license_document',
        'supplier_certificate',
        'owner_phone',
        'owner_email',
        'verification_status',
        'verification_notes'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'images' => 'array',
        'specifications' => 'array',
        'is_featured' => 'boolean',
        'is_available' => 'boolean',
        'discount_percentage' => 'decimal:2',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('brand', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%");
        });
    }

    public function scopeFilterByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeFilterByBrand($query, $brand)
    {
        return $query->where('brand', $brand);
    }

    public function scopeFilterByPriceRange($query, $minPrice, $maxPrice)
    {
        if ($minPrice) {
            $query->where('price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice);
        }
        return $query;
    }

    public function scopeFilterByAvailability($query, $available)
    {
        if ($available) {
            return $query->where('is_available', true)->where('stock_quantity', '>', 0);
        }
        return $query;
    }

    public function getDiscountedPriceAttribute()
    {
        if ($this->discount_percentage > 0) {
            return $this->price - ($this->price * $this->discount_percentage / 100);
        }
        return $this->price;
    }

    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->discounted_price, 2);
    }
}