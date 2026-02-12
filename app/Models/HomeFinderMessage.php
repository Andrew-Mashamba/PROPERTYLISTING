<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeFinderMessage extends Model
{
    protected $fillable = [
        'home_finder_request_id',
        'sender_id',
        'receiver_id',
        'message',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(HomeFinderRequest::class, 'home_finder_request_id');
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
