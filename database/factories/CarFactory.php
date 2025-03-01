<?php

namespace Database\Factories;

use File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Car::class;
    
    public function definition(): array
    {
        return [
            'brand' => fake()->company(),
            'model' => fake()->word(),
            'year' => fake()->year(),
            'color' => fake()->colorName(),            
            'price_per_hour' => fake()->numberBetween(10, 100),
            'price_per_day' => fake()->numberBetween(100, 1000),
            'price_per_month' => fake()->numberBetween(1000, 10000),
            'status' => fake()->randomElement(['available', 'rented', 'maintenance']),
            'description' => fake()->sentence(),
            'user_id' =>User::factory(), 
            'license_plate' => fake()->unique()->bothify('??###'), // Add license_plate field
            'make' => fake()->word(), // Add make field
        ];
    }
}
