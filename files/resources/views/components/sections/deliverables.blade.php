@props([
    'eyebrow' => 'What you get',
    'heading' => 'Seven documents, one brief',
    'body' => 'Every send is a complete package — the proposal a client signs, plus everything that usually gets written at 11pm the night before.',
    'items',
])
<!--
    The bento grid. Card copy and icons are repeating content, so they live in
    resources/data/collections/deliverables.json — the first two cards render
    wide, the rest three across (the .bento rules in site.css). Each card is a
    spotlight-card: the accent bloom follows the cursor via main.js.
-->
<section id="deliverables" class="relative py-20 sm:py-32">
    <div class="mx-auto w-full max-w-6xl px-6">

        <div class="flex flex-wrap items-end justify-between gap-x-12 gap-y-6" data-reveal>
            <div>
                <p class="font-mono text-[11px] tracking-widest text-accent uppercase">{{ $eyebrow }}</p>
                <h2 class="mt-5 max-w-[16ch] font-display text-4xl leading-[1.1] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-5xl">{{ $heading }}</h2>
            </div>
            <p class="max-w-[42ch] text-base/7 text-muted">{{ $body }}</p>
        </div>

        <div class="bento mt-14 grid grid-cols-12 gap-3 sm:mt-16">
            @foreach ($items as $item)
            <div class="spotlight-card rounded-2xl border border-line bg-panel/70 p-6 transition-colors duration-300 hover:border-accent-line sm:p-7" data-reveal>
                <span class="relative z-10 flex size-10 items-center justify-center rounded-xl border border-line bg-raised text-accent">
                    {!! $item->icon !!}
                </span>
                <h3 class="relative z-10 mt-5 font-display text-lg font-semibold tracking-tight text-ink">{{ $item->title }}</h3>
                <p class="relative z-10 mt-2.5 max-w-[46ch] text-[15px]/7 text-muted">{{ $item->body }}</p>

                @if ($item->detail ?? false)
                <p class="relative z-10 mt-5 border-t border-line pt-4 font-mono text-[11px] tracking-widest text-faint uppercase">{{ $item->detail }}</p>
                @endif
            </div>
            @endforeach
        </div>

    </div>
</section>
