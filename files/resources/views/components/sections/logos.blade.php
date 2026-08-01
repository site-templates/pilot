@props([
    'label' => 'Proposals sent this month by studios like',
    'items',
])
<!--
    A full-bleed band that scrolls forever and pauses on hover. The list is
    rendered twice inside the track — that second copy is what makes the loop
    seamless, so both loops read from the same collection. The names live in
    resources/data/collections/logos.json.
-->
<section class="relative border-y border-line py-10">
    <p class="mb-8 text-center font-mono text-[11px] tracking-widest text-faint uppercase" data-reveal>{{ $label }}</p>

    <div class="marquee-track overflow-hidden" aria-hidden="true">
        <div class="marquee">
            @foreach ($items as $item)
            <span class="flex shrink-0 items-center gap-2.5 px-8 text-muted">
                {!! $item->icon !!}
                <span class="font-display text-base font-semibold tracking-tight whitespace-nowrap">{{ $item->name }}</span>
            </span>
            @endforeach
            @foreach ($items as $item)
            <span class="flex shrink-0 items-center gap-2.5 px-8 text-muted">
                {!! $item->icon !!}
                <span class="font-display text-base font-semibold tracking-tight whitespace-nowrap">{{ $item->name }}</span>
            </span>
            @endforeach
        </div>
    </div>

    <!-- The same names, readable by assistive tech without the duplication. -->
    <ul role="list" class="sr-only">
        @foreach ($items as $item)
        <li>{{ $item->name }}</li>
        @endforeach
    </ul>
</section>
