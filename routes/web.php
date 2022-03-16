<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/admin/dashbord', [AdminController::class, 'dashbord']);
Route::get('admin/login',[AdminController::class, 'index']);

Route::get('/', [HomeController::class, 'index']);
Route::post('admin-dashbord', [AdminController::class, 'showDashbord']);
Route::get('admin-logout', [AdminController::class, 'logout']);
