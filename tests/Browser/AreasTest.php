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
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->adminUser())
                ->visitRoute('areas.index');

            $browser->press('Crear area nueva')
                ->waitFor('#myModal', 5)
                ->whenAvailable('#myModal', function ($modal) {
                    $modal->type('name', 'Raiz')
                        ->press('Guardar cambios')
                        ->pause(1000)
                        ->assertSeeIn('.invalid-feedback', 'The name has already been taken.');
                });
        });
    }
}
