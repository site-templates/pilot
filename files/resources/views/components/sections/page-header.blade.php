@props([
    'eyebrow' => 'Features',
    'heading' => 'Everything the demo skipped',
    'body' => 'The loop is the easy part. Here is exactly what Pilot gives you, what it expects from your code, and what it deliberately leaves alone.',
    'showMeta' => '0',
    'metaOne' => '',
    'metaTwo' => '',
    'fieldImage' => '/images/hero-field.jpg',
])
<!--
    The opening block for inner pages. Left-aligned over a calm mesh, so it
    reads as a sibling of the homepage hero rather than a repeat of it. Turn
    on showMeta for the two small stats beside the heading.
-->
<section class="relative overflow-hidden border-b border-line pt-36 pb-16 sm:pt-44 sm:pb-20">

    <div class="spectrum spectrum--calm" aria-hidden="true">
        <img src="{{ $fieldImage }}" alt="" class="spectrum-image" width="1920" height="1086" loading="lazy">
        <span class="spectrum-veil"></span>
    </div>

    <div class="relative z-10 mx-auto w-full max-w-6xl px-6">
        <p class="font-mono text-[11px] tracking-widest text-accent uppercase" data-reveal>{{ $eyebrow }}</p>

        <div class="reveal-1 mt-5 flex flex-wrap items-end justify-between gap-x-16 gap-y-8" data-reveal>
            <h1 class="max-w-[18ch] font-display text-4xl leading-[1.06] font-semibold tracking-[-0.035em] text-balance text-ink sm:text-5xl lg:text-6xl">{{ $heading }}</h1>

            @if ($showMeta)
            <dl class="flex gap-10">
                <div>
                    <dt class="font-display text-2xl font-semibold tracking-tight text-ink">{{ $metaOne }}</dt>
                    <dd class="mt-1 font-mono text-[10px] tracking-widest text-faint uppercase">{{ $metaTwo }}</dd>
                </div>
            </dl>
            @endif
        </div>

        <p class="reveal-2 mt-7 max-w-[56ch] text-lg/8 text-pretty text-lede" data-reveal>{{ $body }}</p>
    </div>
</section>
