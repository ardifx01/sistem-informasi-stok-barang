<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

// Halaman login (GET)
Route::view('/login', 'auth.login')->name('login');

// Grup admin: harus login + role Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', \App\Http\Controllers\Admin\DashboardController::class)
        ->name('admin.dashboard');
});
