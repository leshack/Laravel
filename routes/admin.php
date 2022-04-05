<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
/*
Route::get('admin',  [AdminAuthController::class,'getLogin'])->name('admin.login');
Route::post('admin', [AdminAuthController::class,'postLogin'])->name('admin.loginpost');
Route::get('admin/logout', [AdminAuthController::class,'logout'])->name('adminLogout');

Route::group(['prefix' => '/admin','middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

*/
