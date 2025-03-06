<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('books', [BookController::class, 'store']);
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/search', [BookController::class, 'search']);
    Route::get('books/{post}', [BookController::class, 'show']);   
    Route::put('books/{post}', [BookController::class, 'update']);
    Route::delete('books/{post}', [BookController::class, 'destroy']);
    Route::post('logout', [AuthController::class, 'logout']);
});