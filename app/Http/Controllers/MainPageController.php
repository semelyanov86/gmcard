<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\Menu\GetMenuItemsAction;
use App\Enums\MenuType;
use Inertia\Inertia;
use Inertia\Response;

class MainPageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('MainPage', [
            'categories' => GetCategoriesAction::run(),
            'navbarMenu' => GetMenuItemsAction::run(MenuType::NAVBAR),
        ]);
    }
}

