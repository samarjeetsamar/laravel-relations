<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userWithoutPhone = \App\Models\User::doesntHave('phone')->get();

        foreach($userWithoutPhone as $user) {
            \App\Models\Phone::factory()->create([
                'user_id' => $user->id
            ]);
        }

    }
}
