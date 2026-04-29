<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class AllTodoController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        Todo::create([
            'todo' => $request->todo
        ]);

        return redirect()->route('todos.index');
    }
     
public function complete(Request $request, $id)
{
    $todo = Todo::findOrFail($id);

    $todo->completed = $request->completed;
    $todo->save();

    return response()->json([
        'success' => true
    ]);
}

    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        $todo = Todo::findOrFail($id);

        $todo->update([
            'todo' => $request->todo,
        ]);

        return redirect()->route('todos.index');
    }

    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index');
    }
}