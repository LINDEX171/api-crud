<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Pow;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{
    public function index(){
        try {

         return response()->json([
            'status_code'=>200,
            'statu_message'=>'les posts ont été recuperer',
            'data'=> Post::all()
            ]);
         } 
         
         catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function store(CreatePostRequest $request){

        try {
        $post = new Post();
        $post -> titre = $request -> titre;
        $post -> description = $request -> description;
        $post -> user_id = auth()->user()->id;
        $post -> save();

        return response()->json([
            'status_code'=>200,
            'statu_message'=>'le post été ajouté',
            'data'=>$post
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }

        
    } 

    public function update(CreatePostRequest $request, Post $post){
        
         try {
            $post -> titre = $request -> titre;
         $post -> description = $request -> description;
         $post -> save();

         return response()->json([
            'status_code'=>200,
            'statu_message'=>'le post a été modifié',
            'data'=>$post
            ]);

         } 
         
         
         catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function delete(Post $post){
        
        try {

           $post -> delete();

        return response()->json([
           'status_code'=>200,
           'statu_message'=>'le post a été supprimer',
           'data'=>$post
           ]);
        } 
        
        catch (Exception $e) {
           return response()->json($e);
       }
   }
}
