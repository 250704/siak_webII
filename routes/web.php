<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MataPelajaranController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin.auth')->group(function () {
    // Routes for Guru
    Route::resource('guru', GuruController::class);

    // Routes for Mata Pelajaran
    Route::resource('mata-pelajaran', MataPelajaranController::class);
});
