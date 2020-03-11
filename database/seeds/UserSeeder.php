<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    private function getData()
    {
        $data[] = [
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('12345'),
        ];
        return $data;
    }
}
