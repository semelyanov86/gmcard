<?php

declare(strict_types=1);

use App\Http\Controllers\Landing\BusinessLandingController;
use App\Http\Controllers\Landing\UserLandingController;
use App\Http\Controllers\Popup\FormSubmitController;
use App\Http\Controllers\Promo\CreatePromoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [BusinessLandingController::class, 'index'])->name('business.landing');
Route::get('/user-landing', [UserLandingController::class, 'index'])->name('user.landing');

Route::post('/submit-form', [FormSubmitController::class, 'submit']);

Route::get('dashboard', fn () => Inertia::render('Dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/promos/create', [CreatePromoController::class, 'index'])->name('promos.create');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
