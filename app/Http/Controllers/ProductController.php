<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\ProductNotFoundException;
use App\Services\ProductService;
use App\Models\Product;

class ProductController extends Controller
{

    public function getAllProducts() {
        $products = Product::paginate(5);
       
        return view('product.product', ['products' => $products]);
    }
    public function getProduct($slug) {
        $product = ProductService::getProductBySlug($slug);
        
        return view('product.single', ['product' => $product]);
    }
}
