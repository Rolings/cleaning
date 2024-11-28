<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DashboardController,ServiceController,ProjectController,SettingController};


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');
    Route::resource('services', ServiceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('settings', SettingController::class)->only('index');
});
