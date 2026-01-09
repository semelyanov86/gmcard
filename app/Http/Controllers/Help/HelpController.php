<?php

declare(strict_types=1);

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class HelpController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        return Inertia::render('help/Help', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
        ]);
    }
}
