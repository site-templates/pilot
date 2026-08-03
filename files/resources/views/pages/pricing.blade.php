<!--
    The Pricing page, at /pricing. Plans, then the line-by-line comparison,
    then the questions engineers actually ask before they adopt a dependency.
-->
<x-layouts.main title="Pricing" description="The Pilot runtime is open source and always will be. Cloud adds hosted traces, evals in CI, approval routing, and spend metering.">

    <x-sections.page-header
        eyebrow="Pricing"
        heading="The runtime is free. Always."
        body="Pilot is Apache 2.0 and runs entirely on your own infrastructure. You pay only if you would rather not operate the trace store, the eval runner, and the approval queue yourself."
        showMeta="1"
        metaOne="Apache 2.0"
        metaTwo="no strings, no rug pull" />

    <x-sections.pricing
        :items="$plans"
        eyebrow="Plans"
        heading="Free to run. Pay for what you keep."
        body="Every plan runs the same runtime — the open-source one. What Cloud and Enterprise add is somewhere to put the traces, the evals, and the approvals." />

    <x-sections.comparison :items="$comparison" />

    <x-sections.faq :items="$faq" />

    <x-sections.cta
        heading="Start with the open-source runtime"
        body="Nothing to sign up for. Add the dependency, write one tool, and decide about the hosted parts later."
        ctaText="Get started"
        ctaLink="#"
        secondaryText="Talk to us"
        secondaryLink="mailto:hello@pilot.dev"
        note="Apache 2.0 · Bring your own models · Self-host everything" />

</x-layouts.main>
