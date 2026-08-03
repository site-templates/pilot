@props([
    'eyebrow' => 'Evidence',
    'heading' => 'Engineers who put agents in front of customers',
    'items',
])
<!--
    Quotes in a masonry flow rather than a row of matching cards: the first
    quote in resources/data/collections/testimonials.json is set large, the
    rest fall in around it at their natural heights. A column flow means the
    block never leaves a hole no matter how many quotes you add — reorder the
    collection to promote a different one into the featured slot.
-->
<section class="relative py-20 sm:py-32">
    <div class="mx-auto w-full max-w-6xl px-6">

        <div data-reveal>
            <p class="font-mono text-[11px] tracking-widest text-accent uppercase">{{ $eyebrow }}</p>
            <h2 class="mt-5 max-w-[18ch] font-display text-4xl leading-[1.1] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-5xl">{{ $heading }}</h2>
        </div>

        <div class="mt-14 gap-3 sm:mt-16 lg:columns-2">
            @foreach ($items as $item)
            @if ($loop->first)

            <!-- The featured quote — set larger, and first in the flow -->
            <figure class="spotlight-card mb-3 flex break-inside-avoid flex-col justify-between rounded-2xl border border-line bg-panel/70 p-8 transition-colors duration-300 hover:border-accent-line sm:p-10" data-reveal>
                <blockquote class="relative z-10 font-display text-2xl leading-[1.35] font-medium tracking-[-0.02em] text-balance text-ink sm:text-[1.75rem]">{{ $item->quote }}</blockquote>

                <figcaption class="relative z-10 mt-10 flex items-center gap-3.5">
                    <img src="{{ $item->image }}" alt="" class="size-11 rounded-full object-cover" width="44" height="44" loading="lazy">
                    <span>
                        <span class="block text-sm font-medium text-ink">{{ $item->name }}</span>
                        <span class="block text-[13px] text-faint">{{ $item->role }}</span>
                    </span>
                    <span class="ml-auto rounded-full border border-line px-3 py-1 font-mono text-[10px] tracking-widest text-muted uppercase">{{ $item->metric }}</span>
                </figcaption>
            </figure>
            @else

            <figure class="spotlight-card mb-3 flex break-inside-avoid flex-col justify-between rounded-2xl border border-line bg-panel/70 p-6 transition-colors duration-300 hover:border-accent-line" data-reveal>
                <blockquote class="relative z-10 text-[15px]/7 text-muted">{{ $item->quote }}</blockquote>

                <figcaption class="relative z-10 mt-7 flex items-center gap-3">
                    <img src="{{ $item->image }}" alt="" class="size-9 rounded-full object-cover" width="36" height="36" loading="lazy">
                    <span>
                        <span class="block text-[13px] font-medium text-ink">{{ $item->name }}</span>
                        <span class="block text-[12px] text-faint">{{ $item->role }}</span>
                    </span>
                </figcaption>
            </figure>
            @endif
            @endforeach
        </div>

    </div>
</section>
