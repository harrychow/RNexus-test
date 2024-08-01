<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// List of all todo items
Route::get('/list',[TodoController::class, 'list']);

// Create todo item. Must provide description
Route::post('/create', [TodoController::class,'create']);

// Edit existing todo item.  Accepted params: id, descrption, completed
Route::put('/edit', [TodoController::class,'edit']);

// Marks todo item with completed = 1
Route::put('/complete/{id}', [TodoController::class, 'complete']);

// Deletes todo item
Route::delete('/delete/{id}', [TodoController::class,'delete']);
