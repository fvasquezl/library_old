<?php

use App\Area;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'employee')->first();
        $area_level1 = Area::where('level',1)->first();
        $area_level2 = Area::where('level',2)->first();
        $area_level3 = Area::where('level',3)->first();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@local.com';
        $user->password ='123123';
        $user->position= 'Gerente General';
        $user->area_id =$area_level1->id;
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Employee';
        $user->email = 'employee@local.com';
        $user->password = '123123';
        $user->position= 'Employee';
        $user->area_id =$area_level2->id;
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Sebastian';
        $user->email = 'svasquez@local.com';
        $user->password = '123123';
        $user->position= 'Jefe de Sistemas';
        $user->area_id =$area_level3->id;
        $user->save();
        $user->roles()->attach($role_user);
    }
}
