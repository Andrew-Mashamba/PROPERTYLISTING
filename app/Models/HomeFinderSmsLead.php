<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeFinderSmsLead extends Model
{
    protected $fillable = [
        'home_finder_request_id',
        'agent_id',
        'phone',
        'message',
        'status',
        'sent_at',
        'provider_response',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(HomeFinderRequest::class, 'home_finder_request_id');
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
