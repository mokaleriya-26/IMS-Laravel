<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClubEvent extends Model
{
    protected $fillable = [
        'club_name', 'title', 'description', 'event_date', 'location', 'status'
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(ClubEventRegistration::class, 'event_id');
    }
}
