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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservation_id');
            $table->foreignId('customer_id')->constrained('customers', 'customer_id');
            $table->foreignId('car_id')->constrained('cars', 'car_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('total_cost', 8, 2);
            $table->enum('reservation_status', ['confirmed', 'cancelled', 'completed'])->default('confirmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
