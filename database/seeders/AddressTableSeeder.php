<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'customer_id' => 3,
            'address_type' => 'Home',
            'address_detail' => '123 Main St',
            'address_no' => '123',
            'street' => 'Main St',
            'city' => 'Springfield',
            'extra_instructions' => 'Near the park',
        ]);

        Address::create([
            'customer_id' => 3,
            'address_type' => 'Office',
            'address_detail' => '456 Elm St',
            'address_no' => '456',
            'street' => 'Elm St',
            'city' => 'Springfield',
            'extra_instructions' => 'Next to the library',
        ]);

        Address::create([
            'customer_id' => 3,
            'address_type' => 'Home',
            'address_detail' => '789 Oak St',
            'address_no' => '789',
            'street' => 'Oak St',
            'city' => 'Springfield',
            'extra_instructions' => 'Behind the mall',
        ]);
    }
}

