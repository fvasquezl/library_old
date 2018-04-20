<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Documents extends DuskTestCase
{

    /**
     * @throws \Throwable
     */
    public function test_admin_can_create_document()
    {
        $this->createAreasStructure();
        $this->createCategoriesStructure();
        \Storage::fake('documents');

        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->adminUser())
                ->visitRoute('documents.create')
                ->type('title','Libro de prueba')
                ->type('abstract','Synopsis de prueba')
                ->attach('pdfdoc', __DIR__.'/documents/test.pdf')
                ->select('category_id',1);
        });
        $this->assertDatabaseHas('documents',[
            'title'=>'Libro de prueba',
            'abstract' => 'Synopsis de prueba'
        ]);
        \Storage::disk('documents')->exists('test.pdf');
    }
}
