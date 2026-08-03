@props([
    'eyebrow' => 'The runtime',
    'heading' => 'What Pilot actually gives you',
    'items',
])
<!--
    The Features page spec sheet: one hairlined row per document, number and
    title on the left, the detail on the right. Dense and scannable on
    purpose — it reads like a specification rather than another card grid,
    which is what the homepage bento already is.

    Rows live in resources/data/collections/features.json.
-->
<section class="relative py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl px-6">

        <div class="max-w-[34ch]" data-reveal>
            <p class="font-mono text-[11px] tracking-widest text-accent uppercase">{{ $eyebrow }}</p>
            <h2 class="mt-5 font-display text-3xl leading-[1.12] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-4xl">{{ $heading }}</h2>
        </div>

        <div class="mt-14 sm:mt-16">
            @foreach ($items as $item)
            <div class="grid gap-6 border-t border-line py-12 lg:grid-cols-[0.42fr_1fr] lg:gap-16 lg:py-14" data-reveal>

                <div class="flex items-start gap-4">
                    <span class="mt-1 font-mono text-[11px] text-accent">{{ $item->number }}</span>
                    <h3 class="max-w-[16ch] font-display text-2xl leading-[1.15] font-semibold tracking-[-0.025em] text-ink">{{ $item->title }}</h3>
                </div>

                <div>
                    <p class="max-w-[62ch] text-base/7 text-muted">{{ $item->body }}</p>

                    <ul role="list" class="mt-7 grid gap-x-10 gap-y-3 text-[14px] text-muted sm:grid-cols-2">
                        <li class="flex items-start gap-2.5">
                            <span class="mt-2 size-1 shrink-0 rounded-full bg-accent"></span>
                            {{ $item->pointOne }}
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="mt-2 size-1 shrink-0 rounded-full bg-accent"></span>
                            {{ $item->pointTwo }}
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="mt-2 size-1 shrink-0 rounded-full bg-accent"></span>
                            {{ $item->pointThree }}
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="mt-2 size-1 shrink-0 rounded-full bg-accent"></span>
                            {{ $item->pointFour }}
                        </li>
                    </ul>

                    @if ($item->sample ?? false)
                    <p class="mt-8 rounded-xl border border-line bg-raised/50 p-4 font-mono text-[12.5px]/6 text-muted">{{ $item->sample }}</p>
                    @endif
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>
