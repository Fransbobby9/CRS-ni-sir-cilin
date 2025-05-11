<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('payments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('car_rental_id')->constrained('car_rentals')->onDelete('cascade');
    $table->decimal('amount', 10, 2);
    $table->enum('type', ['rental', 'penalty']); // payment type
    $table->date('payment_date');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
