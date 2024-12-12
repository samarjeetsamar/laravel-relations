<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\PhoneSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            ImageSeeder::class,
            VideoSeeder::class,
            CommentSeeder::class,
            PhoneSeeder::class,
            TagSeeder::class,
            PrincipleSeeder::class,
            SchoolSeeder::class,
            StudentSeeder::class,
            MechanicSeeder::class,
            CarSeeder::class,
            OwnerSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            OrderProductSeeder::class,
            CategorySeeder::class,
            AdminSeeder::class,
        ]);
    }
}
