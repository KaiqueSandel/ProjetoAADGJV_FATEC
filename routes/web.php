<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(LoginController::class)->group(function () {
    Route::post('login', 'store')->name('login.store');
    Route::get('register', 'register')->name('login.register');
    Route::post('register', 'create')->name('login.create');
    Route::get('logout', 'destroy')->name('login.destroy');
});