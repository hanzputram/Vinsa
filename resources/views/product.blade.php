<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Document</title>
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
            background: #ffffff53;
            /* Warna thumb */
            border-radius: 100px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ffffffb5;
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

        @keyframes rotate-border {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .animate-rotate-border {
            animation: rotate-border var(--speed) linear infinite;
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE]">
    <div class="max-w-[93%] mx-auto">
        <div class="flex justify-between items-center py-3">
            <x-navUser></x-navUser>
        </div>
        <div
            class="overflow-hidden p-10 lg:p-[5rem] lg:justify-between py-[80px]  flex justify-center relative bg-no-repeat bg-cover w-full min-h-screen after:content-[''] bg-gradient-to-r from-[#066c5f] to-[#0dd8bd] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]">
            <div class="w-full relative z-[10]">
                {{-- isi web --}}
                <a href="/new" class="group">
                    <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="stroke-white group-hover:stroke-gray-400 transition-colors duration-300">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </a>
                <p class="text-6xl pb-10 text-center font-extrabold  text-[#fff]">
                    Our Collection
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse ($products as $product)
                        <div
                            class="w-full bg-[#fdfbee68] border border-[#ffffff] text-white sm:p-4 px-7 sm:rounded-2xl rounded-full shadow-lg flex flex-row sm:flex-col justify-between relative overflow-hidden backdrop-blur-[8px] transition-transform transform hover:scale-[1.01] hover:shadow-xl duration-300">
                            <div
                                class="sm:flex sm:flex-col flex justify-between items-center sm:justify-between flex-grow sm:items-center sm:text-center">
                                <div class="font-bold text-base hidden sm:block sm:text-lg">{{ $product->name }}</div>

                                {{-- Image --}}
                                <img class="w-16 h-1w-16 object-contain rounded-full sm:w-full"
                                    src="{{ asset('storage/' . $product->image) }}" alt="Vinsa">
                                <div>
                                    <div class="font-bold text-base sm:hidden block sm:text-lg">
                                        {{ \Illuminate\Support\Str::limit($product->name, 10) }}
                                    </div>
                                    <p class="text-[12px] sm:hidden text-gray-200">
                                        Spesifikasi {{ \Illuminate\Support\Str::limit($product->name, 5) }}
                                    </p>
                                </div>
                                {{-- Text content --}}

                                {{-- Button (responsive) --}}
                                <div class="flex justify-end sm:justify-center items-center ">
                                    <a href="/detail/{{ $product->id }}"
                                        class="py-2 px-4 text-sm font-semibold rounded-lg bg-white text-[#066c5f] hover:bg-gray-200 transition hidden sm:block">
                                        Spesifikasi Product
                                    </a>

                                    <!-- Link ke halaman detail -->
                                    <a href="/detail/{{ $product->id }}"
                                        class="group relative h-10 w-10 flex justify-center items-center sm:hidden overflow-hidden cursor-pointer rounded-full"
                                        style="
                                            --spread: 90deg;
                                            --shimmer-color: #fff;
                                            --radius: 99999px;
                                            --speed: 2.7s;
                                            --cut: 0.05em;
                                        ">

                                        <!-- Spinning shimmer border -->
                                        <div class="absolute inset-0 rounded-full animate-rotate-border -z-10"
                                            style="background: conic-gradient(
                                                 from calc(270deg - (var(--spread) * 0.5)),
                                                 transparent 0,
                                                 var(--shimmer-color) var(--spread),
                                                 transparent var(--spread)
                                             );">
                                        </div>

                                        <!-- Inner icon with solid border -->
                                        <div class="relative z-10 p-2 rounded-full bg-[#6CD6C2]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-4 text-center text-white py-8">
                            Belum ada produk yang ditambahkan.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>
    <x-footer></x-footer>
</body>

</html>
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
