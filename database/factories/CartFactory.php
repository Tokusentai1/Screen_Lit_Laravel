<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use App\Models\Cart;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
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
            'total_price' => fake()->randomFloat(2, 0, 1500),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Cart $cart) {
            $cart->movies()->attach(
                Movie::inRandomOrder()->limit(mt_rand(1, 3))->pluck('id'),
            );
        });
    }
}
