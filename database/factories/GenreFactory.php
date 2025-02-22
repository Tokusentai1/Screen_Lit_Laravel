<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'genre_name' => fake()->word(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Genre $genre) {
            $genre->movies()->attach(
                Movie::inRandomOrder()->limit(mt_rand(1, 3))->pluck('id'),
            );
        });
    }
}
