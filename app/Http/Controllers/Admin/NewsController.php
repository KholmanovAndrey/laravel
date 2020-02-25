<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', ['news' => News::$news]);
    }

    public function create()
    {
        return view('admin.news.create', [
            'categories' => News::$categories
        ]);
    }

    public function update($id)
    {
        if (empty(News::$news)){
            return redirect(route('admin.news.index'));
        }

        return view('admin.news.update', [
            'news' => News::$news[$id],
            'category' => News::$categories[News::$news[$id]['category_id']],
            'categories' => News::$categories
        ]);
    }
}
