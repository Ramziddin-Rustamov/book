<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

// Route::get('/boo', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('books',[BookController::class,'readerIndex'])->name('reader.books');
    Route::get('bookread/{book}/read',[BookController::class,'readBook'])->name('book.reader');
    Route::resource('comment',CommentController::class);
});

Route::middleware('can:admin')->group(function(){
    Route::resource('book', BookController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('employees', EmployeeController::class);
});



