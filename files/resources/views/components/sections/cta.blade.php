@props([
    'heading' => 'The next brief lands today. Be ready for it.',
    'body' => 'Start with three free proposals. Keep the ones that win — Pilot learns your rates, your scope language, and the terms you actually use.',
    'ctaText' => 'Start free',
    'ctaLink' => '/pricing',
    'secondaryText' => 'Talk to us',
    'secondaryLink' => 'mailto:hello@pilot.co',
    'note' => 'No card required · Cancel any time · Your templates stay yours',
])
<!--
    The closing ask, over a calmer version of the hero's mesh — one lobe, no
    beams, blurred further out (the .aurora--calm rules in site.css).
-->
<section class="relative overflow-hidden border-t border-line py-24 sm:py-32">

    <div class="aurora aurora--calm" aria-hidden="true">
        <span class="aurora-lobe aurora-lobe--core"></span>
        <span class="aurora-lobe aurora-lobe--warm"></span>
        <span class="aurora-veil"></span>
    </div>

    <div class="relative z-10 mx-auto w-full max-w-6xl px-6 text-center">
        <h2 class="mx-auto max-w-[20ch] font-display text-4xl leading-[1.1] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-5xl" data-reveal>{{ $heading }}</h2>
        <p class="reveal-1 mx-auto mt-6 max-w-[52ch] text-base/7 text-pretty text-muted" data-reveal>{{ $body }}</p>

        <div class="reveal-2 mt-10 flex flex-wrap items-center justify-center gap-3" data-reveal>
            <a href="{{ $ctaLink }}" class="rounded-full bg-accent px-6 py-3 text-sm font-medium text-accent-ink transition-opacity duration-200 hover:opacity-90">{{ $ctaText }}</a>
            <a href="{{ $secondaryLink }}" class="rounded-full border border-line bg-panel/50 px-5 py-3 text-sm font-medium text-ink backdrop-blur-sm transition-colors duration-200 hover:border-accent-line hover:bg-panel">{{ $secondaryText }}</a>
        </div>

        <p class="reveal-3 mt-8 font-mono text-[11px] tracking-widest text-faint uppercase" data-reveal>{{ $note }}</p>
    </div>
</section>
