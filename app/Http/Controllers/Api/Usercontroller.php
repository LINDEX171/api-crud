<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function register(RegisterUser $request){

        $user = new User();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = $request -> password;
        $user -> save();


    }
}
