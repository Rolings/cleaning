<?php

use App\Http\Controllers\Admin\{
    CallbackController,
    DashboardController,
    OrderController,
    ProjectController,
    QuestionController,
    ServiceController,
    AdditionalServiceController,
    OfferController,
    SettingController,
    ReviewController,
    AdminController,
    HistoryController,
    ClientController,
    EmployeesController,
    PageController,
    TermsConditionController,
    RoomTypeController,
    PriceController
};
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::prefix('admin')->name('admin.')->middleware(['web', AdminMiddleware::class])->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');

    Route::prefix('callbacks')->name('callbacks.')->group(function () {
        Route::get('/', [CallbackController::class, 'index'])->name('index');
        Route::get('/new', [CallbackController::class, 'index'])->name('index.new');
        Route::get('/read', [CallbackController::class, 'index'])->name('index.read');
        Route::get('show/{callback}', [CallbackController::class, 'show'])->name('show');
        Route::delete('destroy/{callback}/{option?}', [CallbackController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/new', [OrderController::class, 'index'])->name('index.new');
        Route::get('/read', [OrderController::class, 'index'])->name('index.read');
        Route::get('create', [OrderController::class, 'create'])->name('create');
        Route::post('store', [OrderController::class, 'store'])->name('store');
        Route::get('show/{order}', [OrderController::class, 'show'])->name('show');
        Route::get('edit/{order}', [OrderController::class, 'edit'])->name('edit');
        Route::put('update/{order}', [OrderController::class, 'update'])->name('update');
        Route::delete('destroy/{order}/{option?}', [OrderController::class, 'destroy'])->name('destroy');
    });

    Route::resource('admins', AdminController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('employees', EmployeesController::class);

    //  Route::resource('orders', OrderController::class);
    Route::resource('offers', OfferController::class);
    Route::resource('room-types', RoomTypeController::class);
    Route::resource('prices', PriceController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('services', ServiceController::class);

    Route::prefix('additional-services')->name('additional-services.')->group(function () {
        Route::resource('/', AdditionalServiceController::class)->parameter('', 'additionalService');
        Route::get('/destroy-icon/{additionalService}', [AdditionalServiceController::class, 'destroyIcon'])->name('destroy-icon');
    });

    Route::resource('projects', ProjectController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('reviews', ReviewController::class);
    Route::get('reviews/{review}/approve', [ReviewController::class, 'approve'])->name('reviews.approve');
    Route::resource('pages', PageController::class);

    Route::prefix('condition')->name('condition.')->group(function () {
        Route::get('/terms-condition', [TermsConditionController::class, 'edit'])->name('terms-condition.edit');
        Route::get('/privacy-policy', [TermsConditionController::class, 'edit'])->name('privacy-policy.edit');
        Route::get('/cookies', [TermsConditionController::class, 'edit'])->name('cookies.edit');
        Route::put('/update/{termCondition}', [TermsConditionController::class, 'update'])->name('update');
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/update', [SettingController::class, 'update'])->name('update');
    });
});
