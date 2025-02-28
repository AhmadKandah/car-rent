<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id', 'user_id', 'start_date', 'end_date', 'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
    
}
