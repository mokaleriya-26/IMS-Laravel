<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubEventWinner extends Model
{
    protected $fillable = [
        'event_id', 'student_id', 'student_name', 'roll_number',
        'department', 'position', 'prize', 'certificate_status', 'notes'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(ClubEvent::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
