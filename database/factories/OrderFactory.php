<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

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

    protected $model = Order::class;
    public function definition(): array
    {
        return [
            'customer_id' => 1,
            'order_date' => $this->faker->dateTimeThisMonth,
        ];
    }
}
