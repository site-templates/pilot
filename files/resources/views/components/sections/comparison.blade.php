@props([
    'heading' => 'Every plan, line by line',
    'columnOne' => 'Solo',
    'columnTwo' => 'Studio',
    'columnThree' => 'Agency',
    'items',
])
<!--
    The plan comparison. Rows live in resources/data/collections/comparison.json.
    A cell set to the word yes renders a check mark; anything else prints as
    written, so a row can say "Unlimited", "3 seats", or an em dash.

    On phones the table scrolls inside its own container rather than giving
    the whole page a sideways scroll.
-->
<section class="relative border-t border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl px-6">

        <h2 class="max-w-[20ch] font-display text-3xl leading-[1.12] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-4xl" data-reveal>{{ $heading }}</h2>

        <div class="mt-12 overflow-x-auto" data-reveal>
            <table class="w-full min-w-[42rem] border-collapse text-left">
                <thead>
                    <tr class="border-b border-line">
                        <th scope="col" class="w-2/5 py-4 pr-4 font-mono text-[11px] tracking-widest text-faint uppercase">Feature</th>
                        <th scope="col" class="px-4 py-4 font-display text-sm font-semibold text-ink">{{ $columnOne }}</th>
                        <th scope="col" class="px-4 py-4 font-display text-sm font-semibold text-accent">{{ $columnTwo }}</th>
                        <th scope="col" class="px-4 py-4 font-display text-sm font-semibold text-ink">{{ $columnThree }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $row)
                    <tr class="border-b border-line">
                        <th scope="row" class="py-4 pr-4 text-[14px] font-normal text-muted">{{ $row->label }}</th>

                        <td class="px-4 py-4 text-[14px] text-muted">
                            @if ($row->one == 'yes')
                            <svg viewBox="0 0 20 20" class="size-4 fill-ink" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                            <span class="sr-only">Included</span>
                            @else
                            {{ $row->one }}
                            @endif
                        </td>

                        <td class="px-4 py-4 text-[14px] text-muted">
                            @if ($row->two == 'yes')
                            <svg viewBox="0 0 20 20" class="size-4 fill-accent" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                            <span class="sr-only">Included</span>
                            @else
                            {{ $row->two }}
                            @endif
                        </td>

                        <td class="px-4 py-4 text-[14px] text-muted">
                            @if ($row->three == 'yes')
                            <svg viewBox="0 0 20 20" class="size-4 fill-ink" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                            <span class="sr-only">Included</span>
                            @else
                            {{ $row->three }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>
