/*
    Pilot — the interaction layer.

    Everything here is a progressive enhancement, in three tiers:

      1. No JavaScript at all — nothing is hidden, every link works.
      2. JavaScript but no GSAP (the CDN blocked, offline, an old browser) —
         an IntersectionObserver drives the same reveals through the CSS
         transitions in site.css.
      3. GSAP present — it takes over the scroll work and adds the mesh
         parallax and the trace rows resolving inside the hero console.

    Reduced motion short-circuits all of it: everything is revealed at once
    and no timeline is ever built.

    setUp(root) owns everything inside <main> — reveals, the transformer,
    the mesh parallax, the spotlight cards. It runs once on load and again
    after every instant navigation for the swapped-in <main>, tearing down
    the old page's ScrollTriggers, observers and timers first. The header
    (glass, dropdowns, mobile menu) binds once — it persists across pages.
*/

// Flag the document early so CSS only hides reveal targets when JS will
// actually reveal them. This file loads with defer, before first paint.
document.documentElement.classList.add('js');

var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// GSAP loads with defer ahead of this file, so it is here by now if it is
// coming at all.
var hasGsap = typeof window.gsap !== 'undefined' && typeof window.ScrollTrigger !== 'undefined';

if (hasGsap) {
    window.gsap.registerPlugin(window.ScrollTrigger);
}

// The handles the current <main> owns — see tearDown.
var triggers = [];
var tweens = [];
var revealObserver = null;
var revealWatched = [];
var transformerObserver = null;
var transformerTimers = [];

headerState();
dropdowns();
mobileMenu();
markCurrentMenuItem();
setUp(document);

// A new page arrived in place: land on it with the header at rest, then
// build the page's motion for the new <main>.
document.addEventListener('instant:navigated', function (event) {
    closeMobileMenu();
    closeDropdowns();
    markCurrentMenuItem();
    setUp(event.detail.main);
});

function setUp(root) {
    tearDown();

    spotlightCards(root);
    reveals(root);
    transformer(root);

    if (hasGsap && !reduceMotion) {
        meshParallax(root);
    }

    if (hasGsap) {
        window.ScrollTrigger.refresh();
    }
}

/*
    Every handle the last <main> owned: the ScrollTriggers (and tweens) built
    for its content, the fallback observers, and the transformer's timers.
    Header-level triggers, if any are ever added, should be kept out of
    `triggers` so they survive tearDown.
*/
function tearDown() {
    triggers.forEach(function (trigger) {
        trigger.kill();
    });
    triggers = [];

    tweens.forEach(function (tween) {
        if (tween.scrollTrigger) {
            tween.scrollTrigger.kill();
        }
        tween.kill();
    });
    tweens = [];

    if (revealObserver) {
        revealWatched = revealWatched.filter(function (el) {
            if (el.isConnected && !el.classList.contains('is-visible')) {
                return true;
            }
            revealObserver.unobserve(el);
            return false;
        });
    }

    if (transformerObserver) {
        transformerObserver.disconnect();
        transformerObserver = null;
    }

    transformerTimers.forEach(function (timer) {
        clearTimeout(timer);
    });
    transformerTimers = [];
}

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
    The nav dropdowns. Hover opens with a short intent delay and closes with a
    longer one, so diagonal pointer travel into the panel never slams it shut.
    Click toggles for touch; Escape and outside clicks dismiss. Keyboard focus
    inside the panel holds it open.
*/
function dropdowns() {
    var roots = document.querySelectorAll('[data-dropdown]');

    roots.forEach(function (root) {
        var trigger = root.querySelector('[data-dropdown-trigger]');
        var openTimer = null;
        var closeTimer = null;

        function open() {
            clearTimeout(closeTimer);
            roots.forEach(function (other) {
                if (other !== root) {
                    close(other);
                }
            });
            root.classList.add('is-open');
            if (trigger) {
                trigger.setAttribute('aria-expanded', 'true');
            }
        }

        function close(target) {
            var el = target || root;
            el.classList.remove('is-open');
            var t = el.querySelector('[data-dropdown-trigger]');
            if (t) {
                t.setAttribute('aria-expanded', 'false');
            }
        }

        root.addEventListener('pointerenter', function (event) {
            if (event.pointerType !== 'mouse') {
                return;
            }
            clearTimeout(closeTimer);
            openTimer = setTimeout(open, 50);
        });

        root.addEventListener('pointerleave', function (event) {
            if (event.pointerType !== 'mouse') {
                return;
            }
            clearTimeout(openTimer);
            closeTimer = setTimeout(function () {
                close();
            }, 180);
        });

        if (trigger) {
            trigger.addEventListener('click', function (event) {
                event.preventDefault();
                root.classList.contains('is-open') ? close() : open();
            });
        }

        root.addEventListener('focusout', function (event) {
            if (!root.contains(event.relatedTarget)) {
                close();
            }
        });
    });

    document.addEventListener('click', function (event) {
        roots.forEach(function (root) {
            if (!root.contains(event.target)) {
                root.classList.remove('is-open');
                var t = root.querySelector('[data-dropdown-trigger]');
                if (t) {
                    t.setAttribute('aria-expanded', 'false');
                }
            }
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeDropdowns();
        }
    });
}

function closeDropdowns() {
    document.querySelectorAll('[data-dropdown]').forEach(function (root) {
        root.classList.remove('is-open');
        var t = root.querySelector('[data-dropdown-trigger]');
        if (t) {
            t.setAttribute('aria-expanded', 'false');
        }
    });
}

/*
    The mobile menu: the hamburger toggles .menu-open on <html>, which slides
    the sheet down and locks scrolling. Closing on navigation keeps
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
        link.addEventListener('click', closeMobileMenu);
    });

    // Escape closes the sheet from anywhere.
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeMobileMenu();
        }
    });
}

function closeMobileMenu() {
    var button = document.querySelector('[data-mobile-toggle]');

    document.documentElement.classList.remove('menu-open');

    if (button) {
        button.setAttribute('aria-expanded', 'false');
    }
}

/*
    Scroll reveals. Elements tagged data-reveal start softened (see site.css)
    and settle as they enter the viewport — GSAP's ScrollTrigger when it is
    available, an IntersectionObserver when it is not. Either way each element
    animates once, and --reveal-delay staggers siblings.
*/
function reveals(root) {
    var targets = root.querySelectorAll('[data-reveal]');

    // Reduced motion, or no observer support at all: show everything now.
    if (reduceMotion || !('IntersectionObserver' in window)) {
        showAll(targets);
        return;
    }

    if (hasGsap) {
        targets.forEach(function (el) {
            triggers.push(window.ScrollTrigger.create({
                trigger: el,
                start: 'top 92%',
                once: true,
                onEnter: function () {
                    el.classList.add('is-visible');
                },
            }));

            // Anything already above the fold reveals immediately.
            if (el.getBoundingClientRect().top < window.innerHeight * 0.92) {
                el.classList.add('is-visible');
            }
        });

        return;
    }

    if (!revealObserver) {
        revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.05 });
    }

    targets.forEach(function (el) {
        if (el.getBoundingClientRect().top < window.innerHeight * 0.92) {
            el.classList.add('is-visible');
        } else {
            revealObserver.observe(el);
            revealWatched.push(el);
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
    into view the trace rows resolve one after another, as if
    the document were being written, and a single shimmer sweeps the pane.

    Without GSAP the same sequence runs on a plain timer; with reduced motion
    every row is simply resolved from the start.
*/
function transformer(scope) {
    var root = scope.querySelector('[data-transformer]');

    if (!root) {
        return;
    }

    var rows = root.querySelectorAll('.trace-row');

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
            transformerTimers.push(setTimeout(function () {
                row.classList.add('is-resolved');
            }, 260 + index * 130));
        });
    }

    if (hasGsap) {
        triggers.push(window.ScrollTrigger.create({ trigger: root, start: 'top 85%', once: true, onEnter: run }));
    }

    // The window sits above the fold on most screens, so start it either way.
    if (root.getBoundingClientRect().top < window.innerHeight * 0.85) {
        run();
    } else if (!hasGsap) {
        transformerObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    run();
                    transformerObserver.disconnect();
                }
            });
        }, { threshold: 0.15 });

        transformerObserver.observe(root);
    }
}

/*
    The aurora mesh drifts on a CSS keyframe all by itself; GSAP adds the
    scroll parallax on top, sliding the whole mesh slower than the page so
    the hero feels like it has depth. Skipped entirely on reduced motion.
*/
function meshParallax(root) {
    root.querySelectorAll('[data-mesh-parallax]').forEach(function (mesh) {
        tweens.push(window.gsap.to(mesh, {
            yPercent: 14,
            ease: 'none',
            scrollTrigger: {
                trigger: mesh.parentElement,
                start: 'top top',
                end: 'bottom top',
                scrub: 0.6,
            },
        }));
    });
}

/*
    aria-current tells screen readers which page you're on and lights up the
    active nav link. Section pages count for their parents, so /guides/some
    guide keeps Guides lit. Recomputed after every instant navigation, so the
    mark is cleared first.
*/
function markCurrentMenuItem() {
    document.querySelectorAll('#header a[href], [data-mobile-panel] a[href]').forEach(function (link) {
        var path = window.location.pathname;

        link.removeAttribute('aria-current');

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
function spotlightCards(root) {
    root.querySelectorAll('.spotlight-card').forEach(function (card) {
        card.addEventListener('pointermove', function (event) {
            var rect = card.getBoundingClientRect();
            card.style.setProperty('--mx', (event.clientX - rect.left) + 'px');
            card.style.setProperty('--my', (event.clientY - rect.top) + 'px');
        });
    });
}
