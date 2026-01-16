<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class ShowPromoController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        return Inertia::render('Promo/ShowPromo', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
        ]);
    }
}

