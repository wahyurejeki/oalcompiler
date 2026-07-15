<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/books', [BookController::class, 'listBooksAction'])->middleware([AuthMiddleware::class]);
Route::post('/books', [BookController::class, 'createBookAction'])->middleware([AuthMiddleware::class]);
Route::post('/books/borrow', [BookController::class, 'borrowBookAction'])->middleware([AuthMiddleware::class]);
Route::post('/books/return', [BookController::class, 'returnBookAction'])->middleware([AuthMiddleware::class]);
