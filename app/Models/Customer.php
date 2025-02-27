<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   
        protected $primaryKey = 'customer_id';
          protected $fillable = ['first_name', 'last_name', 'phone_number', 'email', 'address', 'license_number'];
          public function reservations() {
            return $this->hasMany(Reservation::class, 'customer_id', 'customer_id');
        }
}
