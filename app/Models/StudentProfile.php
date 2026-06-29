<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentProfile extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'roll_number',
        'branch',
        'year_of_study',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
