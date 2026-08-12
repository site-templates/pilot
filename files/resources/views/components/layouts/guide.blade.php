@props([
    'title' => '',
    'description' => '',
    'category' => 'Pricing',
    'date' => '',
    'readTime' => '',
    'author' => '',
    'authorRole' => '',
    'authorImage' => '',
    'backText' => 'Guides',
    'backLink' => '/guides',
    'ctaHeading' => 'Stop writing the loop by hand',
    'ctaBody' => 'Pilot gives you the durable loop, typed tools, and the trace — so you write the agent, not the plumbing.',
    'ctaText' => 'Get started',
    'ctaLink' => '/pricing',
])
<!--
    The chrome around a single guide: the title block runs full width, then the
    byline sits in a sticky left rail beside the article so the reading measure
    stays honest on wide screens. Write the body as plain HTML in the slot —
    resources/css/site.css styles it through the .prose class.
-->
<x-layouts.main :title="$title" :description="$description">

    <article class="pt-32 pb-24 sm:pt-40 sm:pb-32">

        <div class="mx-auto w-full max-w-6xl px-6">

            <!-- Title block -->
            <div class="max-w-[46rem]">
                <a href="{{ $backLink }}" class="group inline-flex items-center gap-1.5 text-sm font-medium text-muted transition-colors duration-200 hover:text-ink" data-reveal>
                    <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current transition-transform duration-200 group-hover:-translate-x-0.5" aria-hidden="true">
                        <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
                    </svg>
                    {{ $backText }}
                </a>

                <p class="reveal-1 mt-8 flex flex-wrap items-center gap-3 font-mono text-[11px] tracking-widest uppercase" data-reveal>
                    <span class="text-accent">{{ $category }}</span>
                    <span class="text-faint">{{ $date }}</span>
                    @if ($readTime)
                    <span class="text-faint">·</span>
                    <span class="text-faint">{{ $readTime }}</span>
                    @endif
                </p>

                <h1 class="reveal-2 mt-5 font-display text-4xl leading-[1.08] font-semibold tracking-[-0.035em] text-balance text-ink sm:text-5xl" data-reveal>{{ $title }}</h1>

                @if ($description)
                <p class="reveal-3 mt-6 max-w-[54ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $description }}</p>
                @endif
            </div>

            <!-- Byline rail + the article -->
            <div class="mt-14 grid gap-10 border-t border-line pt-12 lg:grid-cols-[15rem_1fr] lg:gap-16">

                <div class="lg:sticky lg:top-28 lg:self-start" data-reveal>
                    <div class="flex items-center gap-3">
                        <img src="{{ $authorImage }}" alt="" class="size-10 rounded-full object-cover" width="40" height="40" loading="lazy">
                        <span>
                            <span class="block text-sm font-medium text-ink">{{ $author }}</span>
                            <span class="block text-[12px] text-faint">{{ $authorRole }}</span>
                        </span>
                    </div>

                    <!-- The in-article ask, quiet enough not to interrupt the read -->
                    <div class="mt-10 rounded-2xl border border-line bg-panel/60 p-5 max-lg:hidden">
                        <p class="font-display text-[15px] leading-snug font-semibold text-ink">{{ $ctaHeading }}</p>
                        <p class="mt-2.5 text-[13px]/6 text-muted">{{ $ctaBody }}</p>
                        <a href="{{ $ctaLink }}" class="mt-4 block rounded-full bg-accent px-4 py-2.5 text-center text-[13px] font-medium text-accent-ink transition-opacity duration-200 hover:opacity-90">{{ $ctaText }}</a>
                    </div>
                </div>

                <div class="prose max-w-[68ch]" data-reveal>
                    {{ $slot }}
                </div>

            </div>
        </div>
    </article>

</x-layouts.main>
