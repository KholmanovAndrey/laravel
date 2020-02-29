<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan db:seed --class=DatabaseSeeder
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(UserSeeder::class);
    }
}
