<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public function register(RegisterUser $request){
      
        try {
            
            $user = new User();
            $user -> name = $request -> name;
            $user -> email = $request -> email;
            $user -> password = Hash::make($request -> password, ['rounds'=>12]) ;
            $user -> save();

            return response()->json([
                'status_code'=>200,
                'statu_message'=>'utilisateur enregistrer',
                'data'=>$user
                ]);

        } catch (Exception $e) {
            return response()->json($e);
        }

    }
}
