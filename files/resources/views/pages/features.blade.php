<!--
    The Features page, at /features. Where the homepage bento gives the
    headline version of each piece, this page is the specification: one
    hairlined row per part of the runtime, then what it plugs into.
-->
<x-layouts.main title="The runtime" description="Everything Pilot gives you — a durable loop, typed tools, persistent state, human approval gates, replayable traces, evals in CI, and metered spend.">

    <x-sections.page-header
        eyebrow="The runtime"
        heading="Everything the demo skipped"
        body="The loop is the easy part. Here is exactly what Pilot gives you, what it expects from your code, and what it deliberately leaves alone."
        showMeta="1"
        metaOne="7"
        metaTwo="parts, one dependency" />

    <x-sections.feature-rows :items="$features" />

    <x-sections.integrations :items="$integrations" />

    <x-sections.cta
        heading="Wire one tool and watch the trace"
        body="The runtime is open source. Install it, give an agent a single function to call, and read what comes back before you commit to anything."
        ctaText="Get started"
        ctaLink="/pricing"
        secondaryText="Read the guides"
        secondaryLink="/guides"
        note="Apache 2.0 · No account needed to start" />

</x-layouts.main>
