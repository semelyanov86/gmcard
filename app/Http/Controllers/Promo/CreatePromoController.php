<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\City\GetCitiesAction;
use App\Actions\Promo\CreatePromoAction;
use App\Actions\Promo\GetPromoTypesAction;
use App\Data\CreatePromoData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Promo\CreatePromoRequest;
use App\Settings\GeneralSettings;
use Illuminate\Http\RedirectResponse;
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
            'promoTypes' => GetPromoTypesAction::run(),
            'discountFilters' => config('promo.discount_filters'),
            'defaultDescription' => config('promo.default_description'),
            'weekdays' => config('promo.weekdays'),
            'socialNetworks' => config('promo.social_networks'),
            'userBalance' => $user->balance ?? 0,
        ]);
    }

    public function store(CreatePromoRequest $request): RedirectResponse
    {
        $dto = CreatePromoData::from($request->validated());

        $promo = CreatePromoAction::run($dto);

        return redirect()
            ->route('promos.create');
    }
}
