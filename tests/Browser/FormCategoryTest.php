<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FormCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                ->type('title', 'Природа')
                ->type('name', 'pictures')
                ->press('Сохранить')
                ->assertSee('Категория успешно добавлена!')
                ->assertPathIs('/admin/categories');
        });
    }
}
