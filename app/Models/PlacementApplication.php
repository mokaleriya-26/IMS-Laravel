<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlacementApplication extends Model
{
    protected $fillable = [
        'job_id', 'student_id', 'status', 'resume_path', 'interview_date', 'remarks'
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(PlacementJob::class, 'job_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
