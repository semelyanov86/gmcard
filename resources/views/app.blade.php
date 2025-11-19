<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        document.documentElement.classList.remove('dark');
    </script>

    <style>
        html {
            background-color: oklch(1 0 0);
        }
    </style>

    <link rel="preload" href="/fonts/pt-sans-400.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/pt-sans-700.woff2" as="font" type="font/woff2" crossorigin>

    <title>{{ config('app.name') }}</title>

    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    @if(isset($canonical))
        <link rel="canonical" href="{{ $canonical }}">
    @endif

    @routes
    @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body class="font-sans antialiased">
@inertia

<script>
    addEventListener('load', () => setTimeout(() => {
        dispatchEvent(new Event('vite:prefetch'))
    }, 3000))
</script>
</body>
</html>
