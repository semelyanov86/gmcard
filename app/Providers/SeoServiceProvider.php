<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class SeoServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->make('view')->composer('*', function ($view) {
            $view->with('canonical', $this->getCanonicalUrl(request()));
        });
    }

    private function getCanonicalUrl(Request $request): string
    {
        $routeName = $request->route()?->getName();
        
        $canonicalUrls = [
            'home' => config('meta.business.canonical'),
            'dashboard' => config('app.url') . '/dashboard',
        ];

        return $canonicalUrls[$routeName] ?? $request->url();
    }
}
