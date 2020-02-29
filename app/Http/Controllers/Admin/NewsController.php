<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(5);
        return view('admin.news.index', ['news' => $news]);
    }

    public function create(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            $news->fill($request->all());

            if ($request->file('image')) {
                $path = $request->file('image')->store('public');
                $news->image = Storage::url($path);
            }

            if ($news->save()) {
                return redirect()->route('admin.news.index');
            }

            return redirect()->route('admin.news.create');
        }

        return view('admin.news.form', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }
            $url = $url?$url:$news->image;

            $news->fill($request->all());
            $news->image = $url;
            $news->save();
            return redirect()->route('admin.news.index');
        }

        if (empty($news)){
            return redirect()->route('admin.news.index');
        }

        return view('admin.news.form', [
            'news' => $news,
            'category' => Category::find($news->category_id),
            'categories' => Category::all()
        ]);
    }

    public function delete(News $news)
    {
        if (empty($news)){
            return redirect()->route('admin.news.index');
        }

        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
