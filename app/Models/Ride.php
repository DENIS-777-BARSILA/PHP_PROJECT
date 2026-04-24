<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id', 'car_id', 'from', 'to', 'departure_time',
        'regularity', 'free_seats', 'price', 'description', 'status',
    ];

    protected $casts = [
        'departure_time' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}