<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ensure InnoDB engine
            $table->id();
            $table->unsignedBigInteger('car_rental_id'); // Explicitly declare FK column
            $table->decimal('amount', 10, 2);
            $table->enum('type', ['rental', 'penalty']);
            $table->date('payment_date');
            $table->timestamps();

            // Define the foreign key manually
            $table->foreign('car_rental_id')
                  ->references('id')
                  ->on('car_rentals')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};