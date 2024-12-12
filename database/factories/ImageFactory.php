<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            "url" => $this->faker->imageUrl(800, 600, 'cats', true, false),
            "imageable_id" => $this->faker->randomElement([
                \App\Models\Post::factory(),
                \App\Models\User::factory()
            ])->create()->id,
            'imageable_type' => $this->faker->randomElement([
                \App\Models\Post::factory(),
                \App\Models\User::factory(),
            ])->create()->id, 
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
