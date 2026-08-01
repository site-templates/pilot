@props([
    'eyebrow' => 'Pricing',
    'heading' => 'Price the work, not the hours',
    'body' => 'Pilot reads the scope and proposes three packages with a defensible number on each.',
    'pointOne' => 'Three tiers, anchored so the middle one wins',
    'pointTwo' => 'Benchmarks from similar projects in your region',
    'pointThree' => 'Every line item priced, nothing bundled into “design”',
    'linkText' => 'How Pilot prices work',
    'linkHref' => '/guides/how-to-price-client-work',
    'align' => 'right',
    'visual' => 'packages',
    'visualTitle' => 'Suggested packages',
    'visualChip' => 'Northbeam',
    'visualNote' => 'Benchmarked against 1,240 similar projects.',
    'rulerOne' => 'W1',
    'rulerTwo' => 'W3',
    'rulerThree' => 'W5',
    'rulerFour' => 'W7',
    'rulerFive' => 'W8',
    'items',
])
<!--
    A two-column section: copy on one side, a visual drawn in markup on the
    other. Set align to left or right to flip which side the visual takes, and
    visual to packages or timeline to change what it draws. Both variants read
    the same row shape — label, value, and a bar sized by widthPercent — so
    one component covers a price ladder and a project schedule.

    The rows come from a collection through the bound items attribute.
-->
<section class="relative py-20 sm:py-28">
    <div class="mx-auto grid w-full max-w-6xl items-center gap-12 px-6 lg:grid-cols-2 lg:gap-20">

        <!-- The copy -->
        <div class="@if ($align == 'left') lg:order-2 @endif" data-reveal>
            <p class="font-mono text-[11px] tracking-widest text-accent uppercase">{{ $eyebrow }}</p>
            <h2 class="mt-5 max-w-[16ch] font-display text-3xl leading-[1.12] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-4xl">{{ $heading }}</h2>
            <p class="mt-5 max-w-[48ch] text-base/7 text-muted">{{ $body }}</p>

            <ul role="list" class="mt-8 flex flex-col gap-3.5 text-[15px] text-muted">
                <li class="flex items-start gap-3">
                    <svg viewBox="0 0 20 20" class="mt-1 size-4 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                    {{ $pointOne }}
                </li>
                <li class="flex items-start gap-3">
                    <svg viewBox="0 0 20 20" class="mt-1 size-4 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                    {{ $pointTwo }}
                </li>
                <li class="flex items-start gap-3">
                    <svg viewBox="0 0 20 20" class="mt-1 size-4 shrink-0 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                    {{ $pointThree }}
                </li>
            </ul>

            <a href="{{ $linkHref }}" class="group mt-9 inline-flex items-center gap-2 text-sm font-medium text-ink">
                <span class="border-b border-accent-line pb-0.5 transition-colors duration-200 group-hover:border-accent">{{ $linkText }}</span>
                <svg viewBox="0 0 16 16" class="size-3.5 fill-accent transition-transform duration-200 group-hover:translate-x-0.5" aria-hidden="true">
                    <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>

        <!-- The visual -->
        <div class="@if ($align == 'left') lg:order-1 @endif" data-reveal>
            <div class="relative overflow-hidden rounded-2xl border border-line bg-panel p-6 sm:p-8">

                <div class="flex items-center justify-between gap-4">
                    <p class="font-mono text-[11px] tracking-widest text-faint uppercase">{{ $visualTitle }}</p>
                    <span class="rounded-full border border-line px-2.5 py-0.5 text-[11px] text-muted">{{ $visualChip }}</span>
                </div>

                @if ($visual == 'timeline')
                <!-- The ruler above the schedule bars -->
                <div class="mt-6 flex items-center justify-between border-b border-line pb-2 font-mono text-[10px] text-faint">
                    <span>{{ $rulerOne }}</span>
                    <span>{{ $rulerTwo }}</span>
                    <span>{{ $rulerThree }}</span>
                    <span>{{ $rulerFour }}</span>
                    <span>{{ $rulerFive }}</span>
                </div>
                @endif

                <ul role="list" class="mt-6 flex flex-col gap-5">
                    @foreach ($items as $row)
                    <li>
                        <div class="flex items-baseline justify-between gap-4">
                            @if ($row->featured)
                            <span class="flex items-center gap-2 text-[13px] font-medium text-ink">
                                {{ $row->label }}
                                <span class="rounded-full bg-accent-soft px-2 py-0.5 text-[10px] font-medium text-accent">Recommended</span>
                            </span>
                            @else
                            <span class="text-[13px] text-muted">{{ $row->label }}</span>
                            @endif
                            <span class="font-display text-sm font-semibold tracking-tight text-ink">{{ $row->value }}</span>
                        </div>

                        <div class="mt-2.5 h-1.5 w-full overflow-hidden rounded-full bg-raised">
                            @if ($row->featured)
                            <span class="block h-full rounded-full bg-accent" style="margin-left: {{ $row->startPercent }}%; width: {{ $row->widthPercent }}%"></span>
                            @else
                            <span class="block h-full rounded-full bg-accent/30" style="margin-left: {{ $row->startPercent }}%; width: {{ $row->widthPercent }}%"></span>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>

                <p class="mt-7 border-t border-line pt-5 text-[12px] text-faint">{{ $visualNote }}</p>
            </div>
        </div>

    </div>
</section>
