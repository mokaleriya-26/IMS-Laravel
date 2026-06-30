<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_name',
        'job_title',
        'package',
        'location',
        'type',
        'eligibility_cgpa',
        'drive_date',
        'status',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}