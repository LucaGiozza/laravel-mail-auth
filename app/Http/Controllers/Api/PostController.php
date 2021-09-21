<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //  faccio così se devo prendere tutti i post in un'unica pagina
        // $posts = Post::all();
        // return response()->json([
        //     'success' => true,
        //     'results' => $posts

        // ]);

        // faccio così invece per fare la paginazione

        $posts = Post::paginate(4);
        return response()->json([
                 'success' => true,
                 'results' => $posts
    
             ]);
    }

   

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

  

   

    
}
