<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category();
        $cat->name = 'Primera Categoria';
        $cat->save();

        $cat = new Category();
        $cat->name = 'Segunda Categoria';
        $cat->save();

        $cat = new Category();
        $cat->name = 'Tercera Categoria';
        $cat->save();
    }
}
