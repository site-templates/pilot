/*
    Pilot — the interaction layer.

    Everything here is a progressive enhancement, in three tiers:

      1. No JavaScript at all — nothing is hidden, every link works.
      2. JavaScript but no GSAP (the CDN blocked, offline, an old browser) —
         an IntersectionObserver drives the same reveals through the CSS
         transitions in site.css.
      3. GSAP present — it takes over the scroll work and adds the mesh
         parallax and the proposal rows resolving inside the hero window.

    Reduced motion short-circuits all of it: everything is revealed at once
    and no timeline is ever built.
*/

// Flag the document early so CSS only hides reveal targets when JS will
// actually reveal them. This file loads with defer, before first paint.
document.documentElement.classList.add('js');

var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
var hasGsap = false;

document.addEventListener('DOMContentLoaded', function () {
    hasGsap = typeof window.gsap !== 'undefined' && typeof window.ScrollTrigger !== 'undefined';

    if (hasGsap) {
        window.gsap.registerPlugin(window.ScrollTrigger);
    }

    headerState();
    mobileMenu();
    markCurrentMenuItem();
    spotlightCards();
    reveals();
    transformer();

    if (hasGsap && !reduceMotion) {
        meshParallax();
    }
});

/*
    The header rests transparent at the very top of the page; the moment
    content scrolls underneath it, data-scrolled fades in the glass, blur,
    and hairline (see the #header rules in site.css).
*/
function headerState() {
    var header = document.getElementById('header');

    if (!header) {
        return;
    }

    function evaluate() {
        header.toggleAttribute('data-scrolled', window.scrollY > 8);
    }

    evaluate();
    window.addEventListener('scroll', evaluate, { passive: true });
}

/*
    The mobile menu: the hamburger toggles .menu-open on <html>, which slides
    the glass sheet down and locks scrolling. Closing on navigation keeps
    same-page anchors from leaving the sheet hanging open.
*/
function mobileMenu() {
    var button = document.querySelector('[data-mobile-toggle]');
    var panel = document.querySelector('[data-mobile-panel]');

    if (!button || !panel) {
        return;
    }

    button.addEventListener('click', function () {
        var open = document.documentElement.classList.toggle('menu-open');
        button.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    panel.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            document.documentElement.classList.remove('menu-open');
            button.setAttribute('aria-expanded', 'false');
        });
    });

    // Escape closes the sheet from anywhere.
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            document.documentElement.classList.remove('menu-open');
            button.setAttribute('aria-expanded', 'false');
        }
    });
}

/*
    Scroll reveals. Elements tagged data-reveal start softened (see site.css)
    and settle as they enter the viewport — GSAP's ScrollTrigger when it is
    available, an IntersectionObserver when it is not. Either way each element
    animates once, and --reveal-delay staggers siblings.
*/
function reveals() {
    var targets = document.querySelectorAll('[data-reveal]');

    // Reduced motion, or no observer support at all: show everything now.
    if (reduceMotion || !('IntersectionObserver' in window)) {
        showAll(targets);
        return;
    }

    if (hasGsap) {
        targets.forEach(function (el) {
            window.ScrollTrigger.create({
                trigger: el,
                start: 'top 92%',
                once: true,
                onEnter: function () {
                    el.classList.add('is-visible');
                },
            });

            // Anything already above the fold reveals immediately.
            if (el.getBoundingClientRect().top < window.innerHeight * 0.92) {
                el.classList.add('is-visible');
            }
        });

        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.05 });

    targets.forEach(function (el) {
        if (el.getBoundingClientRect().top < window.innerHeight * 0.92) {
            el.classList.add('is-visible');
        } else {
            observer.observe(el);
        }
    });
}

function showAll(nodes) {
    nodes.forEach(function (el) {
        el.classList.add('is-visible');
    });
}

/*
    The Brief Transformer — Pilot's signature. When the hero window scrolls
    into view the proposal rows on the right resolve one after another, as if
    the document were being written, and a single shimmer sweeps the pane.

    Without GSAP the same sequence runs on a plain timer; with reduced motion
    every row is simply resolved from the start.
*/
function transformer() {
    var root = document.querySelector('[data-transformer]');

    if (!root) {
        return;
    }

    var rows = root.querySelectorAll('.proposal-row');

    if (reduceMotion) {
        rows.forEach(function (row) {
            row.classList.add('is-resolved');
        });
        return;
    }

    var started = false;

    function run() {
        if (started) {
            return;
        }

        started = true;
        root.classList.add('is-generating');

        rows.forEach(function (row, index) {
            setTimeout(function () {
                row.classList.add('is-resolved');
            }, 260 + index * 130);
        });
    }

    if (hasGsap) {
        window.ScrollTrigger.create({ trigger: root, start: 'top 85%', once: true, onEnter: run });
    }

    // The window sits above the fold on most screens, so start it either way.
    if (root.getBoundingClientRect().top < window.innerHeight * 0.85) {
        run();
    } else if (!hasGsap) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    run();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.15 });

        observer.observe(root);
    }
}

/*
    The aurora mesh drifts on a CSS keyframe all by itself; GSAP adds the
    scroll parallax on top, sliding the whole mesh slower than the page so
    the hero feels like it has depth. Skipped entirely on reduced motion.
*/
function meshParallax() {
    document.querySelectorAll('[data-mesh-parallax]').forEach(function (mesh) {
        window.gsap.to(mesh, {
            yPercent: 14,
            ease: 'none',
            scrollTrigger: {
                trigger: mesh.parentElement,
                start: 'top top',
                end: 'bottom top',
                scrub: 0.6,
            },
        });
    });
}

/*
    aria-current tells screen readers which page you're on and lights up the
    active nav link. Section pages count for their parents, so /guides/some
    guide keeps Guides lit.
*/
function markCurrentMenuItem() {
    document.querySelectorAll('#header a[href], [data-mobile-panel] a[href]').forEach(function (link) {
        var path = window.location.pathname;

        if (link.pathname !== '/' && (path === link.pathname || path.startsWith(link.pathname + '/'))) {
            link.setAttribute('aria-current', 'page');
        } else if (link.pathname === '/' && path === '/') {
            link.setAttribute('aria-current', 'page');
        }
    });
}

/*
    Spotlight cards: track the pointer per card and let the CSS ::after layer
    paint a soft accent bloom underneath it.
*/
function spotlightCards() {
    document.querySelectorAll('.spotlight-card').forEach(function (card) {
        card.addEventListener('pointermove', function (event) {
            var rect = card.getBoundingClientRect();
            card.style.setProperty('--mx', (event.clientX - rect.left) + 'px');
            card.style.setProperty('--my', (event.clientY - rect.top) + 'px');
        });
    });
}
