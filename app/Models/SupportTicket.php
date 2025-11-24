<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupportTicket extends Model
{
    protected $fillable = [
        'user_id',
        'ticket_number',
        'subject',
        'category',
        'priority',
        'status',
        'assigned_to',
        'last_reply_at',
        'closed_at',
    ];

    protected $casts = [
        'last_reply_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(SupportMessage::class, 'ticket_id');
    }

    public static function generateTicketNumber(): string
    {
        $prefix = 'TKT';
        $timestamp = now()->format('Ymd');
        $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));
        return "{$prefix}-{$timestamp}-{$random}";
    }
}
