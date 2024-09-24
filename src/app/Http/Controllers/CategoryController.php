<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;
use Exception;

class CategoryController extends Controller
{
        public function index()
    {
        $categories = Category::all();

        return view('category_index', compact('categories'));
    }

    public function store(CategoryFormRequest $request)
    {
        try {
            Category::create([
                'name' => $request->input('name'),
            ]);

            return redirect()->route('category-index')
                ->with('success_msg', 'カテゴリを登録しました');
        } catch (Exception $e) {
            return redirect()->route('category-index')
                ->withErrors('カテゴリの登録に失敗しました');
        }
    }

    public function update(CategoryFormRequest $request, $id)
    {
        try {
            Category::where('id', $id)->update([
                'name' => $request->input('name'),
            ]);

            return redirect()->route('category-index')
                ->with('success_msg', 'カテゴリ名を更新しました');
        } catch (Exception $e) {
            return redirect()->route('category-index')
                ->withErrors('カテゴリ名の更新に失敗しました');
        }
    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('category-index');
    }
}
