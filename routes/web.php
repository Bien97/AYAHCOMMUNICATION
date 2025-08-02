<?php

use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/:slug', [BlogController::class, 'show'])->name('show');
});
