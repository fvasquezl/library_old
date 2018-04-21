<?php
/**
 * Created by PhpStorm.
 * User: fvasquez
 * Date: 11/04/18
 * Time: 04:23 PM
 */

namespace Tests;


use App\Area;
use App\Category;
use App\User;

trait TestHelpers
{
    protected $adminUser;
    protected $employeeUser;
    protected $area;
    protected $user;
    protected $areas;


    public function createUser(array $attr=[])
    {
        if ($this->user) {
            return $this->user;
        }
        $this->user = User::create($attr);
        return $this->user;
    }

//    public function createArea(array $attr = [])
//    {
//        if ($this->area) {
//            return $this->area;
//        }
//        return $this->area = factory(Area::class)->create($attr);
//    }

    public function createAreasStructure()
    {
        factory(Area::class)->create(['name'=> 'Raiz', 'level' =>0, 'parent_id' =>0]);
        factory(Area::class)->create(['name'=> 'Direccion General','level' =>1,'parent_id' =>1]);
        factory(Area::class)->create(['name'=> 'Consejo de Admon','level' =>1,'parent_id' =>1]);
        factory(Area::class)->create(['name'=> 'Gerencia de Servicios de Salud','level' =>2,'parent_id' =>2]);
        factory(Area::class)->create(['name'=> 'Gerencia de Operaciones','level' =>2,'parent_id' =>2]);
    }

    public function employeeUser()
    {
        if ($this->employeeUser) {
            return $this->employeeUser;
        }
        $this->employeeUser = factory(User::class)->create();;
        $area = Area::where('name','Gerencia de Servicios de Salud')->get();
        $this->employeeUser->areas()->attach($area);
        return $this->employeeUser;
    }


    public function adminUser()
    {
        if ($this->adminUser) {
            return $this->adminUser;
        }
        $direction = Area::where('name','Direccion General')->get();
        $this->adminUser = factory(User::class)->create();
        $this->adminUser->areas()->attach($direction);
        return $this->adminUser;
    }


    /*
     * Helpers for categories and documents
     */



    public function createCategoriesStructure()
    {
        factory(Category::class)->create(['name'=> 'Primera Categoria']);
        factory(Category::class)->create(['name'=> 'Segunda Categoria']);
        factory(Category::class)->create(['name'=> 'Tercera Categoria']);
    }

}