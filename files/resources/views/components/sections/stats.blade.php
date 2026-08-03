@props([
    'label' => 'Measured across 1.4M agent runs on Pilot in 2025',
    'items',
])
<!--
    A full-bleed band of proof points on hairline dividers — it breaks the
    container on purpose, so the page has a horizontal beat between the two
    split sections. The numbers live in resources/data/collections/stats.json.
-->
<section class="relative border-y border-line bg-panel/40 py-14 sm:py-16">
    <div class="mx-auto w-full max-w-6xl px-6">
        <dl class="grid grid-cols-2 gap-y-10 lg:grid-cols-4">
            @foreach ($items as $item)
            <div class="lg:border-l lg:border-line lg:px-8 lg:first:border-l-0 lg:first:pl-0" data-reveal>
                <dt class="font-display text-4xl font-semibold tracking-[-0.03em] text-ink sm:text-5xl">{{ $item->value }}</dt>
                <dd class="mt-2.5 max-w-[22ch] text-[13px]/6 text-muted">{{ $item->label }}</dd>
            </div>
            @endforeach
        </dl>

        <p class="mt-12 font-mono text-[11px] tracking-widest text-faint uppercase" data-reveal>{{ $label }}</p>
    </div>
</section>
