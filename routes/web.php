<?php

use App\Http\Controllers\ShortUrlController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Home — form to shorten URLs
Route::get('/', [ShortUrlController::class, 'index'])->name('home');

// Store a new shortened URL
Route::post('/shorten', [ShortUrlController::class, 'store'])->name('shorten');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Analytics — list of all shortened URLs
    // Must be declared BEFORE the wildcard route below
    Route::get('/analytics', [ShortUrlController::class, 'analytics'])->name('analytics');
});

// Language switcher
Route::get('/lang/{lang}', [ShortUrlController::class, 'setLanguage'])->name('lang');

// Redirect short code to original URL
Route::get('/{code}', [ShortUrlController::class, 'redirect'])->name('redirect');
