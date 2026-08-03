@props([
    'brand' => 'Pilot',
    'links' => [],
    'signInText' => 'Sign in',
    'signInLink' => '#',
    'secondaryText' => 'Talk to us',
    'secondaryLink' => 'mailto:hello@pilot.dev',
    'ctaText' => 'Get Pilot',
    'ctaLink' => '/pricing',
])
<!--
    The site-wide top bar. It rests transparent over each page's opening
    section; once you scroll, main.js sets data-scrolled and site.css fades in
    the glass background and hairline.

    Links come from the nav_links key in resources/data/site.json. Nest links
    under an item there and it becomes a dropdown: a soft-black panel that
    opens on hover with a short intent delay, toggles on click for touch, and
    closes on Escape or an outside click. All of that lives in public/js/main.js.
-->
<header id="header" class="fixed inset-x-0 top-0 z-50">
    <div class="mx-auto flex h-16 w-full max-w-7xl items-center gap-8 px-6">

        <!-- href="/" always points to your site's root, in preview and when published -->
        <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 text-ink">
            <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-ink" aria-hidden="true">
                <path d="M12 1.9 21.4 21.4 12 16.9 2.6 21.4Z"/>
            </svg>
            <span class="font-display text-[17px] font-semibold tracking-[-0.02em]">{{ $brand }}</span>
        </a>

        <nav class="max-lg:hidden" aria-label="Main">
            <ul role="list" class="flex items-center gap-1 text-[15px] text-lede">
                @foreach ($links as $link)
                @if ($link->children ?? false)

                <li class="relative" data-dropdown>
                    <button
                        type="button"
                        data-dropdown-trigger
                        aria-expanded="false"
                        class="flex cursor-pointer items-center gap-1.5 rounded-lg px-3 py-2 transition-colors duration-200 hover:text-ink">
                        {{ $link->text }}
                        <svg viewBox="0 0 16 16" class="dropdown-caret size-3.5 fill-current opacity-50" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    {{-- Centred under the trigger. The open/close motion animates translate, so translate utilities can't be used for positioning here. --}}
                    <div data-dropdown-panel class="absolute top-full left-1/2 -ml-[9rem] w-[18rem] pt-3">
                        <div class="flex flex-col gap-0.5 rounded-2xl bg-shade p-2 shadow-2xl shadow-black/25">
                            @foreach ($link->children as $child)
                            <a href="{{ $child->url }}" class="rounded-xl px-4 py-2.5 text-[15px] text-shade-ink transition-colors duration-150 hover:bg-shade-raised">{{ $child->text }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @else
                <li>
                    <a href="{{ $link->url }}" class="rounded-lg px-3 py-2 transition-colors duration-200 hover:text-ink aria-[current]:text-ink">{{ $link->text }}</a>
                </li>
                @endif
                @endforeach
            </ul>
        </nav>

        <div class="ml-auto flex items-center gap-2 max-lg:hidden">
            <a href="{{ $secondaryLink }}" class="rounded-lg px-3 py-2 text-[15px] text-lede transition-colors duration-200 hover:text-ink">{{ $secondaryText }}</a>
            <a href="{{ $signInLink }}" class="rounded-full border border-line-strong px-4 py-2 text-[15px] text-ink transition-colors duration-200 hover:bg-raised">{{ $signInText }}</a>
            <a href="{{ $ctaLink }}" class="rounded-full bg-ink px-4 py-2 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85">{{ $ctaText }}</a>
        </div>

        <!-- Mobile: hamburger. The 44px box keeps the tap target comfortable. -->
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

    <!-- The mobile sheet. Dropdown parents flatten into their children here. -->
    <div data-mobile-panel class="border-b border-line bg-canvas/95 backdrop-blur-xl lg:hidden">
        <nav class="mx-auto w-full max-w-7xl px-6 py-4" aria-label="Mobile">
            <ul role="list" class="flex flex-col text-base">
                @foreach ($links as $link)
                @if ($link->children ?? false)
                <li class="mt-3 px-3 font-mono text-[11px] tracking-widest text-faint uppercase">{{ $link->text }}</li>
                @foreach ($link->children as $child)
                <li><a href="{{ $child->url }}" class="flex rounded-lg px-3 py-3 text-ink transition-colors duration-200 hover:bg-raised">{{ $child->text }}</a></li>
                @endforeach
                @else
                <li><a href="{{ $link->url }}" class="flex rounded-lg px-3 py-3 text-ink transition-colors duration-200 hover:bg-raised">{{ $link->text }}</a></li>
                @endif
                @endforeach
            </ul>
            <div class="mt-4 flex items-center gap-3 border-t border-line pt-4">
                <a href="{{ $signInLink }}" class="flex-1 rounded-full border border-line-strong px-4 py-3 text-center text-sm text-ink transition-colors duration-200 hover:bg-raised">{{ $signInText }}</a>
                <a href="{{ $ctaLink }}" class="flex-1 rounded-full bg-ink px-4 py-3 text-center text-sm font-medium text-canvas transition-opacity duration-200 hover:opacity-85">{{ $ctaText }}</a>
            </div>
        </nav>
    </div>
</header>
