<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Car;

class CarRental extends Model
{
    use HasFactory;

    // Specify which fields are mass assignable
    protected $fillable = [
        'car_id',
        'customer_id',
        'rental_date',
        'return_date',
        'rental_price',
        'status',
    ];

    // Define hidden attributes for security purposes
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Define relationships
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
