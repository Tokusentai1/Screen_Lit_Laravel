<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
use App\Models\Movie;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Review $review) {
            $review->movies()->attach(
                Movie::inRandomOrder()->limit(mt_rand(1, 3))->pluck('id'),
                ['movie_score' => fake()->numberBetween(1, 5), 'comment' => fake()->sentence()]
            );
        });
    }
}
