<?php

use App\Http\Controllers\Main\{AboutController, ContactController, CookiesController, HomeController, PrivacyPolicyController, ProjectController, ServiceController, TermsConditionController};
use Illuminate\Support\Facades\Route;

Route::resource('/',HomeController::class)->only('index');
Route::resource('about', AboutController::class)->only('index');
Route::resource('contact', ContactController::class)->only('index');
Route::resource('projects', ProjectController::class)->only('index');
Route::resource('services', ServiceController::class)->only('index');

Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy.policy');
Route::get('/terms-condition', [TermsConditionController::class, 'index'])->name('terms.condition');
Route::get('/cookies', [CookiesController::class, 'index'])->name('cookies');

