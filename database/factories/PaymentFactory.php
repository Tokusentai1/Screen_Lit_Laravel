<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;
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
            'card_last_four' => substr(fake()->creditCardNumber(), -4),
            'stripe_charge_id' => Crypt::encryptString(fake()->uuid()),
            'order_id' => Order::inRandomOrder()->value('id') ?? Order::factory(),
        ];
    }
}
