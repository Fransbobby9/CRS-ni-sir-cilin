<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary key (unsignedBigInteger)
            $table->foreignId('car_rental_id')->constrained('car_rentals')->onDelete('cascade'); // Foreign key reference
            $table->decimal('amount', 10, 2); // Payment amount
            $table->enum('type', ['rental', 'penalty']); // Payment type
            $table->date('payment_date'); // Date of payment
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments'); // Drop the payments table
    }
}