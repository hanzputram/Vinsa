<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false }" :class="{ 'overflow-hidden': sidebarOpen }">

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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('image/sa.png') }}">
    <title>{{ __('Vinsa | Our Collection') }}</title>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }

        .outfit {
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        @keyframes shine {
            0% { background-position: -200%; }
            100% { background-position: 200%; }
        }

        .shining-text {
            background-image: linear-gradient(90deg, #9e9e9e 25%, #ffffff 50%, #9e9e9e 75%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 6s linear infinite;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #79B0A9;
            border-radius: 20px;
            border: 3px solid transparent;
            background-clip: content-box;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #8CBBB5;
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
            100% { transform: rotate(360deg); }
        }

        @keyframes rotate-border {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .animate-rotate-border {
            animation: rotate-border var(--speed) linear infinite;
        }

        .product-card:hover .product-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .category-pill.active {
            background-color: #F77F1E !important;
            color: white !important;
            border-color: #F77F1E !important;
            box-shadow: 0 10px 20px rgba(247, 127, 30, 0.4) !important;
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE] min-h-screen">
    <x-app-loader />
    <div class="max-w-[95%] mx-auto">
        <!-- Navigation -->
        <div class="flex justify-between items-center py-4">
            <x-navUser class="relative z-50"></x-navUser>
        </div>

        <!-- Hero Section -->
        <div class="relative overflow-hidden bg-gradient-to-br from-[#066C5F] via-[#098d7c] to-[#0dd8bd] rounded-[40px] px-6 py-20 md:py-32 mb-12 shadow-[0_20px_50px_rgba(6,108,95,0.3)]" data-aos="zoom-in-up">
            <!-- Decorative Elements -->
            <div class="absolute top-[-20%] right-[-10%] w-[500px] h-[500px] bg-white opacity-10 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[-20%] left-[-10%] w-[600px] h-[600px] bg-[#F77F1E] opacity-10 rounded-full blur-[150px]"></div>
            
            <!-- Animated Background Shapes -->
            <div class="absolute top-1/4 left-10 w-4 h-4 bg-white/20 rounded-full animate-bounce"></div>
            <div class="absolute bottom-1/4 right-20 w-6 h-6 bg-white/10 rounded-full animate-ping" style="animation-duration: 3s;"></div>

            <div class="relative z-10 text-center max-w-4xl mx-auto">
                <div class="inline-block px-4 py-1.5 mb-6 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-xs font-bold tracking-widest uppercase" data-aos="fade-down">
                    {{ __('Premium Electrical Solutions') }}
                </div>
                <h1 class="text-5xl md:text-7xl font-black text-white mb-8 uppercase tracking-tighter leading-none" data-aos="fade-up" data-aos-delay="100">
                    {{ __('Our') }} <span class="shining-text">{{ __('Collection') }}</span>
                </h1>
                <p class="text-lg md:text-2xl text-white/80 mb-12 font-medium max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    {{ __('Elevating industry standards with precision-engineered products designed for reliability and safety.') }}
                </p>

                <!-- Search Container -->
                <div class="relative max-w-2xl mx-auto group shadow-2xl rounded-3xl" data-aos="fade-up" data-aos-delay="300">
                    <div class="absolute inset-y-0 left-0 pl-7 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-[#066C5F] transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="searchInput" 
                        placeholder="{{ __('Search by name or product code...') }}"
                        class="w-full pl-16 pr-8 py-6 rounded-3xl text-xl text-gray-800 bg-white/95 backdrop-blur-sm focus:outline-none focus:ring-4 focus:ring-[#F77F1E]/40 transition-all border-none placeholder-gray-400"
                        oninput="filterProducts()">
                </div>
            </div>
            <div class="px-4">
            <!-- Filters Section -->
            <div class="mb-16" data-aos="fade-up">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-8 mb-10 border-b border-gray-100 pb-10">
                    <div class="flex flex-col items-center lg:items-start">
                        <div class="flex items-center gap-3 mb-2">
                             <div class="w-2 h-8 bg-[#F77F1E] rounded-full"></div>
                             <h2 class="text-3xl font-black text-white tracking-tight">{{ __('Product Categories') }}</h2>
                        </div>
                        <p class="text-gray-200 font-medium">{{ __('Browse by series and technical classification') }}</p>
                    </div>
                    
                    <div class="flex items-center gap-3 overflow-x-auto pb-4 lg:pb-0 no-scrollbar w-full lg:w-auto scroll-smooth">
                        <button onclick="filterByCategory('')" 
                            class="category-pill active whitespace-nowrap px-8 py-3 rounded-2xl border-2 border-transparent font-bold bg-white text-gray-600 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-2" id="cat-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            {{ __('All Products') }}
                        </button>
                        @foreach ($categories as $category)
                            <button onclick="filterByCategory('{{ $category->id }}')" 
                                class="category-pill whitespace-nowrap px-8 py-3 rounded-2xl border-2 border-transparent font-bold bg-white text-gray-600 shadow-sm hover:shadow-md transition-all duration-300" id="cat-{{ $category->id }}">
                                {{ __($category->name) }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Product Grid -->
                <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                    @forelse ($products as $product)
                        @php
                            $searchText = strtolower($product->name . ' ' . $product->kode . ' ' . ($product->custom_input ?? ''));
                            $customInput = json_decode($product->custom_input, true);
                        @endphp
                        <div class="product-card group relative bg-white rounded-[32px] shadow-[0_10px_30px_rgba(0,0,0,0.03)] hover:shadow-[0_20px_60px_rgba(6,108,95,0.12)] transition-all duration-500 overflow-hidden border border-gray-50 flex flex-col h-full" 
                             data-category-id="{{ $product->category_id }}" 
                             data-search="{{ $searchText }}"
                             data-aos="fade-up"
                             data-aos-delay="{{ ($loop->index % 4) * 100 }}">
                            
                            <!-- Category Badge Float -->
                            <div class="absolute top-6 left-6 z-20">
                                <span class="bg-white/80 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-black text-[#066C5F] uppercase tracking-widest border border-gray-100 shadow-sm">
                                    {{ __($product->category->name ?? '') }}
                                </span>
                            </div>

                            <!-- Product Image Container -->
                            <div class="relative h-72 overflow-hidden bg-gray-50/50 group-hover:bg-white transition-colors duration-500 flex items-center justify-center p-12">
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="max-w-full max-h-full object-contain transform group-hover:scale-110 group-hover:rotate-2 transition-all duration-700 ease-out">
                                
                                <!-- Decorative background circle -->
                                <div class="absolute inset-0 bg-radial-gradient from-[#066C5F]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                            </div>

                            <!-- Product Info -->
                            <div class="p-8 flex flex-col flex-grow">
                                <div class="mb-6 flex-grow">
                                    <div class="text-[11px] font-bold text-[#F77F1E] mb-2 tracking-widest uppercase flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 bg-[#F77F1E] rounded-full"></span>
                                        {{ $product->kode ?? 'SKU-VINSA' }}
                                    </div>
                                    <h3 class="text-2xl font-black text-gray-900 group-hover:text-[#066C5F] transition-colors duration-300 leading-tight mb-4" title="{{ $product->name }}">
                                        {{ $product->name }}
                                    </h3>

                                    <!-- Technical Details Pills -->
                                    <div class="flex flex-wrap gap-2">
                                        @if ($customInput)
                                            @php $count = 0; @endphp
                                            @foreach ($customInput as $key => $value)
                                                @if($count < 3)
                                                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-500 border border-gray-100">
                                                        {{ __(ucfirst($key)) }}: {{ \Illuminate\Support\Str::limit(__($value), 15) }}
                                                    </span>
                                                @endif
                                                @php $count++; @endphp
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <a href="{{ route('product.show', $product->id) }}" 
                                   class="group/btn relative overflow-hidden flex items-center justify-center gap-3 w-full py-4 bg-[#066C5F] text-white rounded-2xl font-black text-sm tracking-wide shadow-lg shadow-[#066C5F]/20 hover:shadow-[#F77F1E]/30 transition-all duration-500">
                                    <span class="relative z-10">{{ __('VIEW SPECIFICATIONS') }}</span>
                                    <svg class="w-5 h-5 relative z-10 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                    <div class="absolute inset-0 bg-[#F77F1E] translate-y-full group-hover/btn:translate-y-0 transition-transform duration-500"></div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full flex flex-col items-center justify-center py-32 text-center" data-aos="fade-up">
                            <div class="w-32 h-32 bg-gray-50 rounded-[40px] flex items-center justify-center mb-8 border border-gray-100 shadow-inner">
                               <svg class="w-16 h-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 00-2 2H6a2 2 0 00-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                            <h3 class="text-3xl font-black text-gray-300 mb-4">{{ __('No Products Found') }}</h3>
                            <p class="text-gray-400 max-w-sm mx-auto font-medium">{{ __('Our engineering team is currently updating this collection. Please check back soon.') }}</p>
                        </div>
                    @endforelse

                    <!-- Empty Search Result -->
                    <div id="noResults" class="col-span-full hidden flex-col items-center justify-center py-32 text-center">
                        <div class="w-32 h-32 bg-gray-50 rounded-[40px] flex items-center justify-center mb-8 border border-gray-100">
                            <svg class="w-16 h-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-300 mb-4">{{ __('Search Not Found') }}</h3>
                        <p class="text-gray-400 max-w-sm mx-auto font-medium">{{ __('Try different keywords or browse our categories to find what you need.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-expo'
        });

        let currentCategory = "";

        function filterByCategory(id) {
            currentCategory = id;
            
            // Reset all pills
            document.querySelectorAll('.category-pill').forEach(pill => {
                pill.classList.remove('active', 'bg-[#F77F1E]', 'text-white', 'shadow-[#F77F1E]/30', 'border-[#F77F1E]');
                pill.classList.add('bg-white', 'text-gray-600');
            });
            
            // Set active pill
            const targetPill = id === "" ? document.getElementById('cat-all') : document.getElementById('cat-' + id);
            if (targetPill) {
                targetPill.classList.add('active');
                targetPill.classList.remove('bg-white', 'text-gray-600');
            }

            filterProducts();
        }

        function filterProducts() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.product-card');
            const noResults = document.getElementById('noResults');
            let foundCount = 0;

            cards.forEach(card => {
                const searchData = card.getAttribute('data-search') || '';
                const category = card.getAttribute('data-category-id');
                
                const matchesSearch = searchData.includes(searchInput);
                const matchesCategory = currentCategory === "" || category === currentCategory;

                if (matchesSearch && matchesCategory) {
                    card.style.display = 'flex';
                    foundCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (foundCount === 0 && cards.length > 0) {
                noResults.classList.remove('hidden');
                noResults.classList.add('flex');
            } else {
                noResults.classList.add('hidden');
                noResults.classList.remove('flex');
            }
        }
    </script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</body>

</html>
