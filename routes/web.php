<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\DashboardController;
use App\Http\Controllers\Administration\CategoryController;
use App\Http\Controllers\Administration\ProductController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('admin/login',[DashboardController::class, 'loginAdmin'])->name('admin.login');
Route::post('admin/login',[DashboardController::class, 'login']);


Route::group([
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'is_admin'],
    'prefix' => LaravelLocalization::setLocale(),
], function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/categories', CategoryController::class)->names('admin.categories');
    Route::get('/admin/products/filter', [ProductController::class ,'filter'])->name('admin.products.filter');
    Route::delete('/admin/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('admin.products.bulkDelete');
    Route::resource('/admin/products', ProductController::class)->names('admin.products');
    
    // Logout route
    Route::post('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');
});

