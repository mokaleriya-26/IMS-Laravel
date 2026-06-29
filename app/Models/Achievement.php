<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievement extends Model
{
    protected $fillable = [
        'student_id', 'title', 'category', 'description', 
        'file_path', 'status', 'faculty_remarks', 'reviewed_by', 'reviewed_at',
        'academic_year', 'division', 'semester', 'from_date', 'to_date', 'organization_name', 'event_name', 'award_status'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}