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
    <script src="https://analytics.ahrefs.com/analytics.js" data-key="+dmea0Inq5AGGqalX2/X/w" async></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <title>Vinsa</title>
    <link rel="icon" type="image/png" href="{{ asset('image/vinsalg.png') }}">
</head>

<style>
    .outfit {
        font-family: "Outfit", sans-serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }

    /* Biar hasil WYSIWYG tetap enak dibaca & tidak merusak style halaman */
    .wysiwyg {
        color: #fff;
        line-height: 1.75;
    }

    .wysiwyg h1,
    .wysiwyg h2,
    .wysiwyg h3,
    .wysiwyg h4,
    .wysiwyg h5,
    .wysiwyg h6 {
        color: #FDFBEE;
        font-weight: 700;
        margin: 0.75rem 0 0.5rem;
    }

    .wysiwyg p {
        margin: 0 0 0.75rem;
    }

    .wysiwyg a {
        color: #0dd8bd;
        text-decoration: underline;
    }

    .wysiwyg ul,
    .wysiwyg ol {
        margin: 0.5rem 0 0.75rem 1.25rem;
    }

    .wysiwyg li {
        margin: 0.25rem 0;
    }

    .wysiwyg img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 0.75rem 0;
        display: block;
    }

    .wysiwyg table {
        width: 100%;
        border-collapse: collapse;
        margin: 0.75rem 0;
    }

    .wysiwyg table,
    .wysiwyg th,
    .wysiwyg td {
        border: 1px solid rgba(255, 255, 255, 0.25);
    }

    .wysiwyg th,
    .wysiwyg td {
        padding: 10px;
        vertical-align: top;
    }

    .wysiwyg blockquote {
        border-left: 4px solid #f4752c;
        padding-left: 12px;
        margin: 0.75rem 0;
        color: rgba(255, 255, 255, 0.9);
    }

    .wysiwyg ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
    }

    .wysiwyg ul {
        list-style-type: disc;
        padding-left: 1.5rem;
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

<body class="outfit bg-[#FDFBEE]">
    <x-app-loader />
    <div class="max-w-[93%] mx-auto">
        <div class="flex justify-between items-center py-3">
            <x-navUser></x-navUser>
        </div>

        <div
            class="overflow-hidden p-6 sm:p-10 lg:p-[5rem] lg:justify-between py-[80px]
        relative bg-no-repeat bg-cover w-full min-h-screen
        after:content-['']
        after:w-full after:h-full after:absolute after:top-0 after:left-0
        after:pointer-events-none
        bg-gradient-to-r from-[#066c5f] to-[#0dd8bd]
        rounded-[40px] mb-10">


            <div class="w-full relative z-[10]">
                <a href="javascript:window.history.back()" class="group">
                    <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="stroke-white group-hover:stroke-gray-400 transition-colors duration-300">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>

            <div class="p-6 max-w-5xl mx-auto">
                <h1 class="text-3xl font-bold text-[#FDFBEE] mb-2">{{ $blog->title }}</h1>
                <p class="text-sm text-white mb-4">
                    {{ __('Published on:') }} {{ $blog->created_at->format('F d, Y') }}
                </p>

                {{-- Banner atau Gambar Utama --}}
                @if (!empty($blog->image))
                    <div class="relative w-[50%] mb-6">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                            class="w-full rounded-xl shadow-md">
                    </div>
                @endif

                {{-- ✅ Konten utama dari WYSIWYG (TinyMCE) --}}
                @if (!empty($blog->content))
                    <div class="wysiwyg mb-10">
                        {!! $blog->content !!}
                    </div>
                @endif

                {{-- Konten Sub Judul & Isi --}}
                @foreach ($blog->sections as $section)
                    <div class="mb-8">
                        @if (!empty($section->subtitle))
                            <h2 class="text-2xl font-bold text-[#FDFBEE] border-l-4 border-[#f4752c] pl-3 mb-2">
                                {{ $section->subtitle }}
                            </h2>
                        @endif

                        @if (!empty($section->image))
                            <img src="{{ asset('storage/' . $section->image) }}" alt="" width="300px"
                                class="rounded-xl mb-3">
                        @endif

                        {{-- ✅ Render HTML dari TinyMCE TANPA merusak style --}}
                        @if (!empty($section->content))
                            <div class="wysiwyg">
                                {!! $section->content !!}
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="w-full relative z-[10]">
                    <a href="javascript:window.history.back()" class="group">
                        <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="stroke-white group-hover:stroke-gray-400 transition-colors duration-300">
                            <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <x-footer></x-footer>
    @stack('scripts')
</body>

</html>
