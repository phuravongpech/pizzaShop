<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::create([
            'name' => 'Small',
            'price_modifier' => 1.0,
        ]);

        Size::create([
            'name' => 'Medium',
            'price_modifier' => 1.3,
        ]);

        Size::create([
            'name' => 'Large',
            'price_modifier' => 1.5,
        ]);
    }
}
