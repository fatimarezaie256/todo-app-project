<?php

use App\Http\Controllers\AllTodoController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\TodoController;

Route::get('/', [AllTodoController::class, 'store']);   // form page
Route::post('/todos', [AllTodoController::class, 'store']); // insert
Route::get('/todos', [AllTodoController::class, 'index']);  // list page