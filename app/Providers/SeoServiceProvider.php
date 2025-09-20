<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class SeoServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->make('view')->composer('*', function ($view): void {
            $view->with('canonical', $this->getCanonicalUrl(request()));
        });
    }

    private function getCanonicalUrl(Request $request): string
    {
        $routeName = $request->route()?->getName();

        $appUrlValue = config('app.url');
        $appUrl = is_string($appUrlValue) ? $appUrlValue : '';

        $homeCanonicalValue = config('meta.business.canonical', '');
        $homeCanonical = is_string($homeCanonicalValue) ? $homeCanonicalValue : '';

        $canonicalUrls = [
            'home' => $homeCanonical,
            'dashboard' => $appUrl . '/dashboard',
        ];

        $candidate = $canonicalUrls[$routeName] ?? $request->url();

        return $candidate;
    }
}
