<!--
    The Pricing page, at /pricing. Plans, then the line-by-line comparison,
    then the questions people actually ask before they pay for something.
-->
<x-layouts.main title="Pricing" description="Flat monthly pricing for freelancers and studios — no cut of your invoices, no per-proposal fee. Three plans, unlimited proposals from Studio up.">

    <x-sections.page-header
        eyebrow="Pricing"
        heading="One flat fee. However many proposals you send."
        body="We do not take a percentage of your invoices. You are the one doing the work — charging you more for winning bigger projects would be a strange way to run a business."
        showMeta="1"
        metaOne="14 days"
        metaTwo="free, no card" />

    <x-sections.pricing
        :items="$plans"
        eyebrow="Plans"
        heading="Every plan writes all seven documents"
        body="Nothing is held back on the cheaper tiers — the proposal you send on Solo is the same document you send on Agency. What changes is volume, seats, and how much control you want over what goes out." />

    <x-sections.comparison :items="$comparison" />

    <x-sections.faq :items="$faq" />

    <x-sections.cta
        heading="Send the next one in ninety seconds"
        body="Start on the free tier and keep the first three proposals whatever you decide afterwards. They are your documents."
        ctaText="Start free"
        ctaLink="#"
        secondaryText="Talk to us"
        secondaryLink="mailto:hello@pilot.co"
        note="No card required · Cancel any time · Export everything" />

</x-layouts.main>
