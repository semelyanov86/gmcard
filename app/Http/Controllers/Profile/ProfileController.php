<?php

declare(strict_types=1);

namespace App\Http\Controllers\Profile;

use App\Actions\Menu\GetMenuItemsAction;
use App\Enums\MenuType;
use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index(GeneralSettings $settings)
    {
        $user = auth()->user();

        $activePromos = $user ? $user->activePromos()->with(['categories', 'cities'])->get() : collect();

        return Inertia::render('Profile/Profile', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'navbarMenu' => GetMenuItemsAction::run(MenuType::NAVBAR),
            'user' => $user,
            'activePromos' => $activePromos,
        ]);
    }
}
