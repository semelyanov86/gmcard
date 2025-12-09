<?php

declare(strict_types=1);

use App\Http\Controllers\Landing\BusinessLandingController;
use App\Http\Controllers\Landing\UserLandingController;
use App\Http\Controllers\Popup\FormSubmitController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Promo\CreatePromoController;
use App\Http\Controllers\Tariff\TariffPlansController;
use App\Http\Controllers\Promo\ModerationController;
use App\Http\Controllers\Promo\PromoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [BusinessLandingController::class, 'index'])->name('business.landing');
Route::get('/user-landing', [UserLandingController::class, 'index'])->name('user.landing');

Route::prefix('tariff')->group(function () {
    Route::get('/plans', [TariffPlansController::class, 'index'])->name('tarif.plans');
    Route::get('/plans/info-modal', [TariffPlansController::class, 'infoModal'])->name('tarif.plans.info-modal');
});

Route::post('/submit-form', [FormSubmitController::class, 'submit']);

Route::get('dashboard', fn () => Inertia::render('Dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::prefix('promos')->group(function (): void {
        Route::get('/create', [CreatePromoController::class, 'index'])->name('promos.create');
        Route::get('/photo-help', [CreatePromoController::class, 'photoHelp'])->name('promos.photo-help');
        Route::post('/', [CreatePromoController::class, 'store'])->name('promos.store');
        Route::delete('/{promo}', [PromoController::class, 'destroy'])->name('promos.destroy');
        Route::get('/{promo}/edit', [PromoController::class, 'edit'])->name('promos.edit');
        Route::put('/{promo}', [PromoController::class, 'update'])->name('promos.update');
        Route::post('/{promo}/complete', [PromoController::class, 'complete'])->name('promos.complete');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('profile');

    Route::middleware('can:moderate promos')->group(function (): void {
        Route::get('/moderation/promos/{promo}/reject-form', [ModerationController::class, 'rejectForm'])->name('moderation.promos.reject-form');
        Route::post('/moderation/promos/{promo}/reject', [ModerationController::class, 'reject'])->name('moderation.promos.reject');
        Route::post('/moderation/promos/{promo}/approve', [ModerationController::class, 'approve'])->name('moderation.promos.approve');
    });
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
