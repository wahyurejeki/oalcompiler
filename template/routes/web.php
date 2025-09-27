<?php

use Illuminate\Support\Facades\Route;

Route::get('/books', 'BookController@listBooksAction')->middleware(['AuthMiddleware']);
Route::post('/books', 'BookController@createBookAction')->middleware(['AuthMiddleware']);
Route::post('/books/borrow', 'BookController@borrowBookAction')->middleware(['AuthMiddleware']);
Route::post('/books/return', 'BookController@returnBookAction')->middleware(['AuthMiddleware']);
