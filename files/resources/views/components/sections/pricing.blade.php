@props([
    'eyebrow' => 'Plans',
    'heading' => 'Priced like a tool, not a percentage',
    'body' => 'No cut of your invoices, no per-proposal fee, no seat you forgot you were paying for. Pick a plan, send as many as you like.',
    'items',
])
<!--
    Three plan cards from resources/data/collections/plans.json. A plan with
    featured turned on gets the accent border and its badge. This is the one
    section on the site that is deliberately three matching cards — a price
    table is the one place a client expects to compare like for like.

    Each plan carries up to six feature lines; blank ones are skipped.
-->
<section class="relative py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl px-6">

        <div class="max-w-[38ch]" data-reveal>
            <p class="font-mono text-[11px] tracking-widest text-accent uppercase">{{ $eyebrow }}</p>
            <h2 class="mt-5 font-display text-3xl leading-[1.12] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-4xl">{{ $heading }}</h2>
            <p class="mt-5 text-base/7 text-muted">{{ $body }}</p>
        </div>

        <div class="mt-14 grid gap-3 sm:mt-16 lg:grid-cols-3">
            @foreach ($items as $plan)
            @if ($plan->featured)

            <div class="relative flex flex-col rounded-2xl border border-accent-line bg-panel p-7 sm:p-8" data-reveal>
                <span class="absolute -top-3 left-7 rounded-full bg-accent px-3 py-1 text-[11px] font-medium text-accent-ink">{{ $plan->badge }}</span>

                <p class="font-display text-lg font-semibold tracking-tight text-ink">{{ $plan->name }}</p>
                <p class="mt-2 text-[13px]/6 text-muted">{{ $plan->tagline }}</p>

                <p class="mt-7 flex items-baseline gap-1.5">
                    <span class="font-display text-5xl font-semibold tracking-[-0.03em] text-ink">{{ $plan->price }}</span>
                    <span class="text-[13px] text-faint">{{ $plan->period }}</span>
                </p>

                <a href="{{ $plan->ctaLink }}" class="mt-7 rounded-full bg-accent px-5 py-3 text-center text-sm font-medium text-accent-ink transition-opacity duration-200 hover:opacity-90">{{ $plan->ctaText }}</a>

                <ul role="list" class="mt-8 flex flex-col gap-3 border-t border-line pt-8 text-[14px] text-muted">
                    @if ($plan->featureOne)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureOne }}</li>@endif
                    @if ($plan->featureTwo)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureTwo }}</li>@endif
                    @if ($plan->featureThree)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureThree }}</li>@endif
                    @if ($plan->featureFour)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureFour }}</li>@endif
                    @if ($plan->featureFive)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureFive }}</li>@endif
                    @if ($plan->featureSix)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureSix }}</li>@endif
                </ul>
            </div>
            @else

            <div class="relative flex flex-col rounded-2xl border border-line bg-panel/60 p-7 transition-colors duration-300 hover:border-accent-line sm:p-8" data-reveal>
                <p class="font-display text-lg font-semibold tracking-tight text-ink">{{ $plan->name }}</p>
                <p class="mt-2 text-[13px]/6 text-muted">{{ $plan->tagline }}</p>

                <p class="mt-7 flex items-baseline gap-1.5">
                    <span class="font-display text-5xl font-semibold tracking-[-0.03em] text-ink">{{ $plan->price }}</span>
                    <span class="text-[13px] text-faint">{{ $plan->period }}</span>
                </p>

                <a href="{{ $plan->ctaLink }}" class="mt-7 rounded-full border border-line px-5 py-3 text-center text-sm font-medium text-ink transition-colors duration-200 hover:bg-raised">{{ $plan->ctaText }}</a>

                <ul role="list" class="mt-8 flex flex-col gap-3 border-t border-line pt-8 text-[14px] text-muted">
                    @if ($plan->featureOne)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-faint" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureOne }}</li>@endif
                    @if ($plan->featureTwo)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-faint" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureTwo }}</li>@endif
                    @if ($plan->featureThree)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-faint" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureThree }}</li>@endif
                    @if ($plan->featureFour)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-faint" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureFour }}</li>@endif
                    @if ($plan->featureFive)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-faint" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureFive }}</li>@endif
                    @if ($plan->featureSix)<li class="flex items-start gap-2.5"><svg viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-faint" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>{{ $plan->featureSix }}</li>@endif
                </ul>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</section>
