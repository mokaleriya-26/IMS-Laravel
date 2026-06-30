<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpTicket extends Model
{
    protected $fillable = [
        'student_id',
        'category',
        'subject',
        'description',
        'attachment',
        'priority',
        'status',
        'admin_reply'
    ];
    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}