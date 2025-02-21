<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'card_type' => fake()->creditCardType(),
            'stripe_charge_id' => encrypt(fake()->creditCardNumber()),
            'order_id' => Order::inRandomOrder()->value('id') ?? Order::factory(),
        ];
    }
}
