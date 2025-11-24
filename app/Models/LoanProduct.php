<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanProduct extends Model
{
    protected $fillable = [
        'bank_id',
        'name',
        'description',
        'interest_rate',
        'min_tenure_months',
        'max_tenure_months',
        'min_amount',
        'max_amount',
        'processing_fee_percentage',
        'requirements',
        'features',
        'is_active',
    ];

    protected $casts = [
        'interest_rate' => 'decimal:2',
        'min_amount' => 'decimal:2',
        'max_amount' => 'decimal:2',
        'processing_fee_percentage' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
