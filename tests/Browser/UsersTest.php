<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @throws \Throwable
     */
    public function test_admin_can_create_user()
    {
        // $this->withoutExceptionHandling();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->adminUser())
                ->visitRoute('users.index');

            $browser->press('Crear usuario')
                ->waitFor('#myModal', 5)
                ->whenAvailable('#myModal', function ($modal) {
                    $modal->type('name', 'Faustino Vasquez')
                        ->press('Guardar cambios');
                })
                ->pause(1000)
                ->assertPathIs('/admin/users/faustino-vasquez/edit');
        });

        $this->assertDatabaseHas('users', [
            'name' => 'Faustino Vasquez',
            'url' => 'faustino-vasquez'
        ]);
    }

    /**
     * @throws \Throwable
     */
    public function test_admin_cant_create_empty_user_name()
    {

       // $this->withoutExceptionHandling();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->adminUser())
                ->visitRoute('users.index');

            $browser->press('Crear usuario')
                ->waitFor('#myModal', 5)
                ->whenAvailable('#myModal', function ($modal) {
                    $modal
                        ->press('Guardar cambios')
                        ->pause(1000)
                        ->assertSeeIn('.invalid-feedback', 'The name field is required.');
                });
        });
    }


    /**
     * @throws \Throwable
     */
    public function test_admin_complete_creation_user()
    {
         $this->withoutExceptionHandling();
        $user = $this->createUser(['name'=>'Faustino Vasquez']);
        $this->createAreasStructure();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($this->adminUser())
                ->visitRoute('users.edit',$user);
//                ->type('email', 'fvasquez@localhost.com')
//                ->type('password','123123')
//                ->type('postition', 'Empleado')
//                ->select('area', 'Gerencia de Servicios de Salud')
//                ->press('Guardar cambios')
//                ->pause(1000)
//                ->assertPathIs('/admin/users/faustino-vasquez/edit')
//                ->assertSeeIn('test','El usuario ha sido creado correctamente');
        });

//        $this->assertDatabaseHas('users', [
//            'name' => 'Faustino Vasquez',
//            'url' => 'faustino-vasquez',
//            'email' => 'fvasquez@localhost.com'
//        ]);
    }

}
