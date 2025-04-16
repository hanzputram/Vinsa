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
        <div class="overflow-hidden lg:p-[5rem] lg:justify-between py-[80px] h-full lg:max-h-[720px] flex justify-center relative bg-no-repeat bg-cover  after:content-[''] after:bg-[rgba(40,40,40,0.65)] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]"
            style="background-image:url('/image/pabrik.jpg')">
            <div class="lg:w-[50%] w-full relative z-[10]">
                <p class="shining-text text-xl text-center lg:text-left font-medium">
                    Penuhi Kebutuhan Listrik dengan Produk Terbaik
                </p>
                <p class="text-6xl text-center lg:text-left font-extrabold  text-[#fff]">
                    Welcome<br> To<br> Vinsa
                </p>
                <p class="text-xl lg:text-lg text-center mx-4 lg:mx-auto text-[#fffffffe] pt-5 pb-15 lg:text-left">
                    "Vinsa: Dedikasi dalam Menyediakan Solusi Kelistrikan Premium, Menghadirkan Produk Berkualitas
                    Tinggi untuk Kebutuhan Rumah, Bisnis, dan Industri Anda!
                </p>
                <div class="flex my-[2rem] justify-center lg:justify-start ">
                    <a href="/product"
                        class="bg-green-600 text-white px-6 py-3 transition-all mr-5 duration-100 ease-in-out rounded-full shadow hover:bg-green-700">Our
                        Product</a>
                    <a href="https://wa.me/6281335715398"
                        class="border-2 border-[#F77F1E] text-[#fff] px-6 py-3 rounded-full transition-all duration-300 ease-in-out shadow hover:bg-[#F77F1E] hover:text-white">Contact
                        Us</a>
                </div>
            </div>

            {{-- card slider --}}
            <div
                class="hidden sm:hidden md:hidden lg:block lg:rounded-[2rem] lg:border-[1px] lg:shadow-lg lg:shadow-[#ffffff2a] lg:border-white lg:max-w-[330px] lg:max-h-[430px] bg-[#00000036] backdrop-blur-[2.5px] z-[10]">
                <div class="flex flex-col bg-transparent items-end gap-[1.25rem] text-white">

                    <div class="w-full overflow-x-hidden">
                        <div class="px-[1.25rem]">
                            <h2 class="my-[1rem] text-center text-2xl lg:text-3xl">
                                <svg viewBox="0 0 32 32" width="20px" height="20px"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="m0 0h32v32h-32z"></path>
                                        <path
                                            d="m19 1.73205081 7.8564065 4.53589838c1.8564064 1.07179677 3 3.05255889 3 5.19615241v9.0717968c0 2.1435935-1.1435936 4.1243556-3 5.1961524l-7.8564065 4.5358984c-1.8564065 1.0717968-4.1435935 1.0717968-6 0l-7.85640646-4.5358984c-1.85640646-1.0717968-3-3.0525589-3-5.1961524v-9.0717968c0-2.14359352 1.14359354-4.12435564 3-5.19615241l7.85640646-4.53589838c1.8564065-1.07179677 4.1435935-1.07179677 6 0zm4.0203166 9.82532719c-.259282-.4876385-.8647807-.672758-1.3524192-.4134761l-5.6794125 3.0187491-5.6793299-3.0187491c-.4876385-.2592819-1.09313718-.0741624-1.35241917.4134761-.25928198.4876385-.07416246 1.0931371.41347603 1.3524191l5.61827304 2.9868539.0000413 6.7689186c0 .5522848.4477153 1 1 1 .5522848 0 1-.4477152 1-1l-.0000413-6.7689186 5.6183556-2.9868539c.4876385-.259282.6727581-.8647806.4134761-1.3524191z"
                                            fill="#ffffff"></path>
                                    </g>
                                </svg>
                                Our Product
                            </h2>
                        </div>

                        {{-- Slider --}}
                        <div
                            class="w-full p-5 mx-auto max-w-full overflow-x-scroll flex gap-[1rem] flex-wrap-none pb-[.8rem] mb-5">

                            @forelse ($products->take(10) as $product)
                                @if ($loop->first)
                                    <div class="fixed w-9 top-[50%] right-0 z-10">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#FFFFFF" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#000" stroke-width="1.8"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                @endif

                                <div
                                    class="group card rounded-[24px] w-[200px] h-[275px] border-[1px] border-[#fff] bg-[#2c2c2c36] backdrop-blur-lg pb-6 px-4 shrink-0 flex flex-col shadow-none relative">
                                    <p
                                        class="w-full flex justify-center object-cover transition-opacity duration-500 group-hover:opacity-0">
                                        {{ \Illuminate\Support\Str::limit($product->name, 10) }}
                                    </p>
                                    <img class="object-cover transition-opacity w-full duration-500 group-hover:opacity-0"
                                        src="{{ asset('storage/' . $product->image) }}" alt="">
                                    <a href="/detail/{{ $product->id }}"
                                        class="absolute inset-0 underline flex font-normal bg-[#2c2c2c17] backdrop-blur-lg rounded-[24px] items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        See More ↗
                                    </a>
                                </div>
                            @empty
                                <div class="text-white text-center w-full">
                                    Belum ada produk yang ditambahkan.
                                </div>
                            @endforelse

                            @if ($products->count() > 10)
                                <a href="{{ route('products.view.user') }}"
                                    class="rounded-[24px] hover:bg-[#ffffff75] transition-all duration-300 hover:text-black w-[200px] h-[275px] border border-dashed border-[#fff] backdrop-blur-lg shrink-0 flex items-center justify-center text-white text-center">
                                    <p class="underline">
                                        Lihat Selengkapnya →
                                    </p>
                                </a>
                            @endif

                        </div>
                    </div>
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
        {{-- <div class="grid grid-rows-{{ count($categories) }} gap-4">
            @foreach ($categories as $category)
                @php
                    $firstProduct = $category->products->first();
                @endphp

                <div class="grid grid-cols-6 row-span-1 gap-4">
                    <div
                        class="bg-[#5f5f5f60] hidden md:col-span-1 border-white border-[1.5px] py-[2rem] text-center rounded-xl overflow-hidden shadow-md md:flex md:flex-col md:items-center justify-start">
                        <h3 class="text-lg font-bold mb-2">{{ $category->name }}</h3>

                        @if ($firstProduct && $firstProduct->image)
                            <img src="{{ asset('storage/' . $firstProduct->image) }}" alt="{{ $firstProduct->name }}"
                                class="w-[120px] object-cover rounded-md">
                        @else
                            <div
                                class="w-[120px] flex items-center justify-center text-gray-400 bg-white rounded-md">
                                Gambar tidak tersedia
                            </div>
                        @endif
                    </div>


                    <div class="col-span-7 md:col-span-5 bg-[#5f5f5f60] rounded-xl p-4">
                            <h3 class="text-lg md:hidden font-bold mb-2">{{ $category->name }}</h3>
                        @if ($category->products->count())
                            <div class="flex gap-4 overflow-x-auto pb-2">
                                @foreach ($category->products as $productItem)
                                    <div
                                        class="flex-shrink-0 bg-[#5f5f5f60] border-white border-[1px] hover:bg-[#4646466e] transition-all duration-[200ms] rounded-lg shadow-md flex flex-col items-center text-center justify-center py-3 w-40">
                                        <a href="/detail/{{ $productItem->id }}" class="transition-transform transform hover:scale-[1.01]">
                                            @if ($productItem->custom_input)
                                                <p class="text-xs text-gray-300 mb-2">
                                                    {{ Str::limit($productItem->kode, 50) }}
                                                </p>
                                            @endif
                                            <img src="{{ asset('storage/' . $productItem->image) }}"
                                                alt="{{ $productItem->name }}"
                                                class="w-[120px] h-40 object-cover rounded">
                                            <h4 class="mt-2 font-bold text-sm">
                                                {{ Str::limit($productItem->name, 10) }}
                                            </h4>
                                            @if ($productItem->custom_input)
                                                <p class="text-xs text-gray-300">
                                                    {{ Str::limit($productItem->custom_input, 20) }}
                                                </p>
                                            @else
                                                <p class="text-xs text-gray-300">
                                                    {{ Str::limit($productItem->kode, 50) }}
                                                </p>
                                            @endif
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-sm text-gray-500">Belum ada produk pada kategori ini.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div> --}}
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
