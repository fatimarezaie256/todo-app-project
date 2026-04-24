<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllTodoController;

Route::get('/', function () {
    return view('welcome');
});

// Show todo page
Route::get('/alltodo', [AllTodoController::class, 'index'])->name('todos.index');

// Insert todo
Route::post('/create', [AllTodoController::class, 'store'])->name('todos.store');

// Edit page
Route::get('/todo/{id}/edit', [AllTodoController::class, 'edit'])->name('todos.edit');

// Update todo
Route::put('/todo/{id}', [AllTodoController::class, 'update'])->name('todos.update');

// Delete todo
Route::delete('/todo/{id}', [AllTodoController::class, 'destroy'])->name('todos.destroy');