<!--
    The Features page, at /features. Where the homepage bento gives the
    headline version of each document, this page is the specification: one
    hairlined row per deliverable, then the tools it hands off to.
-->
<x-layouts.main title="Features" description="Every document Pilot writes from a client brief — the proposal, the scope of work, pricing packages, milestones, contract-ready terms, follow-up emails, and client questionnaires.">

    <x-sections.page-header
        eyebrow="Features"
        heading="Everything the brief did not say"
        body="A proposal is only useful if you trust it enough to send without rereading twice. Here is exactly what Pilot writes, what it takes from you, and what it refuses to guess."
        showMeta="1"
        metaOne="7"
        metaTwo="documents per brief" />

    <x-sections.feature-rows :items="$features" />

    <x-sections.integrations :items="$integrations" />

    <x-sections.cta
        heading="See it run on a brief of your own"
        body="Paste in the last enquiry you received. If what comes back is not better than what you would have written, close the tab — it costs nothing."
        ctaText="Start free"
        ctaLink="/pricing"
        secondaryText="Read the guides"
        secondaryLink="/guides"
        note="Three free proposals · No card required" />

</x-layouts.main>
