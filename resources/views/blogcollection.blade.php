<!DOCTYPE html>
<html lang="en">

<head>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Blog | Vinsa</title>

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

    <div class="max-w-[93%] mx-auto">

        {{-- NAV --}}
        <div class="py-4">
            <x-navUser />
        </div>

        {{-- WRAPPER --}}
        <div
            class="relative bg-gradient-to-r from-[#066c5f] to-[#0dd8bd]
                   rounded-[40px] px-6 sm:px-10 lg:px-[5rem] py-[80px]
                   min-h-screen">

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
                    From Our Blog
                </h1>

                @php
                    $publishedBlogs = $blogs->filter(fn($b) => !empty($b->is_published))->values();
                    $count = $publishedBlogs->count();
                @endphp

                @if ($count === 0)
                    <p class="text-sm text-gray-500">Belum ada blog.</p>
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
                                        <div class="text-xs text-gray-500">No Image</div>
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
                                        <p class="text-[11px] text-gray-500 italic mt-2">Tidak ada konten</p>
                                    @endif

                                    <div class="mt-auto pt-3">
                                        <span
                                            class="text-[11px] text-[#066c5f] font-semibold opacity-80 group-hover:opacity-100">
                                            Baca selengkapnya →
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
