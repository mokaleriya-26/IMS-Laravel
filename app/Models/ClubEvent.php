<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClubEvent extends Model
{
    protected $fillable = [
        'club_id',
        'club_name',
        'title',
        'description',
        'event_category',
        'event_banner',
        'from_date',
        'to_date',
        'start_time',
        'end_time',
        'event_date',
        'location',
        'venue',
        'registration_deadline',
        'max_participants',
        'organizer',
        'registration_status',
        'brochure',
        'status'
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(ClubEventRegistration::class, 'event_id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(ClubEventAttendance::class, 'event_id');
    }

    public function reports(): HasMany
    {
        return $this->hasMany(ClubEventReport::class, 'event_id');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ClubEventPhoto::class, 'event_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(ClubEventDocument::class, 'event_id');
    }

    public function winners(): HasMany
    {
        return $this->hasMany(ClubEventWinner::class, 'event_id');
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(ClubEventCertificate::class, 'event_id');
    }

    public function feedback(): HasMany
    {
        return $this->hasMany(ParticipantFeedback::class, 'event_id');
    }
}
