<?php

declare(strict_types=1);

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class UserLandingController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {

        return Inertia::render('landing/UserLanding');
    }
}
