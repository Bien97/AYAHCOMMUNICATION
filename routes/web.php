<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\AdminController\AdminDashboardController;
use App\Http\Controllers\AdminController\SettingsController;
use App\Http\Controllers\AdminController\AboutController;
use App\Http\Controllers\AdminController\PartnerController;
use App\Http\Controllers\AdminController\ServiceController;
use App\Http\Controllers\AdminController\TestimonialController;
use App\Http\Controllers\AdminController\ContactController;
use App\Http\Controllers\AdminController\ProfileController;
use App\Http\Controllers\AdminController\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');


// Routes admin publiques (ex : page login, login submit, logout)
Route::prefix('admin')->name('admin.')->group(function () {
    // Formulaire de connexion admin
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');

    // Traitement du formulaire de connexion admin
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');

    // Déconnexion admin
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Toutes les routes admin protégées par auth + admin.auth
Route::prefix('admin')->middleware(['auth', 'admin.auth'])->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Pages vues simples (tableau, testimonials, contact, portfolio)
    Route::view('/tableau', 'admin.tableau')->name('tableau');
    Route::view('/testimonials', 'admin.testimonials')->name('testimonials');
    Route::view('/contact', 'admin.contact')->name('contact');
    Route::view('/portfolio', 'admin.portfolio')->name('portfolio');

    // Settings CRUD
     Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings/{id}', [SettingsController::class, 'update'])->name('settings.update');
    Route::delete('/settings/{id}', [SettingsController::class, 'destroy'])->name('settings.destroy');

    // About CRUD
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about', [AboutController::class, 'store'])->name('about.store');
    Route::put('/about/{sectionNumber}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/about/{sectionNumber}', [AboutController::class, 'destroy'])->name('about.destroy');

    // Partners CRUD
    Route::get('/partners', [PartnerController::class, 'index'])->name('partners');
    Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');
    Route::put('/partners/{id}', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('/partners/{id}', [PartnerController::class, 'destroy'])->name('partners.destroy');

    // Services CRUD
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // Testimonials CRUD
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::put('/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Users CRUD
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Profil utilisateur connecté
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    
});

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/admin/login'); // ou la page d'accueil client
})->name('logout');
