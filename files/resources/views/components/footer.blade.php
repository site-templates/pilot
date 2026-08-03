@props([
    'brand' => 'Pilot',
    'tagline' => 'The runtime for agents that do real work.',
    'columns' => [],
    'social' => [],
    'copyright' => '© 2026 Pilot Labs, Inc.',
    'note' => 'Apache 2.0 · Built in the open.',
])
<!--
    The footer. Its columns come from the footer_links key in
    resources/data/site.json — nest links under a heading to build a column.
    The social row reads social_links from the same file.
-->
<footer class="relative mt-8 border-t border-line">
    <div class="mx-auto w-full max-w-6xl px-6 py-16 sm:py-20">
        <div class="grid gap-12 lg:grid-cols-[1.4fr_2fr]">

            <!-- Brand block -->
            <div class="max-w-xs">
                <a href="/" aria-label="Homepage" class="flex items-center gap-2.5 text-ink">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-accent" aria-hidden="true">
                        <path d="M12 1.9 21.4 21.4 12 16.9 2.6 21.4Z"/>
                    </svg>
                    <span class="font-display text-[15px] font-semibold tracking-tight">{{ $brand }}</span>
                </a>

                <p class="mt-4 text-sm/6 text-muted">{{ $tagline }}</p>

                <ul role="list" class="mt-6 flex items-center gap-2">
                    @foreach ($social as $item)
                    <li>
                        <a href="{{ $item->url }}" aria-label="{{ $item->text }}" class="flex size-9 items-center justify-center rounded-lg border border-line text-muted transition-colors duration-200 hover:border-accent-line hover:text-ink">
                            {!! $item->icon !!}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Link columns -->
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3">
                @foreach ($columns as $column)
                <div>
                    <p class="font-mono text-[11px] font-medium tracking-widest text-faint uppercase">{{ $column->text }}</p>
                    @if ($column->children ?? false)
                    <ul role="list" class="mt-4 flex flex-col gap-3 text-sm">
                        @foreach ($column->children as $child)
                        <li>
                            <a href="{{ $child->url }}" class="text-muted transition-colors duration-200 hover:text-ink">{{ $child->text }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>

        </div>

        <div class="mt-16 flex flex-wrap items-center justify-between gap-4 border-t border-line pt-8 text-[13px] text-faint">
            <p>{{ $copyright }}</p>
            <p>{{ $note }}</p>
        </div>
    </div>
</footer>
