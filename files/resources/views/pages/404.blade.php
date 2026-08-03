<!--
    The 404 page. Served whenever a URL does not match a page — including a
    /guides/{slug} that is not in the guides collection.
-->
<x-layouts.main title="Page not found" description="That page does not exist.">

    <section class="relative flex min-h-[80vh] items-center overflow-hidden py-24">

        <div class="spectrum spectrum--calm" aria-hidden="true">
            <img src="/images/hero-field.jpg" alt="" class="spectrum-image" width="1920" height="1086" loading="lazy">
            <span class="spectrum-veil"></span>
        </div>

        <div class="relative z-10 mx-auto w-full max-w-6xl px-6">
            <p class="font-mono text-[11px] tracking-widest text-accent uppercase">Error 404</p>
            <h1 class="mt-5 max-w-[16ch] font-display text-4xl leading-[1.06] font-semibold tracking-[-0.035em] text-balance text-ink sm:text-5xl lg:text-6xl">This page is out of scope.</h1>
            <p class="mt-6 max-w-[46ch] text-lg/8 text-muted">The link is broken or the page has moved. Everything else is one click away.</p>

            <div class="mt-10 flex flex-wrap items-center gap-3">
                <a href="/" class="rounded-full bg-accent px-6 py-3 text-sm font-medium text-accent-ink transition-opacity duration-200 hover:opacity-90">Back to the homepage</a>
                <a href="/guides" class="rounded-full border border-line bg-panel/50 px-5 py-3 text-sm font-medium text-ink backdrop-blur-sm transition-colors duration-200 hover:border-accent-line hover:bg-panel">Read the guides</a>
            </div>
        </div>
    </section>

</x-layouts.main>
