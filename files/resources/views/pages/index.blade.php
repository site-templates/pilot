<!--
    The homepage. It lives at pages/index.blade.php, so it's served at "/".
    The page is a list of sections: each tag pulls a component from
    resources/views/components/sections/ and fills its props with these
    attributes. In Visual mode you can select, reorder, and edit them
    on the canvas.

    The shapes alternate on purpose — full-bleed band, editorial two-column,
    bento, split, band, split, bento, centered — so the page has a rhythm
    rather than eight variations of the same row.
-->
<x-layouts.main title="Proposals that win the work" description="Pilot turns a short client brief into a polished proposal, scope of work, pricing packages, and a timeline — so freelancers and agencies can price with confidence and win more client work.">

    <x-sections.hero :scope="$heroScope" :milestones="$heroMilestones" :tiers="$heroTiers" />

    <x-sections.logos :items="$logos" />

    <x-sections.steps :items="$steps" />

    <x-sections.deliverables :items="$deliverables" />

    <x-sections.split
        :items="$packages"
        eyebrow="Pricing"
        heading="Price the work, not the hours"
        body="Hourly rates punish you for getting faster. Pilot reads the scope and proposes three packages, each with a number you can defend in a room."
        pointOne="Three tiers, anchored so the middle one wins"
        pointTwo="Benchmarks from projects like this one, in your region"
        pointThree="Every line item priced — nothing vanishes into “design”"
        linkText="How Pilot arrives at a number"
        linkHref="/guides/how-to-price-client-work"
        align="right"
        visual="packages"
        visualTitle="Suggested packages"
        visualChip="Northbeam"
        visualNote="Benchmarked against 1,240 similar projects." />

    <x-sections.stats :items="$stats" />

    <x-sections.split
        :items="$phases"
        eyebrow="Timeline"
        heading="A schedule the client agrees to up front"
        body="Most projects do not run late because the work was slow. They run late because nobody wrote down when feedback was due. Pilot does."
        pointOne="Review windows with the client's homework marked in"
        pointTwo="Dependencies flagged before they become a phone call"
        pointThree="Slips re-price automatically against your terms"
        linkText="Read the scoping guide"
        linkHref="/guides/writing-scope-that-holds"
        align="left"
        visual="timeline"
        visualTitle="Project schedule"
        visualChip="8 weeks"
        visualNote="Generated from the scope, adjustable line by line." />

    <x-sections.testimonials :items="$testimonials" />

    <x-sections.cta />

</x-layouts.main>
