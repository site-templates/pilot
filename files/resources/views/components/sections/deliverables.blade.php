@props([
    'eyebrow' => 'What’s in the box',
    'heading' => 'Everything the demo skipped',
    'body' => 'The loop is the easy part. What makes an agent shippable is what happens when a tool times out, a human has to approve something, or you need to explain a decision three weeks later.',
    'items',
])
<!--
    The bento. The first two cards run wide and carry a visual bed — a fragment
    of the real interface drawn in markup on a paper panel. The remaining five
    sit three and two across with an icon instead.

    Card copy, which fragment to draw, and the icon all live in
    resources/data/collections/deliverables.json.
-->
<section id="capabilities" class="relative py-20 sm:py-32">
    <div class="mx-auto w-full max-w-7xl px-6">

        <div class="flex flex-wrap items-end justify-between gap-x-12 gap-y-6" data-reveal>
            <div>
                <p class="font-mono text-[11px] tracking-widest text-faint uppercase">{{ $eyebrow }}</p>
                <h2 class="mt-5 max-w-[16ch] font-display text-4xl leading-[1.06] font-medium tracking-[-0.03em] text-balance text-ink sm:text-5xl">{{ $heading }}</h2>
            </div>
            <p class="max-w-[46ch] text-base/7 text-muted">{{ $body }}</p>
        </div>

        <div class="bento mt-14 grid grid-cols-12 gap-3 sm:mt-16">
            @foreach ($items as $item)
            <div class="overflow-hidden rounded-2xl border border-line bg-panel transition-colors duration-300 hover:border-line-strong" data-reveal>

                @if ($item->bed)
                <!-- The visual bed, only on the wide cards -->
                <div class="m-2 mb-0 flex h-52 items-center justify-center overflow-hidden rounded-xl bg-raised px-6">

                    @if ($item->bed == 'trace')
                    <!-- A run, mid-flight, with its checkpoints -->
                    <span class="block w-full max-w-[22rem] translate-y-3 rounded-lg border border-line bg-panel p-4 shadow-sm">
                        <span class="flex items-center justify-between font-mono text-[10px] tracking-widest text-faint uppercase">
                            Run 8f21c
                            <span class="text-muted">step 3/5</span>
                        </span>
                        <span class="mt-3.5 flex flex-col gap-2.5">
                            <span class="flex items-center gap-2.5">
                                <span class="flex size-3.5 shrink-0 items-center justify-center rounded-full bg-ink"><svg viewBox="0 0 20 20" class="size-2.5 fill-canvas" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg></span>
                                <span class="block h-1.5 flex-1 rounded-full bg-ink/20"></span>
                                <span class="font-mono text-[10px] text-faint">0.4s</span>
                            </span>
                            <span class="flex items-center gap-2.5">
                                <span class="flex size-3.5 shrink-0 items-center justify-center rounded-full bg-ink"><svg viewBox="0 0 20 20" class="size-2.5 fill-canvas" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg></span>
                                <span class="block h-1.5 flex-1 rounded-full bg-ink/20"></span>
                                <span class="font-mono text-[10px] text-faint">2.1s</span>
                            </span>
                            <span class="flex items-center gap-2.5">
                                <span class="size-3.5 shrink-0 rounded-full border-2 border-ink"></span>
                                <span class="block h-1.5 flex-1 rounded-full bg-ink/35"></span>
                                <span class="font-mono text-[10px] text-ink">now</span>
                            </span>
                            <span class="flex items-center gap-2.5 opacity-40">
                                <span class="size-3.5 shrink-0 rounded-full border border-line-strong"></span>
                                <span class="block h-1.5 flex-1 rounded-full bg-ink/12"></span>
                            </span>
                        </span>
                        <span class="mt-4 flex items-center gap-2 border-t border-line pt-3 font-mono text-[10px] text-muted">
                            <svg viewBox="0 0 16 16" class="size-3 fill-current" aria-hidden="true"><path d="M3 2.75A.75.75 0 0 1 3.75 2h5.5a.75.75 0 0 1 .53.22l3 3a.75.75 0 0 1 .22.53v7.5a.75.75 0 0 1-.75.75h-8.5a.75.75 0 0 1-.75-.75v-10.5Z"/></svg>
                            checkpoint saved · resumable
                        </span>
                    </span>
                    @else
                    <!-- A typed tool, as the model sees it -->
                    <span class="block w-full max-w-[22rem] translate-y-3 rounded-lg border border-line bg-shade p-4 font-mono text-[11.5px]/6 shadow-sm">
                        <span class="block text-shade-muted">#[Tool]</span>
                        <span class="block text-shade-ink">function refund(</span>
                        <span class="block pl-4 text-shade-muted">string $chargeId,</span>
                        <span class="block pl-4 text-shade-muted">int $amountCents,</span>
                        <span class="block pl-4 text-shade-muted">Reason $reason,</span>
                        <span class="block text-shade-ink">): Refund</span>
                        <span class="mt-3 block border-t border-shade-line pt-2.5 text-shade-muted">✓ schema derived · 3 args validated</span>
                    </span>
                    @endif
                </div>
                @endif

                <div class="p-6 sm:p-7">
                    @if ($item->bed)
                    @else
                    <span class="flex size-10 items-center justify-center rounded-xl border border-line bg-raised text-ink">
                        {!! $item->icon !!}
                    </span>
                    @endif

                    <h3 class="mt-5 max-w-[26ch] font-display text-lg leading-snug font-semibold tracking-[-0.02em] text-ink">{{ $item->title }}</h3>
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
