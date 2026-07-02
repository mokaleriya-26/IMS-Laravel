<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParticipantFeedback extends Model
{
    protected $fillable = [
        'event_id', 'registration_id', 'student_id', 'rating', 'comment', 'category'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(ClubEvent::class);
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(ClubEventRegistration::class, 'registration_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
