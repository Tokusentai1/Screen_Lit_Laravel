<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Studio>
 */
class StudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'studio_name' => fake()->company(),
            'studio_location' => fake()->country() . ', ' . fake()->city(),
            'studio_biography' => fake()->paragraph(2),
            'studio_logo' => fake()->imageUrl(),
        ];
    }
}
