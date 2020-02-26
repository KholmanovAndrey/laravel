<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public static $categories = [
        '1' => [
            'id' => 1,
            'title' => 'Спорт',
            'name' => 'sport'
        ],
        '2' => [
            'id' => 2,
            'title' => 'Политика',
            'name' => 'politics'
        ],
    ];

    public static $news = [
        '1' => [
            'id' => 1,
            'category_id' => 1,
            'title' => 'News 1',
            'text' => 'This one news and it\'s very good'
        ],
        '2' => [
            'id' => 2,
            'category_id' => 2,
            'title' => 'News 2',
            'text' => 'This second news and it\'s bad'
        ],
    ];
}
