@props([
    'eyebrow' => 'Runs where you already run',
    'heading' => 'A library, not a platform',
    'body' => 'Pilot is a dependency inside your app, not a service you operate. It speaks to the models, stores, and queues you already have.',
    'items',
])
<!--
    A dense tile grid — deliberately flatter and tighter than the homepage
    bento so the Features page has its own texture. Tools live in
    resources/data/collections/integrations.json.
-->
<section class="relative border-t border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl px-6">

        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:gap-20" data-reveal>
            <div>
                <p class="font-mono text-[11px] tracking-widest text-accent uppercase">{{ $eyebrow }}</p>
                <h2 class="mt-5 max-w-[16ch] font-display text-3xl leading-[1.12] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-4xl">{{ $heading }}</h2>
            </div>
            <p class="max-w-[52ch] self-end text-base/7 text-muted">{{ $body }}</p>
        </div>

        <ul role="list" class="mt-14 grid grid-cols-2 gap-px overflow-hidden rounded-2xl border border-line bg-line sm:mt-16 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($items as $item)
            <li class="flex flex-col gap-3 bg-canvas p-6 transition-colors duration-300 hover:bg-panel">
                <span class="flex size-9 items-center justify-center rounded-lg border border-line bg-raised text-accent">
                    {!! $item->icon !!}
                </span>
                <span>
                    <span class="block text-[14px] font-medium text-ink">{{ $item->name }}</span>
                    <span class="block text-[12px] text-faint">{{ $item->category }}</span>
                </span>
            </li>
            @endforeach
        </ul>

    </div>
</section>
