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

        ::-webkit-scrollbar {
            width: 6px;
            height: 7px;
        }

        ::-webkit-scrollbar-button {
            display: block;
            background-color: #cccccc00;
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
        }

        .scroll-container {
            scrollbar-width: thin;
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
    </style>
</head>

<body class="outfit bg-[#FDFBEE]">
    <div class="max-w-[93%] mx-auto">
        <div class="flex justify-between items-center py-3">
            <x-navUser></x-navUser>
        </div>

        {{-- isi web --}}
        <div
            class="overflow-hidden p-6 sm:p-10 lg:p-[5rem] lg:justify-between py-[80px] relative bg-no-repeat bg-cover w-full min-h-screen after:content-[''] bg-gradient-to-r from-[#066c5f] to-[#0dd8bd] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]">
            <div class="w-full relative z-[10]">
                <a href="/product" class="group">
                    <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="stroke-white group-hover:stroke-gray-400 transition-colors duration-300">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </a>

                {{-- Produk --}}
                <div
                    class="w-full min-h-full flex flex-col justify-center items-center gap-6 lg:flex-row lg:items-start lg:justify-start mx-auto my-10">
                    <div
                        class="w-full sm:w-72 md:w-80 h-auto bg-[#FDFBEE]/40 border border-white text-white p-4 sm:p-5 rounded-2xl shadow-lg flex flex-col justify-start relative overflow-hidden backdrop-blur-[8px]">
                        @php
                            $customInput = json_decode($product->custom_input, true);
                        @endphp

                        <h2 class="text-base sm:text-lg text-center text-white font-bold">
                            @if ($customInput)
                                @foreach ($customInput as $key => $value)
                                    <div class="capitalize">{{ ucfirst($key) }}: {{ $value }}</div>
                                @endforeach
                            @else
                                {{ $product->kode }}
                            @endif
                        </h2>

                        <p class="mt-2 flex-grow text-xs flex justify-center items-center sm:text-sm">
                            <img src="{{ asset('storage/' . $product->image) }}" width="180px" alt="Vinsa">
                        </p>
                    </div>
                    <div
                        class="w-full lg:h-[325px] mx-0 lg:mx-10 flex flex-col justify-between gap-4 lg:overflow-y-auto pr-2">
                        <div class="border-b-[1.5px] border-white pb-3">
                            <p class="text-2xl sm:text-4xl lg:text-5xl mb-2 text-left font-extrabold text-white">
                                {{ $product->name }}
                            </p>
                            <p class="text-lg sm:text-xl lg:text-2xl text-left font-bold text-white">
                                @if ($customInput)
                                    @foreach ($customInput as $key => $value)
                                        <div class="capitalize text-white font-bold text-xl">{{ ucfirst($key) }}: {{ $value }}</div>
                                    @endforeach
                                    <div class="text-white font-bold text-xl">{{ $product->kode }}</div>
                                @else
                                    {{ $product->kode }}
                                @endif
                            </p>

                        </div>
                        <div>
                            <ul class="text-white text-sm sm:text-base">
                                <p class="font-semibold text-xl underline">
                                    Spesifikasi :
                                </p>
                                @foreach ($product->attributes as $attributes)
                                    <li>{{ $attributes->field_name }} : {{ $attributes->field_value }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="border-t-[1.5px] pt-3 border-white text-sm sm:text-base">
                            <p class="font-semibold text-white text-xl underline">
                                Deskripsi :
                            </p>
                            <ul class="text-white">
                                <li>{!! nl2br(e($product->description)) !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="text-center lg:text-left px-4">
                    <p class="text-3xl sm:text-5xl lg:text-6xl font-bold text-white">
                        Interest With This?
                    </p>
                    <p class="text-xl sm:text-3xl lg:text-4xl font-bold text-white">
                        Contact Us
                    </p>
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
