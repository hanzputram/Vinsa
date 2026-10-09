<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" href="{{ asset('image/vinsalg_square.png') }}">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-55S5JHNQLG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-55S5JHNQLG');
    </script>
    <script src="https://analytics.ahrefs.com/analytics.js" data-key="+dmea0Inq5AGGqalX2/X/w" async></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Blog & Panduan Teknis Kelistrikan Industri | Vinsa Electric (vinsa.fr)</title>
    <meta name="description" content="Pusat wawasan teknis, tutorial perakitan box panel, panduan standar IEC 60947, tips memilih magnetic contactor, MCB, MCCB, dan switchgear industri dari tim teknisi ahli Vinsa Electric (vinsa.fr).">
    <meta name="keywords" content="blog listrik industri, tutorial panel maker, iec 60947, panduan kontaktor, tips memilih mcb mccb, vinsa electric, vinsa.fr">
    <meta name="author" content="Tim Engineering Vinsa Electric">

    <!-- Canonical & Alternates -->
    <link rel="canonical" href="https://vinsa.fr/blog">
    <link rel="alternate" hreflang="id" href="https://vinsa.fr/blog">
    <link rel="alternate" hreflang="en" href="https://vinsa.fr/blog">
    <link rel="alternate" hreflang="fr" href="https://vinsa.fr/blog">
    <link rel="alternate" hreflang="x-default" href="https://vinsa.fr/blog">

    <!-- Crawlers -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vinsa Electric">
    <meta property="og:url" content="https://vinsa.fr/blog">
    <meta property="og:title" content="Blog & Panduan Teknis Kelistrikan Industri | Vinsa Electric (vinsa.fr)">
    <meta property="og:description" content="Artikel panduan dan wawasan teknis seputar komponen kelistrikan industri, perakitan panel, dan proteksi sirkuit.">
    <meta property="og:image" content="{{ asset('image/vinsalg.png') }}">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Blog & Panduan Teknis Kelistrikan | Vinsa Electric (vinsa.fr)">
    <meta name="twitter:description" content="Artikel dan tutorial teknik perakitan panel kelistrikan industri dari Vinsa Electric.">
    <meta name="twitter:image" content="{{ asset('image/vinsalg.png') }}">

    <link rel="icon" type="image/png" href="{{ asset('image/vinsalg.png') }}">

    <!-- GEO / AEO Schema Markup (JSON-LD) -->
    <x-schema.organization />
    <x-schema.breadcrumb :items="[
        ['name' => 'Home', 'url' => 'https://vinsa.fr/'],
        ['name' => 'Blog', 'url' => 'https://vinsa.fr/blog']
    ]" />

    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
        }

        .wa-text-curv {
            width: 100%;
            position: absolute;
            top: 0%;
            -webkit-animation: spin 6s linear infinite;
            -moz-animation: spin 6s linear infinite;
            animation: spin 6s linear infinite;
        }

        @-moz-keyframes spin {
            100% {
                -moz-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes pulse-bg {

            0%,
            100% {
                background-color: #F77F1E;
            }

            50% {
                background-color: #ffa459;
            }
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE]">
    <x-app-loader />

    <div class="max-w-[93%] mx-auto">

        {{-- NAV --}}
        <div class="py-4">
            <x-navUser />
        </div>

        {{-- WRAPPER --}}
        <div
            class="relative bg-gradient-to-r from-[#066c5f] to-[#0dd8bd]
                   rounded-[40px] px-6 sm:px-10 lg:px-[5rem] py-[80px]
                   min-h-screen mb-10">

            <div class="relative z-10">

                {{-- BACK --}}
                <a href="/" class="inline-block mb-6">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="none"
                        class="stroke-white hover:stroke-gray-300 transition">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>

                {{-- TITLE --}}
                <h1 class="text-5xl font-extrabold text-white mb-14 text-center">
                    {{ __('From Our Blog') }}
                </h1>

                @php
                    $publishedBlogs = $blogs->filter(fn($b) => !empty($b->is_published))->values();
                    $count = $publishedBlogs->count();
                @endphp

                @if ($count === 0)
                    <p class="text-sm text-gray-500">{{ __('Belum ada blog.') }}</p>
                @endif

                <div class="grid md:grid-cols-3 gap-6 items-stretch">
                    @foreach ($blogs as $blog)
                        <a href="{{ route('blog.public', ['slug' => $blog->slug]) }}" class="group block w-full h-full">
                            <div
                                class="mx-auto w-full max-w-[420px]
                           min-h-[380px] max-h-[380px]
                           bg-[#ffffff60] backdrop-blur-sm
                           border-[1.5px] border-[#066c5f]
                           p-6 rounded-3xl shadow-lg
                           flex flex-col overflow-hidden
                           transition-all duration-300
                           group-hover:shadow-xl group-hover:shadow-[#00000046]
                           group-hover:ring-2 group-hover:ring-[#066c5f]/30
                           group-hover:scale-[1.01]">

                                <div
                                    class="w-full h-[150px] rounded-2xl overflow-hidden bg-white/60 flex items-center justify-center">
                                    @if (!empty($blog->image))
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="text-xs text-gray-500">{{ __('No Image') }}</div>
                                    @endif
                                </div>

                                <div class="mt-4 flex-1 flex flex-col">
                                    <p class="font-bold text-base leading-snug line-clamp-2">{{ $blog->title }}</p>

                                    @php
                                        $firstSection = $blog->sections->first();
                                        $previewHtml = $blog->content ?? (optional($firstSection)->content ?? '');
                                        $previewText = trim(preg_replace('/\s+/', ' ', strip_tags($previewHtml)));
                                    @endphp

                                    @if (!empty($previewText))
                                        <p class="text-[11px] text-gray-700 mt-2 line-clamp-5">
                                            @if (!empty(optional($firstSection)->subtitle))
                                                <span class="font-semibold">{{ $firstSection->subtitle }}:</span>
                                            @endif
                                            {{ $previewText }}
                                        </p>
                                    @else
                                        <p class="text-[11px] text-gray-500 italic mt-2">{{ __('Tidak ada konten') }}</p>
                                    @endif

                                    <div class="mt-auto pt-3">
                                        <span
                                            class="text-[11px] text-[#066c5f] font-semibold opacity-80 group-hover:opacity-100">
                                            {{ __('Baca selengkapnya →') }}
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>

</body>

</html>


