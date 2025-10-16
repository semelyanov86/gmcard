<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\City\GetCitiesAction;
use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class CreatePromoController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        $user = auth()->user();

        return Inertia::render('Promo/CreatePromo', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'categories' => GetCategoriesAction::run(),
            'cities' => GetCitiesAction::run(),
            'userBalance' => $user->balance ?? 0,
        ]);
    }
}
