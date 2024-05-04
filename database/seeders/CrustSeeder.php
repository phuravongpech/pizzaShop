<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Crust;

class CrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Crust::create([
            'name' => 'Thin',
            'priceAdd' => 1.0,
        ]);

        Crust::create([
            'name' => 'Thick',
            'priceAdd' => 3.0,
        ]);
    }
}
