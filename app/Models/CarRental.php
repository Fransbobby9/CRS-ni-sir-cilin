<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRental extends Model
{
    use HasFactory;

    // Specify which fields are mass assignable
    protected $fillable = [
        'car_id',
        'customer_id',
        'rental_start_date',
        'rental_end_date',
        'rental_price',
        // 'status', // Uncomment if you have a status field in the migration
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

    public function agent()
    {
        return $this->belongsTo(Agent::class); // Add this if you want to access the agent
    }
}