<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubEventReport extends Model
{
    protected $fillable = [
        'event_id', 'uploaded_by', 'title', 'report_type', 'file_path', 'notes'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(ClubEvent::class);
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
