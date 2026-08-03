@props([
    'eyebrow' => 'What you get',
    'heading' => 'Seven documents, one brief',
    'body' => 'Every send is a complete package — the proposal a client signs, plus everything that usually gets written at 11pm the night before.',
    'items',
])
<!--
    The bento. The first two cards run wide and carry a visual bed: a tinted
    gradient with a fragment of the actual document floating on it, drawn in
    markup so it stays sharp. The remaining five sit three and two across with
    a tinted icon instead — enough colour to keep the grid alive without
    seven competing pictures.

    Card copy, tint, and which fragment to draw all live in
    resources/data/collections/deliverables.json.
-->
<section id="deliverables" class="relative py-20 sm:py-32">
    <div class="mx-auto w-full max-w-6xl px-6">

        <div class="flex flex-wrap items-end justify-between gap-x-12 gap-y-6" data-reveal>
            <div>
                <p class="font-mono text-[11px] tracking-widest text-accent uppercase">{{ $eyebrow }}</p>
                <h2 class="mt-5 max-w-[16ch] font-display text-4xl leading-[1.06] font-semibold tracking-[-0.035em] text-balance text-ink sm:text-5xl">{{ $heading }}</h2>
            </div>
            <p class="max-w-[42ch] text-base/7 text-muted">{{ $body }}</p>
        </div>

        <div class="bento mt-14 grid grid-cols-12 gap-3 sm:mt-16">
            @foreach ($items as $item)
            <div class="spotlight-card overflow-hidden rounded-2xl border border-line bg-panel/70 transition-colors duration-300 hover:border-accent-line" data-reveal>

                @if ($item->bed)
                <!-- The visual bed, only on the wide cards -->
                <div class="tint-{{ $item->tint }} relative m-2 mb-0 flex h-52 items-center justify-center overflow-hidden rounded-xl">
                    <span class="bed-wash" aria-hidden="true"></span>

                    @if ($item->bed == 'proposal')
                    <!-- A proposal sheet, mid-scroll -->
                    <span class="relative z-10 block w-[62%] translate-y-4 rounded-t-lg border border-line-strong bg-panel/90 p-4 shadow-2xl backdrop-blur-sm">
                        <span class="block h-1.5 w-16 rounded-full bg-accent"></span>
                        <span class="mt-3 block h-2 w-3/4 rounded-full bg-ink/70"></span>
                        <span class="mt-1.5 block h-2 w-1/2 rounded-full bg-ink/40"></span>
                        <span class="mt-4 block border-t border-line pt-3">
                            <span class="block h-1.5 w-full rounded-full bg-ink/15"></span>
                            <span class="mt-1.5 block h-1.5 w-5/6 rounded-full bg-ink/15"></span>
                            <span class="mt-1.5 block h-1.5 w-2/3 rounded-full bg-ink/15"></span>
                        </span>
                        <span class="mt-4 flex items-center justify-between border-t border-line pt-3">
                            <span class="block h-1.5 w-12 rounded-full bg-ink/20"></span>
                            <span class="font-display text-[13px] font-semibold text-ink">$9,800</span>
                        </span>
                    </span>
                    @else
                    <!-- A scope list, with its exclusions -->
                    <span class="relative z-10 block w-[68%] translate-y-3 rounded-lg border border-line-strong bg-panel/90 p-4 shadow-2xl backdrop-blur-sm">
                        <span class="block font-mono text-[9px] tracking-widest text-faint uppercase">Included</span>
                        <span class="mt-2.5 flex flex-col gap-2">
                            <span class="flex items-center gap-2">
                                <svg viewBox="0 0 20 20" class="size-3 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                                <span class="block h-1.5 w-2/3 rounded-full bg-ink/45"></span>
                            </span>
                            <span class="flex items-center gap-2">
                                <svg viewBox="0 0 20 20" class="size-3 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                                <span class="block h-1.5 w-1/2 rounded-full bg-ink/45"></span>
                            </span>
                        </span>
                        <span class="mt-4 block border-t border-line pt-3 font-mono text-[9px] tracking-widest text-faint uppercase">Not included</span>
                        <span class="mt-2.5 flex flex-col gap-2">
                            <span class="flex items-center gap-2">
                                <span class="block size-3 shrink-0 rounded-full border border-line-strong"></span>
                                <span class="block h-1.5 w-3/5 rounded-full bg-ink/18"></span>
                            </span>
                            <span class="flex items-center gap-2">
                                <span class="block size-3 shrink-0 rounded-full border border-line-strong"></span>
                                <span class="block h-1.5 w-2/5 rounded-full bg-ink/18"></span>
                            </span>
                        </span>
                    </span>
                    @endif
                </div>
                @endif

                <div class="relative z-10 p-6 sm:p-7">
                    @if ($item->bed)
                    @else
                    <span class="tint-{{ $item->tint }} relative flex size-10 items-center justify-center overflow-hidden rounded-xl border border-line text-accent">
                        <span class="bed-wash" aria-hidden="true"></span>
                        <span class="relative z-10 flex">{!! $item->icon !!}</span>
                    </span>
                    @endif

                    <h3 class="mt-5 font-display text-lg font-semibold tracking-[-0.02em] text-ink">{{ $item->title }}</h3>
                    <p class="mt-2.5 max-w-[46ch] text-[15px]/7 text-muted">{{ $item->body }}</p>

                    @if ($item->detail ?? false)
                    <p class="mt-5 border-t border-line pt-4 font-mono text-[11px] tracking-widest text-faint uppercase">{{ $item->detail }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
