<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $carIds =  \App\Models\Car::all()->pluck('id');
        foreach($carIds as $key => $val) {
            \App\Models\Owner::factory()->create([
                'name' => fake()->name(),
                'car_id' => $val
            ]);
        }

    }
}
