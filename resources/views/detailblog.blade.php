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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <title>{{ $blog->title ?? 'Vinsa' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('image/vinsalg.png') }}">

    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        /* Reading Progress Bar */
        .progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1000;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #0dd8bd, #066c5f);
            width: 0%;
            border-radius: 0 4px 4px 0;
            transition: width 0.1s ease-out;
            box-shadow: 0 0 10px rgba(13, 216, 189, 0.5);
        }

        .glass-nav {
            background: rgba(253, 251, 238, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(6, 108, 95, 0.08);
        }

        /* Typography & Readability Improvements */
        .wysiwyg {
            color: #334155;
            line-height: 1.85;
            font-size: 1.15rem;
            letter-spacing: -0.011em;
        }

        .wysiwyg h1, .wysiwyg h2, .wysiwyg h3 {
            color: #0f172a;
            font-weight: 800;
            margin-top: 3.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.25;
            letter-spacing: -0.025em;
        }

        .wysiwyg h2 { font-size: 2.25rem; }
        .wysiwyg h3 { font-size: 1.75rem; }

        .wysiwyg p {
            margin-bottom: 1.75rem;
        }

        .wysiwyg a {
            color: #066c5f;
            text-decoration: none;
            border-bottom: 2px solid rgba(13, 216, 189, 0.3);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .wysiwyg a:hover {
            color: #0dd8bd;
            border-bottom-color: #0dd8bd;
            background: rgba(13, 216, 189, 0.05);
        }

        .wysiwyg ul, .wysiwyg ol {
            margin: 2rem 0 2rem 1.5rem;
            padding-left: 0.5rem;
        }

        .wysiwyg li {
            margin-bottom: 0.75rem;
            position: relative;
        }

        .wysiwyg blockquote {
            border-left: 6px solid #066c5f;
            background: linear-gradient(to right, rgba(6, 108, 95, 0.05), transparent);
            padding: 2.5rem 3rem;
            margin: 3.5rem 0;
            border-radius: 0 24px 24px 0;
            font-style: italic;
            font-size: 1.4rem;
            color: #1e293b;
            position: relative;
        }

        .wysiwyg blockquote::before {
            content: "\201C";
            position: absolute;
            top: -1rem;
            left: 1rem;
            font-size: 6rem;
            color: rgba(6, 108, 95, 0.1);
            font-family: serif;
            line-height: 1;
        }

        .wysiwyg img {
            border-radius: 24px;
            margin: 3.5rem auto;
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .wysiwyg img:hover {
            transform: scale(1.01);
        }

        /* Section dividers */
        .section-block {
            padding-top: 4rem;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Table of contents feel */
        .article-card {
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE] text-slate-800 antialiased selection:bg-[#0dd8bd] selection:text-white">
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
    <x-app-loader />

    {{-- Sticky Nav --}}
    <div class="sticky top-0 z-[100] transition-all duration-300 w-full glass-nav shadow-sm">
        <div class="max-w-[93%] mx-auto">
            <div class="flex justify-between items-center py-4">
                <x-navUser></x-navUser>
            </div>
        </div>
    </div>

    @php
        $fullContent = ($blog->content ?? '') . ' ';
        if ($blog->sections) {
            foreach($blog->sections as $section) {
                $fullContent .= ($section->content ?? '') . ' ';
            }
        }
        $wordCount = str_word_count(strip_tags($fullContent));
        $readTime = ceil($wordCount / 200);
        $readTime = $readTime < 1 ? 1 : $readTime;
    @endphp

    <!-- Article Header -->
    <div class="max-w-[93%] mx-auto pt-8 pb-12">
        <div class="relative w-full h-[65vh] min-h-[500px] rounded-[48px] overflow-hidden shadow-2xl group border-[1.5px] border-white/20">
            @if (!empty($blog->image))
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                    class="absolute inset-0 w-full h-full object-cover transform scale-100 group-hover:scale-110 transition-transform duration-[2000ms] ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/95 via-slate-900/40 to-transparent"></div>
            @else
                <div class="absolute inset-0 bg-gradient-to-br from-[#066c5f] to-[#0dd8bd]"></div>
            @endif
            
            <div class="absolute inset-0 flex flex-col justify-end p-8 sm:p-16 lg:p-24 z-10">
                <div class="max-w-4xl">
                    <a href="{{ route('blog.collection') }}" class="inline-flex items-center text-white/90 hover:text-white mb-8 transition-all duration-300 backdrop-blur-xl bg-white/10 hover:bg-white/20 px-6 py-3 rounded-full text-sm font-semibold border border-white/20 group/btn">
                        <svg viewBox="0 0 24 24" width="18px" height="18px" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="stroke-current mr-3 transform group-hover/btn:-translate-x-1 transition-transform">
                            <path d="M19 12H5M5 12L10 7M5 12L10 17" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                        Back to Articles
                    </a>
                    
                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black text-white mb-8 leading-[1.1] tracking-tight drop-shadow-2xl">
                        {{ $blog->title }}
                    </h1>
                    
                    <div class="flex flex-wrap items-center gap-6 text-white/90 font-medium scale-105 origin-left">
                        <div class="flex items-center gap-3 backdrop-blur-md bg-white/10 px-5 py-2.5 rounded-2xl border border-white/10">
                            <svg class="w-5 h-5 text-[#0dd8bd]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>{{ $blog->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center gap-3 backdrop-blur-md bg-white/10 px-5 py-2.5 rounded-2xl border border-white/10">
                            <svg class="w-5 h-5 text-[#f4752c]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>{{ $readTime }} min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-6 sm:px-12 -mt-32 relative z-20">
        <article class="article-card bg-white rounded-[40px] p-8 sm:p-16 lg:p-24 border border-slate-100 mb-20">
            
            {{-- Content Section --}}
            <div class="wysiwyg prose prose-xl max-w-none">
                {!! $blog->content !!}
            </div>

            {{-- Dynamic Sections --}}
            @if($blog->sections && $blog->sections->count() > 0)
                <div class="mt-20 space-y-20">
                    @foreach ($blog->sections as $section)
                        <div class="section-block">
                            @if (!empty($section->subtitle))
                                <h2 class="text-4xl font-extrabold text-[#0f172a] mb-8 leading-tight flex items-center gap-4">
                                    <span class="w-1.5 h-10 bg-[#0dd8bd] rounded-full"></span>
                                    {{ $section->subtitle }}
                                </h2>
                            @endif

                            @if (!empty($section->image))
                                <div class="my-12 rounded-[32px] overflow-hidden shadow-2xl relative group/img">
                                    <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->subtitle ?? '' }}"
                                        class="w-full h-auto object-cover transform group-hover/img:scale-[1.03] transition-transform duration-700">
                                </div>
                            @endif

                            @if (!empty($section->content))
                                <div class="wysiwyg mt-8">
                                    {!! $section->content !!}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Footer of Article -->
            <div class="mt-24 pt-12 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex items-center gap-6">
                    <span class="text-slate-500 font-bold uppercase tracking-widest text-xs">Share Story</span>
                    <div class="flex gap-3">
                        <button onclick="shareArticle()" class="w-12 h-12 flex items-center justify-center bg-slate-50 text-slate-700 rounded-2xl hover:bg-[#066c5f] hover:text-white transition-all duration-300 shadow-sm transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                        </button>
                    </div>
                </div>

                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="flex items-center gap-3 px-8 py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-[#066c5f] transition-all duration-300 group shadow-xl">
                    Back to top
                    <svg class="w-5 h-5 transform group-hover:-translate-y-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                </button>
            </div>
        </article>
    </div>

    <!-- Related Articles -->
    @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
        <div class="max-w-6xl mx-auto px-6 pb-24">
            <div class="flex items-end justify-between mb-16 px-4">
                <div>
                    <h3 class="text-4xl font-black text-[#0f172a] mb-2">Continue Reading</h3>
                    <p class="text-slate-500 font-medium">Discover more stories from Vinsa</p>
                </div>
                <a href="{{ route('blog.collection') }}" class="inline-flex items-center gap-3 text-[#066c5f] font-bold pb-2 border-b-2 border-transparent hover:border-[#0dd8bd] transition-all group">
                    Explore Blog
                    <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($relatedBlogs as $rel)
                    <a href="{{ route('blog.public', ['slug' => $rel->slug]) }}" class="group flex flex-col h-full bg-white rounded-[40px] overflow-hidden border border-slate-100 hover:shadow-[0_40px_80px_-20px_rgba(0,0,0,0.12)] transition-all duration-500 transform hover:-translate-y-2">
                        <div class="relative h-64 overflow-hidden">
                            @if($rel->image)
                                <img src="{{ asset('storage/' . $rel->image) }}" alt="{{ $rel->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-[1500ms]">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#066c5f] to-[#0dd8bd]"></div>
                            @endif
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-all"></div>
                        </div>
                        <div class="p-10 flex flex-col flex-1">
                            <div class="flex items-center justify-between mb-4">
                                <span class="bg-[#066c5f]/5 text-[#066c5f] text-[10px] font-black uppercase tracking-[0.2em] px-3 py-1 rounded-full">Article</span>
                                <span class="text-[11px] font-bold text-slate-400">{{ $rel->created_at->format('M d') }}</span>
                            </div>
                            <h4 class="text-2xl font-extrabold text-[#0f172a] mb-4 line-clamp-2 leading-tight group-hover:text-[#066c5f] transition-colors">{{ $rel->title }}</h4>
                            <p class="text-slate-500 font-medium text-sm leading-relaxed line-clamp-3 mb-8">
                                {{ Str::limit(strip_tags($rel->content), 120) }}
                            </p>
                            <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between text-[#066c5f] font-bold text-sm">
                                <span>Read Article</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Newsletter CTA -->
    <div class="max-w-[93%] mx-auto mb-20">
        <div class="bg-gradient-to-br from-[#066c5f] to-[#0dd8bd] rounded-[48px] p-12 lg:p-24 overflow-hidden relative shadow-2xl">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-white/5 -skew-x-12 transform translate-x-1/4"></div>
            <div class="relative z-10 max-w-3xl">
                <h2 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight">Stay ahead with Vinsa.</h2>
                <p class="text-white/80 text-lg lg:text-xl font-medium mb-10 leading-relaxed">Join our mailing list to receive the latest updates, stories, and exclusive insights directly in your inbox.</p>
                <div class="flex flex-col sm:flex-row gap-4 max-w-xl">
                    <input type="email" placeholder="Your email address" class="flex-1 bg-white/10 border border-white/20 rounded-2xl px-8 py-5 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 transition-all font-medium">
                    <button class="bg-[#f4752c] text-white px-10 py-5 rounded-2xl font-black hover:bg-white hover:text-[#066c5f] transition-all duration-300 shadow-xl">Subscribe Now</button>
                </div>
                <p class="text-white/40 text-[10px] mt-6 font-bold uppercase tracking-widest">We respect your privacy. No spam, ever.</p>
            </div>
        </div>
    </div>

    <x-footer></x-footer>

    @stack('scripts')
    
    <script>
        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        };
        
        function shareArticle() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $blog->title }}',
                    text: '{{ Str::limit(strip_tags($blog->content), 100) }}',
                    url: window.location.href
                }).then(() => {
                    console.log('Shared successfully');
                }).catch(console.error);
            } else {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert("Link shared to clipboard! Share it with your friends.");
                });
            }
        }
    </script>
</body>

</html>
