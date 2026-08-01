@props([
    'items',
])
<!--
    The guides listing. The first entry in resources/data/collections/guides.json
    renders as a wide feature card; the rest fall into a hairlined list below,
    so the page has a clear lead article instead of a uniform grid.

    Each row links to its own page — /guides/{slug} — served by the dynamic
    page at pages/guides/[guides.slug].blade.php.
-->
<section class="relative py-20 sm:py-24">
    <div class="mx-auto w-full max-w-6xl px-6">

        @foreach ($items as $guide)
        @if ($loop->first)

        <!-- The lead guide -->
        <a href="{{ $guide->link }}" class="group spotlight-card block overflow-hidden rounded-2xl border border-line bg-panel/70 transition-colors duration-300 hover:border-accent-line" data-reveal>
            <div class="grid lg:grid-cols-[1.15fr_1fr]">
                <div class="relative z-10 flex flex-col justify-between p-8 sm:p-10">
                    <div>
                        <span class="flex flex-wrap items-center gap-3 font-mono text-[11px] tracking-widest text-accent uppercase">
                            {{ $guide->category }}
                            <span class="text-faint">{{ $guide->readTime }}</span>
                        </span>
                        <h2 class="mt-5 max-w-[18ch] font-display text-3xl leading-[1.12] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-4xl">{{ $guide->title }}</h2>
                        <p class="mt-5 max-w-[52ch] text-base/7 text-muted">{{ $guide->description }}</p>
                    </div>

                    <span class="mt-10 flex items-center gap-3 text-[13px]">
                        <img src="{{ $guide->authorImage }}" alt="" class="size-8 rounded-full object-cover" width="32" height="32" loading="lazy">
                        <span class="font-medium text-ink">{{ $guide->author }}</span>
                        <span class="text-faint">{{ $guide->date }}</span>
                    </span>
                </div>

                <!-- The pull quote stands in for cover art — no image to keep sharp -->
                <div class="relative flex items-center border-line bg-raised/40 p-8 max-lg:border-t sm:p-10 lg:border-l">
                    <p class="font-display text-xl leading-[1.4] font-medium tracking-[-0.02em] text-balance text-ink sm:text-2xl">{{ $guide->pullQuote }}</p>
                </div>
            </div>
        </a>

        <div class="mt-14 border-t border-line sm:mt-16">
        @else

        <a href="{{ $guide->link }}" class="group grid gap-4 border-b border-line py-8 transition-colors duration-200 lg:grid-cols-[0.28fr_1fr_auto] lg:items-baseline lg:gap-10" data-reveal>
            <span class="font-mono text-[11px] tracking-widest text-faint uppercase">{{ $guide->category }}</span>

            <span>
                <span class="block max-w-[42ch] font-display text-xl font-semibold tracking-[-0.02em] text-ink transition-colors duration-200 group-hover:text-accent">{{ $guide->title }}</span>
                <span class="mt-2 block max-w-[62ch] text-[15px]/7 text-muted">{{ $guide->description }}</span>
            </span>

            <span class="flex items-center gap-4 text-[12px] text-faint lg:justify-end">
                <span>{{ $guide->readTime }}</span>
                <svg viewBox="0 0 16 16" class="size-3.5 shrink-0 fill-faint transition-all duration-200 group-hover:translate-x-0.5 group-hover:fill-accent" aria-hidden="true">
                    <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                </svg>
            </span>
        </a>
        @endif
        @endforeach
        </div>

    </div>
</section>
