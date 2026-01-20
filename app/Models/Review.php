<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'accommodation_id',
        'transport_id',
        'reviewer_name',
        'rating',
        'comment'
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