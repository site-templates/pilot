@props([
    'eyebrow' => 'Questions',
    'heading' => 'The ones people actually ask',
    'body' => 'Still unsure? Write to us and a person answers.',
    'linkText' => 'hello@pilot.co',
    'linkHref' => 'mailto:hello@pilot.co',
    'items',
])
<!--
    The FAQ. A sticky heading column on the left, the accordion on the right —
    native <details> elements, so a question opens with JavaScript off and the
    browser can find text inside a closed answer. The smooth open transition
    lives in site.css.

    Questions come from resources/data/collections/faq.json.
-->
<section id="faq" class="relative border-t border-line py-20 sm:py-28">
    <div class="mx-auto grid w-full max-w-6xl gap-12 px-6 lg:grid-cols-[0.75fr_1.25fr] lg:gap-20">

        <div class="lg:sticky lg:top-28 lg:self-start" data-reveal>
            <p class="font-mono text-[11px] tracking-widest text-accent uppercase">{{ $eyebrow }}</p>
            <h2 class="mt-5 max-w-[14ch] font-display text-3xl leading-[1.12] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-4xl">{{ $heading }}</h2>
            <p class="mt-5 max-w-[38ch] text-base/7 text-muted">{{ $body }}</p>
            <a href="{{ $linkHref }}" class="mt-4 inline-block border-b border-accent-line pb-0.5 text-sm font-medium text-ink transition-colors duration-200 hover:border-accent hover:text-accent">{{ $linkText }}</a>
        </div>

        <div class="flex flex-col" data-reveal>
            @foreach ($items as $item)
            <details class="faq-item group border-b border-line">
                <summary class="flex cursor-pointer list-none items-start justify-between gap-6 py-6 text-[17px] font-medium text-ink transition-colors duration-200 hover:text-accent">
                    {{ $item->question }}
                    <span class="mt-1 flex size-5 shrink-0 items-center justify-center">
                        <svg viewBox="0 0 16 16" class="size-4 fill-faint transition-transform duration-300 group-open:rotate-45" aria-hidden="true">
                            <path d="M8 2.75a.75.75 0 0 1 .75.75v3.75h3.75a.75.75 0 0 1 0 1.5H8.75v3.75a.75.75 0 0 1-1.5 0V8.75H3.5a.75.75 0 0 1 0-1.5h3.75V3.5A.75.75 0 0 1 8 2.75Z"/>
                        </svg>
                    </span>
                </summary>
                <p class="max-w-[64ch] pb-7 text-[15px]/7 text-muted">{{ $item->answer }}</p>
            </details>
            @endforeach
        </div>

    </div>
</section>
