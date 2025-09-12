<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    public function handle(): void
    {
        $this->info('Generating sitemap.xml...');

        $urls = $this->getUrls();
        $xml = $this->generateXml($urls);

        $path = public_path('sitemap.xml');
        file_put_contents($path, $xml);

        $this->info("Sitemap generated successfully at: {$path}");
        $this->info('Total URLs: ' . count($urls));
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function getUrls(): array
    {
        $baseUrlValue = config('app.url');
        $baseUrl = is_string($baseUrlValue) ? $baseUrlValue : '';
        $today = now()->format('Y-m-d');
        /** @var array<int, array<string, string>> $urls */
        $urls = [];

        $routes = Route::getRoutes();

        /** @var \Illuminate\Routing\Route $route */
        foreach ($routes->getRoutes() as $route) {
            if (! in_array('GET', $route->methods(), true)) {
                continue;
            }

            $uri = (string) $route->uri();

            if (str_contains($uri, '{')) {
                continue;
            }

            if (str_starts_with($uri, 'api/')) {
                continue;
            }

            if (in_array($uri, ['up', 'storage'], true)) {
                continue;
            }

            $url = $baseUrl . '/' . mb_ltrim($uri, '/');
            $priority = $this->getPriority($uri);
            $changefreq = $this->getChangeFreq($uri);

            $urls[] = [
                'loc' => $url,
                'lastmod' => $today,
                'changefreq' => $changefreq,
                'priority' => $priority,
            ];
        }

        return $urls;
    }

    private function getPriority(string $uri): string
    {
        if ($uri === '' || $uri === '/') {
            return '1.0';
        }

        return match ($uri) {
            'dashboard' => '0.8',
            'settings' => '0.6',
            default => '0.5'
        };
    }

    private function getChangeFreq(string $uri): string
    {
        if ($uri === '' || $uri === '/') {
            return 'daily';
        }

        return match ($uri) {
            'dashboard' => 'weekly',
            default => 'monthly'
        };
    }

    /**
     * @param  array<int, array<string, string>>  $urls
     */
    private function generateXml(array $urls): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $url) {
            $xml .= "    <url>\n";
            $xml .= "        <loc>{$url['loc']}</loc>\n";
            $xml .= "        <lastmod>{$url['lastmod']}</lastmod>\n";
            $xml .= "        <changefreq>{$url['changefreq']}</changefreq>\n";
            $xml .= "        <priority>{$url['priority']}</priority>\n";
            $xml .= "    </url>\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }
}
