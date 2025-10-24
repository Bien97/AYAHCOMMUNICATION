<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController\HomeController;
use App\Http\Controllers\ClientController\ContactController;
use App\Http\Controllers\ContactController as ControllersContactController;

Route::get('/', function () {
    return view('site.index');
});

Route::get('/', [HomeController::class, 'index'])->name('site.index');

// Routes pour le contact avec CAPTCHA
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
// Route::post('/contact/send-email', [ContactController::class, 'sendEmail'])->name('contact.send_email');
