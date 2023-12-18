<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','welcome')->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'verified'
])->group(function () {

    //Admin Dashboard

    Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('dashboard.index');

    //Report

    Route::get('/report',[ReportController::class,'index'])->name('report.index');

    // Categories

    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{slug}','edit')->name('edit');
        Route::post('/update/{category}','update')->name('update');
        Route::get('/delete/{slug}','destroy')->name('delete');
    });

    // brands

    Route::controller(BrandController::class)->prefix('types')->name('types.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{slug}','edit')->name('edit');
        Route::post('/update/{brand}','update')->name('update');
        Route::get('/delete/{slug}','destroy')->name('delete');
    });

    // departments

    Route::controller(DepartmentController::class)->prefix('departments')->name('departments.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{slug}','edit')->name('edit');
        Route::post('/update/{department}','update')->name('update');
        Route::get('/delete/{slug}','destroy')->name('delete');
    });

    // users

    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{slug}','edit')->name('edit');
        Route::post('/update/{user}','update')->name('update');
        Route::get('/delete/{slug}','destroy')->name('delete');
    });

    // roles

    Route::controller(RoleController::class)->prefix('roles')->name('roles.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/update/{role}','update')->name('update');
        Route::get('/delete/{id}','destroy')->name('delete');
    });

    // permissions

    Route::controller(PermissionController::class)->prefix('permissions')->name('permissions.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/update/{permission}','update')->name('update');
        Route::get('/delete/{id}','destroy')->name('delete');
    });

    // items

    Route::controller(ItemController::class)->prefix('items')->name('items.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/update/{item}','update')->name('update');
        Route::get('/delete/{id}','destroy')->name('delete');
    });

    // report dashboard
    Route::get('/report-items',[UserDashboardController::class,'index'])->name('user-report.index');

});
