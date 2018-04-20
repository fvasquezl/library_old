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

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@local.com';
        $user->password ='123123';
        $user->position= 'Gerente General';
        $user->save();
        $user->roles()->attach($role_admin);
        $user->areas()->attach($area_level1);

        $user = new User();
        $user->name = 'Employee';
        $user->email = 'employee@local.com';
        $user->password = '123123';
        $user->position= 'Employee';
        $user->save();
        $user->roles()->attach($role_user);
        $user->areas()->attach($area_level2);
    }
}
