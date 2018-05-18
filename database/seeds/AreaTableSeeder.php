<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area=New Area();
        $area->code = 'RZ';
        $area->name = 'Raiz';
        $area->level = 0;
        $area->parent_id = 0;
        $area->save();

        $area=New Area();
        $area->code = 'DG';
        $area->name = 'Direccion General';
        $area->level = 1;
        $area->parent_id = 1;
        $area->save();

        $area=New Area();
        $area->code = 'CA';
        $area->name = 'Consejo de Admon';
        $area->level = 1;
        $area->parent_id = 1;
        $area->save();

        $area=New Area();
        $area->code = 'GS';
        $area->name = 'Gerencia de Servicios de Salud';
        $area->level = 2;
        $area->parent_id = 2;
        $area->save();

        $area=New Area();
        $area->code = 'GO';
        $area->name = 'Gerencia de Operaciones';
        $area->level = 2;
        $area->parent_id = 2;
        $area->save();

        $area=New Area();
        $area->code = 'IT';
        $area->name = 'Informatica';
        $area->level = 3;
        $area->parent_id = 4;
        $area->save();

    }
}
