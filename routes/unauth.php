<?php

// get permissions by roles

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/permissions-by-role/{id}',[RoleController::class,'permissionsByRole'])->name('roles.permissions');
Route::get('/item-details/{id}',[ItemController::class,'getDetails'])->name('items.details');
