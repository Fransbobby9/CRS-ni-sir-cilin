<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarRentalsTable extends Migration
{
    public function up(): void
    {
        Schema::create('car_rentals', function (Blueprint $table) {
            $table->id(); // Primary key

            // Foreign keys
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('agent_id')->nullable()->constrained('agents')->onDelete('cascade');
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');

            // Rental details
            $table->date('rental_start_date')->nullable();
           $table->date('rental_end_date')->nullable();
            $table->decimal('rental_price', 8, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_rentals');
    }
}