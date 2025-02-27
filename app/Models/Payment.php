<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
    protected $primaryKey = 'payment_id';
    protected $fillable = ['reservation_id', 'payment_date', 'amount', 'payment_method'];
    public function reservation() {
        return $this->belongsTo(Reservation::class, 'reservation_id', 'reservation_id');
    }
}