<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('book', BookController::class);
Route::resource('category', CategoryController::class);
