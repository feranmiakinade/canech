<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <title>CANECH — Digital Experiences</title>

    <meta name="description" content="CANECH designs and builds websites, brands and digital products.">

    <meta property="og:type" content="website">
    <meta property="og:title" content="CANECH — Digital Experiences">
    <meta property="og:description" content="CANECH designs and builds websites, brands and digital products.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/work/canech-core-black.jpg') }}">
    <meta property="og:image:alt" content="CANECH — Digital Experiences">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="CANECH — Digital Experiences">
    <meta name="twitter:description" content="CANECH designs and builds websites, brands and digital products.">
    <meta name="twitter:image" content="{{ asset('images/work/canech-core-black.jpg') }}">
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700;800&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 
    <!-- flag JS early so scroll-reveal never hides content when scripts are off -->
    <script>document.documentElement.classList.add('js');</script>
 
    <style>
        :root {
            --bg: #F7F7F5;
            --card: #FFFFFF;
            --text: #0e0e0f;
            --muted: #6a6a66;
            --accent: #B6FF00;
            --accent-deep: #8fcc00;
            --line: #E6E6E2;
            --line-strong: #D2D2CD;
 
            /* glass */
            --glass-bg: linear-gradient(135deg, rgba(255,255,255,0.74) 0%, rgba(255,255,255,0.42) 100%);
            --glass-bg-hover: linear-gradient(135deg, rgba(255,255,255,0.90) 0%, rgba(255,255,255,0.62) 100%);
            --glass-border: rgba(14,14,15,0.08);
            --glass-highlight: rgba(255,255,255,0.95);
            --glass-blur: blur(22px) saturate(170%);
 
            /* hero slider timing (keep in sync with SLIDE_MS in the script) */
            --slide-dur: 6s;
 
            box-sizing: border-box;
        }
 
        *, *::before, *::after { box-sizing: inherit; }
        * { margin: 0; padding: 0; }
 
        html { scroll-behavior: smooth; scroll-padding-top: 90px; }
 
        body {
            font-family: 'Inter Tight', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
            line-height: 1.5;
            overflow-x: hidden;
        }
 
        .sr-only {
            position: absolute;
            width: 1px; height: 1px;
            margin: -1px; padding: 0;
            overflow: hidden;
            clip: rect(0,0,0,0);
            white-space: nowrap;
            border: 0;
        }
 
        /* soft lime glow, fixed behind everything: this is what the glass frosts over */
        .glow {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            background:
                radial-gradient(620px 520px at 90% 6%,  rgba(182,255,0,0.30), transparent 66%),
                radial-gradient(720px 620px at 2% 52%,  rgba(182,255,0,0.17), transparent 66%),
                radial-gradient(640px 560px at 78% 96%, rgba(182,255,0,0.16), transparent 66%),
                radial-gradient(460px 420px at 42% 34%, rgba(182,255,0,0.09), transparent 66%);
        }
 
        /* faint engineering grid */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            background-image:
                linear-gradient(to right, rgba(14,14,15,0.045) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(14,14,15,0.045) 1px, transparent 1px);
            background-size: 72px 72px;
            -webkit-mask-image: radial-gradient(ellipse at 50% 15%, #000 15%, transparent 72%);
            mask-image: radial-gradient(ellipse at 50% 15%, #000 15%, transparent 72%);
        }
 
        a { color: inherit; text-decoration: none; }
 
        :focus-visible { outline: 2px solid var(--text); outline-offset: 3px; }
 
        ::selection { background: var(--accent); color: var(--text); }
 
        .wrap {
            position: relative;
            z-index: 1;
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 32px;
        }
 
        /* frosted glass panel: gradient tint, hairline border, bright inner edge */
        .card {
            position: relative;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            -webkit-backdrop-filter: var(--glass-blur);
            backdrop-filter: var(--glass-blur);
            box-shadow:
                inset 0 1px 0 var(--glass-highlight),
                inset 0 0 0 1px rgba(255,255,255,0.35),
                0 18px 44px rgba(14,14,15,0.05);
        }
 
        /* ---------- BUTTONS ---------- */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 24px;
            border-radius: 2px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.2px;
            border: 1px solid transparent;
            cursor: pointer;
            font-family: inherit;
            transition: background .15s ease, color .15s ease, border-color .15s ease, opacity .15s ease;
        }
        .btn-primary { background: var(--accent); color: var(--text); border-color: var(--accent); }
        .btn-primary:hover { background: var(--text); color: var(--accent); border-color: var(--text); }
        .btn-ghost {
            border-color: var(--glass-border);
            color: var(--text);
            background: rgba(255,255,255,0.45);
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
            box-shadow: inset 0 1px 0 var(--glass-highlight);
        }
        .btn-ghost:hover { border-color: var(--text); background: rgba(255,255,255,0.85); }
 
        /* ---------- NAV ---------- */
        .site-nav {
            position: sticky;
            top: 0;
            z-index: 50;
            margin: 0 -32px;
            padding: 0 32px;
            border-bottom: 1px solid var(--glass-border);
            background: rgba(247,247,245,0.58);
            -webkit-backdrop-filter: blur(22px) saturate(170%);
            backdrop-filter: blur(22px) saturate(170%);
            box-shadow: inset 0 -1px 0 rgba(255,255,255,0.7);
        }
        .nav-inner {
            max-width: 1320px;
            margin: 0 auto;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .brand {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            font-weight: 800;
            font-size: 18px;
            letter-spacing: 0.22em;
            background: transparent;
        }
        .brand img {
            display: block;
            height: 42px;
            width: auto;
            max-width: 220px;
            object-fit: contain;
            background: transparent;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 34px;
            font-size: 14px;
            font-weight: 500;
        }
        .nav-links a:not(.btn) { color: var(--muted); transition: color .15s ease; }
        .nav-links a:not(.btn):hover { color: var(--text); }
        .nav-links .btn { padding: 10px 18px; }
 
        /* ---------- HERO ---------- */
        .hero { padding: 110px 0 0; }
 
        .status {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 12.5px;
            font-weight: 600;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 40px;
            padding: 8px 14px 8px 12px;
            background: rgba(255,255,255,0.55);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
            box-shadow: inset 0 1px 0 var(--glass-highlight);
        }
        .status::before {
            content: "";
            width: 9px;
            height: 9px;
            background: var(--accent);
            border: 1px solid var(--text);
        }
 
        /* slides are stacked in one grid cell, so the box is always as tall as the
           tallest slide: no layout jump and no dead gap when slides change */
        .hero-slider { display: grid; }
 
        .hero-slide {
            grid-area: 1 / 1;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: opacity .6s ease, transform .6s ease, visibility 0s linear .6s;
        }
        .hero-slide.is-active {
            opacity: 1;
            visibility: visible;
            transform: none;
            transition-delay: 0s;
        }
 
        .slide-kicker {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2.8px;
            text-transform: uppercase;
            color: var(--muted);
        }
        .slide-kicker::before {
            content: "";
            width: 28px;
            height: 2px;
            background: var(--text);
        }
 
        .slide-title {
            font-size: clamp(2.8rem, 8.4vw, 8rem);
            line-height: 0.96;
            font-weight: 700;
            letter-spacing: -0.045em;
            max-width: 15ch;
        }
        /* lime as a highlighter mark, text stays near-black */
        .slide-title em {
            font-style: normal;
            background: linear-gradient(transparent 60%, var(--accent) 60% 93%, transparent 93%);
            padding: 0 0.04em;
            -webkit-box-decoration-break: clone;
            box-decoration-break: clone;
        }
 
        /* slider controls: arrows, counter, segmented progress */
        .hero-controls {
            display: flex;
            align-items: center;
            gap: 22px;
            flex-wrap: wrap;
            margin-top: 36px;
        }
        .hero-arrows { display: flex; gap: 8px; }
        .hero-arrows button {
            width: 42px;
            height: 42px;
            border: 1px solid var(--glass-border);
            background: rgba(255,255,255,0.6);
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
            box-shadow: inset 0 1px 0 var(--glass-highlight);
            color: var(--text);
            border-radius: 2px;
            cursor: pointer;
            font-size: 17px;
            line-height: 1;
            transition: background .15s ease, color .15s ease, border-color .15s ease;
        }
        .hero-arrows button:hover {
            background: var(--text);
            color: var(--accent);
            border-color: var(--text);
        }
 
 
        .hero-segs { display: flex; gap: 8px; }
        .hero-seg {
            position: relative;
            width: 56px;
            height: 22px;
            border: 0;
            background: none;
            cursor: pointer;
        }
        .hero-seg::before,
        .hero-seg::after {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            height: 3px;
            margin-top: -1.5px;
        }
        .hero-seg::before { right: 0; background: var(--line-strong); }
        .hero-seg::after  { width: 0; background: var(--text); }
        .hero-seg.done::after { width: 100%; }
        .hero-seg.active::after { animation: segFill var(--slide-dur) linear forwards; }
        .is-paused .hero-seg.active::after { animation-play-state: paused; }
        @keyframes segFill { to { width: 100%; } }
 
        .hero-lede {
            margin-top: 52px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 40px;
            flex-wrap: wrap;
        }
        .hero-lede p {
            font-size: clamp(1.05rem, 1.6vw, 1.3rem);
            line-height: 1.5;
            color: var(--muted);
            max-width: 46ch;
        }
        .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }
 
        /* info strip: now a frosted glass panel */
        .hero-meta {
            margin-top: 96px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }
        .meta-cell {
            padding: 26px 28px 30px;
            border-right: 1px solid var(--glass-border);
        }
        .meta-cell:last-child { border-right: none; }
        .meta-label {
            display: block;
            font-size: 11.5px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 10px;
        }
        .meta-value { font-size: 16px; font-weight: 500; line-height: 1.5; }
        a.meta-value { border-bottom: 2px solid var(--accent); padding-bottom: 1px; }
        a.meta-value:hover { background: var(--accent); }
 
        /* ---------- TICKER ---------- */
        .ticker {
            margin-top: 80px;
            overflow: hidden;
            background: rgba(14,14,15,0.86);
            color: var(--bg);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 2px;
            -webkit-backdrop-filter: blur(14px) saturate(140%);
            backdrop-filter: blur(14px) saturate(140%);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.06);
        }
        .ticker-track {
            display: flex;
            width: max-content;
            animation: tick 38s linear infinite;
        }
        .ticker:hover .ticker-track { animation-play-state: paused; }
        .ticker-group { display: flex; align-items: center; flex-shrink: 0; }
        .ticker-group span {
            padding: 20px 0;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2.6px;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .ticker-group i {
            width: 8px;
            height: 8px;
            margin: 0 34px;
            background: var(--accent);
            flex-shrink: 0;
        }
        @keyframes tick { to { transform: translateX(-50%); } }
 
        /* ---------- SECTION HEADS ---------- */
        .section { padding: 120px 0 0; }
        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 30px;
            flex-wrap: wrap;
            padding-bottom: 32px;
            border-bottom: 1px solid var(--line-strong);
            margin-bottom: 44px;
        }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2.4px;
            text-transform: uppercase;
            color: var(--text);
            margin-bottom: 16px;
        }
        .eyebrow::before {
            content: "";
            width: 10px;
            height: 10px;
            background: var(--accent);
            border: 1px solid var(--text);
        }
        .section-head h2 {
            font-size: clamp(2rem, 4.6vw, 3.6rem);
            line-height: 1;
            font-weight: 700;
            letter-spacing: -0.035em;
        }
        .section-head p { color: var(--muted); max-width: 38ch; font-size: 16px; }
 
        /* ---------- SELECTED WORK ---------- */
        .work-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            align-items: stretch;
        }
 
        .work-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 12px 12px 26px;
            overflow: hidden;
            color: inherit;
            transition: border-color .25s ease, transform .25s ease, box-shadow .25s ease, background .25s ease;
        }
        .work-card:hover {
            background: var(--glass-bg-hover);
            border-color: var(--text);
            transform: translateY(-5px);
            box-shadow:
                inset 0 1px 0 var(--glass-highlight),
                inset 0 0 0 1px rgba(255,255,255,0.5),
                0 26px 54px rgba(14,14,15,0.11);
        }
 
        /* light sweeping across the glass on hover */
        .work-card::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 3;
            pointer-events: none;
            background: linear-gradient(115deg, transparent 38%, rgba(255,255,255,0.6) 50%, transparent 62%);
            transform: translateX(-120%);
            transition: transform .9s ease;
        }
        .work-card:hover::after { transform: translateX(120%); }
 
        /* screenshot inside a slim browser frame */
        .work-media {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 2px;
            background: #efefec;
        }
        .browser-bar {
            display: flex;
            align-items: center;
            gap: 6px;
            height: 36px;
            padding: 0 12px;
            background: rgba(255,255,255,0.6);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--line);
        }
        .browser-bar i {
            width: 8px;
            height: 8px;
            background: var(--line-strong);
        }
        .browser-bar i:first-child { background: var(--accent); border: 1px solid var(--text); }
        .browser-bar span {
            flex: 1;
            max-width: 280px;
            margin-left: 10px;
            height: 22px;
            line-height: 22px;
            padding: 0 10px;
            font-size: 11.5px;
            color: var(--muted);
            background: rgba(14,14,15,0.045);
            border-radius: 2px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
                .work-media {
            position: relative;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            border-radius: 2px;
            border: 1px solid var(--line);
            background: #efefec;
        }
 
        .work-media img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }
        .work-card.is-food   .work-shot img { object-position: center 18%; }
        .work-card.is-rental .work-shot img { object-position: center center; }
        .work-card:hover .work-shot img { transform: scale(1.045); }
 
        .project-type {
            position: absolute;
            top: 14px;
            right: 14px;
            z-index: 2;
            padding: 6px 10px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            background: rgba(255,255,255,0.74);
            border: 1px solid var(--glass-border);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            box-shadow: inset 0 1px 0 var(--glass-highlight);
            transition: background .25s ease, border-color .25s ease;
        }
        .work-card:hover .project-type { background: var(--accent); border-color: var(--text); }
 
        .work-info {
            display: flex;
            flex-direction: column;
            flex: 1;
            gap: 14px;
            padding: 26px 12px 0;
        }
        .work-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            letter-spacing: 1.6px;
            text-transform: uppercase;
            color: var(--muted);
        }
        .work-top .idx {
            background: var(--accent);
            color: var(--text);
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 2px;
            letter-spacing: 1px;
        }
        .work-card h3 {
            font-size: clamp(1.5rem, 2.6vw, 2.1rem);
            font-weight: 700;
            letter-spacing: -0.03em;
            line-height: 1.1;
        }
        .work-card p { color: var(--muted); font-size: 15px; line-height: 1.65; max-width: 48ch; }
 
        .tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 10px; }
        .tags span {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.6px;
            padding: 5px 10px;
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            color: #3a3a37;
            background: rgba(255,255,255,0.55);
            box-shadow: inset 0 1px 0 var(--glass-highlight);
            transition: border-color .25s ease, background .25s ease;
        }
        .work-card:hover .tags span { border-color: rgba(14,14,15,0.25); background: rgba(255,255,255,0.85); }
 
        .work-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 18px;
            border-top: 1px solid var(--line);
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
        }
        .work-link b {
            font-weight: 600;
            border-bottom: 2px solid var(--accent);
            padding-bottom: 1px;
            transition: background .15s ease;
        }
        .work-card:hover .work-link b { background: var(--accent); }
        .work-link span {
            display: grid;
            place-items: center;
            width: 34px;
            height: 34px;
            border: 1px solid var(--line-strong);
            border-radius: 2px;
            font-size: 15px;
            transition: transform .25s ease, background .25s ease, border-color .25s ease;
        }
        .work-card:hover .work-link span {
            background: var(--accent);
            border-color: var(--text);
            transform: translate(3px, -3px);
        }
 
        /* nudge under the grid */
        .work-more {
            margin-top: 24px;
            padding: 22px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }
        .work-more p { font-size: 17px; font-weight: 600; letter-spacing: -0.01em; }
 
        /* ---------- SERVICES ---------- */
        .service-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            list-style: none;
            gap: 14px;
        }
        .service-item {
            position: relative;
            padding: 32px 26px 36px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            -webkit-backdrop-filter: var(--glass-blur);
            backdrop-filter: var(--glass-blur);
            box-shadow:
                inset 0 1px 0 var(--glass-highlight),
                0 12px 30px rgba(14,14,15,0.04);
            display: flex;
            flex-direction: column;
            gap: 38px;
            transition: background .25s ease, border-color .25s ease, transform .25s ease, box-shadow .25s ease;
        }
        .service-item:hover {
            background: var(--glass-bg-hover);
            border-color: var(--text);
            transform: translateY(-4px);
            box-shadow:
                inset 0 1px 0 var(--glass-highlight),
                0 20px 40px rgba(14,14,15,0.08);
        }
        .service-item .num {
            align-self: flex-start;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            background: var(--accent);
            color: var(--text);
            padding: 3px 8px;
            border-radius: 2px;
        }
        .service-item h3 { font-size: 21px; font-weight: 650; letter-spacing: -0.02em; line-height: 1.2; margin-bottom: 10px; }
        .service-item p { color: var(--muted); font-size: 15px; }
 
        /* ---------- CONTACT ---------- */
        .cta {
            margin-top: 120px;
            padding: 64px 56px;
            display: grid;
            grid-template-columns: minmax(0, 5fr) minmax(0, 7fr);
            gap: 64px;
            align-items: start;
            border-left: 4px solid var(--accent);
        }
        .cta-heading h2 {
            font-size: clamp(2.2rem, 4.6vw, 3.8rem);
            line-height: 0.98;
            font-weight: 700;
            letter-spacing: -0.04em;
            max-width: 11ch;
        }
        .cta-heading > p {
            margin-top: 22px;
            color: var(--muted);
            max-width: 34ch;
        }
 
        .contact-direct {
            margin-top: 36px;
            padding: 20px;
            background: rgba(255,255,255,0.4);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            box-shadow: inset 0 1px 0 var(--glass-highlight);
        }
        .contact-direct .k {
            display: block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 8px;
        }
        .contact-direct a {
            font-size: 17px;
            font-weight: 600;
            border-bottom: 2px solid var(--accent);
            padding-bottom: 1px;
            word-break: break-all;
        }
        .contact-direct a:hover { background: var(--accent); }
 
        .contact-steps {
            list-style: none;
            margin-top: 30px;
            counter-reset: step;
            display: grid;
            gap: 14px;
        }
        .contact-steps li {
            counter-increment: step;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 14.5px;
            color: #3a3a37;
        }
        .contact-steps li::before {
            content: counter(step);
            flex-shrink: 0;
            display: grid;
            place-items: center;
            width: 26px;
            height: 26px;
            font-size: 12px;
            font-weight: 700;
            background: var(--accent);
            border: 1px solid var(--text);
            border-radius: 2px;
        }
 
        /* the form sits in its own lighter glass panel */
        .contact-panel {
            padding: 34px;
            background: rgba(255,255,255,0.64);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            box-shadow:
                inset 0 1px 0 var(--glass-highlight),
                0 16px 40px rgba(14,14,15,0.06);
        }
 
        .contact-form { display: flex; flex-direction: column; gap: 20px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 8px; }
 
        .form-group label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.6px;
            text-transform: uppercase;
            color: var(--text);
        }
        .form-group label .req { color: #7a7a75; margin-left: 2px; }
 
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid var(--line-strong);
            border-radius: 2px;
            background: rgba(255,255,255,0.8);
            color: var(--text);
            font: inherit;
            font-size: 15px;
            outline: none;
            transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
        }
        .form-group textarea { min-height: 132px; resize: vertical; line-height: 1.55; }
        .form-group input::placeholder,
        .form-group textarea::placeholder { color: #9a9a95; }
 
        .form-group select {
            appearance: none;
            -webkit-appearance: none;
            padding-right: 42px;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' fill='none' stroke='%230e0e0f' stroke-width='1.6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
        }
 
        .form-group input:hover,
        .form-group select:hover,
        .form-group textarea:hover { border-color: #b9b9b3; }
 
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--text);
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(182,255,0,0.5);
        }
 
        .form-group .is-invalid { border-color: #b3261e; }
        .field-error { font-size: 12.5px; color: #b3261e; }
 
        .form-success,
        .form-error {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 22px;
            padding: 15px 18px;
            font-size: 14.5px;
            line-height: 1.5;
            border: 1px solid var(--text);
            border-radius: 2px;
        }
        .form-success { background: rgba(182,255,0,0.3); }
        .form-success::before {
            content: "✓";
            flex-shrink: 0;
            display: grid;
            place-items: center;
            width: 22px;
            height: 22px;
            font-size: 13px;
            font-weight: 700;
            color: var(--accent);
            background: var(--text);
            border-radius: 2px;
        }
        .form-error { background: rgba(179,38,30,0.08); border-color: #b3261e; color: #7d1a15; }
 
        .form-foot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            flex-wrap: wrap;
        }
        .form-note { font-size: 12.5px; color: var(--muted); }
        .contact-form .btn[disabled] { opacity: 0.6; cursor: progress; }
        .contact-form .btn[disabled]:hover { background: var(--accent); color: var(--text); border-color: var(--accent); }
 
        /* ---------- FOOTER ---------- */
        .site-footer {
            margin: 100px 0 32px;
            padding: 22px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            font-size: 13.5px;
            color: var(--muted);
        }
        .site-footer a:not(.brand) { border-bottom: 2px solid transparent; }
        .site-footer a:not(.brand):hover { color: var(--text); border-bottom-color: var(--accent); }
        .site-footer .brand { font-size: 13px; color: var(--text); }
        .footer-brand img { width: 110px; height: auto; }
 
        /* ---------- ENTRANCE MOTION ---------- */
        .rise { opacity: 0; transform: translateY(18px); animation: rise .7s ease forwards; }
        .rise.d1 { animation-delay: .05s; }
        .rise.d2 { animation-delay: .16s; }
        .rise.d3 { animation-delay: .3s; }
        .rise.d4 { animation-delay: .44s; }
        @keyframes rise { to { opacity: 1; transform: translateY(0); } }
 
        /* scroll reveal: 'backwards' fill means hover transforms still work afterwards */
        .js .reveal:not(.in) { opacity: 0; }
        .reveal.in {
            animation: revealUp .8s cubic-bezier(.2,.7,.2,1) backwards;
            animation-delay: calc(var(--i, 0) * 90ms);
        }
        @keyframes revealUp { from { opacity: 0; transform: translateY(22px); } }
 
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            .rise { animation: none; opacity: 1; transform: none; }
            .js .reveal:not(.in) { opacity: 1; }
            .reveal.in { animation: none; }
            .hero-slide { transition: none; }
            .hero-seg.active::after { animation: none; width: 100%; }
            .ticker-track { animation: none; }
            .work-card, .work-shot img, .work-link span { transition: none; }
            .work-card::after { display: none; }
        }
 
        /* fallback: no backdrop-filter support, or user asked for less transparency */
        @supports not ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px))) {
            :root { --glass-bg: #ffffff; --glass-bg-hover: #ffffff; }
            .site-nav { background: var(--bg); }
            .status, .btn-ghost, .hero-arrows button, .project-type, .contact-panel { background: #ffffff; }
        }
        @media (prefers-reduced-transparency: reduce) {
            :root { --glass-bg: #ffffff; --glass-bg-hover: #ffffff; }
            .site-nav { background: var(--bg); }
            .status, .btn-ghost, .hero-arrows button, .project-type, .contact-panel { background: #ffffff; }
        }
 
        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 1000px) {
            .service-grid { grid-template-columns: repeat(2, 1fr); }
        }
 
        @media (max-width: 900px) {
            .cta {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 48px 26px;
                margin-top: 84px;
            }
            .cta-heading h2 { max-width: 14ch; }
        }
 
        @media (max-width: 800px) {
            .wrap { padding: 0 22px; }
            .site-nav { margin: 0 -22px; padding: 0 22px; }
            .nav-links a:not(.btn) { display: none; }
            .hero { padding-top: 70px; }
            .status { margin-bottom: 30px; }
            .hero-controls { gap: 16px; margin-top: 28px; }
            .hero-seg { width: 40px; }
            .hero-lede { margin-top: 40px; }
            .hero-meta { grid-template-columns: 1fr; margin-top: 64px; }
            .meta-cell {
                padding: 20px 22px;
                border-right: none;
                border-bottom: 1px solid var(--glass-border);
            }
            .meta-cell:last-child { border-bottom: none; }
            .ticker { margin-top: 64px; }
            .ticker-group span { padding: 16px 0; font-size: 12px; }
            .ticker-group i { margin: 0 24px; }
            .section { padding-top: 84px; }
            .work-grid { grid-template-columns: 1fr; gap: 20px; }
            .work-more { padding: 20px 22px; }
        }
 
        @media (max-width: 640px) {
            .contact-panel { padding: 24px 20px; }
            .form-row { grid-template-columns: 1fr; }
            .form-foot { flex-direction: column; align-items: stretch; }
            .contact-form .btn { width: 100%; justify-content: center; }
            .site-footer { flex-direction: column; align-items: flex-start; padding: 22px; }
            .work-more { flex-direction: column; align-items: stretch; }
            .work-more .btn { justify-content: center; }
        }
 
        @media (max-width: 520px) {
            .service-grid { grid-template-columns: 1fr; }
            .service-item { gap: 26px; }
            .hero-actions { width: 100%; }
            .hero-actions .btn { flex: 1; justify-content: center; }
            .hero-segs { display: none; }
            .work-card { padding: 10px 10px 22px; }
            .work-info { padding: 22px 8px 0; }
            .project-type { top: 10px; right: 10px; font-size: 9px; padding: 5px 8px; }
        }
 
        /* =====================================================
           HERO v2: two-column layout with project previews
           (placed last so it overrides the old hero rules)
           ===================================================== */
        .hero { padding: 84px 0 0; }
 
        .hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.08fr) minmax(0, 0.92fr);
            gap: 56px;
            align-items: center;
        }
        .hero-copy .status { margin-bottom: 32px; }
        .hero-copy .slide-title { font-size: clamp(2.6rem, 5.6vw, 5.4rem); max-width: 12ch; }
        .hero-copy .hero-lede {
            margin-top: 36px;
            flex-direction: column;
            align-items: flex-start;
            gap: 28px;
        }
        .hero-copy .hero-lede p { max-width: 44ch; }
 
        /* right side: stacked project previews */
        .hero-visual { position: relative; min-height: 540px; }
        .hero-visual::before {
            content: "";
            position: absolute;
            right: -16px;
            bottom: 12%;
            width: 40%;
            height: 44%;
            background: rgba(182,255,0,0.35);
            border: 1px solid var(--text);
            z-index: 0;
        }
        .hv-frame {
            position: absolute;
            display: block;
            overflow: hidden;
            padding: 0;
            transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease;
        }
        .hv-frame:hover { transform: translateY(-6px); border-color: var(--text); }
        .hv-frame img {
            display: block;
            width: 100%;
            height: auto;
        }
        .hv-main   { top: 0; right: 0; width: 88%; z-index: 1; }
        .hv-second { bottom: 0; left: 0; width: 62%; z-index: 2; }
 
        .hv-chip {
            position: absolute;
            z-index: 3;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: 1.3px;
            text-transform: uppercase;
            background: rgba(255,255,255,0.82);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
            box-shadow: inset 0 1px 0 var(--glass-highlight), 0 12px 28px rgba(14,14,15,0.08);
            animation: hvFloat 6s ease-in-out infinite;
        }
        .hv-chip::before {
            content: "";
            width: 8px;
            height: 8px;
            background: var(--accent);
            border: 1px solid var(--text);
        }
        .hv-chip.a { top: -16px; left: 2%; }
        .hv-chip.b { bottom: 34%; right: -8px; animation-delay: -3s; }
        @keyframes hvFloat { 50% { transform: translateY(-8px); } }
 
        .hero-meta { margin-top: 80px; }
 
        @media (max-width: 900px) {
            .hero-grid { grid-template-columns: 1fr; gap: 56px; }
            .hero-visual { min-height: 440px; }
        }
        @media (max-width: 800px) {
            .hero { padding-top: 70px; }
            .hero-meta { margin-top: 64px; }
        }
        @media (max-width: 520px) {
            .hero { padding-top: 56px; }
            .hero-visual { min-height: 340px; }
            .hv-chip.b { display: none; }
            .hv-chip { font-size: 10px; padding: 8px 10px; }
        }
        @media (prefers-reduced-motion: reduce) {
            .hv-chip { animation: none; }
            .hv-frame { transition: none; }
        }
    </style>
</head>
 
<body>
 
    <!-- soft glow the glass frosts over -->
    <div class="glow" aria-hidden="true"></div>
 
    <div class="wrap">
 
        <!-- NAV -->
        <header class="site-nav">
            <div class="nav-inner">
                <a href="/" class="brand" aria-label="CANECH home">
                    <img src="{{ asset('logo.png/logo.png') }}" alt="CANECH">
                </a>
 
                <nav class="nav-links" aria-label="Main">
                    <a href="#work">Work</a>
                    <a href="#services">Services</a>
                    <a href="#contact" class="btn btn-primary">Start a project</a>
                </nav>
            </div>
        </header>
 
        <!-- HERO -->
        <main class="hero">
 
            <div class="hero-grid">
 
                <!-- LEFT: copy + slider + CTAs -->
                <div class="hero-copy">
                    <p class="status rise d1">Available for new projects</p>
 
                    <!-- one real h1 for the page; the rotating slides below are not headings -->
                    <h1 class="sr-only">CANECH: digital products, brands and web experiences for businesses that mean it.</h1>
 
                    <div class="hero-slider rise d2" id="heroSlider" role="group" aria-roledescription="carousel" aria-label="What we do">
                        <div class="hero-slide is-active" role="group" aria-roledescription="slide" aria-label="1 of 3">
                            <span class="slide-kicker">We build</span>
                            <p class="slide-title">Digital products for businesses that <em>mean it.</em></p>
                        </div>
 
                        <div class="hero-slide" role="group" aria-roledescription="slide" aria-label="2 of 3" aria-hidden="true">
                            <span class="slide-kicker">We design</span>
                            <p class="slide-title">Brands that <em>stand out.</em></p>
                        </div>
 
                        <div class="hero-slide" role="group" aria-roledescription="slide" aria-label="3 of 3" aria-hidden="true">
                            <span class="slide-kicker">We engineer</span>
                            <p class="slide-title">Web experiences <br> that <em>perform.</em></p>
                        </div>
                    </div>
 
                    <div class="hero-controls rise d3">
                        <div class="hero-arrows">
                            <button type="button" id="heroPrev" aria-label="Previous slide">←</button>
                            <button type="button" id="heroNext" aria-label="Next slide">→</button>
                        </div>
 
                        <div class="hero-segs">
                            <button type="button" class="hero-seg" aria-label="Go to slide 1"></button>
                            <button type="button" class="hero-seg" aria-label="Go to slide 2"></button>
                            <button type="button" class="hero-seg" aria-label="Go to slide 3"></button>
                        </div>
                    </div>
 
                    <div class="hero-lede rise d3">
                        <p>CANECH is a digital company. We design and engineer websites, brands and web products that are fast, considered and built to last.</p>
 
                        <div class="hero-actions">
                            <a href="#contact" class="btn btn-primary">Start a project →</a>
                            <a href="#work" class="btn btn-ghost">Selected work</a>
                        </div>
                    </div>
                </div>
 
                <!-- RIGHT: live project previews -->
                <div class="hero-visual rise d3" aria-label="Recent projects">
 
                    <span class="hv-chip a">2 live projects</span>
                    <span class="hv-chip b">Design · Laravel · Booking</span>
 
                    <a href="https://the-moving-company.onrender.com" target="_blank" rel="noopener noreferrer"
                       class="hv-frame hv-main card" aria-label="View The Moving Company">
                        <div class="browser-bar" aria-hidden="true">
                            <i></i><i></i><i></i>
                            <span>the-moving-company.onrender.com</span>
                        </div>
                        <img src="/images/work/the-moving-company.png" alt="The Moving Company website preview">
                    </a>
 
                    <a href="https://eatwithummi.onrender.com" target="_blank" rel="noopener noreferrer"
                       class="hv-frame hv-second card" aria-label="View EatWithUmmi">
                        <div class="browser-bar" aria-hidden="true">
                            <i></i><i></i><i></i>
                            <span>eatwithummi.onrender.com</span>
                        </div>
                        <img src="/images/work/eatwithummi.png" alt="EatWithUmmi website preview">
                    </a>
                </div>
 
            </div>
 
            <div class="hero-meta card rise d4">
                <div class="meta-cell">
                    <span class="meta-label">Disciplines</span>
                    <span class="meta-value">Design, Development, Brand</span>
                </div>
                <div class="meta-cell">
                    <span class="meta-label">Selected work</span>
                    <span class="meta-value">EatWithUmmi, The Moving Company</span>
                </div>
                <div class="meta-cell">
                    <span class="meta-label">Contact</span>
                    <a href="mailto:canechglobal@gmail.com" class="meta-value">canechglobal@gmail.com</a>
                </div>
            </div>
        </main>
 
        <!-- TICKER -->
        <div class="ticker reveal" aria-hidden="true">
            <div class="ticker-track">
                <div class="ticker-group">
                    <span>Websites</span><i></i><span>Web Apps</span><i></i><span>Brand Identity</span><i></i><span>UI Design</span><i></i><span>Booking Systems</span><i></i><span>Ongoing Support</span><i></i>
                </div>
                <div class="ticker-group">
                    <span>Websites</span><i></i><span>Web Apps</span><i></i><span>Brand Identity</span><i></i><span>UI Design</span><i></i><span>Booking Systems</span><i></i><span>Ongoing Support</span><i></i>
                </div>
            </div>
        </div>
 
        <!-- SELECTED WORK -->
        <section class="section" id="work">
            <div class="section-head reveal">
                <div>
                    <span class="eyebrow">Selected Work</span>
                    <h2>Recent projects.</h2>
                </div>
 
                <p>A look at digital experiences we've designed and built for real businesses.</p>
            </div>
 
            <div class="work-grid">
 
                <!-- The Moving Company -->
                <a href="https://the-moving-company.onrender.com" target="_blank" rel="noopener noreferrer" class="work-card card reveal is-rental" style="--i:1" aria-label="View The Moving Company project">
 
                    <div class="work-media">
                        <div class="browser-bar" aria-hidden="true">
                            <i></i><i></i><i></i>
                            <span>the-moving-company.onrender.com</span>
                        </div>
                        <div class="work-shot">
                            <img src="/images/work/the-moving-company.png" alt="The Moving Company website" loading="lazy">
                            <span class="project-type">AUTOMOTIVE / WEB</span>
                        </div>
                    </div>
 
                    <div class="work-info">
                        <div class="work-top">
                            <span>Vehicle Rentals</span>
                        </div>
 
                        <h3>The Moving Company</h3>
 
                        <p>
                            A premium car rental experience built around vehicle discovery,
                            booking and a smoother customer journey.
                        </p>
 
                        <div class="tags">
                            <span>Brand Website</span>
                            <span>Laravel</span>
                            <span>Booking System</span>
                        </div>
 
                        <span class="work-link">
                            <b>View live project</b>
                            <span aria-hidden="true">↗</span>
                        </span>
                    </div>
                </a>
 
 
                <!-- EatWithUmmi -->
                <a href="https://eatwithummi.onrender.com" target="_blank" rel="noopener noreferrer" class="work-card card reveal is-food" style="--i:0" aria-label="View EatWithUmmi project">
 
                    <div class="work-media">
                        <div class="browser-bar" aria-hidden="true">
                            <i></i><i></i><i></i>
                            <span>eatwithummi.onrender.com</span>
                        </div>
                        <div class="work-shot">
                            <img src="/images/work/eatwithummi.png" alt="EatWithUmmi website" loading="lazy">
                            <span class="project-type">FOOD / WEB</span>
                        </div>
                    </div>
 
                    <div class="work-info">
                        <div class="work-top">
                            <span>Food &amp; Hospitality</span>
                        </div>
 
                        <h3>EatWithUmmi</h3>
 
                        <p>
                            A responsive food business website designed to showcase the menu,
                            simplify ordering and give the brand a stronger digital presence.
                        </p>
 
                        <div class="tags">
                            <span>Web Design</span>
                            <span>Laravel</span>
                            <span>Development</span>
                        </div>
 
                        <span class="work-link">
                            <b>View live project</b>
                            <span aria-hidden="true">↗</span>
                        </span>
                    </div>
                </a>
            </div>
 
            <div class="work-more card reveal">
                <p>Want something like this for your business?</p>
                <a href="#contact" class="btn btn-primary">Start a project →</a>
            </div>
        </section>
 
 
        <!-- SERVICES -->
        <section class="section" id="services">
            <div class="section-head reveal">
                <div>
                    <span class="eyebrow">Services</span>
                    <h2>What we do.</h2>
                </div>
                <p>From first idea to launch and beyond, everything under one roof.</p>
            </div>
 
            <ul class="service-grid reveal">
                <li class="service-item">
                    <div>
                        <h3>Websites &amp; Web Apps</h3>
                        <p>Fast, responsive builds that work on every screen and are easy to manage.</p>
                    </div>
                </li>
                <li class="service-item">
                    <div>
                        <h3>Brand Identity</h3>
                        <p>Logos, type and visual systems that make a business instantly recognisable.</p>
                    </div>
                </li>
                <li class="service-item">
                    <div>
                        <h3>Product &amp; UI Design</h3>
                        <p>Clear interfaces designed around how people actually use them.</p>
                    </div>
                </li>
                <li class="service-item">
                    <div>
                        <h3>Ongoing Support</h3>
                        <p>Updates, fixes and improvements after launch, so your product keeps performing.</p>
                    </div>
                </li>
            </ul>
        </section>
 
        <!-- CONTACT -->
        <section class="cta card reveal" id="contact">
 
            <div class="cta-heading">
                <span class="eyebrow">Start a project</span>
                <h2>Have a project in mind?</h2>
                <p>Tell us what you're building and we'll get back to you.</p>
 
                <div class="contact-direct">
                    <span class="k">Prefer email?</span>
                    <a href="mailto:canechglobal@gmail.com">canechglobal@gmail.com</a>
                </div>
 
                <ol class="contact-steps">
                    <li>Send us your enquiry</li>
                    <li>We review it and reply by email</li>
                    <li>We agree the scope and get started</li>
                </ol>
            </div>
 
            <div class="contact-panel">
 
                @if(session('success'))
                    <div class="form-success" role="status">
                        {{ session('success') }}
                    </div>
                @endif
 
                @if($errors->any())
                    <div class="form-error" role="alert">
                        Please check the highlighted fields and try again.
                    </div>
                @endif
 
                <form class="contact-form" method="POST" action="{{ route('contact.store') }}#contact">
 
                    @csrf
 
                    <div class="form-row">
 
                        <div class="form-group">
                            <label for="name">Name <span class="req">*</span></label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Your name"
                                autocomplete="name"
                                class="@error('name') is-invalid @enderror"
                                required
                            >
                            @error('name') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
 
                        <div class="form-group">
                            <label for="email">Email <span class="req">*</span></label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                autocomplete="email"
                                class="@error('email') is-invalid @enderror"
                                required
                            >
                            @error('email') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
 
                    </div>
 
                    <div class="form-row">
 
                        <div class="form-group">
                            <label for="phone">Phone / WhatsApp <span class="req">*</span></label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="0801 234 5678"
                                autocomplete="tel"
                                class="@error('phone') is-invalid @enderror"
                                required
                            >
                            @error('phone') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
 
                        <div class="form-group">
                            <label for="company">Company / Business</label>
                            <input
                                type="text"
                                id="company"
                                name="company"
                                value="{{ old('company') }}"
                                placeholder="Your company or business"
                                autocomplete="organization"
                                class="@error('company') is-invalid @enderror"
                            >
                            @error('company') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
 
                    </div>
 
                    <div class="form-row">
 
                        <div class="form-group">
                            <label for="project_type">What do you need? <span class="req">*</span></label>
                            <select
                                id="project_type"
                                name="project_type"
                                class="@error('project_type') is-invalid @enderror"
                                required
                            >
                                <option value="" disabled {{ old('project_type') ? '' : 'selected' }}>
                                    Select a service
                                </option>
                                <option value="Website" {{ old('project_type') === 'Website' ? 'selected' : '' }}>
                                    Website
                                </option>
                                <option value="Web App" {{ old('project_type') === 'Web App' ? 'selected' : '' }}>
                                    Web App
                                </option>
                                <option value="UI/UX Design" {{ old('project_type') === 'UI/UX Design' ? 'selected' : '' }}>
                                    UI/UX Design
                                </option>
                                <option value="Branding" {{ old('project_type') === 'Branding' ? 'selected' : '' }}>
                                    Branding
                                </option>
                                <option value="Other" {{ old('project_type') === 'Other' ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>
                            @error('project_type') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
 
                        <div class="form-group">
                            <label for="budget">Budget</label>
                            <select
                                id="budget"
                                name="budget"
                                class="@error('budget') is-invalid @enderror"
                            >
                                <option value="" disabled {{ old('budget') ? '' : 'selected' }}>
                                    Select a range
                                </option>
                                <option value="Under ₦100,000" {{ old('budget') === 'Under ₦100,000' ? 'selected' : '' }}>
                                    Under ₦100,000
                                </option>
                                <option value="₦100,000 - ₦250,000" {{ old('budget') === '₦100,000 - ₦250,000' ? 'selected' : '' }}>
                                    ₦100,000 - ₦250,000
                                </option>
                                <option value="₦250,000 - ₦500,000" {{ old('budget') === '₦250,000 - ₦500,000' ? 'selected' : '' }}>
                                    ₦250,000 - ₦500,000
                                </option>
                                <option value="₦500,000+" {{ old('budget') === '₦500,000+' ? 'selected' : '' }}>
                                    ₦500,000+
                                </option>
                                <option value="Not sure yet" {{ old('budget') === 'Not sure yet' ? 'selected' : '' }}>
                                    Not sure yet
                                </option>
                            </select>
                            @error('budget') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
 
                    </div>
 
                    <div class="form-group">
                        <label for="message">Project details <span class="req">*</span></label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            placeholder="Tell us a little about your project..."
                            class="@error('message') is-invalid @enderror"
                            required
                        >{{ old('message') }}</textarea>
                        @error('message') <span class="field-error">{{ $message }}</span> @enderror
                    </div>
 
                    <div class="form-foot">
                        <span class="form-note">Fields marked * are required.</span>
 
                        <button type="submit" class="btn btn-primary">
                            <span class="label">Send enquiry</span>
                            <span aria-hidden="true">→</span>
                        </button>
                    </div>
 
                </form>
            </div>
 
        </section>
 
        <!-- FOOTER -->
        <footer class="site-footer card">
            <a href="/" class="brand footer-brand">
                <img src="{{ asset('logo.png/logo.png') }}" alt="CANECH">
            </a>
 
            <span>© {{ date('Y') }} CANECH. All rights reserved.</span>
 
            <a href="mailto:canechglobal@gmail.com">canechglobal@gmail.com</a>
        </footer>
 
    </div>
 
    <script>
        (function () {
            /* ---------- HERO SLIDER ---------- */
            var SLIDE_MS = 6000; // keep in sync with --slide-dur in the CSS
            var slider  = document.getElementById('heroSlider');
            var slides  = Array.prototype.slice.call(document.querySelectorAll('.hero-slide'));
            var segs    = Array.prototype.slice.call(document.querySelectorAll('.hero-seg'));
            var prevBtn = document.getElementById('heroPrev');
            var nextBtn = document.getElementById('heroNext');
            var reduce  = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var index = 0, timer = null;
 
            function pad(n) { return (n < 10 ? '0' : '') + n; }
 
            function schedule() {
                clearTimeout(timer);
                if (reduce) return;
                timer = setTimeout(function () { show(index + 1); }, SLIDE_MS);
            }
 
            function show(n) {
                index = (n + slides.length) % slides.length;
 
                slides.forEach(function (s, k) {
                    s.classList.toggle('is-active', k === index);
                    s.setAttribute('aria-hidden', k === index ? 'false' : 'true');
                });
 
                segs.forEach(function (s, k) {
                    s.classList.remove('active', 'done');
                    if (k < index) s.classList.add('done');
                    if (k === index) {
                        void s.offsetWidth; // restart the fill animation
                        s.classList.add('active');
                    }
                });
 
                schedule();
            }
 
            function pause()  { clearTimeout(timer); slider.parentNode.classList.add('is-paused'); }
            function resume() { slider.parentNode.classList.remove('is-paused'); show(index); }
 
            prevBtn.addEventListener('click', function () { show(index - 1); });
            nextBtn.addEventListener('click', function () { show(index + 1); });
            segs.forEach(function (s, k) { s.addEventListener('click', function () { show(k); }); });
 
            // pause while the visitor is hovering or focused inside the hero
            var hero = document.querySelector('.hero');
            hero.addEventListener('mouseenter', pause);
            hero.addEventListener('mouseleave', resume);
            hero.addEventListener('focusin', pause);
            hero.addEventListener('focusout', resume);
 
            show(0);
 
            /* ---------- SCROLL REVEAL ---------- */
            var items = document.querySelectorAll('.reveal');
            if ('IntersectionObserver' in window) {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) {
                            e.target.classList.add('in');
                            io.unobserve(e.target);
                        }
                    });
                }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
                items.forEach(function (el) { io.observe(el); });
            } else {
                items.forEach(function (el) { el.classList.add('in'); });
            }
 
            /* ---------- CONTACT FORM: stop double submits ---------- */
            var form = document.querySelector('.contact-form');
            if (form) {
                var submitBtn = form.querySelector('button[type="submit"]');
                var label = submitBtn && submitBtn.querySelector('.label');
                var original = label ? label.textContent : '';
 
                form.addEventListener('submit', function () {
                    if (!submitBtn) return;
                    submitBtn.disabled = true;
                    if (label) label.textContent = 'Sending…';
                });
 
                // if the visitor comes back with the browser's back button, unlock it
                window.addEventListener('pageshow', function () {
                    if (!submitBtn) return;
                    submitBtn.disabled = false;
                    if (label) label.textContent = original;
                });
            }
        })();
    </script>
 
</body>
</html>