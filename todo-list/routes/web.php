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

//edit view for existing todo
Route::get('/edit/{id}',[TodoController::class,'edit'])->name("todo.edit");

//update existing todo data
Route::put('/edit', [TodoController::class,'saveExisting'])->name("todo.saveExisting");

//delete toto
Route::delete('/delete/{id}', [TodoController::class,'delete'])->name("todo.delete");

// complete a todo
Route::put('/complete/{id}', [TodoController::class, 'complete'])->name("todo.complete");
