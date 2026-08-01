<!--
    The Guides index, at /guides. The listing section reads
    resources/data/collections/guides.json — add an entry there and it appears
    here and gets its own page at /guides/{slug} automatically.
-->
<x-layouts.main title="Guides" description="Practical writing on pricing client work, scoping projects that do not overrun, following up without begging, and the questions worth asking before you quote.">

    <x-sections.page-header
        eyebrow="Guides"
        heading="How to charge properly for project work"
        body="Everything here comes from watching forty thousand proposals succeed and fail. No growth hacks — just the arithmetic, the paragraphs, and the questions that decide whether a project is worth taking."
        showMeta="0" />

    <x-sections.guides-index :items="$guides" />

    <x-sections.cta
        heading="Or skip the reading and send one"
        body="Every idea in these guides is already built into the documents Pilot writes. Paste a brief and see them applied."
        ctaText="Start free"
        ctaLink="/pricing"
        secondaryText="See the features"
        secondaryLink="/features"
        note="Three free proposals · No card required" />

</x-layouts.main>
