<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert($this->getData());
    }

    private function getData()
    {
        $data[] = [
            'link' => 'https://news.yandex.ru/auto.rss',
        ];
        $data[] = [
            'link' => 'https://news.mail.ru/rss/politics/',
        ];

        return $data;
    }
}
