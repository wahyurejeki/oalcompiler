<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', [BookController::class, 'indexAction']);
Route::get('/books', [BookController::class, 'listBooksAction'])->middleware([AuthMiddleware::class]);
Route::post('/books', [BookController::class, 'createBookAction'])->middleware([AuthMiddleware::class]);
Route::post('/books/borrow', [BookController::class, 'borrowBookAction'])->middleware([AuthMiddleware::class]);
Route::post('/books/return', [BookController::class, 'returnBookAction'])->middleware([AuthMiddleware::class]);
Route::post('/members', [MemberController::class, 'registerMemberAction']);
Route::post('/reservations', [ReservationController::class, 'reserveBookAction'])->middleware([AuthMiddleware::class]);
Route::post('/fines/pay', [FineController::class, 'payFineAction'])->middleware([AuthMiddleware::class]);
Route::get('/categories', [CategoryController::class, 'listCategoriesAction']);
