<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();
      return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::all();
         $tags = Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validazione di dati
         $request->validate([
             'title' => 'required|max:80',
             'content' => 'required',
             'category_id' => 'nullable|exist:categories,id'


         ]);

        // prendere i dati
        $data = $request->all();

        // creare la nuova istanza
        $new_post = new Post();

        $slug = Str::slug($data['title'], '-');
        $slug_base = $slug;

        $slug_si = Post::where('slug', $slug)->first() ;

        $conta = 1;

        while($slug_si){

            $slug = $slug_base . '-' .$conta;

            $slug_si = Post::where('slug', $slug)->first();

            $conta++;







        }

       $new_post->slug = $slug;

       $new_post ->fill($data);

        // salvare i dati

        $new_post->save();

        // salvare i dati nella cartella ponte

        // controllo se l'utente non sta inserendo tag

        if(array_key_exists('tags',$data)){
            $new_post->tags()->attach($data['tags']);

        }

        



        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  collegamento con id

    // public function show(Post $post)
    // {
    //     return view('admin.posts.show',compact('post'));
        
    // }

    // collegamento con lo slug(front-office)

     public function show($slug)
     {
         $post = Post::where('slug',$slug)->first();
         return view('admin.posts.show',compact('post'));
        
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => 'required|max:80',
            'content' => 'required',
            'category_id' => 'nullable|exist:categories,id'


        ]);

        $data = $request->all();
        if($data['title'] != $post->title){
            $slug = Str::slug($data['title'], '-'); //titolo di esempio

            $slug_base = $slug; //titolo di esempio

            $slug_si = Post::where('slug', $slug)->first();
            $conta = 1;
            while($slug_si){

                // aggiungiamo al post di prima -conta

                $slug = $slug_base . '-' . $conta ;


                // controlliamo se il post esiste
                $slug_si = Post::where('slug', $slug)->first();




                // devo incrementare  il contatore

                $conta++;


            }

            $data['slug'] = $slug;
        }


        
        $post->update($data);

        return redirect()->route('admin.posts.index')->with('updated','Hai modificato con successo l\'elemento ' . $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $post->tags()->detach();
        return redirect()->route('admin.posts.index')->with('destroyed','Hai eliminato con successo l\'elemento ' . $post->id);
      
    }
}
