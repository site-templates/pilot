<!--
    The Guides index, at /guides. The listing section reads
    resources/data/collections/guides.json — add an entry there and it appears
    here and gets its own page at /guides/{slug} automatically.
-->
<x-layouts.main title="Guides" description="Practical writing on agent engineering — designing a loop that survives production, writing tools that fail well, evaluating agents properly, and what a run really costs.">

    <x-sections.page-header
        eyebrow="Guides"
        heading="How to build agents that survive production"
        body="Everything here comes from watching a lot of agent runs fail in interesting ways. No prompt tricks — just the loop, the tools, the tests, and the bill."
        showMeta="0" />

    <x-sections.guides-index :items="$guides" />

    <x-sections.cta
        heading="Or skip the reading and run one"
        body="Every idea in these guides is already built into the runtime. Install it and the defaults are the advice."
        ctaText="Get started"
        ctaLink="/pricing"
        secondaryText="See the runtime"
        secondaryLink="/features"
        note="Apache 2.0 · No account needed to start" />

</x-layouts.main>
