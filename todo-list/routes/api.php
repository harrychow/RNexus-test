<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/list',[TodoController::class, 'list']);
Route::post('/create', [TodoController::class,'create']);
Route::put('/edit', [TodoController::class,'edit']);
Route::put('/complete/{id}', [TodoController::class, 'complete']);
Route::delete('/delete/{id}', [TodoController::class,'delete']);
