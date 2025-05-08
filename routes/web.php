<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChatBotController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('authors', AuthorController::class);

Route::resource('books', BookController::class);

Route::post('/chatbot', [ChatbotController::class, 'handle']);
