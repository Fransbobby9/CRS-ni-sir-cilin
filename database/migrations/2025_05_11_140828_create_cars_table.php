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
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // Automatically adds primary key on 'id'
            $table->string('car_name');
            $table->string('customer_name');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB'; // Ensure InnoDB is used for foreign keys
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
    