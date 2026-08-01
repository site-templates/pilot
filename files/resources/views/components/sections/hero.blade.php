@props([
    'showBadge' => '1',
    'badgeText' => 'Contract-ready terms just shipped',
    'badgeLink' => '/guides/writing-scope-that-holds',
    'heading' => 'From a two-line brief to a proposal worth signing.',
    'body' => 'Paste what the client actually sent you. Pilot returns the scope, the milestones, three priced packages, and terms you can put your name on.',
    'ctaText' => 'Start free',
    'ctaLink' => '/pricing',
    'secondaryText' => 'See a sample proposal',
    'secondaryLink' => '/features',
    'trustNote' => 'Free for your first three proposals · No card required',
    'briefLabel' => 'The brief you were sent',
    'briefFrom' => 'dana@northbeam.co',
    'briefSubject' => 'website?',
    'briefBody' => "hey — we're relaunching Northbeam in the spring and need a new site. maybe 5 or 6 pages? we've got brand stuff already. also need the blog moved over.",
    'briefBodyTwo' => "budget's flexible-ish. what would something like this run? could you send something over this week?",
    'outputLabel' => 'What Pilot sent back',
    'outputTiming' => 'drafted in 94s',
    'proposalTitle' => 'Northbeam — Website Relaunch',
    'proposalFor' => 'Prepared for Dana Whitfield · Valid 30 days',
    'scopeLabel' => 'Scope of work',
    'timelineLabel' => 'Timeline',
    'pricingLabel' => 'Packages',
    'termsText' => '50% to start · Two revision rounds · Net 14 · Kill fee at 30%',
    'scope',
    'milestones',
    'tiers',
])
<!--
    The opening statement, and Pilot's signature: the Brief Transformer.

    Left pane is the client's actual email; right pane is the proposal Pilot
    returns. As the window scrolls in, the rows on the right resolve one after
    another and a single shimmer sweeps the pane — the product explaining
    itself in one glance. It is drawn entirely in markup, so it stays sharp at
    any size and re-tints with the palette.

    The scope lines, milestones, and packages are repeating content, so they
    live in resources/data/collections/ and arrive through bound attributes.
-->
<section id="hero" class="relative overflow-hidden pt-32 pb-16 sm:pt-40 sm:pb-24">

    <!-- The aurora mesh. main.js parallaxes the whole layer on scroll. -->
    <div class="aurora" data-mesh-parallax aria-hidden="true">
        <span class="aurora-lobe aurora-lobe--warm"></span>
        <span class="aurora-lobe aurora-lobe--core"></span>
        <span class="aurora-lobe aurora-lobe--cool"></span>
        <span class="aurora-beam"></span>
        <span class="aurora-grid"></span>
        <span class="aurora-veil"></span>
    </div>

    <div class="relative z-10 mx-auto w-full max-w-6xl px-6 text-center">

        @if ($showBadge)
        <a href="{{ $badgeLink }}" class="group inline-flex items-center gap-2.5 rounded-full border border-line bg-panel/60 py-1.5 pr-3 pl-2 text-[13px] backdrop-blur-sm transition-colors duration-200 hover:border-accent-line" data-reveal>
            <span class="flex items-center gap-1.5 rounded-full bg-accent-soft px-2 py-0.5 font-medium text-accent">
                <span class="size-1.5 rounded-full bg-accent"></span>
                New
            </span>
            <span class="text-muted transition-colors duration-200 group-hover:text-ink">{{ $badgeText }}</span>
            <svg viewBox="0 0 16 16" class="size-3.5 fill-faint transition-all duration-200 group-hover:translate-x-0.5 group-hover:fill-ink" aria-hidden="true">
                <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
            </svg>
        </a>
        @endif

        <h1 class="reveal-1 text-gradient mx-auto mt-8 max-w-[19ch] font-display text-[2.75rem] leading-[1.04] font-semibold tracking-[-0.035em] text-balance sm:text-6xl lg:text-[4.5rem]" data-reveal>
            {{ $heading }}
        </h1>

        <p class="reveal-2 mx-auto mt-7 max-w-[54ch] text-lg/8 text-pretty text-lede" data-reveal>{{ $body }}</p>

        <div class="reveal-3 mt-10 flex flex-wrap items-center justify-center gap-3" data-reveal>
            <a href="{{ $ctaLink }}" class="rounded-full bg-accent px-6 py-3 text-sm font-medium text-accent-ink transition-opacity duration-200 hover:opacity-90">{{ $ctaText }}</a>
            <a href="{{ $secondaryLink }}" class="group flex items-center gap-2 rounded-full border border-line bg-panel/50 px-5 py-3 text-sm font-medium text-ink backdrop-blur-sm transition-colors duration-200 hover:border-accent-line hover:bg-panel">
                {{ $secondaryText }}
                <svg viewBox="0 0 16 16" class="size-3.5 fill-muted transition-all duration-200 group-hover:translate-x-0.5 group-hover:fill-ink" aria-hidden="true">
                    <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>

        <p class="reveal-4 mx-auto mt-6 max-w-[42ch] font-mono text-[11px] tracking-widest text-balance text-faint uppercase" data-reveal>{{ $trustNote }}</p>
    </div>

    <!--
        The Brief Transformer. It runs wider than the text column above it so
        the hero has two distinct measures instead of one centred stack.
    -->
    <div class="reveal-5 relative z-10 mx-auto mt-16 w-full max-w-7xl px-6 sm:mt-20" data-reveal>
        <div class="transformer overflow-hidden rounded-2xl border border-line bg-panel shadow-2xl" data-transformer>
            <div class="grid lg:grid-cols-[minmax(0,0.82fr)_1px_minmax(0,1.18fr)]">

                <!-- Left: the client's email, exactly as it landed -->
                <div class="bg-canvas/40 p-6 text-left sm:p-8">
                    <p class="flex items-center gap-2 font-mono text-[11px] tracking-widest text-faint uppercase">
                        <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true">
                            <path d="M3 5.5A1.5 1.5 0 0 1 4.5 4h11A1.5 1.5 0 0 1 17 5.5v.32l-7 3.89-7-3.89V5.5Zm0 2.04V14.5A1.5 1.5 0 0 0 4.5 16h11a1.5 1.5 0 0 0 1.5-1.5V7.54l-6.64 3.69a.75.75 0 0 1-.72 0L3 7.54Z"/>
                        </svg>
                        {{ $briefLabel }}
                    </p>

                    <dl class="mt-5 flex flex-col gap-1.5 border-b border-line pb-4 text-[13px]">
                        <div class="flex gap-2">
                            <dt class="w-16 shrink-0 text-faint">From</dt>
                            <dd class="truncate text-muted">{{ $briefFrom }}</dd>
                        </div>
                        <div class="flex gap-2">
                            <dt class="w-16 shrink-0 text-faint">Subject</dt>
                            <dd class="truncate text-muted">{{ $briefSubject }}</dd>
                        </div>
                    </dl>

                    <p class="mt-5 font-mono text-[13px]/7 text-muted">{{ $briefBody }}</p>
                    <p class="mt-4 font-mono text-[13px]/7 text-muted">{{ $briefBodyTwo }}<span class="brief-caret ml-0.5"></span></p>
                </div>

                <!-- The seam, with a pulse travelling brief → proposal -->
                <div class="transformer-seam max-lg:hidden" aria-hidden="true"></div>

                <!-- Right: what Pilot returns -->
                <div class="relative overflow-hidden p-6 text-left max-lg:border-t max-lg:border-line sm:p-8">
                    <span class="proposal-sweep" aria-hidden="true"></span>

                    <div class="relative flex flex-wrap items-center justify-between gap-3">
                        <p class="flex items-center gap-2 font-mono text-[11px] tracking-widest text-accent uppercase">
                            <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true">
                                <path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.083 2.605-2.815.226c-.833.067-1.17 1.107-.536 1.651l2.145 1.838-.655 2.747c-.194.813.691 1.456 1.404 1.02L10 11.53l2.408 1.44c.713.437 1.598-.206 1.404-1.019l-.655-2.747 2.145-1.838c.635-.544.297-1.584-.536-1.65l-2.815-.227-1.083-2.605ZM15.5 13a.75.75 0 0 1 .75.75v1h1a.75.75 0 0 1 0 1.5h-1v1a.75.75 0 0 1-1.5 0v-1h-1a.75.75 0 0 1 0-1.5h1v-1a.75.75 0 0 1 .75-.75Z"/>
                            </svg>
                            {{ $outputLabel }}
                        </p>
                        <span class="rounded-full border border-line px-2 py-0.5 font-mono text-[10px] text-faint">{{ $outputTiming }}</span>
                    </div>

                    <!-- Row 1: the proposal header -->
                    <div class="proposal-row relative mt-5">
                        <p class="font-display text-lg font-semibold tracking-tight text-ink">{{ $proposalTitle }}</p>
                        <p class="mt-1 text-[13px] text-faint">{{ $proposalFor }}</p>
                    </div>

                    <!-- Row 2: scope of work -->
                    <div class="proposal-row relative mt-6">
                        <p class="font-mono text-[10px] tracking-widest text-faint uppercase">{{ $scopeLabel }}</p>
                        <ul role="list" class="mt-3 flex flex-col gap-2 text-[13px] text-muted">
                            @foreach ($scope as $line)
                            <li class="flex items-start gap-2.5">
                                <svg viewBox="0 0 20 20" class="mt-0.5 size-3.5 shrink-0 fill-accent" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/>
                                </svg>
                                {{ $line->text }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Row 3: the milestone rail -->
                    <div class="proposal-row relative mt-6">
                        <p class="font-mono text-[10px] tracking-widest text-faint uppercase">{{ $timelineLabel }}</p>
                        <ol role="list" class="mt-4 grid grid-cols-4 gap-1">
                            @foreach ($milestones as $milestone)
                            <li class="relative">
                                <span class="block h-1 rounded-full bg-accent/35"></span>
                                <span class="mt-2.5 block truncate text-[11px] font-medium text-ink">{{ $milestone->label }}</span>
                                <span class="block text-[10px] text-faint">{{ $milestone->week }}</span>
                            </li>
                            @endforeach
                        </ol>
                    </div>

                    <!-- Row 4: the three packages -->
                    <div class="proposal-row relative mt-6">
                        <p class="font-mono text-[10px] tracking-widest text-faint uppercase">{{ $pricingLabel }}</p>
                        <div class="mt-3 grid grid-cols-3 gap-2">
                            @foreach ($tiers as $tier)
                            @if ($tier->featured)
                            <div class="rounded-lg border border-accent-line bg-accent-soft p-3">
                                <p class="truncate text-[11px] font-medium text-accent">{{ $tier->name }}</p>
                                <p class="mt-1 font-display text-base font-semibold tracking-tight text-ink">{{ $tier->price }}</p>
                                <p class="mt-0.5 truncate text-[10px] text-faint max-sm:hidden">{{ $tier->note }}</p>
                            </div>
                            @else
                            <div class="rounded-lg border border-line bg-raised/50 p-3">
                                <p class="truncate text-[11px] font-medium text-muted">{{ $tier->name }}</p>
                                <p class="mt-1 font-display text-base font-semibold tracking-tight text-ink">{{ $tier->price }}</p>
                                <p class="mt-0.5 truncate text-[10px] text-faint max-sm:hidden">{{ $tier->note }}</p>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Row 5: the terms line -->
                    <div class="proposal-row relative mt-6 border-t border-line pt-4">
                        <p class="text-[11px] text-faint">{{ $termsText }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
