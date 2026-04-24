<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'user_id', 'brand', 'model', 'color', 'license_plate', 'passenger_seats',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rides()
    {
        return $this->hasMany(Ride::class);
    }
}