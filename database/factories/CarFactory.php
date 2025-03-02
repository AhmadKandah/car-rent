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
        'license_plate' => fake()->unique()->bothify('??####'),
        'brand' => fake()->company(),
        'model' => fake()->word(), 
        'make' => fake()->word(),
        'color' => fake()->colorName(),
        'year' => fake()->year(),
        'price_per_hour' => fake()->randomFloat(2, 10, 100), 
        'price_per_day' => fake()->randomFloat(2, 100, 1000),
        'price_per_month' => fake()->randomFloat(2, 1000, 10000), 
        'mileage' => fake()->numberBetween(0, 200000), 
        'transmission' => fake()->randomElement(['automatic', 'manual']),
        'seats' => fake()->numberBetween(2, 8), 
        'luggage' => fake()->numberBetween(1, 5), 
        'fuel' => fake()->randomElement(['petrol', 'diesel', 'electric', 'hybrid']), 
        'description' => fake()->sentence(),
        'status' => fake()->randomElement(['available', 'rented', 'maintenance']),
        'user_id' => User::factory(),
    ];
}
}
