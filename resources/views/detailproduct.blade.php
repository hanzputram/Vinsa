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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('image/vinsalg.png') }}">
    @php
        use Illuminate\Support\Str;

        $metaTitle = $product->meta_title ?: $product->name . ' | Vinsa Electric';
        $metaDesc = $product->meta_description ?: Str::limit(strip_tags($product->description ?? ''), 155);
    @endphp

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDesc }}">
    <link rel="canonical" href="{{ url()->current() }}">

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

        @keyframes pulse-bg {

            0%,
            100% {
                background-color: #F77F1E;
            }

            50% {
                background-color: #ffa459;
            }
        }

        .pulse-bg {
            animation: pulse-bg 1.5s infinite;
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
                <a href="javascript:window.history.back()" class="group">
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
                            {{ $product->name }}
                        </h2>

                        <p class="mt-2 flex-grow text-xs flex justify-center items-center sm:text-sm">
                            <img src="{{ asset('storage/' . $product->image) }}" width="180px" alt="Vinsa">
                        </p>
                    </div>
                    <div
                        class="w-full lg:h-[325px] mx-0 lg:mx-10 flex flex-col justify-between gap-4 lg:overflow-y-auto pr-2">
                        <div class="border-b-[1.5px] border-white pb-3">
                            @php
                                $categoryName = strtolower($product->category?->name);
                            @endphp
                            <p class="text-2xl sm:text-4xl lg:text-5xl mb-2 text-left font-extrabold text-white">
                                {{ $product->name }}
                                @if (in_array($categoryName, ['cable tray', 'pilot lamp', 'accessories']))
                                    - {{ $product->custom_input }}
                                @endif
                            </p>
                            <p class="text-lg sm:text-xl lg:text-2xl text-left font-bold text-white">
                                @if ($customInput)
                                    @foreach ($customInput as $key => $value)
                                        <div class="capitalize text-white font-bold text-xl">{{ ucfirst($key) }}:
                                            {{ $value }}</div>
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
                                    <li class="border-b-[1px] py-3">{{ $attributes->field_name }} :
                                        {{ $attributes->field_value }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="border-t-[1.5px] pt-3 mt-7 border-white text-sm sm:text-base">
                            <p class="font-semibold text-white text-xl underline">
                                Deskripsi :
                            </p>
                            <ul class="text-white">
                                @foreach (explode("\n", $product->description) as $line)
                                    <li class="border-b-[1px] border-white py-3">{!! e($line) !!}</li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>

                @if (Str::contains(strtoupper($product->kode), 'VHB200'))
                    <p class="text-2xl sm:text-4xl lg:text-5xl mb-2 text-center font-extrabold text-white">
                        Kenapa Harus Box Panel Vinsa?
                    </p>
                    <div class="flex justify-center">
                        <img src="/image/fs.png" alt="" width="600px">
                    </div>
                    <div class="flex justify-center w-full md:p-4 md:mb-10">
                        <table
                            class="table-auto scale-[0.65] md:scale-[1] border-collapse border w-full border-gray-400 text-sm text-center">
                            <thead class="bg-[#066C5F] text-white">
                                <tr>
                                    <th rowspan="3" class="border border-gray-400 p-2 text-xl">Tipe</th>
                                    <th colspan="3" class="border border-gray-400 p-2 text-lg">Ukuran (mm)</th>
                                    <th rowspan="3" class="border border-gray-400 p-2 text-xl">Berat (Kg)</th>
                                    <th colspan="2" rowspan="2" class="border border-gray-400 p-2 text-lg">
                                        Ketebalan (mm)</th>
                                    <th rowspan="3" class="border border-gray-400 p-2 text-xl">Base Plate</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="border border-gray-400 p-2">Tinggi</th>
                                    <th rowspan="2" class="border border-gray-400 p-2">Lebar</th>
                                    <th rowspan="2" class="border border-gray-400 p-2">Tebal</th>
                                </tr>
                                <tr>
                                    <th class="border border-gray-400 p-2">Pintu</th>
                                    <th class="border border-gray-400 p-2">Bodi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                    @php
                                        $isActive = isset($kodeAktif) && strtoupper($barang->kode) === $kodeAktif;
                                    @endphp

                                    @if (Str::contains(strtolower($barang->name), 'box'))
                                        <tr class="{{ $isActive ? 'pulse-bg' : 'bg-white hover:bg-gray-100' }}">
                                            <td class="border border-gray-400 p-2">{{ $barang->kode }}</td>
                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Height')->field_value ?? '-' }}
                                            </td>
                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Widht')->field_value ?? '-' }}
                                            </td>
                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Depth')->field_value ?? '-' }}
                                            </td>

                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Net Weight')->field_value ?? '-' }}
                                            </td>

                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Door Thickness')->field_value ?? '-' }}
                                            </td>
                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Body Thickness')->field_value ?? '-' }}
                                            </td>

                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Base Plate Thickness')->field_value ?? '-' }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif (Str::contains(strtoupper($product->kode), 'VHB'))
                    <p class="text-2xl sm:text-4xl lg:text-5xl mb-2 text-center font-extrabold text-white">
                        Kenapa Harus Box Panel Vinsa?
                    </p>
                    <div class="flex justify-center">
                        <img src="/image/bvin.png" alt="" width="600px">
                    </div>
                    <div class="flex justify-center w-full md:p-4 md:mb-10">
                        <table
                            class="table-auto scale-[0.65] md:scale-[1] border-collapse border w-full border-gray-400 text-sm text-center">
                            <thead class="bg-[#066C5F] text-white">
                                <tr>
                                    <th rowspan="3" class="border border-gray-400 p-2 text-xl">Tipe</th>
                                    <th colspan="3" class="border border-gray-400 p-2 text-lg">Ukuran (mm)</th>
                                    <th rowspan="3" class="border border-gray-400 p-2 text-xl">Berat (Kg)</th>
                                    <th colspan="2" rowspan="2" class="border border-gray-400 p-2 text-lg">
                                        Ketebalan (mm)</th>
                                    <th rowspan="3" class="border border-gray-400 p-2 text-xl">Base Plate</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="border border-gray-400 p-2">Tinggi</th>
                                    <th rowspan="2" class="border border-gray-400 p-2">Lebar</th>
                                    <th rowspan="2" class="border border-gray-400 p-2">Tebal</th>
                                </tr>
                                <tr>
                                    <th class="border border-gray-400 p-2">Pintu</th>
                                    <th class="border border-gray-400 p-2">Bodi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                    @php
                                        $isActive = isset($kodeAktif) && strtoupper($barang->kode) === $kodeAktif;
                                    @endphp

                                    @if (Str::contains(strtolower($barang->name), 'box'))
                                        <tr class="{{ $isActive ? 'pulse-bg' : 'bg-white hover:bg-gray-100' }}">
                                            <td class="border border-gray-400 p-2">{{ $barang->kode }}</td>
                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Height')->field_value ?? '-' }}
                                            </td>
                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Widht')->field_value ?? '-' }}
                                            </td>
                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Depth')->field_value ?? '-' }}
                                            </td>

                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Net Weight')->field_value ?? '-' }}
                                            </td>

                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Door Thickness')->field_value ?? '-' }}
                                            </td>
                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Body Thickness')->field_value ?? '-' }}
                                            </td>

                                            <td class="border border-gray-400 p-2">
                                                {{ $barang->attributes->firstWhere('field_name', 'Base Plate Thickness')->field_value ?? '-' }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif (Str::contains(strtoupper($product->name), 'WAREHOUSE'))
                    <p class="text-2xl sm:text-4xl lg:text-5xl mb-2 text-center font-extrabold text-white">
                        Kenapa Harus Warehouse Rack Vinsa?
                    </p>
                    <div class="flex justify-center">
                        <img src="/image/9.png" alt="" width="900px">
                    </div>
                    <div class="flex justify-center">
                        <img src="/image/10.png" alt="" width="900px">
                    </div>
                @endif
                <div class="flex flex-col md:flex md:flex-row md:justify-between">
                    <div class="text-center lg:text-left px-4">
                        <p class="text-3xl sm:text-5xl lg:text-6xl font-bold text-white">
                            Tertarik Dengan Ini?
                        </p>
                        <p class="text-xl sm:text-3xl lg:text-4xl font-bold text-white">
                            Kontak Kami
                        </p>
                    </div>
                    <div class="flex justify-center mt-5 md:mt-0 md:flex md:items-center">
                        <a href="https://wa.me/6281335715398"
                            class="border-[3px] bg-[#ffffff54] rounded-full p-3 text-lg font-bold text-[#000] hover:bg-[#00000054] hover:text-white transition-all duration-150">
                            Kontak Kami ↗
                        </a>
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
