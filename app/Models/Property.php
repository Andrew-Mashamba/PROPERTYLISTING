<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'property_type',
        'listing_type',
        'price',
        'price_type',
        'bedrooms',
        'bathrooms',
        'sqft',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'latitude',
        'longitude',
        'status',
        'is_featured',
        'image_url',
        'tag',
        'agent_name',
        'mls_id',
        'owner_nida',
        'title_deed_document',
        'sales_agreement_document',
        'owner_phone',
        'owner_email',
        'verification_status',
        'verification_notes'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('address', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    public function scopeFilterByPrice($query, $minPrice, $maxPrice)
    {
        if ($minPrice) {
            $query->where('price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice);
        }
        return $query;
    }

    public function scopeFilterByBedrooms($query, $bedrooms)
    {
        return $query->where('bedrooms', '>=', $bedrooms);
    }

    public function scopeFilterByBathrooms($query, $bathrooms)
    {
        return $query->where('bathrooms', '>=', $bathrooms);
    }

    public function scopeFilterByPropertyType($query, $type)
    {
        return $query->where('property_type', $type);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
