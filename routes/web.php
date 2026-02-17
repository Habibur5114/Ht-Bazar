<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// google login
Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

// facebook login
Route::get('/auth/facebook', [FacebookController::class, 'redirect'])->name('facebook.login');
Route::get('/auth/facebook/callback', [FacebookController::class, 'callback']);

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
