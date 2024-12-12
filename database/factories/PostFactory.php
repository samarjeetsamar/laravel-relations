<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            "title" => $title,
            "slug" => Str::slug($title, '-'),
            "body" => $this->faker->paragraph(20, 20),
            "user_id" => \App\Models\User::all()->random()->id,
            "created_at" => now(),
            "updated_at" => now()
        ];
    }
}
