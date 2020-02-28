<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get();
        return view('admin.news.index', ['news' => $news]);
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

            if (DB::table('news')->insert([
                'title' => $request->title,
                'text' => $request->text,
                'category_id' => $request->category_id,
                'image' => $url?$url:''
            ])) {
                return redirect()->route('admin.news.index');
            }

            return redirect()->route('admin.news.create');
        }

        return view('admin.news.create', [
            'categories' => DB::table('category')->get()
        ]);
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $news = DB::table('news')->find($id);
            $url = $url?$url:$news->image;

            DB::table('news')->where('id', $id)->update([
                'title' => $request->title,
                'text' => $request->text,
                'category_id' => $request->category_id,
                'image' => $url
            ]);
            return redirect()->route('admin.news.index');
        }

        $news = DB::table('news')->find($id);

        if (empty($news)){
            return redirect()->route('admin.news.index');
        }

        return view('admin.news.update', [
            'news' => $news,
            'category' => DB::table('category')->find($news->category_id),
            'categories' => DB::table('category')->get()
        ]);
    }
}
