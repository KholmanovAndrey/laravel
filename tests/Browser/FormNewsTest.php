<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FormNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->type('title', '123')
                    ->type('text', '123')
                    ->press('Сохранить')
                    ->assertSee('The title must be at least 5 characters.')
                    ->assertPathIs('/admin/news/create');
        });
    }
}
