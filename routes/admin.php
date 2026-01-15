<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ColorController;
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
    Route::prefix('category')->group(function () {
        Route::get('index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });
    Route::prefix('subcategory')->group(function () {
        Route::get('index', [SubcategoryController::class, 'index'])->name('subcategory.index');
        Route::get('create', [SubcategoryController::class, 'create'])->name('subcategory.create');
        Route::post('store', [SubcategoryController::class, 'store'])->name('subcategory.store');
        Route::get('edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
        Route::post('update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
        Route::get('delete/{id}', [SubcategoryController::class, 'delete'])->name('subcategory.delete');
    });
    Route::prefix('color')->group(function () {
        Route::get('index', [ColorController::class, 'index'])->name('color.index');
        Route::get('create', [ColorController::class, 'create'])->name('color.create');
        Route::post('store', [ColorController::class, 'store'])->name('color.store');
        Route::get('edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
        Route::post('update/{id}', [ColorController::class, 'update'])->name('color.update');
        Route::get('delete/{id}', [ColorController::class, 'delete'])->name('color.delete');
    });

    // settings
    Route::prefix('settings')->group(function () {
        Route::get('index', [SettingController::class, 'index'])->name('settings.index');
        Route::post('update', [SettingController::class, 'update'])->name('settings.update');
    });
});
