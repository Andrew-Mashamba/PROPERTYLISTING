<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalApplication extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'applicant_name',
        'email',
        'phone',
        'monthly_income',
        'employment_status',
        'employer',
        'credit_score',
        'references',
        'desired_move_in',
        'message',
        'status',
    ];

    protected $casts = [
        'desired_move_in' => 'date',
        'monthly_income' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
