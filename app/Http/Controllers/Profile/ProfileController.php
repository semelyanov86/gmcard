<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index(GeneralSettings $settings)
    {
        return Inertia::render('Profile/Profile', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
        ]);
    }
}
