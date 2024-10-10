<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DigitalCollectionController;
use App\Http\Controllers\DashboardController;

// Redirect root URL to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::prefix('api/v1')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes untuk buku
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
});


// Route untuk digital collection
Route::get('/digital-collection', [DigitalCollectionController::class, 'index'])->name('digital-collection.index');
Route::get('/digital-collection/search', [DigitalCollectionController::class, 'search'])->name('digital-collection.search');
