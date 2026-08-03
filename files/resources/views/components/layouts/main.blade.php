@props(['title' => 'Home', 'description' => ''])
<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} · Pilot</title>
    <meta name="description" content="{{ $description }}">

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- Geist carries the whole site; Geist Mono sets the nav, labels, and the brief pane. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400..700&family=Geist+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Loads Tailwind and inlines resources/css/site.css — the palette, the light field, and the motion system -->
    @vite(['resources/css/site.css'])

    <!-- Flag JS support before first paint so scroll reveals never flash (see main.js) -->
    <script>document.documentElement.classList.add('js')</script>

    <!--
        GSAP drives the scroll work: the reveals, the mesh parallax, and the
        trace rows resolving inside the hero console. Everything degrades —
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
