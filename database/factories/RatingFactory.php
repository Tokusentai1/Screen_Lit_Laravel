<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating_name' => fake()->word(),
            'rating_image' => fake()->imageUrl(),
            'rating_biography' => fake()->sentence(),
            'rating_minimum_age' => fake()->numberBetween(0, 100),
            'rating_maximum_age' => fake()->randomElement([null, fake()->numberBetween(0, 100)]),
        ];
    }
}
