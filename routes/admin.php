<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.showLoginForm');
Route::post('/admin/loginstore', [AdminController::class, 'login'])->name('admin.loginstore');


Route::middleware(['admin:admin', 'role'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/registerstore', [AdminController::class, 'registerStore'])->name('registerstore');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/list', [AdminController::class, 'adminlist'])->name('index');
    Route::get('register', [AdminController::class, 'register'])->name('register');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/password/{id}', [AdminController::class, 'password'])->name('password');
    Route::post('/passwordchange/{id}', [AdminController::class, 'passwordchange'])->name('passwordchange');

    Route::prefix('role')->group(function () {
        Route::get('index', [RoleController::class, 'index'])->name('roles.index');
        Route::get('create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('update/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('delete/{role}', [RoleController::class, 'delete'])->name('roles.delete');
    });

    // settings
    Route::prefix('settings')->group(function () {
        Route::get('index', [SettingController::class, 'index'])->name('settings.index');
        Route::post('update', [SettingController::class, 'update'])->name('settings.update');
    });
});
