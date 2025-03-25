<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/toggle-dark-mode', [App\Http\Controllers\ThemeController::class, 'toggleDarkMode']);


