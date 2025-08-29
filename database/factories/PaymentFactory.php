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
            'order_id' => Order::factory(),
            'amount' => $this->faker->randomFloat(2, 100, 5000),
            'paymentstatus' => $this->faker->randomElement(['paid','pending','failed']),
            'paymentmethod' => $this->faker->randomElement(['credit_card','paypal','cash']),
            'paymentdate' => $this->faker->date(),
        ];
    }
}
