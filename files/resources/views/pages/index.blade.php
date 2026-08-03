<!--
    The homepage. It lives at pages/index.blade.php, so it's served at "/".
    The page is a list of sections: each tag pulls a component from
    resources/views/components/sections/ and fills its props with these
    attributes. In Visual mode you can select, reorder, and edit them
    on the canvas.

    The shapes alternate on purpose — full-bleed band, editorial two-column,
    bento, split, band, split, masonry, asymmetric close — so the page has a
    rhythm rather than eight variations of the same row.
-->
<x-layouts.main title="The runtime for agents you can ship" description="Pilot is an agent framework for real work — a durable loop, typed tools, checkpointed state, human review, and a trace of every decision your agents make.">

    <x-sections.hero :runs="$runs" :files="$files" />

    <x-sections.logos :items="$logos" />

    <x-sections.steps :items="$steps" />

    <x-sections.deliverables :items="$deliverables" />

    <x-sections.split
        :items="$spend"
        eyebrow="Cost"
        heading="Know what a run costs before it runs"
        body="Agents are cheap until they are not. Pilot meters every call, attributes it to the step that made it, and stops a run that walks past its budget."
        pointOne="Per-run and per-step spend, live"
        pointTwo="Hard budget ceilings that halt instead of overrun"
        pointThree="Cached tool results reused across retries"
        linkText="How Pilot meters a run"
        linkHref="/guides/evaluating-agents"
        align="right"
        visual="packages"
        visualTitle="Spend by step"
        visualChip="Last 24h"
        visualNote="Averaged over 3,410 runs on this workspace." />

    <x-sections.stats :items="$stats" />

    <x-sections.split
        :items="$runPhases"
        eyebrow="The loop"
        heading="A run you can pause, inspect, and resume"
        body="Every step is checkpointed. When a tool times out or a human needs to approve something, the run parks itself instead of dying and losing an hour of work."
        pointOne="Checkpoints after every step, resumable for days"
        pointTwo="Human approval gates anywhere in the loop"
        pointThree="Replay any run against a new prompt or model"
        linkText="Read the loop guide"
        linkHref="/guides/designing-an-agent-loop"
        align="left"
        visual="timeline"
        visualTitle="Run 8f21c"
        visualChip="4m 12s"
        visualNote="Every phase replayable in isolation."
        rulerOne="0s"
        rulerTwo="60s"
        rulerThree="120s"
        rulerFour="180s"
        rulerFive="252s" />

    <x-sections.testimonials :items="$testimonials" />

    <x-sections.cta />

</x-layouts.main>
