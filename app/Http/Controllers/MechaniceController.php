<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mechanic;

class MechaniceController extends Controller
{
    
    public function showCarOwner() {
        $mechanicCarOwners = Mechanic::with('carOwner')->get();
        echo "<pre>";
        dd($mechanicCarOwners->toArray());
    }
}
