<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        $data[] = [
            'title' => 'Спорт',
            'name' => 'sport',
        ];
        return $data;
    }
}
