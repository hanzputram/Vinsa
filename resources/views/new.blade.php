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
    @php
        $isProduction = app()->environment('production');
        $manifestPath = $isProduction ? '../public_html/build/manifest.json' : public_path('build/manifest.json');
    @endphp

    @if ($isProduction && file_exists($manifestPath))
        @php
            $manifest = json_decode(file_get_contents($manifestPath), true);
        @endphp
        <link rel="stylesheet" href="{{ config('app.url') }}/build/{{ $manifest['resources/css/app.css']['file'] }}">
        <script type="module" src="{{ config('app.url') }}/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
    @else
        @viteReactRefresh
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>Vinsa</title>
    <link rel="icon" type="image/png" href="{{ asset('image/vinsalg.png') }}">
    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        @keyframes shine {
            0% {
                background-position: -200%;
            }

            100% {
                background-position: 200%;
            }
        }

        .shining-text {
            background-image: linear-gradient(90deg, #9e9e9e 25%, #ffffff 50%, #9e9e9e 75%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 6s linear infinite;
        }

        /* Untuk Chrome, Safari, Edge */
        ::-webkit-scrollbar {
            width: 6px;
            /* Lebar scrollbar */
            height: 7px;
            /* Tinggi scrollbar */
        }

        ::-webkit-scrollbar-button {
            display: block;
            background-color: #cccccc00;
            /* Warna tombol */
            border-radius: 10px;
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #ffffff84;
            /* Warna thumb */
            border-radius: 100px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ffffffd6;
            /* Warna saat hover */
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            /* Menghilangkan background */
        }

        /* Untuk Firefox */
        .scroll-container {
            scrollbar-width: thin;
            /* Lebar scrollbar */
            scrollbar-color: #888 transparent;
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

        @keyframes jump {

            0%,
            85% {
                transform: translateY(0);
            }

            /* Stays normal */
            90% {
                transform: translateY(-10px);
            }

            /* Moves up */
            100% {
                transform: translateY(0);
            }

            /* Smooth return */
        }

        .jump-text span {
            display: inline-block;
            white-space: pre;
            animation: jump 2.3s ease-in-out infinite;
            animation-delay: calc(45ms * var(--i));
        }
        /* Tablet-only (768px to 1024px) no-slide behavior */
        @media (min-width: 768px) and (max-width: 1024px) {
            .category-slider {
                flex-wrap: wrap !important;
                overflow-x: hidden !important;
                gap: 1rem !important;
            }
            .category-slider > div:nth-child(n+5) {
                display: none !important;
            }
            .see-more-tablet {
                display: flex !important;
            }
        }
        @media (max-width: 767px), (min-width: 1025px) {
            .see-more-tablet {
                display: none !important;
            }
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* Ensure slider buttons are visible on mobile */
        @media (max-width: 767px) {
            .group\/slider button, .group\/outer-slider button {
                opacity: 1 !important;
                display: flex !important;
            }
        }

        /* Landscape Mobile Optimization */
        @media (max-height: 500px) and (orientation: landscape) {
            .landscape-banner {
                padding-top: 2rem !important;
                padding-bottom: 2rem !important;
                max-height: 400px !important;
            }
            .landscape-title {
                font-size: 2.5rem !important;
                line-height: 1.1 !important;
            }
            .landscape-subtitle {
                font-size: 1rem !important;
                padding-bottom: 1rem !important;
            }
            .landscape-buttons {
                margin-top: 1rem !important;
            }
        }

        /* Safari & iOS Compatibility */
        .slider-container, #blogCarousel, .category-slider {
            -webkit-overflow-scrolling: touch !important; /* Smooth momentum scrolling on iOS */
            scroll-behavior: smooth;
        }

        [class*="backdrop-blur"] {
            -webkit-backdrop-filter: blur(12px); /* Safari support for backdrop-filter */
        }

        /* Fix for Safari flex gap issues in older versions if necessary */
        .slider-container {
            display: -webkit-flex;
            display: flex;
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE]">
    <x-app-loader />
    <div class="max-w-[93%] mx-auto">
        <div class="flex justify-between items-center py-3">
            <x-navUser class="relative z-[11]"></x-navUser>
        </div>

        {{-- isi image --}}
        <div class="landscape-banner overflow-hidden lg:p-[5rem] lg:justify-center  py-[80px] h-full lg:max-h-[720px] flex justify-center relative bg-no-repeat bg-cover  after:content-[''] after:bg-[rgba(40,40,40,0.65)] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]"
            style="background-image:url('/image/pabrik.jpg')">
            <div class="lg:w-[50%] w-full relative z-[10]">
                <p class="shining-text text-xl text-center  font-medium">
                    {{ __('Fulfill Your Electricity Needs with the Best Products') }}
                </p>
                <p class="landscape-title text-6xl text-center  font-extrabold  text-[#fff]">
                    {!! __('Welcome<br> To<br> Vinsa') !!}
                </p>
                <p class="landscape-subtitle text-xl lg:text-lg text-center mx-4 lg:mx-auto text-[#fffffffe] pt-5 pb-15">
                    "{{ __('Vinsa: Dedication to Providing Premium Electrical Solutions, Delivering High Quality Products for Your Home, Business, and Industrial Needs!') }}"
                </p>
                <div class="landscape-buttons flex my-[2rem] justify-center ">
                    <a href="/product"
                        class="bg-green-600 text-white px-6 py-3 transition-all mr-5 duration-100 ease-in-out rounded-full shadow hover:bg-green-700">{{ __('Our Product') }}</a>
                    <a href="https://wa.me/6281335715398"
                        class="border-2 border-[#F77F1E] text-[#fff] px-6 py-3 rounded-full transition-all duration-300 ease-in-out shadow hover:bg-[#F77F1E] hover:text-white">{{ __('Contact Us') }}</a>
                </div>
            </div>
        </div>
        <div class="swiper mySwiper w-full mt-10">
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                @foreach ($carousels as $carousel)
                    <div class="swiper-slide flex justify-center">
                        <img class="rounded-3xl" src="{{ \App\Helpers\ProductHelper::imageUrl($carousel->image) }}" alt="">
                    </div>
                @endforeach

            </div>
            <!-- Navigation -->
            <div class="swiper-pagination"></div>
        </div>

        {{-- category produk --}}
        <div class="grid gap-4">
            @foreach ($categories as $category)
                @php
                    $firstProduct = $category->products->first();
                    $categorySlug = \Illuminate\Support\Str::slug($category->name);
                @endphp

                <div class="grid grid-cols-12 gap-4 row-span-1  ">
                    <!-- {{-- KIRI: Gambar dan nama kategori --}}
                    @if (strtolower($category->name) === 'accessories')
                        <div
                            class="bg-[#5f5f5f60] border-white border-[1.5px] col-span-2 hidden p-4 text-center rounded-xl overflow-hidden shadow-md md:flex md:flex-col items-center justify-start md:hidden lg:block">
                            <h3 class="text-lg font-bold mb-2">{{ $category->name }}</h3>

                            @if ($firstProduct)
                                <div
                                    class="w-[120px] h-[150px] flex items-center justify-center text-gray-400 bg-white rounded-md">
                                    Gambar tidak tersedia
                                </div>
                            @else
                                <div
                                    class="w-[120px] h-[150px] flex items-center justify-center text-gray-400 bg-white rounded-md">
                                    Gambar tidak tersedia
                                </div>
                            @endif
                        </div>
                    @else
                        <div
                            class="bg-[#5f5f5f60] border-white border-[1.5px] col-span-2 hidden p-4 text-center rounded-xl overflow-hidden shadow-md items-center justify-start md:hidden lg:block">
                            <h3 class="text-lg font-bold mb-2">
                                <a href="{{ route('products.view.user', \Illuminate\Support\Str::slug($category->name)) }}" class="hover:text-[#066C5F] transition-colors uppercase">
                                    {{ $category->name }}
                                </a>
                            </h3>

                            @if ($firstProduct && $firstProduct->image)
                                <img src="{{ \App\Helpers\ProductHelper::imageUrl($firstProduct->image) }}"
                                    alt="{{ $firstProduct->name }}" class="w-[120px] h-[150px] object-cover rounded-md">
                            @else
                                <div
                                    class="w-[120px] h-[150px] flex items-center justify-center text-gray-400 bg-white rounded-md">
                                    {{ __('Image not available') }}
                                </div>
                            @endif
                        </div>
                    @endif -->

                    {{-- KANAN: Produk dalam slider horizontal --}}
                    <div class="col-span-12 bg-[#5f5f5f60]/30 backdrop-blur-sm w-full rounded-3xl p-6 md:hidden lg:block shadow-xl border border-white/10">
                        <h3 class="text-xl font-bold mb-4 border-b-[1.5px] pb-3 border-white/20 flex items-center gap-2">
                            <span class="w-1.5 h-6 bg-[#066c5f] rounded-full"></span>
                            <a href="{{ route('products.view.user', \Illuminate\Support\Str::slug($category->name)) }}" class="hover:text-[#066C5F] transition-colors uppercase">
                                {{ $category->name }}
                            </a>
                        </h3>

                        @if ($category->products->count())
                            @if (strtolower($category->name) === 'push button')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                                    {{-- KB 5 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 5 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb5');
                                                })->sortBy(function ($item) {
                                                    return $item->kode;
                                                }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- KB 2 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 2 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb2');
                                                })->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @elseif (strtolower($category->name) === 'illuminated push button')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                                    {{-- KB 5 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 5 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb5');
                                                })->sortBy(function ($item) {
                                                    return $item->kode;
                                                }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- KB 2 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 2 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb2');
                                                })->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @elseif (strtolower($category->name) === 'emergency push button')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                                    {{-- KB 5 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 5 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb5');
                                                })->sortBy(function ($item) {
                                                    return $item->kode;
                                                }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- KB 2 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 2 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb2');
                                                })->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @elseif (strtolower($category->name) === 'illuminated selector switch')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                                    {{-- KB 5 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 5 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb5');
                                                })->sortBy(function ($item) {
                                                    return $item->kode;
                                                }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- KB 2 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 2 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb2');
                                                })->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @elseif (strtolower($category->name) === 'cable ties')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                                    {{-- Nylon --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            Nylon Cable Ties
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'nct');
                                                })->sortBy(function ($item) {
                                                    return $item->kode;
                                                }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- Stainless Steel --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            Stainless Steel Cable Ties
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'ssct');
                                                })->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @elseif (strtolower($category->name) === 'selector switch')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                                    {{-- KB 5 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 5 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb5');
                                                })->sortBy(function ($item) {
                                                    return $item->kode;
                                                }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- KB 2 Series --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            KB 2 Series
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb2');
                                                })->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @elseif (strtolower($category->name) === 'cable lug')
                                @php
                                    // 5 panel series Cable Lug (samakan dengan value yang tersimpan di custom_input['series'])
                                    $lugSeries = [
                                        'SC Cable Lug',
                                        'SV Cable Lug',
                                        'RV Cable Lug',
                                        'PTV Cable Lug',
                                        'DBV Cable Lug',
                                    ];

                                    $getCI = function ($item) {
                                        $ci = json_decode($item->custom_input, true);
                                        return is_array($ci) ? $ci : [];
                                    };
                                @endphp

                                {{-- CAROUSEL panel: tampil 2 panel, geser untuk lihat 5 panel --}}
                                <div class="relative group/outer-slider">
                                    <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </button>
                                    <div class="slider-container flex gap-4 overflow-x-auto pb-6 snap-x snap-mandatory no-scrollbar">
                                    @foreach ($lugSeries as $seriesName)
                                        @php
                                            $items = $category->products
                                                ->filter(function ($item) use ($getCI, $seriesName) {
                                                    $ci = $getCI($item);
                                                    $series = strtolower(trim((string) ($ci['series'] ?? '')));
                                                    return $series === strtolower(trim($seriesName));
                                                })
                                                ->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE);

                                            // judul panel biar tampil "SC Series" dst
                                            $panelTitle =
                                                strtoupper(trim(str_ireplace('Cable Lug', '', $seriesName))) .
                                                ' ' . __('Series');
                                        @endphp

                                        <x-product-series :seriesName="$panelTitle" :items="$items" />
                                    @endforeach
                                    </div>
                                    <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </button>
                                </div>
                            @elseif (strtolower($category->name) === 'terminal block')
                                @php
                                    $tbSeries = [
                                        'Terminal Strip',
                                        'Terminal Block TB',
                                        'Terminal Block TBC',
                                        'Terminal Block TBR',
                                        'Terminal Block TUK',
                                        'Terminal Block TUSLKG',
                                        'Terminal Block KLUS',
                                    ];

                                    $getCI = function ($item) {
                                        $ci = json_decode($item->custom_input, true);
                                        return is_array($ci) ? $ci : [];
                                    };
                                @endphp

                                {{-- CAROUSEL panel: tampil 2 panel, geser untuk lihat 6 panel --}}
                                <div class="relative group/outer-slider">
                                    <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </button>
                                    <div class="slider-container flex gap-4 overflow-x-auto pb-6 snap-x snap-mandatory no-scrollbar">
                                    @foreach ($tbSeries as $seriesName)
                                        @php
                                            $items = $category->products
                                                ->filter(function ($item) use ($getCI, $seriesName) {
                                                    $ci = $getCI($item);
                                                    $series = strtolower(trim((string) ($ci['series'] ?? '')));
                                                    return $series === strtolower(trim($seriesName));
                                                })
                                                ->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE);
                                        @endphp

                                        <x-product-series :seriesName="$seriesName" :items="$items" />
                                    @endforeach
                                    </div>
                                    <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </button>
                                </div>
                            @elseif (strtolower($category->name) === 'mccb')
                                @php
                                    $mccbSeries = [
                                        'M12B 25kA',
                                        'M16F 35kA',
                                        'M25F 35kA',
                                        'M40F 35kA',
                                        'M63F 35kA',
                                        'M80F 35kA',
                                    ];

                                    $getCI = function ($item) {
                                        $ci = json_decode($item->custom_input, true);
                                        return is_array($ci) ? $ci : [];
                                    };
                                @endphp

                                {{-- CAROUSEL panel: tampil 2 panel, geser untuk lihat 6 panel --}}
                                <div class="relative group/outer-slider">
                                    <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </button>
                                    <div class="slider-container flex gap-4 overflow-x-auto pb-6 snap-x snap-mandatory no-scrollbar">
                                    @foreach ($mccbSeries as $seriesName)
                                        @php
                                            $items = $category->products
                                                ->filter(function ($item) use ($getCI, $seriesName) {
                                                    $ci = $getCI($item);
                                                    $series = strtolower(trim((string) ($ci['series'] ?? '')));
                                                    return $series === strtolower(trim($seriesName));
                                                })
                                                ->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE);
                                        @endphp

                                        <x-product-series :seriesName="$seriesName" :items="$items" />
                                    @endforeach
                                    </div>
                                    <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </button>
                                </div>
                            @elseif (strtolower($category->name) === 'mccb accessories')
                                @php
                                    $mccbacSeries = [
                                        'MAA Alarm Contact',
                                        'MAS Shunt Release',
                                        'MAAUX Auxiliary Contact',
                                        'MAUVT Under Voltage',
                                        'MARH Extended Rotary Handle',
                                    ];

                                    $getCI = function ($item) {
                                        $ci = json_decode($item->custom_input, true);
                                        return is_array($ci) ? $ci : [];
                                    };
                                @endphp

                                {{-- CAROUSEL panel: tampil 2 panel, geser untuk lihat 6 panel --}}
                                <div class="relative group/outer-slider">
                                    <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </button>
                                    <div class="slider-container flex gap-4 overflow-x-auto pb-6 snap-x snap-mandatory no-scrollbar">
                                    @foreach ($mccbacSeries as $seriesName)
                                        @php
                                            $items = $category->products
                                                ->filter(function ($item) use ($getCI, $seriesName) {
                                                    $ci = $getCI($item);
                                                    $series = strtolower(trim((string) ($ci['series'] ?? '')));
                                                    return $series === strtolower(trim($seriesName));
                                                })
                                                ->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE);
                                        @endphp

                                        <x-product-series :seriesName="$seriesName" :items="$items" />
                                    @endforeach
                                    </div>
                                    <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </button>
                                </div>
                            @elseif (strtolower($category->name) === 'contactor accessories')
                                @php
                                    $caSeries = [
                                        'Coil Contactor',
                                        'Auxiliary Contact',
                                        'Time Delay',
                                        'Thermal Overload Relay',
                                    ];

                                    $getCI = function ($item) {
                                        $ci = json_decode($item->custom_input, true);
                                        return is_array($ci) ? $ci : [];
                                    };
                                @endphp

                                {{-- CAROUSEL panel: tampil 2 panel, geser untuk lihat 6 panel --}}
                                <div class="relative group/outer-slider">
                                    <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </button>
                                    <div class="slider-container flex gap-4 overflow-x-auto pb-6 snap-x snap-mandatory no-scrollbar">
                                    @foreach ($caSeries as $seriesName)
                                        @php
                                            $items = $category->products
                                                ->filter(function ($item) use ($getCI, $seriesName) {
                                                    $ci = $getCI($item);
                                                    $series = strtolower(trim((string) ($ci['series'] ?? '')));
                                                    return $series === strtolower(trim($seriesName));
                                                })
                                                ->sortBy(fn($i) => $i->kode, SORT_NATURAL | SORT_FLAG_CASE);
                                        @endphp

                                        <x-product-series :seriesName="$seriesName" :items="$items" />
                                    @endforeach
                                    </div>
                                    <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </button>
                                </div>
                            @elseif (strtolower($category->name) === 'box panel')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    {{-- Wall Mounting IP65 --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            Box Panel Wall Mounting IP65
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'vhb') && !str_contains(strtolower($item->kode), 'vhb200');
                                                })->sortBy(function ($item) {
                                                    return $item->kode;
                                                }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- Free Standing IP55 --}}
                                    <div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">
                                        <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-[#0cbca5] rounded-full"></span>
                                            Box Panel Free Standing IP55
                                        </h4>
                                        <div class="relative group/slider">
                                            <button type="button" class="absolute -left-2 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar">
                                                @foreach ($category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'vhb200');
                                                })->sortBy(function ($item) {
                                                    return $item->kode;
                                                }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                    @php
                                                        $customInput = json_decode($productItem->custom_input, true);
                                                    @endphp
                                                    <div class="flex-shrink-0 w-48 group">
                                                        <a href="/detail/{{ $productItem->slug }}"
                                                            class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4">
                                                            <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                                @if (!empty($productItem->image))
                                                                    <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                         @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                         srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                         sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                         @endif
                                                                         {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                         loading="lazy"
                                                                         alt="{{ $productItem->name }}"
                                                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                                @else
                                                                    <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="mt-4 flex flex-col flex-1">
                                                                <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                                    {{ Str::limit($productItem->kode, 20) }}
                                                                </p>
                                                                <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                                    {{ $productItem->name }}
                                                                </p>
                                                                
                                                                @if(isset($customInput) && $customInput)
                                                                    <div class="mt-2 space-y-0.5">
                                                                        @foreach (array_slice($customInput, 0, 2) as $key => $value)
                                                                            <div class="text-[9px] text-white/50 capitalize">{{ $key }}: {{ Str::limit($value, 12) }}</div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <div class="mt-auto pt-3 flex justify-between items-center">
                                                                    <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="absolute -right-2 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                {{-- Layout default jika bukan kategori khusus di atas --}}
                                <div class="relative group/slider">
                                    <button type="button" class="absolute -left-2 lg:-left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, -1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </button>
                                    <div class="category-slider slider-container flex gap-4 overflow-x-auto pb-2 scroll-smooth no-scrollbar mt-4">
                                        @foreach ($category->products->sortBy(function ($item) {
                                            return $item->kode;
                                        }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                            @php
                                                $customInput = json_decode($productItem->custom_input, true);
                                            @endphp
                                            <div class="flex-shrink-0 w-48 group">
                                                <a href="/detail/{{ $productItem->slug }}"
                                                    class="flex flex-col h-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 rounded-2xl p-4 shadow-lg">
                                                    <div class="w-full h-40 rounded-xl overflow-hidden bg-white/20 flex items-center justify-center p-2">
                                                        @if (!empty($productItem->image))
                                                            <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                                 @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                                 srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                                 sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                                 @endif
                                                                 {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                                 loading="lazy"
                                                                 alt="{{ $productItem->name }}"
                                                                 class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                                        @else
                                                            <div class="text-xs text-white/50">{{ __('No image') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="mt-4 flex flex-col flex-1">
                                                        <p class="text-[10px] uppercase tracking-wider text-[#FF7600] font-bold mb-1">
                                                            {{ Str::limit($productItem->kode, 20) }}
                                                        </p>
                                                        <p class="text-xs font-bold text-white leading-tight line-clamp-2">
                                                            {{ $productItem->name }}
                                                        </p>
                                                        <div class="mt-auto pt-3 flex justify-between items-center">
                                                            <span class="text-[10px] text-white/40 font-semibold italic">{{ __('VIEW') }}</span>
                                                            <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-[#066c5f] transition-colors">
                                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="absolute -right-2 lg:-right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white/95 backdrop-blur shadow-2xl flex items-center justify-center text-[#066c5f] transition-all duration-300 opacity-0 group-hover/slider:opacity-100 hover:bg-white hover:scale-110" onclick="scrollSlider(this, 1)">
                                        <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </button>
                                </div>
                            @endif
                        @else
                            <p class="text-sm text-gray-500">{{ __('No products in this category.') }}</p>
                        @endif
                    </div>

                    @php
                        $previewItems = $category->products->take(3);
                    @endphp

                    {{-- TABLET ONLY (md): NO MORE carousel inside carousel --}}
                    <div class="hidden md:block bg-[#5f5f5f60]/40 backdrop-blur-md lg:hidden p-8 mt-2 col-span-12 rounded-[2rem] border border-white/20 shadow-2xl">
                        <h3 class="text-2xl font-bold mb-6 border-b-[1.5px] pb-4 border-white/20 text-white flex items-center gap-3">
                            <div class="w-3 h-3 bg-[#066c5f] rounded-full animate-pulse shadow-[0_0_10px_#066c5f]"></div>
                            {{ $category->name }}
                        </h3>

                        <div class="grid grid-cols-3 gap-6">
                            @foreach ($previewItems as $productItem)
                                <a href="/detail/{{ $productItem->slug }}"
                                    class="group bg-white/5 hover:bg-white/15 backdrop-blur-xl border border-white/10 hover:border-white/30 transition-all duration-500 rounded-[1.5rem] p-5 flex flex-col shadow-2xl hover:-translate-y-2">

                                    <div class="w-full h-44 rounded-xl overflow-hidden bg-white/10 flex items-center justify-center p-4">
                                        @if (!empty($productItem->image))
                                            <img src="{{ \App\Helpers\ProductHelper::imageUrl($productItem->image) }}"
                                                 @if(\App\Helpers\ProductHelper::srcset($productItem->image))
                                                 srcset="{{ \App\Helpers\ProductHelper::srcset($productItem->image) }}"
                                                 sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"
                                                 @endif
                                                 {!! \App\Helpers\ProductHelper::imgAttrs($productItem->image) !!}
                                                 loading="lazy"
                                                 alt="{{ $productItem->name }}"
                                                 class="w-full h-full object-contain group-hover:scale-125 transition-transform duration-700">
                                        @else
                                            <div class="text-xs text-white/30">{{ __('No image') }}</div>
                                        @endif
                                    </div>

                                    <div class="mt-5 flex flex-col flex-1">
                                        <p class="text-[10px] uppercase tracking-[0.2em] font-black mb-2 opacity-80">
                                            {{ Str::limit($productItem->kode, 24) }}
                                        </p>
                                        <p class="text-base font-bold text-white leading-snug line-clamp-2 group-hover:text-[#066c5f] transition-colors">
                                            {{ $productItem->name }}
                                        </p>
                                        
                                        <div class="mt-auto pt-5 flex justify-between items-center border-t border-white/5">
                                            <span class="text-[11px] text-white/50 font-medium tracking-wide">{{ __('DETAILS') }}</span>
                                            <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-[#066c5f] transition-all duration-300 group-hover:rotate-45">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="flex justify-center md:justify-end mt-6">
                            <a href="{{ url('/product/' . $categorySlug) }}"
                                class="group flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white text-white hover:text-[#066c5f] border border-white/20 rounded-full font-bold transition-all duration-300 shadow-lg backdrop-blur-sm">
                                <span>{{ __('See All Products') }}</span>
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mx-auto mt-10">
            <!-- Grid Section -->
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-[#ffffff60] backdrop-blur-sm border-[1.5px] border-[#066c5f] p-6 rounded-3xl shadow-lg">
                    <h2 class="text-xl font-bold mb-2">{{ __('🌟 Best Quality') }}</h2>
                    <p>{{ __('Quality you can trust, performance you can rely on.') }}</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-[#ffffff60] backdrop-blur-sm border-[1.5px] border-[#066c5f] p-6 rounded-3xl shadow-lg">
                    <h2 class="text-xl font-bold mb-2">{{ __('🔧 Best Product') }}</h2>
                    <p>{{ __('Reliable, safe, and efficient electrical products for home and business.') }}</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-[#ffffff60] backdrop-blur-sm border-[1.5px] border-[#066c5f] p-6 rounded-3xl shadow-lg">
                    <h2 class="text-xl font-bold mb-2">{{ __('⚙ Best Service') }}</h2>
                    <p>{{ __('Smart, durable, and energy-efficient electrical solutions for homes and businesses.') }}</p>
                </div>
            </div>
            <!-- Call to Action -->
            <div
                class="mt-10 p-6 bg-[#066c5f] mb border-[1.5px] border-[#0cbca5] text-white rounded-3xl text-center shadow-lg">
                <h2 class="text-2xl font-bold mb-4">{{ __('Contact Us') }}</h2>
                <p class="mb-[1.5rem]">{{ __('Get the best products and the best quality at affordable prices and you will be able to feel the advantages yourself.') }}</p>
                <a href="{{ route('contact-us') }}"
                    class="border-2 bg-white underline hover:text-blue-500 text-[#000] px-6 py-2 rounded-full transition-all duration-300 ease-in-out shadow border-[#fff]">{{ __('Contact Us') }} →</a>
            </div>
            <div
                class="mt-10 mx-auto p-6 lg:w-[50%] bg-[#ffffff60] backdrop-blur-sm mb border-[1.5px] border-[#066c5f] rounded-3xl text-center shadow-lg">
                <h2 class="text-2xl font-bold mb-4 jump-text">
                    @php
                        $checkOurProduct = __('Check Our Product');
                        $letters = str_split($checkOurProduct);
                    @endphp
                    @foreach($letters as $index => $letter)
                        <span style="--i:{{ $index }}">{{ $letter }}</span>
                    @endforeach
                </h2>
                <p class="mb-[1.5rem]">{{ __('Built for durability and safety') }}</p>
                <a href="/product"
                    class="border-2 bg-[#066c5f] text-white underline hover:text-blue-500  px-6 pt-2 pb-3 rounded-full transition-all duration-300 ease-in-out shadow border-[#fff]">{{ __('Our Product More') }} →</a>
            </div>
        </div>
        <div class="flex items-end justify-between mb-10 pb-4 border-b border-slate-200">
            <div>
                <h2 class="text-3xl font-black text-[#0f172a] uppercase tracking-tight">{{ __('From Our Blog') }}</h2>
                <p class="text-slate-500 font-medium text-sm">{{ __('Industry insights and professional electrical solutions') }}</p>
            </div>
            <a href="{{ route('blog.collection') }}" class="hidden md:flex items-center gap-2 text-[#066c5f] font-bold text-sm hover:text-[#0dd8bd] transition-colors group">
                {{ __('View All Stories') }}
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>

        @php
            $publishedBlogs = $blogs->filter(fn($b) => !empty($b->is_published))->values();
            $count = $publishedBlogs->count();
            $displayBlogs = $publishedBlogs; 
        @endphp

        @if ($count === 0)
            <div class="bg-white rounded-[32px] p-20 text-center border border-slate-100 italic text-slate-400">
                {{ __('No blogs available at the moment.') }}
            </div>
        @else
            <div class="relative group/outer-blog">
                @if($count > 3)
                    <button type="button" class="hidden md:flex items-center justify-center absolute -left-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-white shadow-2xl text-[#066c5f] transition-all duration-300 opacity-0 group-hover/outer-blog:opacity-100 hover:scale-110" onclick="blogCarouselScroll(-1)">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button type="button" class="hidden md:flex items-center justify-center absolute -right-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-white shadow-2xl text-[#066c5f] transition-all duration-300 opacity-0 group-hover/outer-blog:opacity-100 hover:scale-110" onclick="blogCarouselScroll(1)">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                @endif

                <div id="blogCarousel" class="flex gap-8 overflow-x-auto pb-12 scroll-smooth no-scrollbar snap-x snap-mandatory px-2">
                    @foreach ($displayBlogs as $blog)
                        <div class="flex-shrink-0 w-[290px] sm:w-[350px] md:w-[400px] snap-start">
                            <a href="{{ route('blog.public', ['slug' => $blog->slug]) }}" class="group flex flex-col h-full bg-white rounded-[32px] overflow-hidden border border-slate-100 hover:shadow-[0_40px_80px_-20px_rgba(0,0,0,0.12)] transition-all duration-500 transform hover:-translate-y-2">
                                <div class="relative h-60 overflow-hidden">
                                    @if (!empty($blog->image))
                                        <img src="{{ \App\Helpers\ProductHelper::imageUrl($blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-[1500ms]">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-slate-50 to-slate-200"></div>
                                    @endif
                                    <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-all"></div>
                                </div>
                                <div class="p-8 flex flex-col flex-1">
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="bg-[#066c5f]/5 text-[#066c5f] text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">Story</span>
                                        <span class="text-[11px] font-bold text-slate-400">{{ $blog->created_at->format('M d') }}</span>
                                    </div>
                                    <h4 class="text-xl font-extrabold text-[#0f172a] mb-4 line-clamp-2 leading-tight group-hover:text-[#066c5f] transition-colors">{{ $blog->title }}</h4>
                                    
                                    @php
                                        $firstSection = $blog->sections->first();
                                        $previewHtml = $blog->content ?? (optional($firstSection)->content ?? '');
                                        $previewText = trim(preg_replace('/\s+/', ' ', strip_tags($previewHtml)));
                                    @endphp
                                    
                                    <p class="text-slate-500 font-medium text-[13px] leading-relaxed line-clamp-3 mb-8">
                                        {{ $previewText }}
                                    </p>
                                    
                                    <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between text-[#066c5f] font-bold text-xs uppercase tracking-wider">
                                        <span>Read More</span>
                                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <script>
                function blogCarouselScroll(direction) {
                    const el = document.getElementById('blogCarousel');
                    if (!el) return;
                    const amount = (el.firstElementChild.offsetWidth + 32) * direction;
                    el.scrollBy({ left: amount, behavior: 'smooth' });
                }
            </script>
        @endif
    </div>
    </div>
    </div>
    <x-footer></x-footer>
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        function toggleProductDropdown(id, btn) {
            const dropdown = document.getElementById(id);
            if (!dropdown) return;
            
            const isHidden = dropdown.classList.contains('hidden');
            const textSpan = btn.querySelector('.btn-text');
            const iconBtn = btn.querySelector('.btn-icon');
            
            if (isHidden) {
                dropdown.classList.remove('hidden');
                setTimeout(() => {
                    dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                }, 10);
                textSpan.textContent = '{{ __("Show Less") }}';
                iconBtn.style.transform = 'rotate(180deg)';
            } else {
                dropdown.style.maxHeight = '0px';
                setTimeout(() => {
                    dropdown.classList.add('hidden');
                }, 300); // match duration-300
                textSpan.textContent = '{{ __("Show More") }}';
                iconBtn.style.transform = 'rotate(0deg)';
            }
        }
    </script>
</body>

</html>
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1, // Only one slide at a time
        spaceBetween: 0, // No gaps
        loop: true,
        autoplay: {
            delay: 3000, // Change slide every 3s
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sliders = document.querySelectorAll('.slider-container');
        
        // Function to check and toggle navigation buttons visibility
        function updateNavigationButtons() {
            document.querySelectorAll('.group\\/slider, .group\\/outer-slider').forEach(sliderGroup => {
                const container = sliderGroup.querySelector('.slider-container');
                if (!container) return;
                
                const hasScroll = container.scrollWidth > container.clientWidth;
                const buttons = sliderGroup.querySelectorAll('button[onclick*="scrollSlider"]');
                
                buttons.forEach(button => {
                    if (hasScroll) {
                        button.style.display = 'flex';
                    } else {
                        button.style.display = 'none';
                    }
                });
            });
        }
        
        // Initial check
        updateNavigationButtons();
        
        // Recheck on window resize
        window.addEventListener('resize', updateNavigationButtons);
        
        sliders.forEach(slider => {
            slider.addEventListener('wheel', function(e) {
                // Cegah pergerakan horizontal dari touchpad atau mouse (shift+scroll)
                if (Math.abs(e.deltaX) !== 0) {
                    e.preventDefault();
                }
                // Biarkan vertical scroll (e.deltaY) lolos agar seluruh halaman ikut terscroll
            }, { passive: false });

            // Prevent vertical scroll on touch devices during horizontal swipe
            let touchStartX = 0;
            let touchStartY = 0;
            let scrollStartLeft = 0;
            
            slider.addEventListener('touchstart', function(e) {
                touchStartX = e.touches[0].clientX;
                touchStartY = e.touches[0].clientY;
                scrollStartLeft = slider.scrollLeft;
            }, { passive: true });
            
            slider.addEventListener('touchmove', function(e) {
                const touchX = e.touches[0].clientX;
                const touchY = e.touches[0].clientY;
                const deltaX = touchStartX - touchX;
                const deltaY = touchStartY - touchY;
                
                // If horizontal movement is greater than vertical, prevent page scroll
                if (Math.abs(deltaX) > Math.abs(deltaY)) {
                    e.preventDefault();
                    slider.scrollLeft = scrollStartLeft + deltaX;
                }
            }, { passive: false });
        });
    });

    function scrollSlider(button, direction) {
        const container = button.parentElement.querySelector('.slider-container');
        if (container) {
            const firstCard = container.firstElementChild;
            if (firstCard) {
                const cardWidth = firstCard.offsetWidth;
                const gap = parseInt(window.getComputedStyle(container).gap) || 0;
                const scrollAmount = (cardWidth + gap) * direction;
                container.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            } else {
                const scrollAmount = container.clientWidth * 0.7;
                container.scrollBy({
                    left: direction * scrollAmount,
                    behavior: 'smooth'
                });
            }
        }
    }
</script>


