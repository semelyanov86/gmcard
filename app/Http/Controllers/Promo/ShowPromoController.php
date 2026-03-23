<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\Menu\GetMenuItemsAction;
use App\Enums\MenuType;
use App\Enums\Promo\PromoModerationStatus;
use App\Http\Controllers\Controller;
use App\Models\Promo;
use App\Models\PromoType;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class ShowPromoController extends Controller
{
    public function index(Promo $promo, GeneralSettings $settings): Response
    {
        abort_if($promo->moderation_status !== PromoModerationStatus::APPROVED, 404);

        $resolvedPromoType = PromoType::where('name', $promo->type->value)->first();


        return Inertia::render('Promo/ShowPromo', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'navbarMenu' => GetMenuItemsAction::run(MenuType::NAVBAR),
            'categories' => GetCategoriesAction::run(),
            'promo' => [
                'img' => $promo->img,
                'description' => $promo->description,
                'title' => $promo->name,
                'promoTypeIcon' => $resolvedPromoType?->icon,
                'extraConditions' => $promo->extra_conditions,
            ],
        ]);
    }
}
