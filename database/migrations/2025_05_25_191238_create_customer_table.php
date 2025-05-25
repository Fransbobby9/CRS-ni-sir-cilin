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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Unsigned big integer (primary key)
            $table->string('name'); // Customer name
            $table->string('email')->unique(); // Customer email (unique)
            $table->string('phone', 20); // Customer phone
            $table->string('address'); // Customer address
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers'); // Drop the customers table
    }
};