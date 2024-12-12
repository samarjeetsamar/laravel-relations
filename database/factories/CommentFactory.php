<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Video;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "comment" => $this->faker->paragraph(10, 20),
            "commentable_id" => $this->faker->randomElement([
                Post::factory(),
                Video::factory(),
            ])->create()->id,
            "commentable_type" => $this->faker->randomElement([
                Post::class,
                Video::class,
            ]),
            'likes' => 0,
            "created_at" => now(),
            "updated_at" => now()
        ];
    }
}
