<?php

declare(strict_types=1);

namespace App\Http\Controllers\Profile;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\Menu\GetMenuItemsAction;
use App\Actions\Promo\GetPendingPromosAction;
use App\Actions\Promo\GetUserPromosAction;
use App\Enums\MenuType;
use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        $user = auth()->user();
        assert($user !== null);

        $promosData = GetUserPromosAction::run($user);

        $moderationPromos = [];
        if ($user->can('moderate promos')) {
            $moderationPromos = GetPendingPromosAction::run();
        }

        return Inertia::render('Profile/Profile', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'categories' => GetCategoriesAction::run(),
            'navbarMenu' => GetMenuItemsAction::run(MenuType::NAVBAR),
            'user' => $user,
            'activePromos' => $promosData['activePromos'],
            'completedPromos' => $promosData['completedPromos'],
            'draftPromos' => $promosData['draftPromos'],
            'rejectedPromos' => $promosData['rejectedPromos'],
            'moderationPromos' => $moderationPromos,
        ]);
    }
}
