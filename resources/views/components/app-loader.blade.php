@php
    $svgPath = public_path('assets/loader/Frame 2.svg');
    $svg = file_exists($svgPath) ? file_get_contents($svgPath) : null;
@endphp

<div id="app-loader" class="svg-loader" aria-hidden="false">
    <div class="svg-loader__stage" role="status" aria-live="polite" aria-label="Loading">
        {{-- 5 dots intro --}}
        <div class="svg-loader__dots" aria-hidden="true">
            <span></span><span></span><span></span><span></span><span></span>
        </div>

        {{-- SVG (starts hidden, then pops in after dots) --}}
        <div class="svg-loader__wrap" data-state="dots">
            @if($svg)
                {!! $svg !!}
            @else
                <div style="font-weight:700;">SVG not found: {{ $svgPath }}</div>
            @endif
        </div>

        {{-- Soft glow that follows cursor (interactive feel) --}}
        <div class="svg-loader__glow" aria-hidden="true"></div>
    </div>
</div>

<style>
/* ===== Overlay ===== */
.svg-loader{
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: grid;
    place-items: center;
    background: rgba(255,255,255,.92);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

/* ===== Stage ===== */
.svg-loader__stage{
    position: relative;
    width: min(520px, 92vw);
    height: 220px;
    display: grid;
    place-items: center;
}

/* Follow glow */
.svg-loader__glow{
    position:absolute;
    width: 220px;
    height: 220px;
    border-radius: 999px;
    pointer-events:none;
    background: radial-gradient(circle at 30% 30%,
        rgba(255,118,0,.22),
        rgba(6,108,95,.16),
        rgba(255,255,255,0) 65%
    );
    filter: blur(10px);
    opacity: .9;
    transform: translate(var(--gx, 0px), var(--gy, 0px));
    transition: opacity .2s ease;
}

/* ===== Dots intro ===== */
.svg-loader__dots{
    position: absolute;
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: center;
    opacity: 1;
    transform: translateY(0);
    transition: opacity .25s ease, transform .25s ease;
}
.svg-loader__dots span{
    width: 10px;
    height: 10px;
    border-radius: 999px;
    background: rgba(6,108,95,.55);
    animation: dotBounce 720ms ease-in-out infinite;
}
.svg-loader__dots span:nth-child(2){ animation-delay: .08s; background: rgba(6,108,95,.35); }
.svg-loader__dots span:nth-child(3){ animation-delay: .16s; background: rgba(255,118,0,.55); }
.svg-loader__dots span:nth-child(4){ animation-delay: .24s; background: rgba(6,108,95,.35); }
.svg-loader__dots span:nth-child(5){ animation-delay: .32s; background: rgba(6,108,95,.55); }

@keyframes dotBounce{
    0%,100% { transform: translateY(0) scale(1); opacity: .55; }
    50%     { transform: translateY(-10px) scale(1.15); opacity: 1; }
}

/* ===== SVG sizing (NOT too big) ===== */
.svg-loader__wrap > svg{
    width: min(300px, 80vw);
    height: auto;
    user-select: none;
    transform-origin: 50% 50%;
    filter: drop-shadow(0 16px 40px rgba(0,0,0,.14));
}

/* ===== State: dots -> svg ===== */
.svg-loader__wrap{
    opacity: 0;
    transform: translateY(10px) scale(.92);
    transition:
        opacity .38s ease,
        transform .45s cubic-bezier(.2,.9,.2,1);
    will-change: transform;
}

/* When active: SVG visible + alive */
.svg-loader__wrap[data-state="svg"]{
    opacity: 1;
    transform: translateY(0) scale(1);
}

/* Hide dots when SVG arrives */
.svg-loader__stage[data-phase="svg"] .svg-loader__dots{
    opacity: 0;
    transform: translateY(-8px);
    pointer-events: none;
}

/* ===== COOL "alive" animation after reveal ===== */
.svg-loader__wrap[data-state="svg"] > svg{
    animation: floaty 1.25s ease-in-out infinite;
}

/* animate green/orange parts */
.svg-loader__wrap svg [fill="#066C5F"]{
    transform-box: fill-box;
    transform-origin: center;
    animation: breatheGreen 1.2s ease-in-out infinite;
}
.svg-loader__wrap svg [fill="#FF7600"]{
    transform-box: fill-box;
    transform-origin: center;
    animation: breatheOrange 1.0s ease-in-out infinite;
}
.svg-loader__wrap svg [fill^="url(#paint"]{
    animation: sheen 1.1s ease-in-out infinite;
}
.svg-loader__wrap svg [fill="black"]{
    opacity: .9;
    animation: textFade 1.8s ease-in-out infinite;
}

@keyframes floaty{
    0%   { transform: translateY(0); }
    50%  { transform: translateY(-8px); }
    100% { transform: translateY(0); }
}
@keyframes breatheGreen{
    0%,100% { opacity:.90; filter: brightness(1); }
    50%     { opacity:1;   filter: brightness(1.14); }
}
@keyframes breatheOrange{
    0%,100% { opacity:.85; filter: brightness(1); }
    50%     { opacity:1;   filter: brightness(1.22); }
}
@keyframes sheen{
    0%,100% { opacity:.92; filter: brightness(1); }
    50%     { opacity:1;   filter: brightness(1.12); }
}
@keyframes textFade{
    0%,100% { opacity:.75; }
    50%     { opacity:1; }
}

/* ===== Interactive tilt styling ===== */
.svg-loader__wrap.is-tilting > svg{
    transition: transform 80ms linear;
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce){
    .svg-loader__dots span,
    .svg-loader__wrap[data-state="svg"] > svg,
    .svg-loader__wrap svg [fill="#066C5F"],
    .svg-loader__wrap svg [fill="#FF7600"],
    .svg-loader__wrap svg [fill^="url(#paint"],
    .svg-loader__wrap svg [fill="black"]{
        animation: none !important;
    }
}
</style>

<script>
(function(){
    const overlay = document.getElementById('app-loader');
    if (!overlay) return;

    const stage = overlay.querySelector('.svg-loader__stage');
    const wrap  = overlay.querySelector('.svg-loader__wrap');
    const glow  = overlay.querySelector('.svg-loader__glow');

    // 1) Dots -> SVG reveal
    const REVEAL_MS = 900; // quick & punchy
    setTimeout(() => {
        stage?.setAttribute('data-phase', 'svg');
        wrap?.setAttribute('data-state', 'svg');
    }, REVEAL_MS);

    // 2) Interactive: cursor-follow glow + subtle tilt
    function clamp(n, a, b){ return Math.max(a, Math.min(b, n)); }

    const onMove = (e) => {
        if (!stage || !wrap || !glow) return;
        const r = stage.getBoundingClientRect();
        const cx = r.left + r.width / 2;
        const cy = r.top + r.height / 2;

        const dx = (e.clientX - cx) / (r.width / 2);
        const dy = (e.clientY - cy) / (r.height / 2);

        // glow position
        const gx = clamp(dx, -1, 1) * 32;
        const gy = clamp(dy, -1, 1) * 22;
        glow.style.setProperty('--gx', gx + 'px');
        glow.style.setProperty('--gy', gy + 'px');

        // tilt the svg (small)
        const tiltX = clamp(-dy, -1, 1) * 7; // deg
        const tiltY = clamp(dx, -1, 1) * 9;  // deg
        wrap.classList.add('is-tilting');
        const svg = wrap.querySelector('svg');
        if (svg){
            svg.style.transform = `perspective(700px) rotateX(${tiltX}deg) rotateY(${tiltY}deg)`;
        }
    };

    const onLeave = () => {
        const svg = wrap?.querySelector('svg');
        wrap?.classList.remove('is-tilting');
        if (svg) svg.style.transform = 'none';
        if (glow){
            glow.style.setProperty('--gx', '0px');
            glow.style.setProperty('--gy', '0px');
        }
    };

    stage?.addEventListener('mousemove', onMove);
    stage?.addEventListener('mouseleave', onLeave);

    // 3) Auto-hide when fully loaded
    window.addEventListener('load', () => {
        overlay.style.transition = 'opacity .18s ease';
        overlay.style.opacity = '0';
        setTimeout(() => overlay.remove(), 220);
    });
})();
</script>