<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderDetail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = OrderDetail::class;
    public function definition(): array
    {
        return [
            'order_id' => 1,
            'food_id' => 1,
            'size_id'=> 1,
            'crust_id'=> 1,
            'quantity' => $this->faker->numberBetween(5, 10),
        ];
    }
}
