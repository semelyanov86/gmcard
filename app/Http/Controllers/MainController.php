<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\City\GetCitiesAction;
use App\Actions\Menu\GetMenuItemsAction;
use App\Actions\Percent\GetDiscountFilterOptionsAction;
use App\Actions\Promo\GetApprovedPromosForHomeAction;
use App\Actions\Promo\GetPromoTypesAction;
use App\Enums\MenuType;
use App\Http\Requests\Promo\PromoFilterRequest;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    public function index(PromoFilterRequest $request, GeneralSettings $settings): Response
    {
        $filters = $request->filters();

        return Inertia::render('MainPage', [
            'categories' => GetCategoriesAction::run(),
            'navbarMenu' => GetMenuItemsAction::run(MenuType::NAVBAR),
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'promos' => GetApprovedPromosForHomeAction::run($filters),
            'filters' => $filters,
            'cities' => GetCitiesAction::run(),
            'discountFilterOptions' => GetDiscountFilterOptionsAction::run(),
            'promoTypes' => GetPromoTypesAction::run(),
        ]);
    }
}
