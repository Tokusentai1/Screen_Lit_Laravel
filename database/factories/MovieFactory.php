<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rating;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movie_name' => fake()->words(4),
            'movie_biography' => fake()->paragraph(2),
            'movie_price' => fake()->randomFloat(2, 0, 80),
            'movie_poster' => fake()->imageUrl(),
            'movie_duration' => fake()->numberBetween(30, 180),
            'movie_release_date' => fake()->date('Y-m-d'),
            'movie_trailer_url' => fake()->url(),
            'rating_id' => Rating::inRandomOrder()->value('id') ?? Rating::factory(),
        ];
    }
}
