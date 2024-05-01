<?php

use App\Http\Controllers\API\v1\BookController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::post('/books', [BookController::class, 'store'])->name('create.book');
Route::get('/books', [BookController::class, 'index'])->name('index.book');
Route::get('/books/{book}', [BookController::class, 'show'])->name('show.book');
//Route::put('/books/{book}', [BookController::class, 'store'])->name('create.book');
//Route::patch('/books/{book}', [BookController::class, ''])->name('create.book');
Route::delete('/books/{book}', [BookController::class, 'delete'])->name('delete.book');
