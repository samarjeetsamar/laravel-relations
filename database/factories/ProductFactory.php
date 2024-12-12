<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $productName =  $this->faker->words(2, true);
        return [
            "name" => $productName,
            "description" => $this->faker->sentence(),
            "price" => $this->faker->numberBetween(1, 900000),
            'slug' => Str::slug($productName, '-'),
            "created_at" => now(),
            "updated_at" => now()
        ];
    }
}
