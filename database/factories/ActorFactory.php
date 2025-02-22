<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;
use App\Models\Award;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);
        return [
            'first_name' => fake()->firstName($gender),
            'last_name' => fake()->lastName($gender),
            'biography' => fake()->paragraph(2),
            'image' => fake()->imageUrl(),
            'gender' => $gender,
            'birth_date' => fake()->date('Y-m-d'),
            'death_date' => fake()->randomElement([null, fake()->date('Y-m-d')]),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Actor $actor) {
            // Attach random movies
            $actor->movies()->attach(
                Movie::inRandomOrder()->limit(mt_rand(1, 3))->pluck('id'),
                ['character_played' => fake()->name(), 'character_image' => fake()->imageUrl(),]
            );

            // Attach random awards
            $actor->awards()->attach(
                Award::inRandomOrder()->limit(mt_rand(1, 3))->pluck('id'),
                ['year_won' => fake()->date('Y-m-d'),]
            );
        });
    }
}
