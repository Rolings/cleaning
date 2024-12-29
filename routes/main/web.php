<?php

use App\Http\Controllers\Main\{
    AboutController,
    ContactController,
    CookiesController,
    HomeController,
    PrivacyPolicyController,
    ProjectController,
    ServiceController,
    TermsConditionController,
    QuestionController,
    ReviewController,
    CheckoutController
};
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MetaDataMiddleware;

Route::middleware(MetaDataMiddleware::class)->group(function () {
    Route::resource('/', HomeController::class)->only('index');
    Route::resource('about', AboutController::class)->only('index');
    Route::resource('contact', ContactController::class)->only(['index', 'store']);
    Route::resource('projects', ProjectController::class)->only('index');
    Route::resource('services', ServiceController::class)->only(['index', 'show']);
    Route::resource('frequently-questions', QuestionController::class)->only(['index']);
    Route::resource('reviews', ReviewController::class)->only(['index']);

    Route::resource('privacy-policy', PrivacyPolicyController::class)->only(['index']);
    Route::resource('terms-condition', TermsConditionController::class)->only(['index']);
    Route::resource('cookies', CookiesController::class)->only(['index']);

    Route::match(['get', 'post'], 'checkout', [CheckoutController::class, 'index'])->name('checkout');
});
