<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function news()
    {
        $news = DB::table('news')->get();
        return view('news.index', ['news' => $news]);
    }

    public function newsOne($id)
    {
        $news = DB::table('news')->find($id);

        if (empty($news)){
            return redirect(route('home'));
        }

        $category = DB::table('category')->find($news->category_id);

        return view('news.one', [
            'news' => $news,
            'category' => $category,
        ]);
    }

    public function categories()
    {
        $categories = DB::table('category')->get();
        return view('news.categories', ['categories' => $categories]);
    }

    public function categoryId($id)
    {
        $category = DB::table('category')->where('name', '=', $id)->get();
        if (!empty($category)) {
            $id = $category->id;
        } else {
            $category = DB::table('category')->find($id);
        }

        $news = DB::table('news')->where('category_id', '=', $id)->get();

        return view('news.category', [
            'category' => $category,
            'news' => $news,
        ]);
    }
}
