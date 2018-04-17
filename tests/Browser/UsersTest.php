<?php

namespace Tests\Browser;

use App\Area;
use App\User;
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
        //$this->withoutExceptionHandling();
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
    public function test_admin_can_edit_user()
    {
        $this->withoutExceptionHandling();
        $user = $this->createUser(['name'=>'Faustino Vasquez']);

        $this->browse(function (Browser $browser) use($user){
            $browser->loginAs($this->adminUser())
                ->visitRoute('users.edit',$user)
                ->pause(1000)
                ->assertInputValue('name','Faustino Vasquez')
                ->type('email', 'fvasquez@localhost.com')
                ->type('password','123123')
                ->type('password_confirmation','123123')
                ->type('position', 'Empleado')
                ->select('area_id', 3)
                ->press('Guardar informacion')
                ->assertPathIs('/admin/users/faustino-vasquez/edit')
                ->assertSeeIn('.alert','El usuario ha sido guardado correctamente');
        });

        $this->assertDatabaseHas('users', [
            'name' => 'Faustino Vasquez',
            'url' => 'faustino-vasquez'
        ]);
        $this->assertDatabaseHas('area_user',[
            'area_id' => 3,
            'user_id' => 1
        ]);
    }

}
