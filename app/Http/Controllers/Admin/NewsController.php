<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', ['news' => News::$news]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $model = News::$news;
            $id = count($model) + 1;
            $model[$id]['id'] = $id;
            $model[$id]['title'] = $request->input('title');
            $model[$id]['text'] = $request->input('text');
            $model[$id]['category_id'] = $request->input('category_id');
            $model[$id]['image'] = $url;

            //$json = response()->json($model)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            $json = json_encode($model);
            $ar = json_decode($json, true);
            dd($json, $ar, $ar[$id]);

            return redirect()->route('admin.news.create');
        }

        return view('admin.news.create', [
            'categories' => News::$categories
        ]);
    }

    public function update($id)
    {
        if (empty(News::$news)){
            return redirect()->route('admin.news.index');
        }

        return view('admin.news.update', [
            'news' => News::$news[$id],
            'category' => News::$categories[News::$news[$id]['category_id']],
            'categories' => News::$categories
        ]);
    }
}
