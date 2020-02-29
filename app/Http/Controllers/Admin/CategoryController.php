<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }

    public function create(Request $request, Category $category)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            $category->fill($request->all());
            if ($category->save()) {
                return redirect()->route('admin.categories.index');
            }

            return redirect()->route('admin.category.create');
        }

        return view('admin.category.form', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            $category->fill($request->all());
            $category->save();
            return redirect()->route('admin.categories.index');
        }

        if (empty($category)){
            return redirect()->route('admin.categories.index');
        }

        return view('admin.category.form', [
            'category' => $category,
        ]);
    }

    public function delete(Category $category)
    {
        if (empty($category)){
            return redirect()->route('admin.categories.index');
        }

        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
