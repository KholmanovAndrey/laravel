<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function news()
    {
        $news = News::query()->paginate(5);
        return view('news.index', ['news' => $news]);
    }

    public function newsOne($id)
    {
        $news = News::query()->find($id);

        if (empty($news)){
            return redirect(route('home'));
        }

        $category = Category::query()->find($news->category_id);

        return view('news.one', [
            'news' => $news,
            'category' => $category,
        ]);
    }

    public function categories()
    {
        return view('news.categories', ['categories' => Category::all()]);
    }

    public function categoryId($id)
    {
        $category = Category::query()->where('name', $id)->first();
        if (!empty($category)) {
            $id = $category->id;
        } else {
            $category = Category::query()->find($id);
        }

        //$news = News::query()->where('category_id', $id)->get();
        $news = Category::query()->find($id)->getNews()->paginate(5);

        return view('news.category', [
            'category' => $category,
            'news' => $news,
        ]);
    }
}
