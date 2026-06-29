<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlacementJob extends Model
{
    protected $fillable = [
        'company_name', 'job_title', 'job_description', 'type', 
        'eligibility_branches', 'eligibility_cgpa', 'drive_date', 'status'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(PlacementApplication::class, 'job_id');
    }
}
