<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoFormRequest;
use App\Models\Todo;
use Exception;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('index', compact('todos'));
    }

    public function store(TodoFormRequest $request)
    {

        try {
            Todo::create([
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
}
