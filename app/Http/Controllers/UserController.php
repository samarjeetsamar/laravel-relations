<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\UserNotFoundException;
use App\Models\User;
use App\UserTrait;

class UserController extends Controller
{
    use UserTrait;


    public function allUsers() {


        $user = UserTrait::getUser();
       
        $users = User::paginate(10);
        
        return view('user.show', compact('users'));
    }

    public function getUser($username) {
        $user = User::where('username', $username)->first();
        if(!$user) {
            throw new UserNotFoundException('User Not Found!');
        }
        return view('user.user', compact('user'));
    }
}
