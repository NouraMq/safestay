<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'accommodation_id',
        'transport_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'booking_date',
        'start_date',
        'end_date',
        'status',
        'notes'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    // العلاقات
    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}