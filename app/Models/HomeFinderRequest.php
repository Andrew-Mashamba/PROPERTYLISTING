<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HomeFinderRequest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'postcode',
        'region',
        'district',
        'ward',
        'street',
        'property_category',
        'property_type',
        'area_sqm',
        'rooms',
        'compound_type',
        'condition',
        'budget_min',
        'budget_max',
        'payment_terms',
        'note',
        'status',
    ];

    public function assignments(): HasMany
    {
        return $this->hasMany(HomeFinderAssignment::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(HomeFinderMessage::class);
    }

    public function smsLeads(): HasMany
    {
        return $this->hasMany(HomeFinderSmsLead::class);
    }
}
