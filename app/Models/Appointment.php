<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'appointment_time',
        'notes',
    ];

    // Relationship: An appointment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
