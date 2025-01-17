<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "order_id" => \App\Models\Order::all()->random()->id,
            "product_id" => \App\Models\Product::all()->random()->id,
            "quantity" => $this->faker->numberBetween(1, 5),
            "amount" => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}
