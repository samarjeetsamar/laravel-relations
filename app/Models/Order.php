<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $table = "orders";

    protected $fillable = ['user_id'];

    public function products() {
        return $this->belongsToMany(Product::class, OrderProduct::class)
                    ->as('orderProduct')
                    ->withPivot('amount', 'quantity')
                    ->withTimestamps();
    }
    
}
