<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'slug'];
    

    protected function name(): Attribute {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }   

    public function orders() {
        return $this->belongsToMany(Order::class, OrderProduct::class);
    }

}
