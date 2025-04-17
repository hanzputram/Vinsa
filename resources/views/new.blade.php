<!DOCTYPE html>
<html lang="en">

<head>
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
            font-weight: <weight>;
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
            animation: jump 2.3s ease-in-out infinite;
            animation-delay: calc(45ms * var(--i));
            /* Each letter jumps one after another */
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE]">
    <div class="max-w-[93%] mx-auto">
        <div class="flex justify-between items-center py-3">
            <x-navUser class="relative z-[11]"></x-navUser>
        </div>

        {{-- isi image --}}
        <div class="overflow-hidden lg:p-[5rem] lg:justify-center  py-[80px] h-full lg:max-h-[720px] flex justify-center relative bg-no-repeat bg-cover  after:content-[''] after:bg-[rgba(40,40,40,0.65)] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]"
            style="background-image:url('/image/pabrik.jpg')">
            <div class="lg:w-[50%] w-full relative z-[10]">
                <p class="shining-text text-xl text-center  font-medium">
                    Penuhi Kebutuhan Listrik dengan Produk Terbaik
                </p>
                <p class="text-6xl text-center  font-extrabold  text-[#fff]">
                    Welcome<br> To<br> Vinsa
                </p>
                <p class="text-xl lg:text-lg text-center mx-4 lg:mx-auto text-[#fffffffe] pt-5 pb-15">
                    "Vinsa: Dedikasi dalam Menyediakan Solusi Kelistrikan Premium, Menghadirkan Produk Berkualitas
                    Tinggi untuk Kebutuhan Rumah, Bisnis, dan Industri Anda!
                </p>
                <div class="flex my-[2rem] justify-center ">
                    <a href="/product"
                        class="bg-green-600 text-white px-6 py-3 transition-all mr-5 duration-100 ease-in-out rounded-full shadow hover:bg-green-700">Our
                        Product</a>
                    <a href="https://wa.me/6281335715398"
                        class="border-2 border-[#F77F1E] text-[#fff] px-6 py-3 rounded-full transition-all duration-300 ease-in-out shadow hover:bg-[#F77F1E] hover:text-white">Contact
                        Us</a>
                </div>
            </div>
        </div>
        <div class="swiper mySwiper w-full mt-10">
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                @foreach ($carousels as $carousel)
                    <div class="swiper-slide flex justify-center">
                        <img class="rounded-3xl" src="{{ asset('storage/' . $carousel->image) }}" alt="">
                    </div>
                @endforeach

            </div>
            <!-- Navigation -->
            <div class="swiper-pagination"></div>
        </div>

        {{-- category produk --}}
        <div class="grid grid-rows-{{ count($categories) }} gap-4">
            @foreach ($categories as $category)
                @php
                    $firstProduct = $category->products->first();
                @endphp

                <div class="grid grid-cols-12 row-span-1 gap-4">
                    {{-- KIRI: Gambar dan nama kategori --}}
                    <div
                        class="bg-[#5f5f5f60] border-white border-[1.5px] col-span-2 hidden p-4 text-center rounded-xl overflow-hidden shadow-md md:flex md:flex-col items-center justify-start">
                        <h3 class="text-lg font-bold mb-2">{{ $category->name }}</h3>

                        @if ($firstProduct && $firstProduct->image)
                            <img src="{{ asset('storage/' . $firstProduct->image) }}" alt="{{ $firstProduct->name }}"
                                class="w-[120px] h-[150px] object-cover rounded-md">
                        @else
                            <div
                                class="w-[120px] h-[150px] flex items-center justify-center text-gray-400 bg-white rounded-md">
                                Gambar tidak tersedia
                            </div>
                        @endif
                    </div>

                    {{-- KANAN: Produk dalam slider horizontal --}}
                    <div class="col-span-12 md:col-span-10 bg-[#5f5f5f60] rounded-xl p-4">
                        <h3 class="text-lg md:hidden font-bold mb-2">{{ $category->name }}</h3>

                        @if ($category->products->count())
                            @if (strtolower($category->name) === 'push button')
                                <div class="flex flex-col md:flex-row gap-4">
                                    {{-- KB 5 Series --}}
                                    <div class="w-full md:w-1/2 md:border-r-[2px] md:border-white text-white md:bg-black/20 md:p-4 md:rounded-lg">
                                        <h4 class="text-md font-bold mb-2">KB 5 Series</h4>
                                        <div class="flex gap-4 overflow-x-auto pb-2">
                                            @foreach ($category->products->filter(function ($item) {
            return str_contains(strtolower($item->kode), 'kb5');
        })->sortBy(function ($item) {
            return $item->kode;
        }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                                @php
                                                    $customInput = json_decode($productItem->custom_input, true);
                                                @endphp
                                                <div
                                                    class="flex-shrink-0 bg-[#5f5f5f60] border-white border-[1px] hover:bg-[#4646466e] transition-all duration-[200ms] rounded-lg shadow-md flex flex-col items-center text-center justify-center py-3 w-40">
                                                    <a href="/detail/{{ $productItem->id }}"
                                                        class="transition-transform transform hover:scale-[1.01]">
                                                        <p class="text-xs text-gray-300 mb-2">
                                                            {{ Str::limit($productItem->kode, 50) }}
                                                        </p>
                                                        <img src="{{ asset('storage/' . $productItem->image) }}"
                                                            alt="{{ $productItem->name }}"
                                                            class="w-[120px] h-40 object-cover rounded">
                                                        <h4 class="mt-2 text-white font-bold text-sm">
                                                            {{ Str::limit($productItem->name, 10) }}
                                                        </h4>

                                                        @if ($customInput)
                                                            <div class="text-[10px] text-gray-300 mt-1">
                                                                @foreach ($customInput as $key => $value)
                                                                    <div class="capitalize">{{ ucfirst($key) }}:
                                                                        {{ Str::limit($value, 15) }}</div>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <p class="text-xs text-gray-300 mt-1">
                                                                {{ Str::limit($productItem->kode, 50) }}
                                                            </p>
                                                        @endif
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- KB 2 Series --}}
                                    <div class="w-full md:w-[calc(50%-1rem)] md:border-l-[2px] md:pl-[13.5px] mr-6 md:border-white text-white md:bg-black/20 md:p-4 md:rounded-lg">
                                        <h4 class="text-md font-bold mb-2">KB 2 Series</h4>
                                        <div class="flex gap-4 overflow-x-auto pb-2">
                                            @foreach (
                                                $category->products->filter(function ($item) {
                                                    return str_contains(strtolower($item->kode), 'kb2');
                                                })->sortBy(function ($item) {
                                                    // Sort berdasarkan panjang kode terlebih dahulu, lalu alfabetis (a-z0-9)
                                                    return [strlen($item->kode), strtolower($item->kode)];
                                                }, SORT_REGULAR) as $productItem
                                            )
                                                @php
                                                    $customInput = json_decode($productItem->custom_input, true);
                                                @endphp
                                                <div
                                                    class="flex-shrink-0 bg-[#5f5f5f60] border-white border-[1px] hover:bg-[#4646466e] transition-all duration-[200ms] rounded-lg shadow-md flex flex-col items-center text-center justify-center py-3 w-40">
                                                    <a href="/detail/{{ $productItem->id }}"
                                                        class="transition-transform transform hover:scale-[1.01]">
                                                        <p class="text-xs text-gray-300 mb-2">
                                                            {{ Str::limit($productItem->kode, 50) }}
                                                        </p>
                                                        <img src="{{ asset('storage/' . $productItem->image) }}"
                                                            alt="{{ $productItem->name }}"
                                                            class="w-[120px] h-40 object-cover rounded">
                                                        <h4 class="mt-2 text-white font-bold text-sm">
                                                            {{ Str::limit($productItem->name, 10) }}
                                                        </h4>

                                                        @if ($customInput)
                                                            <div class="text-[10px] text-gray-300 mt-1">
                                                                @foreach ($customInput as $key => $value)
                                                                    <div class="capitalize">{{ ucfirst($key) }}:
                                                                        {{ Str::limit($value, 15) }}</div>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <p class="text-xs text-gray-300 mt-1">
                                                                {{ Str::limit($productItem->kode, 50) }}
                                                            </p>
                                                        @endif
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                {{-- Layout default jika bukan kategori Push Button --}}
                                <div class="flex gap-4 overflow-x-auto pb-2">
                                    @foreach ($category->products->sortBy(function ($item) {
        return $item->kode;
    }, SORT_NATURAL | SORT_FLAG_CASE) as $productItem)
                                        @php
                                            $customInput = json_decode($productItem->custom_input, true);
                                        @endphp
                                        <div
                                            class="flex-shrink-0 bg-[#5f5f5f60] border-white border-[1px] hover:bg-[#4646466e] transition-all duration-[200ms] rounded-lg shadow-md flex flex-col items-center text-center justify-center py-3 w-40">
                                            <a href="/detail/{{ $productItem->id }}"
                                                class="transition-transform transform hover:scale-[1.01]">
                                                <p class="text-xs text-gray-300 mb-2">
                                                    {{ Str::limit($productItem->kode, 50) }}
                                                </p>
                                                <img src="{{ asset('storage/' . $productItem->image) }}"
                                                    alt="{{ $productItem->name }}"
                                                    class="w-[120px] h-40 object-cover rounded">
                                                <h4 class="mt-2 text-white font-bold text-sm">
                                                    {{ Str::limit($productItem->name, 10) }}
                                                </h4>

                                                @if ($customInput)
                                                    <div class="text-[10px] text-gray-300 mt-1">
                                                        @foreach ($customInput as $key => $value)
                                                            <div class="capitalize">{{ ucfirst($key) }}:
                                                                {{ Str::limit($value, 15) }}</div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <p class="text-sm text-gray-500">Belum ada produk pada kategori ini.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mx-auto mt-10">
            <!-- Grid Section -->
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-[#ffffff60] backdrop-blur-sm border-[1.5px] border-[#066c5f] p-6 rounded-3xl shadow-lg">
                    <h2 class="text-xl font-bold mb-2">🌟 Best Quality</h2>
                    <p>Quality you can trust, performance you can rely on.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-[#ffffff60] backdrop-blur-sm border-[1.5px] border-[#066c5f] p-6 rounded-3xl shadow-lg">
                    <h2 class="text-xl font-bold mb-2">🔧 Best Product</h2>
                    <p>Reliable, safe, and efficient electrical products for home and business.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-[#ffffff60] backdrop-blur-sm border-[1.5px] border-[#066c5f] p-6 rounded-3xl shadow-lg">
                    <h2 class="text-xl font-bold mb-2">⚙ Best Service</h2>
                    <p>Smart, durable, and energy-efficient electrical solutions for homes and businesses.</p>
                </div>
            </div>
            <!-- Call to Action -->
            <div
                class="mt-10 p-6 bg-[#066c5f] mb border-[1.5px] border-[#0cbca5] text-white rounded-3xl text-center shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
                <p class="mb-[1.5rem]">Get the best products and the best quality at affordable prices and you will be
                    able to feel the advantages yourself.</p>
                <a href="https://wa.me/6281335715398"
                    class="border-2 bg-white underline hover:text-blue-500 text-[#000] px-6 py-2 rounded-full transition-all duration-300 ease-in-out shadow border-[#fff]">Contact
                    Us →</a>
            </div>
            <div
                class="mt-10 mx-auto p-6 lg:w-[50%] bg-[#ffffff60] backdrop-blur-sm mb border-[1.5px] border-[#066c5f] rounded-3xl text-center shadow-lg">
                <h2 class="text-2xl font-bold mb-4 jump-text">
                    <span style="--i:0">C</span><span style="--i:1">h</span><span style="--i:2">e</span><span
                        style="--i:3">c</span><span style="--i:4">k</span>
                    <span style="--i:5"> </span>
                    <span style="--i:6">O</span><span style="--i:7">u</span><span style="--i:8">r</span>
                    <span style="--i:9"> </span>
                    <span style="--i:10">P</span><span style="--i:11">r</span><span style="--i:12">o</span><span
                        style="--i:13">d</span><span style="--i:14">u</span><span style="--i:15">c</span><span
                        style="--i:16">t</span>
                </h2>
                <p class="mb-[1.5rem]">Built for durability and safety</p>
                <a href="/product"
                    class="border-2 bg-[#066c5f] text-white underline hover:text-blue-500  px-6 pt-2 pb-3 rounded-full transition-all duration-300 ease-in-out shadow border-[#fff]">Our
                    Product More →</a>
            </div>

        </div>
    </div>
    </div>
    </div>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
        const slider = document.querySelector('.overflow-x-scroll');

        if (slider) {
            slider.addEventListener('wheel', function(e) {
                if (e.deltaY !== 0) {
                    e.preventDefault();
                    slider.scrollLeft += e.deltaY * 0.8; // reduce scroll step for lighter feel
                }
            }, {
                passive: false
            });
        }
    });
</script>
<script>
    const categoryIds = @json($categories->pluck('id'));

    categoryIds.forEach(id => {
        new Swiper(`.mySwiper-${id}`, {
            slidesPerView: 3,
            spaceBetween: 20,
            grabCursor: true,
            navigation: true,
            loop: false,
        });
    });
</script>
