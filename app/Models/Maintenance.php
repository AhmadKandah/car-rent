<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model {
    protected $primaryKey = 'maintenance_id';
    protected $fillable = ['car_id', 'maintenance_date', 'description', 'cost'];
    public function car() {
        return $this->belongsTo(Car::class, 'car_id', 'car_id');
    }
}
