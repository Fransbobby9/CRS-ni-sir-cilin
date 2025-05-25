<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    // Define relationships if any, e.g., with Car
    public function cars()
    {
        return $this->hasMany(Car::class); // Adjust as necessary
    }
}