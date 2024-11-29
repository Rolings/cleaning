<?php

use App\Http\Controllers\Admin\{
    CallbackController,
    DashboardController,
    OrderController,
    ProjectController,
    QuestionController,
    ServiceController,
    SettingController,
    ReviewController,
    AdminController
};
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');
    Route::resource('callbacks', CallbackController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('admins', AdminController::class);
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/update', [SettingController::class, 'update'])->name('update');
    });
});
