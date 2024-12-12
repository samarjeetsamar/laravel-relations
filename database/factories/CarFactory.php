<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carBrand = $this->faker->randomElement(['Toyota', 'Ford', 'Honda', 'BMW', 'Tesla']);

        return [
            "model" => $carBrand,
            "mechanic_id" => \App\Models\Mechanic::all()->random()->id,
            "created_at" => now(),
            "updated_at" => now()
        ];
    }
}
