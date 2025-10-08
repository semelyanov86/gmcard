<?php

declare(strict_types=1);

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class BusinessLandingController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        $slides = config('slides.item');
        $reviews = config('slides.reviews');
        /** @var array<string, mixed> $meta */
        $meta = config('meta.business');

        return Inertia::render('landing/BusinessLanding', [
            'slides' => $slides,
            'reviews' => $reviews,
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'meta' => $meta,
        ]);
    }
}
