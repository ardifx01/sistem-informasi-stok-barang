<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Pb\DashboardController as PbDashboard;
use App\Http\Controllers\Pj\DashboardController as PjDashboard;
    
// ==== Auth ====
Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::redirect('/', '/login');

// ==== Admin ====
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/user', AdminDashboard::class)->name('staff.admin.dashboard');
});

// ==== Pembantu Bendahara (PB) ====
Route::middleware(['auth', 'role:Pengelola Barang'])->group(function () {
    Route::get('/pb', PbDashboard::class)->name('staff.pb.dashboard');
});

// ==== Penanggung Jawab (PJ) ====
Route::middleware(['auth', 'role:Penanggung Jawab'])->group(function () {
    Route::get('/pj', PjDashboard::class)->name('staff.pj.dashboard');
});
