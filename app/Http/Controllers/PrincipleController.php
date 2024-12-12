<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipleController extends Controller
{
    public function showPrincipleWithStudents() {

        $principleWithStudents = \App\Models\Principle::with('students')->where('id', 2)->get();
        dd($principleWithStudents);

    }
}
