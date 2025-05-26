<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('car_name'); // Name of the car
            $table->string('customer_name'); // Name of the customer
            $table->text('notes')->nullable(); // Optional notes
            $table->timestamps();
            $table->engine = 'InnoDB'; // Ensure InnoDB is used for foreign keys
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};