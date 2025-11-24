<?php

declare(strict_types=1);

namespace App\Http\Controllers\MainPage;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\City\GetCitiesAction;
use App\Actions\Menu\GetMenuItemsAction;
use App\Enums\MenuType;
use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class MainPageController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        return Inertia::render('MainPage/MainPage', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'categories' => GetCategoriesAction::run(),
            'cities' => GetCitiesAction::run(),
            'discountFilters' => config('promo.discount_filters'),
            'navbarMenu' => GetMenuItemsAction::run(MenuType::NAVBAR),
            'sidebarMenu' => GetMenuItemsAction::run(MenuType::SIDEBAR),
        ]);
    }
}
