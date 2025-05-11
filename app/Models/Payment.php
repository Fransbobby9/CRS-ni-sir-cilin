<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['car_rental_id', 'amount', 'type', 'payment_date'];

    public function carRental()
    {
        return $this->belongsTo(CarRental::class);
    }
}
