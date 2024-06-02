<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\Usercontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//creer un lien qui permettra aux clients : react ; vue ; angular ; node ; js

//recuperer la liste des posts
Route::get('posts',[PostController::class, 'index']);

//ajouter un post |post|put|patch
Route::post('/register', [Usercontroller::class, 'register']);
Route::post('/login', [Usercontroller::class, 'login']);

    Route::middleware('auth:sanctum')->group(function (){
        //ajouter un post
        Route::post('posts/create',[PostController::class, 'store']);
        
        //modifier un post
        Route::put('posts/edit/{post}',[PostController::class, 'update']);

        //SUpprimer un post
        Route::delete('posts/{post}',[PostController::class, 'delete']);

        //retourner l'utisateur actuellement connecté
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
