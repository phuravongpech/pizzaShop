<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Address::class;
    public function definition(): array
    {
        return [
            'customer_id' => 1, // Assuming '1' to '100' are valid user IDs
            'address_type' => $this->faker->randomElement(['Home', 'Work', 'Other']),
            'address_detail' => $this->faker->streetAddress,
            'address_no' => $this->faker->buildingNumber,
            'street' => $this->faker->streetName,
            'city' => $this->faker->city,
            'extra_instructions' => $this->faker->sentence,
        ];
    }
}
