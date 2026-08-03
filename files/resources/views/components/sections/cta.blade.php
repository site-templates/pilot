@props([
    'heading' => 'Your first agent, running by lunch.',
    'body' => 'The runtime is open source and the docs are short. Install it, wire up one tool, and watch the first trace come back.',
    'ctaText' => 'Get started',
    'ctaLink' => '/pricing',
    'secondaryText' => 'Talk to us',
    'secondaryLink' => 'mailto:hello@pilot.dev',
    'note' => 'Apache 2.0 · No account needed to start · Bring your own models',
    'fieldImage' => '/images/hero-field.jpg',
])
<!--
    The closing ask, over a quieter version of the hero's spectrum. Laid out
    asymmetrically — the line on the left, everything you act on to the right
    — so the page does not end on the same centred stack every landing page
    ends on.
-->
<section class="relative overflow-hidden border-t border-line py-24 sm:py-32">

    <div class="spectrum spectrum--calm" aria-hidden="true">
        <img src="{{ $fieldImage }}" alt="" class="spectrum-image" width="1920" height="1086" loading="lazy">
        <span class="spectrum-veil"></span>
    </div>

    <div class="relative z-10 mx-auto grid w-full max-w-6xl gap-10 px-6 lg:grid-cols-[1.1fr_1fr] lg:items-center lg:gap-20">

        <h2 class="max-w-[16ch] font-display text-4xl leading-[1.04] font-semibold tracking-[-0.04em] text-balance text-ink sm:text-5xl lg:text-[3.5rem]" data-reveal>{{ $heading }}</h2>

        <div class="reveal-1" data-reveal>
            <p class="max-w-[46ch] text-base/7 text-pretty text-muted">{{ $body }}</p>

            <div class="mt-8 flex flex-wrap items-center gap-3">
                <a href="{{ $ctaLink }}" class="rounded-full bg-ink px-6 py-3 text-sm font-medium text-canvas transition-opacity duration-200 hover:opacity-90">{{ $ctaText }}</a>
                <a href="{{ $secondaryLink }}" class="rounded-full border border-line px-5 py-3 text-sm font-medium text-ink transition-colors duration-200 hover:border-accent-line hover:bg-panel/60">{{ $secondaryText }}</a>
            </div>

            <p class="mt-7 font-mono text-[11px] tracking-widest text-faint uppercase">{{ $note }}</p>
        </div>
    </div>
</section>
