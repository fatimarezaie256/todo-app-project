<?php

use App\Http\Controllers\AllTodoController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\TodoController;

Route::get('/', [AllTodoController::class, 'create']);   // form page
Route::post('/create', [AllTodoController::class, 'store']); // insert
Route::get('/alltodo', [AllTodoController::class, 'index']);  // list page