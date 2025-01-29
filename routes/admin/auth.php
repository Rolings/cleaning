<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::prefix('admin')->name('admin.')->middleware('web')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/authorization', [AuthController::class, 'store'])->name('authorization');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
