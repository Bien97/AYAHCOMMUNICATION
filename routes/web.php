<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController\HomeController;


Route::get('/', function () {
    return view('site.index');
});

Route::get('/', [HomeController::class, 'index'])->name('site.index');
