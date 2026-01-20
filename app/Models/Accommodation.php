<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'city',
        'district',
        'address',
        'price_monthly',
        'capacity',
        'is_available',
        'contact_phone',
        'contact_email',
        'image'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price_monthly' => 'decimal:2'
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