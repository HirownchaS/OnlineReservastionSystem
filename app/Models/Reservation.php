<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'date',
        'time',
        'guests',
        'service_type',
    ];

    // Define the relationship if needed
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
