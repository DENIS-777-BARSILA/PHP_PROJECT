<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role',
    ];

    protected $casts = [
        'rides_count' => 'integer',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }


    public function ridesAsDriver()
    {
        return $this->hasMany(Ride::class, 'driver_id');
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class, 'passenger_id');
    }
}