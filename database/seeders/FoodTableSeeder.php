<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Food;
use Illuminate\Support\Facades\DB;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 function run(): void
    {
        // Food::factory()->count(10)->create();

        Food::create([
            'name' => 'Margherita',
            'image' => '/img/pizzacom.jpg', 
            'desc' => 'Tomato, mozzarella, basil',
            'price' => 10.0,
            'category_id' => 1,
        ]);

        Food::create([
            'name' => 'Pepperoni',
            'image' => '/img/pizzacom.jpg',
            'desc' => 'Tomato, mozzarella, pepperoni',
            'price' => 12.0,
            'category_id' => 1,
        ]);

        Food::create([
            'name' => 'Garlic Bread',
            'image' => '/img/pizzacom.jpg',
            'desc' => 'Olive oil, garlic, parsley',
            'price' => 4.0,
            'category_id' => 2,
        ]);

        Food::create([
            'name' => 'Coke',
            'image' => '/img/pizzacom.jpg',
            'desc' => 'Coca Cola',
            'price' => 2.0,
            'category_id' => 3,
        ]);
    }
}
