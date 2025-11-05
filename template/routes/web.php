<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;

Route::get('/books', 'BookController@listBooksAction')->middleware([AuthMiddleware::class]);
Route::post('/books', 'BookController@createBookAction')->middleware([AuthMiddleware::class]);
Route::post('/books/borrow', 'BookController@borrowBookAction')->middleware([AuthMiddleware::class]);
Route::post('/books/return', 'BookController@returnBookAction')->middleware([AuthMiddleware::class]);
