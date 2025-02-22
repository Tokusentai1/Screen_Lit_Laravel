<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Director;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Director>
 */
class DirectorFactory extends Factory
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
            'picture' => fake()->imageUrl(),
            'gender' => $gender,
            'birth_date' => fake()->date('Y-m-d'),
            'death_date' => fake()->randomElement([null, fake()->date('Y-m-d')]),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Director $director) {
            $director->movies()->attach(
                Movie::inRandomOrder()->limit(mt_rand(1, 3))->pluck('id'),
                ['director_role' => fake()->word(),]
            );
        });
    }
}
