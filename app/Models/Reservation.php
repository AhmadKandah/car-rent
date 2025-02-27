<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {
    protected $primaryKey = 'reservation_id';
    protected $fillable = ['customer_id', 'car_id', 'start_date', 'end_date', 'total_cost', 'reservation_status'];
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
    public function car() {
        return $this->belongsTo(Car::class, 'car_id', 'car_id');
    }
    public function payments() {
        return $this->hasMany(Payment::class, 'reservation_id', 'reservation_id');
    }
}
