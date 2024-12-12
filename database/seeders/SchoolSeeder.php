<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $principleNotAllotSchool = \App\Models\Principle::doesntHave('school')->get();

        foreach($principleNotAllotSchool as $principle) {

            \App\Models\School::factory()->create([
                'principle_id' => $principle->id
            ]);
        }
    }
}
