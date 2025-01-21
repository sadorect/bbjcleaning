<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'service_type',
        'frequency',
        'property_type',
        'square_footage',
        'address',
        'preferred_date',
        'preferred_time',
        'status'
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'square_footage' => 'integer'
    ];
}
