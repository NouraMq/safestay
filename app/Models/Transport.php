<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = [
        'driver_name',
        'vehicle_type',
        'vehicle_model',
        'license_plate',
        'city',
        'service_area',
        'price_per_km',
        'base_price',
        'capacity',
        'is_available',
        'contact_phone',
        'notes'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price_per_km' => 'decimal:2',
        'base_price' => 'decimal:2'
    ];

    // العلاقات
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}