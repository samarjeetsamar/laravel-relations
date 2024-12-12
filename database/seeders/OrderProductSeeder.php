<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $orders = \App\Models\Order::all();
        $products = \App\Models\Product::all();

        // Loop through each order and attach random products
        foreach ($orders as $order) {
            // Pick a random number of products to attach to each order
            $productsToAttach = $products->random(rand(1, 5)); // Attach between 1 and 5 products per order
            
            foreach ($productsToAttach as $product) {
                DB::table('order_products')->insert([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 5), // Random quantity between 1 and 10
                    'amount' => $product->price * rand(1, 10), // Assuming `price` exists in the `products` table
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
