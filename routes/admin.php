<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BannerCategoryController;
use App\Http\Controllers\Admin\BannerAdsController;
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

    Route::prefix('users')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('users.index');
    });
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
    Route::prefix('childcategory')->group(function () {
        Route::get('index', [ChildCategoryController::class, 'index'])->name('childcategory.index');
        Route::get('create', [ChildCategoryController::class, 'create'])->name('childcategory.create');
        Route::post('store', [ChildCategoryController::class, 'store'])->name('childcategory.store');
        Route::get('edit/{id}', [ChildCategoryController::class, 'edit'])->name('childcategory.edit');
        Route::post('update/{id}', [ChildCategoryController::class, 'update'])->name('childcategory.update');
        Route::get('delete/{id}', [ChildCategoryController::class, 'delete'])->name('childcategory.delete');
    });
    Route::prefix('color')->group(function () {
        Route::get('index', [ColorController::class, 'index'])->name('color.index');
        Route::get('create', [ColorController::class, 'create'])->name('color.create');
        Route::post('store', [ColorController::class, 'store'])->name('color.store');
        Route::get('edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
        Route::post('update/{id}', [ColorController::class, 'update'])->name('color.update');
        Route::get('delete/{id}', [ColorController::class, 'delete'])->name('color.delete');
    });
    Route::prefix('size')->group(function () {
        Route::get('index', [SizeController::class, 'index'])->name('size.index');
        Route::get('create', [SizeController::class, 'create'])->name('size.create');
        Route::post('store', [SizeController::class, 'store'])->name('size.store');
        Route::get('edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
        Route::post('update/{id}', [SizeController::class, 'update'])->name('size.update');
        Route::get('delete/{id}', [SizeController::class, 'delete'])->name('size.delete');
    });
    Route::prefix('brand')->group(function () {
        Route::get('index', [BrandController::class, 'index'])->name('brand.index');
        Route::get('create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    });
    Route::prefix('banner-category')->group(function () {
        Route::get('index', [BannerCategoryController::class, 'index'])->name('banner-category.index');
        Route::get('create', [BannerCategoryController::class, 'create'])->name('banner-category.create');
        Route::post('store', [BannerCategoryController::class, 'store'])->name('banner-category.store');
        Route::get('edit/{id}', [BannerCategoryController::class, 'edit'])->name('banner-category.edit');
        Route::post('update/{id}', [BannerCategoryController::class, 'update'])->name('banner-category.update');
        Route::get('delete/{id}', [BannerCategoryController::class, 'delete'])->name('banner-category.delete');
    });
    Route::prefix('banner-ads')->group(function () {
        Route::get('index', [BannerAdsController::class, 'index'])->name('banner-ads.index');
        Route::get('create', [BannerAdsController::class, 'create'])->name('banner-ads.create');
        Route::post('store', [BannerAdsController::class, 'store'])->name('banner-ads.store');
        Route::get('edit/{id}', [BannerAdsController::class, 'edit'])->name('banner-ads.edit');
        Route::post('update/{id}', [BannerAdsController::class, 'update'])->name('banner-ads.update');
        Route::get('delete/{id}', [BannerAdsController::class, 'delete'])->name('banner-ads.delete');
    });
     Route::prefix('product')->group(function () {
        Route::get('index', [ProductController::class, 'index'])->name('product.index');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });
     Route::prefix('slider')->group(function () {
        Route::get('index', [SliderController::class, 'index'])->name('slider.index');
        Route::get('create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::get('delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    });

    // settings
    Route::prefix('settings')->group(function () {
        Route::get('index', [SettingController::class, 'index'])->name('settings.index');
        Route::post('update', [SettingController::class, 'update'])->name('settings.update');
    });
});
