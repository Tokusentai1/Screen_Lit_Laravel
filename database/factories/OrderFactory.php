<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cart;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_date' => fake()->time(),
            'order_status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
            'cart_id' => Cart::inRandomOrder()->value('id') ?? Cart::factory(),
        ];
    }
}
