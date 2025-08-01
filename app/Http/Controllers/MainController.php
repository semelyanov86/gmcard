<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response;
use Intervention\Image\Image;

class MainController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        $cardImages = [
            'images/webp/header-card-icon-1.webp',
            'images/webp/header-card-icon-2.webp',
            'images/webp/header-card-icon-3.webp',
        ];

        $cards = array_map(function ($image) {
            return [
                'og_image' => $image,
                'placeholder' => $this->getPlaceholder($image),
            ];
        }, $cardImages);



        return Inertia::render('Welcome', [
            'slides' => config('slides.item'),
            'reviews' => config('slides.reviews'),
            'cards' => $cards,
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'meta' => config('meta.business'),
        ]);
    }



    private function getPlaceholder(string $imagePath): string
    {
        $key = 'placeholder:' . $imagePath . filemtime(public_path($imagePath));
        return Cache::rememberForever($key, function () use ($imagePath) {
            $image = Image::read(public_path($imagePath));
            $placeholder = $image->scaleDown(400)->blur(10)->toJpeg(30);
            return 'data:image/jpeg;base64,' . base64_encode($placeholder);
        });
    }
}
