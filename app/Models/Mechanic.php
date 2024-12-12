<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    /** @use HasFactory<\Database\Factories\MechanicFactory> */
    use HasFactory;
    
    protected $table = "mechanices";

    protected $fillable = ['name'];


    public function cars() {
        return $this->hasMany(Car::class, 'mechanic_id');
    }

    public function carOwner() {
        
        return $this->hasOneThrough(Owner::class, Car::class);
    }

    public function carOwners() {

        //Required - mechanic model has cars method and car model has a owner method to run the below methods
        //return $this->through('cars')->has('owner');
        //return $this->throughCars()->hasOwner();
        return $this->hasManyThrough(Owner::class, Car::class);
    }

}
