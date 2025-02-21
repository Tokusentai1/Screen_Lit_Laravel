<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
}
