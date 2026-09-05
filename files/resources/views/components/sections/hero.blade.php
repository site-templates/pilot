@props([
    'heading' => 'Pilot is the runtime for agents you can actually ship.',
    'body' => 'Define an agent in a few lines, hand it tools, and Pilot runs the loop — retries, state, human review, and a trace of every decision it made.',
    'ctaText' => 'Get started',
    'ctaLink' => '/pricing',
    'secondaryText' => 'Read the guides',
    'secondaryLink' => '/guides',
    'stageImage' => '/images/valley.jpg',
    'consoleTitle' => 'Pilot Console',
    'runsLabel' => 'Running',
    'runsCount' => '4',
    'activeRun' => 'Backfill customer embeddings',
    'promptText' => 'Backfill embeddings for every customer record created before March, then verify the index is complete.',
    'traceOne' => 'Read schema/customers.sql',
    'traceTwo' => 'Planned 3 steps · 1 subagent',
    'traceThree' => 'Thought for 6s',
    'assistantText' => 'Batching 41,880 records at 500 per call. I will checkpoint after every batch so a failure resumes instead of restarting.',
    'outputLabel' => 'Trace',
    'terminalTitle' => 'pilot run',
    'terminalOne' => 'batch 84/84  ·  41,880 embedded',
    'terminalTwo' => 'verify: index complete, 0 gaps',
    'terminalThree' => 'done in 4m 12s  ·  $1.94',
    'runs',
    'files',
])
<!--
    The opening statement, and Pilot's signature: the Console.

    Three panes — the runs queue, the live trace of the active run, and the
    files it touched — with a terminal overlapping the corner. It is drawn
    entirely in markup, so it stays razor sharp at any size; the painting
    behind it is the only photograph on the page.

    The runs and files are repeating content, so they live in
    resources/data/collections/ and arrive through bound attributes.
-->
<section id="hero" class="relative pt-36 sm:pt-44">

    <div class="mx-auto w-full max-w-6xl px-6">
        <h1 class="max-w-[19ch] font-display text-[2.75rem] leading-[1.04] font-medium tracking-[-0.035em] text-balance text-ink sm:text-[3.5rem] lg:text-[4rem]" data-reveal>
            {{ $heading }}
        </h1>

        <p class="reveal-1 mt-8 max-w-[54ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $body }}</p>

        <div class="reveal-2 mt-10 flex flex-wrap items-center gap-3" data-reveal>
            <a href="{{ $ctaLink }}" class="rounded-full bg-ink px-6 py-3.5 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85">{{ $ctaText }}</a>
            <a href="{{ $secondaryLink }}" class="group flex items-center gap-2 rounded-full bg-raised px-6 py-3.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:bg-line">
                {{ $secondaryText }}
                <svg viewBox="0 0 16 16" class="size-3.5 fill-muted transition-all duration-200 group-hover:translate-x-0.5 group-hover:fill-ink" aria-hidden="true">
                    <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
    </div>

    <!--
        The Console, standing on the painting — a full-bleed band the window
        overlaps top and bottom, so it reads as an object placed in a room.
    -->
    <div class="relative mt-16 sm:mt-20">

        <div class="stage" aria-hidden="true">
            <img src="{{ $stageImage }}" alt="" class="stage-image" width="2000" height="837" fetchpriority="high">
            <span class="stage-veil"></span>
        </div>

        <div class="reveal-3 relative z-10 mx-auto w-full max-w-6xl px-6 py-16 sm:py-24" data-reveal>
            <div class="transformer relative rounded-xl border border-line-strong bg-canvas shadow-2xl shadow-black/15" data-transformer>

                <!-- Title bar -->
                <div class="flex items-center gap-2 border-b border-line px-4 py-3">
                    <span class="flex gap-1.5" aria-hidden="true">
                        <span class="size-2.5 rounded-full bg-line-strong"></span>
                        <span class="size-2.5 rounded-full bg-line-strong"></span>
                        <span class="size-2.5 rounded-full bg-line-strong"></span>
                    </span>
                    <span class="mx-auto text-[13px] text-muted">{{ $consoleTitle }}</span>
                </div>

                <div class="grid lg:grid-cols-[15rem_1fr_17rem]">

                    <!-- Left: the queue -->
                    <div class="border-line p-3 max-lg:hidden lg:border-r">
                        <p class="flex items-center gap-2 px-2 py-1.5 font-mono text-[10px] tracking-widest text-faint uppercase">
                            {{ $runsLabel }}
                            <span class="text-muted">{{ $runsCount }}</span>
                        </p>

                        <ul role="list" class="mt-1 flex flex-col gap-0.5">
                            @foreach ($runs as $run)
                            @if ($run->active)
                            <li class="rounded-lg bg-raised px-2.5 py-2">
                                <span class="block truncate text-[13px] font-medium text-ink">{{ $run->label }}</span>
                                <span class="mt-0.5 block font-mono text-[11px] text-muted">{{ $run->meta }}</span>
                            </li>
                            @else
                            <li class="rounded-lg px-2.5 py-2">
                                <span class="block truncate text-[13px] text-muted">{{ $run->label }}</span>
                                <span class="mt-0.5 block font-mono text-[11px] text-faint">{{ $run->meta }}</span>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Middle: the live trace -->
                    <div class="relative min-w-0 overflow-hidden border-line p-5 sm:p-6 lg:border-r lg:pb-28">
                        <span class="trace-sweep" aria-hidden="true"></span>

                        <p class="relative text-[13px] font-medium text-ink">{{ $activeRun }}</p>

                        <div class="trace-row relative mt-4 rounded-xl bg-raised px-4 py-3">
                            <p class="text-[13.5px]/6 text-lede">{{ $promptText }}</p>
                        </div>

                        <div class="trace-row relative mt-5 flex flex-col gap-2.5 font-mono text-[12px] text-muted">
                            <p class="flex items-center gap-2">
                                <svg viewBox="0 0 16 16" class="size-3 shrink-0 fill-faint" aria-hidden="true"><path d="M3 2.75A.75.75 0 0 1 3.75 2h5.5a.75.75 0 0 1 .53.22l3 3a.75.75 0 0 1 .22.53v7.5a.75.75 0 0 1-.75.75h-8.5a.75.75 0 0 1-.75-.75v-10.5Z"/></svg>
                                {{ $traceOne }}
                            </p>
                            <p class="flex items-center gap-2">
                                <svg viewBox="0 0 16 16" class="size-3 shrink-0 fill-faint" aria-hidden="true"><path d="M2 4.75A.75.75 0 0 1 2.75 4h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75Zm0 3.5A.75.75 0 0 1 2.75 7.5h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 2 8.25Zm0 3.5a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z"/></svg>
                                {{ $traceTwo }}
                            </p>
                            <p class="flex items-center gap-2 text-faint">
                                <svg viewBox="0 0 16 16" class="size-3 shrink-0 fill-current" aria-hidden="true"><path fill-rule="evenodd" d="M8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12Zm.75-9.25a.75.75 0 0 0-1.5 0V8c0 .2.08.39.22.53l2 2a.75.75 0 1 0 1.06-1.06L8.75 7.69V4.75Z" clip-rule="evenodd"/></svg>
                                {{ $traceThree }}
                            </p>
                        </div>

                        <p class="trace-row relative mt-5 max-w-[54ch] text-[13.5px]/6 text-lede">{{ $assistantText }}</p>

                        <div class="trace-row relative mt-5 flex flex-col gap-1.5">
                            @foreach ($files as $file)
                            <p class="flex items-center gap-3 rounded-lg border border-line bg-panel px-3 py-2 font-mono text-[12px]">
                                <span class="truncate text-lede">{{ $file->path }}</span>
                                <span class="ml-auto shrink-0 text-muted">+{{ $file->added }}</span>
                                <span class="shrink-0 text-faint">−{{ $file->removed }}</span>
                            </p>
                            @endforeach
                        </div>
                    </div>

                    <!-- Right: the trace summary -->
                    <div class="p-5 max-lg:hidden">
                        <p class="font-mono text-[10px] tracking-widest text-faint uppercase">{{ $outputLabel }}</p>

                        <ul role="list" class="mt-4 flex flex-col gap-4">
                            @foreach ($runs as $run)
                            <li class="relative flex gap-3">
                                <span class="mt-1 flex size-4 shrink-0 items-center justify-center rounded-full border border-line-strong">
                                    <span class="size-1.5 rounded-full bg-ink"></span>
                                </span>
                                <span>
                                    <span class="block text-[12.5px] text-lede">{{ $run->label }}</span>
                                    <span class="mt-0.5 block font-mono text-[11px] text-faint">{{ $run->meta }}</span>
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                <!--
                    The terminal, overlapping the corner. Soft black rather
                    than pure black, the same shade the nav dropdowns use.
                -->
                <div class="absolute -right-3 -bottom-8 w-[24rem] overflow-hidden rounded-xl bg-shade shadow-2xl shadow-black/25 max-sm:hidden">
                    <div class="flex items-center gap-2 border-b border-shade-line px-4 py-2.5">
                        <span class="flex gap-1.5" aria-hidden="true">
                            <span class="size-2 rounded-full bg-shade-line"></span>
                            <span class="size-2 rounded-full bg-shade-line"></span>
                            <span class="size-2 rounded-full bg-shade-line"></span>
                        </span>
                        <span class="mx-auto font-mono text-[11px] text-shade-muted">{{ $terminalTitle }}</span>
                    </div>
                    <div class="flex flex-col gap-2 px-4 py-3.5 font-mono text-[11.5px]/5">
                        <p class="text-shade-muted">{{ $terminalOne }}</p>
                        <p class="text-shade-muted">{{ $terminalTwo }}</p>
                        <p class="text-shade-ink">{{ $terminalThree }}<span class="brief-caret ml-1"></span></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
