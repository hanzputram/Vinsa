<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false }" :class="{ 'overflow-hidden': sidebarOpen }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('image/sa.png') }}">
    <title>Vinsa</title>

    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
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
            background: #ffffff53;
            border-radius: 100px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ffffffb5;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        .wa-text-curv {
            width: 100%;
            position: absolute;
            top: 0%;
            animation: spin 6s linear infinite;
        }

        @keyframes spin {
            100% {
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
            <x-navUser class="relative z-10"></x-navUser>
        </div>

        <div
            class="overflow-hidden p-10 lg:p-[5rem] lg:justify-between py-[80px] flex justify-center relative bg-no-repeat bg-cover w-full min-h-screen after:content-[''] bg-gradient-to-r from-[#066c5f] to-[#0dd8bd] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]">
            <div class="w-full relative z-[10]">

                <a href="/new" class="group mb-4 inline-block">
                    <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="stroke-white group-hover:stroke-gray-400 transition-colors duration-300">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </a>
                <p class="text-6xl pb-10 text-center font-extrabold text-[#fff]">Our Collection</p>

                <!-- Overlay -->
                <div class="fixed inset-0 bg-black bg-opacity-30 z-[29]" x-show="sidebarOpen" x-transition.opacity
                    @click="sidebarOpen = false" x-cloak></div>

                <!-- Sidebar -->
                <div class="fixed top-0 left-0 w-64 h-full bg-[#FFFCF0] shadow-lg p-4 z-[30] transform transition-transform duration-300 ease-in-out"
                    :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }" x-cloak>

                    <!-- Link Menu -->
                    <a href="{{ url('/') }}"
                        class="block py-2 text-[#066C5F] border-b-[1.5px] hover:text-[#066c5fad] font-bold">Home</a>
                    <a href="{{ url('/about') }}"
                        class="block py-2 border-b-[1.5px] text-[#066C5F] hover:text-[#066c5fad] font-bold">About Us</a>
                    <a href="{{ url('/contact') }}"
                        class="block py-2 text-[#066C5F] hover:text-[#066c5fad] font-bold">Contact Us</a>

                    <!-- Filter Kategori -->
                    <div class="mt-6">
                        <label for="categoryFilter" class="block text-sm font-semibold text-[#066C5F] mb-2">Pilih
                            Kategori</label>
                        <select id="categoryFilter" onchange="filterProducts()"
                            class="w-full p-2 border border-gray-300 rounded-lg text-[#066C5F] focus:outline-none focus:ring-2 focus:ring-[#0dd8bd]">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Tombol Toggle Sidebar -->
                <button class="z-[31] text-white bg-[#0dd8bd] p-2 rounded-full" @click="sidebarOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Input pencarian -->
                <input type="text" id="searchInput" placeholder="Cari produk..."
                    class="my-6 w-full max-w-sm mx-auto block rounded-full px-8 py-4 text-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#0dd8bd] shadow"
                    oninput="filterProducts()">

                <!-- Produk -->
                <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse ($products as $product)
                        @php
                            $searchText = strtolower(
                                $product->name . ' ' . $product->kode . ' ' . ($product->custom_input ?? ''),
                            );
                        @endphp
                        <div class="product-card w-full bg-[#fdfbee68] border border-[#ffffff] text-white sm:p-4 px-7 sm:rounded-2xl rounded-full shadow-lg flex flex-row sm:flex-col justify-between relative overflow-hidden backdrop-blur-[8px] transition-transform transform hover:scale-[1.01] hover:shadow-xl duration-300"
                            data-category-id="{{ $product->category_id }}" data-search="{{ $searchText }}">
                            <div
                                class="sm:flex sm:flex-col flex justify-between items-center sm:justify-between flex-grow sm:items-center sm:text-center">
                                <div class="font-bold text-base hidden sm:block sm:text-lg product-name">
                                    {{ \Illuminate\Support\Str::limit($product->name, 19) }}
                                </div>

                                <div
                                    class="font-semibold text-base hidden sm:block sm:text-[13px] sm:text-gray-300 product-code">
                                    @if ($product->custom_input)
                                        {{ \Illuminate\Support\Str::limit($product->custom_input, 20) }}
                                    @else
                                        {{ $product->kode }}
                                    @endif
                                </div>

                                <img class="w-16 h-1w-16 object-contain md:rounded-lg rounded-full sm:w-full"
                                    src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />

                                <div>
                                    <div class="font-bold text-base sm:hidden block sm:text-lg">
                                        {{ \Illuminate\Support\Str::limit($product->name, 10) }}
                                    </div>
                                    <div class="text-[12px] sm:hidden text-gray-200">
                                        @if ($product->custom_input)
                                            {{ \Illuminate\Support\Str::limit($product->custom_input, 15) }}
                                        @else
                                            {{ $product->kode }}
                                        @endif
                                        <br>
                                        @if ($product->custom_input)
                                            {{ $product->kode }}
                                        @endif
                                    </div>
                                </div>
                                <div class="text-[12px] hidden sm:block">
                                    @if ($product->custom_input)
                                        {{ $product->kode }}
                                    @endif
                                </div>
                                <div class="flex justify-end sm:justify-center items-center ">
                                    <a href="/detail/{{ $product->id }}"
                                        class="py-2 px-4 md:mt-3 text-sm font-semibold rounded-lg bg-white text-[#066c5f] hover:bg-gray-200 transition hidden sm:block">
                                        Spesifikasi Product
                                    </a>

                                    <a href="/detail/{{ $product->id }}"
                                        class="group relative h-10 w-10 flex justify-center items-center sm:hidden overflow-hidden cursor-pointer rounded-full"
                                        style="--spread: 90deg; --shimmer-color: #fff; --radius: 99999px; --speed: 2.7s; --cut: 0.05em;">
                                        <div class="absolute inset-0 rounded-full animate-rotate-border -z-10"
                                            style="background: conic-gradient(
                                                from calc(270deg - (var(--spread) * 0.5)),
                                                transparent 0,
                                                var(--shimmer-color) var(--spread),
                                                transparent var(--spread)
                                            );">
                                        </div>
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

    <x-footer></x-footer>

    <script>
        function filterProducts() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const categoryFilter = document.getElementById('categoryFilter')?.value;
            const cards = document.querySelectorAll('.product-card');

            cards.forEach(card => {
                const searchData = card.getAttribute('data-search') || '';
                const category = card.getAttribute('data-category-id');

                const matchesSearch = searchData.includes(searchInput);
                const matchesCategory = categoryFilter === "" || category === categoryFilter;

                card.style.display = (matchesSearch && matchesCategory) ? '' : 'none';
            });
        }
    </script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</body>

</html>
