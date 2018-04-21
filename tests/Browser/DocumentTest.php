<?php

namespace Tests\Browser;

use Storage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DocumentTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @throws \Throwable
     */
    public function test_admin_can_create_document()
    {
        $this->withoutExceptionHandling();
        $this->createAreasStructure();
        $this->createCategoriesStructure();
        Storage::fake('documents');

        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->adminUser())
                ->visitRoute('documents.create')
               ->type('title','Libro de prueba')
                ->type('excerpt','Synopsis de prueba')
                ->attach('pdfbook', __DIR__.'/documents/test.pdf')
                ->select('category_id',1)
                ->press('Guardar informacion');
        });
        $this->assertDatabaseHas('documents',[
            'title'=>'Libro de prueba',
            'excerpt' => 'Synopsis de prueba'
        ]);
        Storage::disk('documents')->exists('test.pdf');
    }
}
