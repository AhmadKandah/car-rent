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
            $table->id();
            $table->string('license_plate')->unique();
            $table->string('brand'); 
            $table->string('model'); 
            $table->string('make');
            $table->string('color');
            $table->year('year');
            $table->decimal('price_per_hour'); 
            $table->decimal('price_per_day'); 
            $table->decimal('price_per_month'); 
            $table->integer('mileage');
            $table->string('transmission');
            $table->integer('seats');
            $table->integer('luggage');
            $table->string('fuel');
            $table->text('description');
            $table->enum('status', ['available', 'rented', 'maintenance'])->default('available'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 

            $table->timestamps();
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