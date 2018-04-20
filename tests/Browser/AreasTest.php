<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AreasTest extends DuskTestCase
{

    use DatabaseMigrations;

    /**
     * @throws \Throwable
     */
    public function test_admin_cant_create_area_with_name_duplicated()
    {
        $this->withoutExceptionHandling();
        $this->createAreasStructure();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->adminUser())
                ->visitRoute('areas.index');

            $browser->press('Crear area nueva')
                ->waitFor('#myModal', 5)
                ->whenAvailable('#myModal', function ($modal) {
                    $modal->type('name', 'Raiz')
                        ->press('Guardar cambios')
                        ->pause(1000)
                        ->assertSeeIn('div.modal-body > div > span','nombre ya ha sido registrado');
                });
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_admin_cant_delete_area_with_childrens()
    {
        $this->withoutExceptionHandling();
        $this->createAreasStructure();

        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->adminUser())
                ->visitRoute('areas.index');
            $browser->click('#delete_2') //Direccion General
                ->assertDialogOpened('Estas seguro de querer eliminar esta area?')
                ->acceptDialog()
                ->pause(1000)
                ->assertVisible('div.alert')
                ->assertSeeIn('div.alert > p','Existen areas que reportan de esta, eliminelas o muevalas a otra area');
            });
    }


    /**
     * @throws \Throwable
     */
    public function test_admin_cant_delete_area_with_users()
    {
        $this->withoutExceptionHandling();
        $this->createAreasStructure();
        $this->employeeUser();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->adminUser())
                ->visitRoute('areas.index');
            $browser->click('#delete_4')
                ->assertDialogOpened('Estas seguro de querer eliminar esta area?')
                ->acceptDialog()
                ->pause(1000)
                ->assertVisible('div.alert')
                ->assertSeeIn('div.alert > p','Existen usuarios en esta area, eliminelos o muevalos a otra area');
        });
    }
}
