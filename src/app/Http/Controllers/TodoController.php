<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoFormRequest;
use App\Models\Category;
use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $todos = Todo::with('category')->get();

        return view('index', compact('todos', 'categories'));
    }

    public function store(TodoFormRequest $request)
    {
        try {
            Todo::create([
                'category_id' => $request->input('category_id'),
                'content' => $request->input('content'),
            ]);

            return redirect()->route('index')
                ->with('success_msg', 'Todoを登録しました');
        } catch (Exception $e) {
            return redirect()->route('index')
                ->withErrors('Todoの登録に失敗しました');
        }
    }

    public function update(TodoFormRequest $request, $id)
    {
        try {
            Todo::where('id', $id)->update([
                'category_id' => $request->input('category_id'),
                'content' => $request->input('content'),
            ]);

            return redirect()->route('index')
                ->with('success_msg', 'Todoを更新しました');
        } catch (Exception $e) {
            return redirect()->route('index')
                ->withErrors('Todoの更新に失敗しました');
        }
    }

    public function destroy($id)
    {
        Todo::where('id', $id)->delete();

        return redirect()->route('index');
    }

    public function search(Request $request)
    {
        $categoryId = e($request->input('category_id'));
        $content = e($request->input('content'));

        $categories = Category::all();

        $query = Todo::with('category');
        if (! empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }
        if (! empty($content)) {
            $query->where('content', 'like', "%$content%");
        }
        $todos = $query->get();

        return view('index', compact('todos', 'categories', 'content', 'categoryId'));
    }
}
