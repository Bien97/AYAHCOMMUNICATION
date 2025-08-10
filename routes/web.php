<?php

use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\AdminController\SettingsController;
use App\Http\Controllers\AdminController\AboutController;
use App\Http\Controllers\AdminController\PartnerController;
use App\Http\Controllers\AdminController\ServiceController;
use App\Http\Controllers\AdminController\TestimonialController;
use App\Http\Controllers\AdminController\ContactController;

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

// Page About
Route::get('/admin/about', function () {
    return view('admin.about');
});

// Page Testimonials
Route::get('/admin/testimonials', function () {
    return view('admin.testimonials');
});

// Page Contact
Route::get('/admin/contact', function () {
    return view('admin.contact');
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

// Admin About Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::post('about', [AboutController::class, 'store'])->name('about.store');
    Route::put('about/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');
});


// Admin Partners Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('partners', [PartnerController::class, 'index'])->name('partners');
    Route::post('partners', [PartnerController::class, 'store'])->name('partners.store');
    Route::put('partners/{id}', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('partners/{id}', [PartnerController::class, 'destroy'])->name('partners.destroy');
});

// Admin Services Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

// Admin Testimonials Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::put('testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
});

// Admin Contact Routes
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');







