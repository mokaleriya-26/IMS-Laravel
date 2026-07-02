<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClubEventRegistration extends Model
{
    protected $fillable = [
        'event_id', 'student_id', 'status', 'attendance', 'certificate_path', 'report_path', 'registered_at'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(ClubEvent::class, 'event_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(ClubEventAttendance::class, 'registration_id');
    }

    public function certificate(): BelongsTo
    {
        return $this->belongsTo(ClubEventCertificate::class, 'registration_id');
    }

    public function feedback(): HasMany
    {
        return $this->hasMany(ParticipantFeedback::class, 'registration_id');
    }
}
