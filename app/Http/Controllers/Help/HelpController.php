<?php

declare(strict_types=1);

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use App\Models\HelpPost;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class HelpController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        $posts = HelpPost::all();

        return Inertia::render('help/Help', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'posts' => $posts,
        ]);
    }

    public function show(string $slug, GeneralSettings $settings): Response
    {
        $post = HelpPost::where('slug', $slug)->firstOrFail();
        $posts = HelpPost::all();

        return Inertia::render('help/Post', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'post' => $post,
            'posts' => $posts,
        ]);
    }

}
