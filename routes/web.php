<?php

declare(strict_types=1);

use App\Http\Controllers\Landing\BusinessLandingController;
use App\Http\Controllers\Landing\UserLandingController;
use App\Http\Controllers\MainPage\MainPageController;
use App\Http\Controllers\Popup\FormSubmitController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Promo\CreatePromoController;
use App\Http\Controllers\Promo\PromoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [MainPageController::class, 'index'])->name('main.page');
Route::get('/business-landing', [BusinessLandingController::class, 'index'])->name('business.landing');
Route::get('/user-landing', [UserLandingController::class, 'index'])->name('user.landing');

Route::post('/submit-form', [FormSubmitController::class, 'submit']);

Route::get('dashboard', fn () => Inertia::render('Dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::get('/promos/create', [CreatePromoController::class, 'index'])->name('promos.create');
    Route::post('/promos', [CreatePromoController::class, 'store'])->name('promos.store');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::delete('/promos/{promo}', [PromoController::class, 'destroy'])->name('promos.destroy');
    Route::get('/promos/{promo}/edit', [PromoController::class, 'edit'])->name('promos.edit');
    Route::put('/promos/{promo}', [PromoController::class, 'update'])->name('promos.update');
    Route::post('/promos/{promo}/complete', [PromoController::class, 'complete'])->name('promos.complete');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
