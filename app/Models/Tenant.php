<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tenant extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'rental_application_id',
        'lease_start',
        'lease_end',
        'rent_amount',
        'payment_status',
        'status',
        'emergency_contact',
        'notes',
    ];

    protected $casts = [
        'lease_start' => 'date',
        'lease_end' => 'date',
        'rent_amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function rentalApplication(): BelongsTo
    {
        return $this->belongsTo(RentalApplication::class);
    }
}
