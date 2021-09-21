<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            // creare l'istanza

            $newPost = new Post();

            // generare i dati

            $newPost->title = 'Post n' . ($i + 1);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum doloribus labore autem magni officia nobis ipsa quae iure odit commodi, voluptates nihil incidunt accusamus possimus, modi consequuntur debitis harum suscipit!';

            // salvare i dati
            $newPost->save();



        }
    }
}
