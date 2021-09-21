<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Calcio', 'Basket', 'Tennis', 'Pallavolo', 'Tennis Tavolo'];

        foreach($categories as $category){
            //creo istanza
            $newCategory = new Category();

            //popolo i dati
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category, '-');

            //salvo i dati

            $newCategory->save();

        }


    }
}
