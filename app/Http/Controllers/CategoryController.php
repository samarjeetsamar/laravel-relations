<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    
    /**
     * In below method we will add a category to a post in categorizables table using attach 
     * method on categories method (define in post method) method 
     * 
     */

   
    public function addCategoryUsingMorphToManyMethod() {
        $post = Post::inRandomOrder()->first();
        $categoryId = Category::inRandomOrder()->pluck('id')->first();
        $categories = $post->categories()->attach([$categoryId]);

        dd($categories);
    }

    
}
