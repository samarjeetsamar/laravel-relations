<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Exceptions\ProductNotFoundException;
use App\Exceptions\UserNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use Illuminate\Pagination\Paginator;

class OrderController extends Controller
{


    /*
    this mehtod will create a new order for authenticated user
    */
    public function createOrder(){
        
        try {

            DB::beginTransaction();

            $user = Auth::user();
            
            $products = Product::inRandomOrder()->select('id', 'price')->take(2)->get()
                                ->map(function ($product) {
                                    $product['quantity'] = rand(1, 5); // Add random quantity
                                    return $product;
                                });

            if($products->isEmpty()) {
                throw new ProductNotFoundException('Product Not Found!');
            }
            
            $order = $user->orders()->create();

            $orderdProducts = $products->mapWithKeys(function($product) {
                    return [
                        $product->id => [
                            'quantity' => $product->quantity,
                            'amount' => $product->price * $product->quantity
                        ],
                    ];
            });
            
            
            $order->products()->attach($orderdProducts);
            
            DB::commit();
            Log::info('Order has been placed');

            return redirect()->back()->with('success', 'Order has been placed');

        }catch(UserNotFoundException $e) {
            throw $e;
        }catch(ModelNotFoundException $e) {
            throw $e;
        }catch(ProductNotFoundException $e) {
            throw $e;
        }catch(Exception $e) {
            DB::rollback();
            return redirect()->route('order.show')->with('error', 'Failed to place the order. Please try again.');
        }
        
    }

    public function showOrders() {

        if(Auth::check()) {
            $user = Auth::user();
            $allProducts = $user->orders()->with('products')->get()->pluck('products')->flatten();

            $perPage = 5; // Number of items per page
            $currentPage = Paginator::resolveCurrentPage(); // Current page from query parameters
            $products = new \Illuminate\Pagination\LengthAwarePaginator(
                $allProducts->forPage($currentPage, $perPage), // Paginated items
                $allProducts->count(), // Total items
                $perPage, // Items per page
                $currentPage, // Current page
                ['path' => Paginator::resolveCurrentPath()] // Path for links
            );
            
            return view('orders', ['products' => $products]);
        }

        return response()->view('errors.notfound', ['message' => "user not logged in"]);

        throw new Exception('You are not logged in');
    }
}
