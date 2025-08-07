<?php

use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\AdminController\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/:slug', [BlogController::class, 'show'])->name('show');
});

// Page Dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// Page Blog
Route::get('/admin/blog', function () {
    return view('admin.blog');
});

// Page Testimonials
Route::get('/admin/testimonials', function () {
    return view('admin.testimonials');
});

// Page Services
Route::get('/admin/services', function () {
    return view('admin.services');
});


// Page Settings
Route::get('/admin/settings', function () {
    return view('admin.settings');
});

// Page Contact
Route::get('/admin/contact', function () {
    return view('admin.contact');
}); 

// Page Team
Route::get('/admin/team', function () {
    return view('admin.team');
});

// Page Portfolio
Route::get('/admin/portfolio', function () {
    return view('admin.portfolio');
});

// Admin Settings Routes
Route::prefix('admin')->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::put('/settings/{id}', [SettingsController::class, 'update'])->name('update.settings');
    Route::delete('/settings/{id}', [SettingsController::class, 'destroy'])->name('delete.settings');
});


