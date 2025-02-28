<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarImage>
 */
class CarImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\CarImage::class;
     public function definition(): array
    {
        return [
            'car_id' => \App\Models\Car::factory(),
            'path' => 'images/cars/' . collect(File::files('public/images/cars/'))->random()->getFilename()
        ];
    }
}
