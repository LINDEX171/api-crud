<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Pow;

class PostController extends Controller
{
    public function index(){
        return 'liste des posts';
    }

    public function store(CreatePostRequest $request){
        
        $post = new Post();
        $post -> titre = $request -> titre;
        $post -> description = $request -> description;

        $post -> save();
    } 
}
