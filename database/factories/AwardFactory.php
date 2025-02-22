<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Award;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Award>
 */
class AwardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'award_name' => fake()->word(),
            'award_image' => fake()->imageUrl(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Award $award) {
            $award->movies()->attach(
                Movie::inRandomOrder()->limit(mt_rand(1, 3))->pluck('id'),
                ['year_won' => fake()->date('Y-m-d'),]
            );
        });
    }
}
