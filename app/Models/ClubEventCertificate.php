<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubEventCertificate extends Model
{
    protected $fillable = [
        'event_id', 'registration_id', 'issued_by', 'file_path', 'issued_at', 'status'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(ClubEvent::class);
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(ClubEventRegistration::class, 'registration_id');
    }

    public function issuer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'issued_by');
    }
}
