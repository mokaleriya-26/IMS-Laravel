<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Club extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'department', 'banner_path',
        'contact_person', 'contact_email', 'contact_phone', 'created_by'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function members(): HasMany
    {
        return $this->hasMany(ClubMember::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'club_members')
            ->withPivot(['role', 'position', 'joined_at'])
            ->withTimestamps();
    }

    public function events(): HasMany
    {
        return $this->hasMany(ClubEvent::class);
    }
}
