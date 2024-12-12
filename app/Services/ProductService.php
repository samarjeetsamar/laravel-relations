<?php

namespace App\Services;
use App\Exceptions\ProductNotFoundException;
use App\Models\Product;

class ProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public static function getProductBySlug($slug) {
        try{
            $product =  Product::whereSlug($slug)->first();
        }catch(\Exception $e) {
            throw new ProductNotFoundException('Product Not Found!');
        }

        return $product;
    }
}
