<?php

declare(strict_types=1);

namespace App\Http\Controllers\Category;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\Menu\GetMenuItemsAction;
use App\Actions\Promo\GetApprovedPromosByCategoryAction;
use App\Enums\MenuType;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class CategoryPromosController extends Controller
{
    public function index(Category $category, GeneralSettings $settings): Response
    {
        return Inertia::render('Category/CategoryPromosPage', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'navbarMenu' => GetMenuItemsAction::run(MenuType::NAVBAR),
            'categories' => GetCategoriesAction::run(),
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
            ],
            'promos' => GetApprovedPromosByCategoryAction::run($category),
        ]);
    }
}
