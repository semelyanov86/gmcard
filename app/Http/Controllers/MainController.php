<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        $slides = config('slides.item');
        $reviews = config('slides.reviews');
        /** @var array<string, mixed> $meta */
        $meta = config('meta.business');

        return Inertia::render('Welcome', [
            'slides' => $slides,
            'reviews' => $reviews,
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'meta' => $meta,
        ])->with([
            'canonical' => $meta['canonical'],
        ]);
    }
}
