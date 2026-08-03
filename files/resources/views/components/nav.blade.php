@props([
    'brand' => 'Pilot',
    'links' => [],
    'signInText' => 'Sign in',
    'signInLink' => '#',
    'ctaText' => 'Start free',
    'ctaLink' => '/pricing',
])
<!--
    The site-wide top bar. It rests transparent over each page's opening
    section; once you scroll, main.js sets data-scrolled and site.css fades in
    the glass background and hairline.

    The links come from the nav_links key in resources/data/site.json — the
    layout passes them in as the bound links attribute. The bar is deliberately
    flat: no dropdowns, three destinations, one button.
-->
<header id="header" class="fixed inset-x-0 top-0 z-50">
    <div class="mx-auto flex h-16 w-full max-w-6xl items-center gap-6 px-6">

        <!-- href="/" always points to your site's root, in preview and when published -->
        <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 text-ink">
            <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-accent" aria-hidden="true">
                <path d="M12 1.9 21.4 21.4 12 16.9 2.6 21.4Z"/>
            </svg>
            <span class="font-display text-[15px] font-semibold tracking-[-0.01em]">{{ $brand }}</span>
        </a>

        <nav class="ml-auto max-lg:hidden" aria-label="Main">
            <ul role="list" class="flex items-center gap-0.5 text-muted">
                @foreach ($links as $link)
                <li>
                    <a href="{{ $link->url }}" class="rounded-lg px-3 py-2 font-mono text-[12px] tracking-widest uppercase transition-colors duration-200 hover:text-ink aria-[current]:text-ink">{{ $link->text }}</a>
                </li>
                @endforeach
            </ul>
        </nav>

        <!-- The separator between the links and the auth actions -->
        <span class="h-4 w-px bg-line max-lg:hidden" aria-hidden="true"></span>

        <div class="flex items-center gap-2 max-lg:hidden">
            <a href="{{ $signInLink }}" class="rounded-full px-3 py-2 font-mono text-[12px] tracking-widest text-muted uppercase transition-colors duration-200 hover:text-ink">{{ $signInText }}</a>
            <a href="{{ $ctaLink }}" class="rounded-full bg-ink px-4 py-2 font-mono text-[12px] font-medium tracking-widest text-canvas uppercase transition-opacity duration-200 hover:opacity-90">{{ $ctaText }}</a>
        </div>

        <!-- Mobile: hamburger. The 40px box keeps the tap target comfortable. -->
        <button
            type="button"
            data-mobile-toggle
            aria-expanded="false"
            aria-label="Toggle menu"
            class="ml-auto flex size-11 cursor-pointer items-center justify-center rounded-lg text-ink transition-colors duration-200 hover:bg-raised lg:hidden">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-5 stroke-current [.menu-open_&]:hidden" aria-hidden="true">
                <path stroke-linecap="round" d="M3.75 7h16.5M3.75 12h16.5M3.75 17h16.5"/>
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="hidden size-5 stroke-current [.menu-open_&]:block" aria-hidden="true">
                <path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/>
            </svg>
        </button>

    </div>

    <!-- The mobile sheet -->
    <div data-mobile-panel class="border-b border-line bg-canvas/90 backdrop-blur-xl lg:hidden">
        <nav class="mx-auto w-full max-w-6xl px-6 py-4" aria-label="Mobile">
            <ul role="list" class="flex flex-col text-base">
                @foreach ($links as $link)
                <li><a href="{{ $link->url }}" class="flex rounded-lg px-3 py-3 text-ink transition-colors duration-200 hover:bg-raised">{{ $link->text }}</a></li>
                @endforeach
            </ul>
            <div class="mt-4 flex items-center gap-3 border-t border-line pt-4">
                <a href="{{ $signInLink }}" class="flex-1 rounded-full border border-line px-4 py-3 text-center text-sm text-ink transition-colors duration-200 hover:bg-raised">{{ $signInText }}</a>
                <a href="{{ $ctaLink }}" class="flex-1 rounded-full bg-ink px-4 py-3 text-center text-sm font-medium text-canvas transition-opacity duration-200 hover:opacity-90">{{ $ctaText }}</a>
            </div>
        </nav>
    </div>
</header>
