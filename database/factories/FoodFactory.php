<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Food;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Food::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'desc' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 10, 20),
            'image' => '/img/pizzacom.jpg',
            'category_id' => $this->faker->numberBetween(1, 3),

        ];
    }
}
