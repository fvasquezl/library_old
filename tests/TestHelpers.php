<?php
/**
 * Created by PhpStorm.
 * User: fvasquez
 * Date: 11/04/18
 * Time: 04:23 PM
 */

namespace Tests;


use App\Area;
use App\User;

trait TestHelpers
{
    protected $adminUser;
    protected $area;
    protected $user;

    /**
     * @param array $attr
     * @return mixed
     */
    public function adminUser(array $attr = [])
    {
        if ($this->adminUser) {
            return $this->adminUser;
        }
        $adminArea = $this->createArea(['level' => 1, 'parent_id' => 1]);
        $this->adminUser = factory(User::class)->create($attr);
        $this->adminUser->areas()->attach($adminArea);
        return $this->adminUser;
    }

    public function createUser(array $attr=[])
    {
        if ($this->user) {
            return $this->user;
        }
        $this->user = User::create($attr);
        return $this->user;
    }

    public function createArea(array $attr = [])
    {
        if ($this->area) {
            return $this->area;
        }
        return $this->area = factory(Area::class)->create($attr);
    }

    public function createAreasStructure()
    {
        $this->createArea([
            'name'=> 'Raiz',
            'level' =>0,
            'parent_id' =>0
        ]);
        $this->createArea([
            'name'=> 'Direccion General',
            'level' =>1,
            'parent_id' =>0
        ]);
        $this->createArea([ 'name'=> 'Gerencia de Servicios de Salud',
            'level' =>2,
            'parent_id' =>2
        ]);

    }
}