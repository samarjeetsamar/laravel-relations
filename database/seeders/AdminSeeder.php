<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   

        DB::table('users')->where('email' , 'admin@example.com')->delete();

        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' =>  'admin@example.com',
            'password' => Hash::make('password'),
            'is_activated' => 1,
            'address_line_one' => $faker->address,
            'address_line_two' => $faker->address,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
