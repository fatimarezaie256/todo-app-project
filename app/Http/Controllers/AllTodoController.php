<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class AllTodoController extends Controller
{
   // Show form page
    public function create()
    {
        return view('todos.create');
    }

    // Insert todo
    public function store(Request $request)
    {
        Todo::create([
            'todo' => $request->todo
        ]);

        return redirect('/todos'); 
    }

    // Show all todos
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function update(string $id,Request $request){
         $todo = Todo::findOrFail($id);
         $todo->update([
            "todo"=>$request->todo,
         ]);
         $todo->save();
        
    }

    public function delete(string $id){
       $todo = Todo::findOrFail($id);
       $todo->delete();
    }
 
    
}
