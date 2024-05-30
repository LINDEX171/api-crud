<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\logUserRequest;
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

    public function login(logUserRequest $request){

      if (auth()->attempt($request->only(['email','password']))) {
       
        $user = auth()->user();
        
        $token = $user->createToken('MA_CLE_SECRETE_UNIQUEMENT_AU_BACKEND')->plainTextToken;

        return response()->json([
            'status_code'=>200,
            'statu_message'=>'Utilisateur connecté',
            'user'=>$user,
            'token'=>$token,
            ]);
      }
       else {
        //si les nformations ne correspondent a aucun utilisateur
        return response()->json([
            'status_code'=>403,
            'statu_message'=>'informatin non valide',
            ]);
      }
      
    }
}
