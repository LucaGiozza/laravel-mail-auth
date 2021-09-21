<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Allenamento', 'Partita Ufficiale', 'Amichevole','Partita Internazionale'];

        foreach($tags as $tag){

            //creiamo istanza

            $newTag = new Tag();

            // popoliamo i dati
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag,'-');

            // salviamo i dati

            $newTag->save();


        }

    }
}
