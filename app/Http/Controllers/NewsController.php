<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $categories = [
        [
            'id' => 1,
            'title' => 'Category 1'
        ],
        [
            'id' => 2,
            'title' => 'Category 2'
        ],
    ];

    private $news = [
        [
            'id' => 1,
            'category_id' => 1,
            'title' => 'News 1',
            'text' => 'This one news and it\'s very good'
        ],
        [
            'id' => 2,
            'category_id' => 2,
            'title' => 'News 2',
            'text' => 'This second news and it\'s bad'
        ],
    ];

    public function news()
    {
        return view('news.index', ['news' => $this->news]);
    }

    public function newsOne($id)
    {
        $news = $this->getItemById($this->news, $id);
        $category = $this->getItemById($this->categories, $news['category_id']);

        if (empty($news)){
            return redirect(route('home'));
        }

        return view('news.one', [
            'news' => $news,
            'category' => $category,
        ]);
    }

    public function categories()
    {
        return view('news.categories', ['categories' => $this->categories]);
    }

    public function category($id)
    {
        $category = $this->getItemById($this->categories, $id);
        $news = $this->getNewsByCategoryId($this->news, $id);

        return view('news.index', [
            'category' => $category,
            'news' => $news,
        ]);
    }

    public function getItemById($items, $id)
    {
        foreach ($items as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
    }

    public function getNewsByCategoryId($items, $category_id)
    {
        $new = [];

        foreach ($items as $item) {
            if ($item['category_id'] == $category_id) {
                $new[] = $item;
            }
        }

        return $new;
    }
}
