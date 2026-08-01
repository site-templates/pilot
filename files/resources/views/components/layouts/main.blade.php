@props(['title' => 'Home', 'description' => ''])
<!doctype html>
<html lang="en" class="scroll-smooth {{ $site->theme->appearance_class ?? 'dark' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} · Pilot</title>
    <meta name="description" content="{{ $description }}">

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- Sora carries the headlines, Inter the body copy. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ $site->theme->fonts_url ?? 'https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap' }}" rel="stylesheet">

    <!-- Loads Tailwind and inlines the theme tokens plus resources/css/site.css (mesh + motion) -->
    @vite(['resources/css/theme.css', 'resources/css/site.css'])

    <!-- Flag JS support before first paint so scroll reveals never flash (see main.js) -->
    <script>document.documentElement.classList.add('js')</script>

    <!--
        GSAP drives the scroll work: the reveals, the mesh parallax, and the
        proposal rows resolving inside the hero window. Everything degrades —
        if these never load, main.js reveals the page immediately instead.
    -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
    <script src="/js/main.js" defer></script>
</head>
<body class="min-h-dvh bg-canvas font-sans text-ink antialiased">

    <!-- The site-wide nav. Its links live in resources/data/site.json (nav_links); the markup is components/nav.blade.php. -->
    <x-nav :links="$site->nav_links"/>

    <!-- The fixed header floats over this; each page's opening section carries its own top padding. -->
    <main class="relative">
        {{ $slot }}
    </main>

    <x-footer :columns="$site->footer_links" :social="$site->social_links"/>

</body>
</html>
