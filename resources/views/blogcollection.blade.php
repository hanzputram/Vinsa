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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Blog | Vinsa</title>

    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .blog-card:hover .blog-image {
            transform: scale(1.1);
        }

        .gradient-text {
            background: linear-gradient(90deg, #066c5f, #0dd8bd);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE] text-slate-800 antialiased">
    <x-app-loader />

    <div class="max-w-[93%] mx-auto">

        {{-- NAV --}}
        <div class="py-6">
            <x-navUser />
        </div>

        {{-- HEADER SECTION --}}
        <div class="relative bg-gradient-to-br from-[#066c5f] to-[#0dd8bd] rounded-[48px] px-8 sm:px-16 py-24 sm:py-32 overflow-hidden shadow-2xl mb-16">
            <div class="absolute top-0 right-0 w-1/3 h-full bg-white/5 -skew-x-12 transform translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-white/5 -skew-x-6 transform -translate-x-1/4"></div>
            
            <div class="relative z-10 max-w-4xl text-left">
                <a href="/" class="inline-flex items-center text-white/80 hover:text-white mb-8 transition-all px-4 py-2 bg-white/10 rounded-full border border-white/10 group">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" class="stroke-current mr-2 transform group-hover:-translate-x-1 transition-transform">
                        <path d="M19 12H5M5 12L10 7M5 12L10 17" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="text-xs font-bold uppercase tracking-wider">{{ __('Home') }}</span>
                </a>
                
                <h1 class="text-5xl sm:text-7xl font-black text-white mb-6 leading-tight tracking-tight drop-shadow-xl">
                    Insights <span class="text-white/70">&</span> <br>Stories.
                </h1>
                <p class="text-white/80 text-lg sm:text-xl font-medium max-w-2xl leading-relaxed">
                    {{ __('Discover professional insights, electrical solutions, and the latest trends from the industry experts at Vinsa.') }}
                </p>
            </div>
        </div>

        {{-- CONTENT WRAPPER --}}
        <div class="pb-24">
            @php
                $publishedBlogs = $blogs->filter(fn($b) => !empty($b->is_published))->values();
                $count = $publishedBlogs->count();
            @endphp

            @if ($count === 0)
                <div class="text-center py-24 bg-white rounded-[40px] border border-slate-100 shadow-sm">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <p class="text-xl font-bold text-slate-400">{{ __('Belum ada blog.') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($publishedBlogs as $blog)
                    <a href="{{ route('blog.public', ['slug' => $blog->slug]) }}" class="blog-card group flex flex-col h-full bg-white rounded-[40px] overflow-hidden border border-slate-100 hover:shadow-[0_40px_80px_-20px_rgba(0,0,0,0.12)] transition-all duration-500 transform hover:-translate-y-2">
                        {{-- Image Container --}}
                        <div class="relative h-72 overflow-hidden">
                            @if (!empty($blog->image))
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                    class="blog-image w-full h-full object-cover transition-transform duration-[1500ms] ease-out">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-slate-50 to-slate-200 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition-all"></div>
                            
                            {{-- Badge --}}
                            <div class="absolute top-6 left-6">
                                <span class="bg-white/90 backdrop-blur-md text-[#066c5f] text-[10px] font-black uppercase tracking-[0.2em] px-4 py-2 rounded-full shadow-lg">
                                    Article
                                </span>
                            </div>
                        </div>

                        {{-- Content Container --}}
                        <div class="p-10 flex flex-col flex-1">
                            <div class="flex items-center gap-3 mb-6">
                                <span class="text-[11px] font-bold text-slate-400 flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $blog->created_at->format('M d, Y') }}
                                </span>
                                <div class="w-1 h-1 rounded-full bg-slate-300"></div>
                                <span class="text-[11px] font-bold text-slate-400">
                                    {{ ceil(str_word_count(strip_tags($blog->content)) / 200) ?: 1 }} min read
                                </span>
                            </div>

                            <h2 class="text-2xl font-black text-[#0f172a] mb-5 leading-tight group-hover:text-[#066c5f] transition-colors line-clamp-2">
                                {{ $blog->title }}
                            </h2>

                            @php
                                $firstSection = $blog->sections->first();
                                $previewHtml = $blog->content ?? (optional($firstSection)->content ?? '');
                                $previewText = trim(preg_replace('/\s+/', ' ', strip_tags($previewHtml)));
                            @endphp

                            <p class="text-slate-500 font-medium text-sm leading-relaxed line-clamp-3 mb-10">
                                {{ $previewText ?: __('Tidak ada konten') }}
                            </p>

                            {{-- Card Footer --}}
                            <div class="mt-auto pt-8 border-t border-slate-50 flex items-center justify-between text-[#066c5f] font-bold text-sm">
                                <span class="group-hover:translate-x-1 transition-transform inline-flex items-center">
                                    {{ __('Read Full Story') }}
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Newsletter Section --}}
        <div class="mb-24">
            <div class="bg-slate-900 rounded-[48px] p-12 lg:p-24 overflow-hidden relative shadow-2xl">
                <div class="absolute top-0 right-0 w-1/2 h-full bg-white/5 -skew-x-12 transform translate-x-1/4"></div>
                <div class="relative z-10 max-w-3xl">
                    <h2 class="text-4xl lg:text-6xl font-extrabold text-white mb-6 leading-tight">Stay updated.</h2>
                    <p class="text-white/60 text-lg font-medium mb-12 leading-relaxed">
                        {{ __('Get the latest articles and industry news delivered directly to your inbox.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 max-w-xl">
                        <input type="email" placeholder="Your email address" class="flex-1 bg-white/10 border border-white/20 rounded-2xl px-8 py-5 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-white/50 transition-all font-medium">
                        <button class="bg-[#0dd8bd] text-slate-900 px-10 py-5 rounded-2xl font-black hover:bg-white transition-all duration-300 shadow-xl">
                            {{ __('Subscribe') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <x-footer></x-footer>

</body>

</html>
