@props([
    'eyebrow' => 'How it works',
    'heading' => 'Fifteen lines, then it runs itself.',
    'body' => 'You already know what the agent should do. Pilot handles the parts that make it survive production — the retries, the checkpoints, the approvals, and the record of what happened.',
    'linkText' => 'Read the loop guide',
    'linkHref' => '/guides/designing-an-agent-loop',
    'items',
])
<!--
    The ladder. A sticky heading column on the left, the steps stacked down
    the right on a hairline rail — an editorial two-column layout rather than
    a row of cards, so it reads differently from every other section on the
    page. The steps live in resources/data/collections/steps.json.
-->
<section id="how-it-works" class="relative py-20 sm:py-32">
    <div class="mx-auto grid w-full max-w-6xl gap-14 px-6 lg:grid-cols-[0.85fr_1.15fr] lg:gap-20">

        <!-- Left: the pitch, held in place while the steps scroll past -->
        <div class="lg:sticky lg:top-28 lg:self-start" data-reveal>
            <p class="font-mono text-[11px] tracking-widest text-accent uppercase">{{ $eyebrow }}</p>
            <h2 class="mt-5 max-w-[15ch] font-display text-4xl leading-[1.1] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-5xl">{{ $heading }}</h2>
            <p class="mt-6 max-w-[46ch] text-base/7 text-muted">{{ $body }}</p>

            <a href="{{ $linkHref }}" class="group mt-8 inline-flex items-center gap-2 text-sm font-medium text-ink">
                <span class="border-b border-accent-line pb-0.5 transition-colors duration-200 group-hover:border-accent">{{ $linkText }}</span>
                <svg viewBox="0 0 16 16" class="size-3.5 fill-accent transition-transform duration-200 group-hover:translate-x-0.5" aria-hidden="true">
                    <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>

        <!-- Right: the steps, threaded on the rail -->
        <ol role="list" class="relative flex flex-col gap-12 sm:gap-16">
            <span class="step-rail absolute top-2 bottom-2 left-[1.4375rem] w-px" aria-hidden="true"></span>

            @foreach ($items as $item)
            <li class="relative flex gap-6 sm:gap-8" data-reveal>
                <span class="relative z-10 flex size-12 shrink-0 items-center justify-center rounded-full border border-line bg-panel font-mono text-[13px] font-medium text-accent">{{ $item->number }}</span>
                <div class="pt-1.5">
                    <h3 class="font-display text-xl font-semibold tracking-tight text-ink">{{ $item->title }}</h3>
                    <p class="mt-3 max-w-[52ch] text-base/7 text-muted">{{ $item->body }}</p>
                    <p class="mt-4 font-mono text-[11px] tracking-widest text-faint uppercase">{{ $item->meta }}</p>
                </div>
            </li>
            @endforeach
        </ol>

    </div>
</section>
