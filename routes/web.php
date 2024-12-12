<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if(Auth::check()) {
        return view('home');
    }
    return redirect()->route('login');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/principle-hasManyThrough-students', [\App\Http\Controllers\PrincipleController::class, 'showPrincipleWithStudents']);

Route::get('/mechanic-car-owner', [\App\Http\Controllers\MechaniceController::class, 'showCarOwner']);

Route::get('/post/morphToMany/add-category', [\App\Http\Controllers\CategoryController::class, 'addCategoryUsingMorphToManyMethod']);

Route::get('/post/morphMany/comments', [\App\Http\Controllers\CommentController::class, 'showPostWithComents']);

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'showOrders'])->name('order.show');

Route::get('/add-order', [App\Http\Controllers\OrderController::class, 'createOrder'])->middleware('auth')->name('order.create');

Route::get('/product/{slug}', [App\Http\Controllers\ProductController::class, 'getProduct'])->name('product');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'getAllProducts'])->name('products');

Route::get('/users', [App\Http\Controllers\UserController::class, 'allUsers'])->name('users');
Route::get('/user/{username}', [App\Http\Controllers\UserController::class, 'getUser'])->name('user');

Route::resource('posts', App\Http\Controllers\PostController::class);

Route::get('/relationship-methods', [App\Http\Controllers\RelationshipController::class, 'showAllRelations'])->name('relationship.methods');