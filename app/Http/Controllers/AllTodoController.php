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
            'title' => $request->title
        ]);

        return redirect('/todos'); // 👉 go to list page
    }

    // Show all todos
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }
 
    
}
