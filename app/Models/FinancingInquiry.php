<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinancingInquiry extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'loan_product_id',
        'full_name',
        'email',
        'phone',
        'monthly_income',
        'employment_status',
        'loan_amount',
        'loan_tenure_months',
        'additional_info',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'monthly_income' => 'decimal:2',
        'loan_amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function loanProduct(): BelongsTo
    {
        return $this->belongsTo(LoanProduct::class);
    }
}
