<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'logo',
        'description',
        'website',
        'phone',
        'email',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function loanProducts(): HasMany
    {
        return $this->hasMany(LoanProduct::class);
    }
}
