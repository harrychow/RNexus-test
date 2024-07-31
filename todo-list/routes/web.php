<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// list all todo
Route::get('/',[TodoController::class, 'index'])
    ->name("todo.home");

// create new todo
Route::get('/create', function () {
    return view('create');
})->name("todo.create");

// save new todo
Route::post('/create', [TodoController::class,'saveNew'])->name("todo.saveNew");
