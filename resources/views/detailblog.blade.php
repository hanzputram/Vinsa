<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

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
    <title>{{ $blog->title }} | Vinsa</title>
    <link rel="icon" type="image/png" href="{{ asset('image/vinsalg.png') }}">

    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
        }

        /* Reading Progress Bar */
        #reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(to right, #0dd8bd, #066c5f);
            z-index: 100;
            transition: width 0.1s ease;
        }

        /* Improved Readability Styles */
        .article-content {
            color: #2d3748;
            line-height: 1.8;
            font-size: 1.125rem;
        }

        .article-content h1,
        .article-content h2,
        .article-content h3,
        .article-content h4 {
            color: #1a202c;
            font-weight: 800;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            line-height: 1.3;
        }

        .article-content h2 { font-size: 1.875rem; border-left: 4px solid #066c5f; padding-left: 1rem; }
        .article-content h3 { font-size: 1.5rem; }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        .article-content ul,
        .article-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .article-content li {
            margin-bottom: 0.5rem;
        }

        .article-content blockquote {
            border-left: 4px solid #0dd8bd;
            padding: 1rem 1.5rem;
            background: #f7fafc;
            font-style: italic;
            margin: 2rem 0;
            border-radius: 0 0.5rem 0.5rem 0;
        }

        .article-content img {
            border-radius: 1rem;
            margin: 2rem auto;
            display: block;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .article-content a {
            color: #066c5f;
            text-decoration: underline;
            font-weight: 600;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE] text-gray-900 antialiased">
    <!-- Progress Bar -->
    <div id="reading-progress"></div>

    <x-app-loader />

    <div class="max-w-[95%] lg:max-w-[1200px] mx-auto px-4">
        <!-- Navigation -->
        <header class="flex justify-between items-center py-6">
            <x-navUser></x-navUser>
        </header>

        <main class="py-10">
            <!-- Back Button -->
            <div class="mb-10">
                <a href="javascript:window.history.back()" class="inline-flex items-center gap-2 group text-[#066c5f] font-bold transition-all hover:-translate-x-1">
                    <div class="p-2 rounded-full border-2 border-[#066c5f] group-hover:bg-[#066c5f] group-hover:text-white transition-colors">
                        <svg viewBox="0 0 24 24" width="20px" height="20px" fill="none" stroke="currentColor" class="transition-colors">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <span>{{ __('Back') }}</span>
                </a>
            </div>

            <!-- Header Section -->
            <div class="max-w-4xl mx-auto text-center mb-12 fade-in">
                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">
                    {{ $blog->title }}
                </h1>
                
                <div class="flex flex-wrap justify-center items-center gap-6 text-gray-500 text-sm md:text-base mb-8">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ $blog->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="w-1 h-1 bg-gray-300 rounded-full"></div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span id="reading-time">5 min read</span>
                    </div>
                </div>

                @if (!empty($blog->image))
                    <div class="relative w-full aspect-video md:aspect-[21/9] rounded-[2rem] overflow-hidden shadow-2xl mb-12">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>

            <!-- Content Area -->
            <div class="max-w-4xl mx-auto bg-white rounded-[2.5rem] p-6 md:p-12 lg:p-16 shadow-xl shadow-gray-200/50 border border-gray-100 relative mb-20 fade-in" style="animation-delay: 0.2s;">
                
                <!-- Simple Social Share -->
                <div class="absolute -left-20 top-0 hidden xl:flex flex-col gap-4">
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->fullUrl()) }}" target="_blank" class="w-12 h-12 rounded-full bg-emerald-500 flex items-center justify-center text-white shadow-lg hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                </div>

                {{-- Main WYSIWYG Content --}}
                @if (!empty($blog->content))
                    <div class="article-content" id="blog-content">
                        {!! $blog->content !!}
                    </div>
                @endif

                {{-- Sections --}}
                @foreach ($blog->sections as $section)
                    <div class="mt-16 first:mt-8">
                        @if (!empty($section->subtitle))
                            <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-[#066c5f] pl-4 mb-6">
                                {{ $section->subtitle }}
                            </h2>
                        @endif

                        @if (!empty($section->image))
                            <div class="my-8">
                                <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->subtitle ?? '' }}" class="w-full max-w-2xl h-auto rounded-2xl shadow-lg mx-auto">
                            </div>
                        @endif

                        @if (!empty($section->content))
                            <div class="article-content">
                                {!! $section->content !!}
                            </div>
                        @endif
                    </div>
                @endforeach

                <!-- Mobile Share -->
                <div class="mt-16 flex flex-col items-center xl:hidden pt-8 border-t border-gray-100">
                    <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">{{ __('Share this article') }}</p>
                    <div class="flex gap-4">
                        <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->fullUrl()) }}" class="flex items-center gap-2 bg-emerald-500 text-white px-6 py-2 rounded-full font-bold shadow-lg shadow-emerald-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Section -->
            <div class="max-w-4xl mx-auto py-10 border-t border-gray-200 fade-in" style="animation-delay: 0.4s;">
                <div class="flex flex-col md:flex-row justify-between items-center gap-8 mb-16">
                    <a href="javascript:window.history.back()" class="text-[#066c5f] font-bold hover:underline flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        {{ __('Back to Blog') }}
                    </a>
                    
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#066c5f] to-[#0dd8bd] flex items-center justify-center text-white font-black shadow-lg">V</div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 tracking-widest uppercase">{{ __('Published by') }}</p>
                            <p class="font-bold text-gray-800">Vinsa Team</p>
                        </div>
                    </div>
                </div>

                <!-- Call to Action Banner -->
                <div class="bg-gradient-to-br from-[#066c5f] to-[#0dd8bd] rounded-[3rem] p-8 md:p-12 text-white relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full translate-x-1/2 -translate-y-1/2 blur-2xl group-hover:scale-125 transition-transform duration-700"></div>
                    <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8">
                        <div class="max-w-xl text-center lg:text-left">
                            <h2 class="text-3xl md:text-4xl font-black mb-4">{{ __('Ready to Upgrade Your Electrical System?') }}</h2>
                            <p class="text-white/80 text-lg">{{ __('Explore our premium products designed for industrial excellence and safety.') }}</p>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="/product" class="px-8 py-4 bg-white text-[#066c5f] font-bold rounded-2xl hover:shadow-2xl transition-all hover:-translate-y-1 text-center">
                                {{ __('Our Products') }}
                            </a>
                            <a href="https://wa.me/6281335715398" class="px-8 py-4 border-2 border-white/30 hover:bg-white/10 font-bold rounded-2xl transition-all text-center">
                                {{ __('Consult with Expert') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Read Next Blogs -->
            @isset($blogs)
                <div class="mt-20 fade-in" style="animation-delay: 0.6s;">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-10">{{ __('Read Next') }}</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        @foreach ($blogs->where('id', '!=', $blog->id)->take(3) as $related)
                            <a href="{{ route('blog.public', ['slug' => $related->slug]) }}" class="group bg-white p-6 rounded-[2rem] shadow-lg hover:shadow-2xl transition-all border border-gray-50 flex flex-col h-full">
                                <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden mb-6">
                                    @if($related->image)
                                        <img src="{{ asset('storage/' . $related->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">No Image</div>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold group-hover:text-[#066c5f] transition-colors line-clamp-2 mb-4">{{ $related->title }}</h3>
                                <div class="mt-auto flex items-center gap-2 text-[#066c5f] font-bold text-sm">
                                    {{ __('Read Story') }}
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endisset
        </main>
    </div>

    <x-footer></x-footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Reading Progress Bar
            window.addEventListener('scroll', function() {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                document.getElementById('reading-progress').style.width = scrolled + "%";
            });

            // Estimated Reading Time
            const content = document.getElementById('blog-content');
            if (content) {
                const text = content.innerText;
                const wpm = 200; // Words per minute
                const words = text.trim().split(/\s+/).length;
                const time = Math.ceil(words / wpm);
                document.getElementById('reading-time').innerText = time + " min read";
            }
        });
    </script>
    
    @stack('scripts')
</body>

</html>
