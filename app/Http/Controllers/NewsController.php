<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        return view('news.index', ['news' => News::$news]);
    }

    public function newsOne($id)
    {
        if (empty(News::$news)){
            return redirect(route('home'));
        }

        return view('news.one', [
            'news' => News::$news[$id],
            'category' => News::$categories[News::$news[$id]['category_id']],
        ]);
    }

    public function categories()
    {
        return view('news.categories', ['categories' => News::$categories]);
    }

    public function categoryId($id)
    {
        $news = [];

        foreach (News::$categories as $item) {
            if ($item['name'] == $id) {
                $id = $item['id'];
            }
        }

        foreach (News::$news as $item) {
            if ($item['category_id'] == $id) {
                $news[$item['id']] = $item;
            }
        }

        return view('news.category', [
            'category' => News::$categories[$id],
            'news' => $news,
        ]);
    }
}
