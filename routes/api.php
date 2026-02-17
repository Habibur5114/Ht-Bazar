<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\GoogleAuthController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

// Admin Public Routes
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// user login
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::middleware('auth:sanctum')->post('/user/logout', [UserController::class, 'logout']);

// google login api
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);


