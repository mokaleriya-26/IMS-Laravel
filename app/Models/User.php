<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    protected $fillable = ['name', 'username', 'email', 'password', 'role', 'assigned_branch', 'assigned_club'];

    public function studentProfile(): HasOne
    {
        return $this->hasOne(StudentProfile::class);
    }

    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class, 'student_id');
    }

    public function placementApplications(): HasMany
    {
        return $this->hasMany(PlacementApplication::class, 'student_id');
    }

    public function clubRegistrations(): HasMany
    {
        return $this->hasMany(ClubEventRegistration::class, 'student_id');
    }

    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany(Club::class, 'club_members')
            ->withPivot(['role', 'position', 'joined_at'])
            ->withTimestamps();
    }

    public function clubMemberships(): HasMany
    {
        return $this->hasMany(ClubMember::class);
    }

    /**
     * Get the user's initials from their name (max 2 chars)
     */
    public function initials(): string
    {
        $parts = explode(' ', trim($this->name));
        if (count($parts) >= 2) {
            return strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
        }
        return strtoupper(substr($this->name, 0, 2));
    }
}
