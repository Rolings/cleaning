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
    AdminController,
    HistoryController
};
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');

    Route::prefix('callbacks')->name('callbacks.')->group(function () {
        Route::get('/', [CallbackController::class, 'index'])->name('index');
        Route::get('/new', [CallbackController::class, 'index'])->name('index.new');
        Route::get('/read', [CallbackController::class, 'index'])->name('index.read');
        Route::get('show/{callback}', [CallbackController::class, 'show'])->name('show');
    });

    Route::resource('orders', OrderController::class);
    Route::resource('history', HistoryController::class);
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
