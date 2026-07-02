<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubEventAttendance extends Model
{
    protected $fillable = [
        'event_id', 'registration_id', 'marked_by', 'status',
        'reference_code', 'remarks', 'marked_at'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(ClubEvent::class, 'event_id');
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(ClubEventRegistration::class, 'registration_id');
    }

    public function marker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'marked_by');
    }
}
