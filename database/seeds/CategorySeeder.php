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
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 1; $i < 3; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(20,50)),
                'name' => 'category'.$i,
            ];
        }
        return $data;
    }
}
