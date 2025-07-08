<?php

declare(strict_types=1);

use App\Http\Controllers\Sliders\SliderController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [SliderController::class, 'index'])->name('home');

Route::get('dashboard', fn () => Inertia::render('Dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
