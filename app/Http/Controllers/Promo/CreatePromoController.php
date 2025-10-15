<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
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
            'categories' => Category::with('children.children.children')
                ->whereNull('parent_id')
                ->orderBy('name')
                ->get(),
            'cities' => City::orderBy('name')->get(['id', 'name']),
            'userBalance' => $user->balance ?? 0,
        ]);
    }
}
