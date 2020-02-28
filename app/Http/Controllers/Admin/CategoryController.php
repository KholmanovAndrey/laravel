<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => DB::table('category')->get()
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            if (DB::table('category')->insert([
                'title' => $request->title,
                'name' => $request->name,
            ])) {
                return redirect()->route('admin.categories.index');
            }

            return redirect()->route('admin.category.create');
        }

        return view('admin.category.create');
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            DB::table('category')->where('id', $id)->update([
                'title' => $request->title,
                'name' => $request->name,
            ]);
            return redirect()->route('admin.categories.index');
        }

        $category = DB::table('category')->find($id);

        if (empty($category)){
            return redirect()->route('admin.categories.index');
        }

        return view('admin.category.update', [
            'category' => $category,
        ]);
    }
}
