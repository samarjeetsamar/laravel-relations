<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    protected $fillable = ['model', 'mechanic_id'];

    public function owner(){
        return $this->hasOne(Owner::class, 'car_id');
    }

    
}
