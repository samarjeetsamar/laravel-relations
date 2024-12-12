<?php

namespace App\Services;
use App\Exceptions\UserNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getUserById($id) {
        try{
            $user = \App\Models\User::where('id', $id)->firstOrFail();
            return $user;
        }catch(ModelNotFoundException $e){
            throw new UserNotFoundException('User not found!!!!!!!!!!!');
        }
    }

}
