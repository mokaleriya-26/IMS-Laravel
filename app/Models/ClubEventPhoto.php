<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubEventPhoto extends Model
{
    protected $fillable = [
        'event_id', 'uploaded_by', 'file_path', 'caption'
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
