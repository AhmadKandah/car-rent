<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {
    protected $primaryKey = 'car_id';
    protected $fillable = ['license_plate', 'make', 'model', 'year', 'color', 'rental_rate', 'status', 'image'];

    public function reservations() {
        return $this->hasMany(Reservation::class, 'car_id', 'car_id');
    }
    public function maintenance() {
        return $this->hasMany(Maintenance::class, 'car_id', 'car_id');
    }
}