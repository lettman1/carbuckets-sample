<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::group([
        'prefix' => 'admin',
        'middleware' => ['is_manager'],
        'as' => 'admin.',
    ], function() {
        Route::get('books', [\App\Http\Controllers\Admin\BookController::class, 'index'])->name('books.index');
        Route::get('books/create', [\App\Http\Controllers\Admin\BookController::class, 'create'])->name('books.create');
        Route::post('books', [\App\Http\Controllers\Admin\BookController::class, 'store'])->name('books.store');
        Route::get('books/edit/{id}', [\App\Http\Controllers\Admin\BookController::class, 'edit'])->name('books.edit');
        Route::put('books/{id}', [\App\Http\Controllers\Admin\BookController::class, 'update'])->name('books.update');
        Route::delete('books/{id}', [\App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('books.destroy');

        //should have an endpoint to accept a string and return matching publishers... something like algolia could facilitate the search of customers
        //should have an endpoint to accept a string and return matching authors... 
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function() {
        Route::get('books', [\App\Http\Controllers\User\BookController::class, 'index'])->name('books.index');
        Route::get('books/{id}', [\App\Http\Controllers\User\BookController::class, 'show'])->name('books.show');
        Route::post('loan/books/{book}', [\App\Http\Controllers\User\LoanController::class, 'store'])->name('loan.store');
        Route::get('loans', [\App\Http\Controllers\User\LoanController::class, 'index'])->name('loans.index');
    });
});