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

//edit existing todo
Route::get('/edit/{id}',[TodoController::class,'edit'])->name("todo.edit");

//update existing todo data
Route::post('/edit', [TodoController::class,'saveExisting'])->name("todo.saveExisting");

//delete toto
Route::get('/delete/{id}', [TodoController::class,'delete'])->name("todo.delete");
