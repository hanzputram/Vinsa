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
    <meta name="description" content="Pelajari lebih lanjut tentang Vinsa, penyedia solusi kelistrikan premium dengan dedikasi tinggi terhadap kualitas dan inovasi.">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>About Us - Vinsa</title>
    <link rel="icon" type="image/png" href="{{ asset('image/vinsalg.png') }}">
    
    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        .gradient-text {
            background: linear-gradient(135deg, #066c5f 0%, #0dd8bd 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-mesh {
            background-color: #066c5f;
            background-image: 
                radial-gradient(at 0% 0%, hsla(174,78%,45%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(171,85%,38%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(176,91%,43%,1) 0, transparent 50%);
            background-size: 200% 200%;
            animation: mesh-move 20s ease infinite;
        }

        @keyframes mesh-move {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .scroll-reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 1.2s cubic-bezier(0.22, 1, 0.36, 1);
        }
        
        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .stagger-1 { transition-delay: 0.1s; }
        .stagger-2 { transition-delay: 0.2s; }
        .stagger-3 { transition-delay: 0.3s; }

        .hero-title-glow {
            text-shadow: 0 0 30px rgba(13, 216, 189, 0.4);
        }

        .floating-element {
            animation: floating 8s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(10px, -20px) rotate(2deg); }
            66% { transform: translate(-10px, 10px) rotate(-1deg); }
            100% { transform: translate(0, 0) rotate(0deg); }
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE] text-gray-800 overflow-x-hidden selection:bg-[#0dd8bd] selection:text-white">
    <x-app-loader />

    <!-- Navbar Section -->
    <header class="max-w-[95%] mx-auto relative z-50">
        <div class="flex justify-between items-center h-20">
            <x-navUser></x-navUser>
        </div>
    </header>

    <!-- Hero Section -->
    <main>
        <section class="relative min-h-[60vh] md:min-h-[580px] flex items-center justify-center overflow-hidden rounded-[40px] mx-[2.5%] bg-mesh shadow-[0_20px_50px_rgba(6,108,95,0.2)] group">
            <!-- Decorative Elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-[-10%] left-[-5%] w-[400px] h-[400px] bg-white/10 rounded-full blur-[100px] floating-element" style="animation-duration: 12s;"></div>
                <div class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-[#0dd8bd]/20 rounded-full blur-[100px] floating-element" style="animation-duration: 15s;"></div>
                
                <!-- Geometric shapes -->
                <div class="absolute top-1/4 right-[15%] w-32 h-32 border border-white/10 rounded-full floating-element"></div>
                <div class="absolute bottom-1/4 left-[10%] w-20 h-20 border border-white/5 rounded-lg rotate-45 floating-element" style="animation-delay: -2s;"></div>
            </div>
            
            <div class="relative z-20 text-center max-w-4xl mx-auto px-6 py-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/10 backdrop-blur-md rounded-full text-white/90 text-[10px] md:text-xs font-bold tracking-[0.2em] uppercase mb-8 border border-white/20 transition-all hover:bg-white/20">
                    <span class="w-2 h-2 bg-[#0dd8bd] rounded-full animate-pulse"></span>
                    Premium Electrical Solutions
                </div>
                <h1 class="text-4xl md:text-7xl lg:text-8xl font-black text-white mb-8 leading-[1.1] tracking-tight">
                    Innovating for <br>
                    <span class="hero-title-glow bg-gradient-to-r from-white via-white to-[#0dd8bd] bg-clip-text text-transparent">Excellence</span>
                </h1>
                <p class="text-lg md:text-xl text-white/80 font-light leading-relaxed mb-12 max-w-2xl mx-auto">
                    Mewujudkan standar baru dalam sistem kelistrikan yang aman, cerdas, dan efisien untuk mendukung gaya hidup modern Anda.
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-5">
                    <a href="#story" class="group relative bg-white text-[#066c5f] px-10 py-4 rounded-full font-bold hover:bg-[#FDFBEE] transition-all transform hover:scale-105 shadow-[0_15px_30px_rgba(255,255,255,0.2)] text-base overflow-hidden">
                        <span class="relative z-10">Pelajari Kisah Kami</span>
                        <div class="absolute inset-0 bg-gray-100 scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></div>
                    </a>
                    <a href="/contactus" class="group border-2 border-white/30 backdrop-blur-sm text-white px-10 py-4 rounded-full font-bold hover:border-white transition-all transform hover:scale-105 text-base">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <!-- Bottom Scroll Indicator (Subtle) -->
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 opacity-50 animate-bounce">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 14l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
        </section>

        <!-- Our Story Section -->
        <section id="story" class="max-w-7xl mx-auto px-6 py-28">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                <div class="scroll-reveal">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-1 bg-[#066c5f] rounded-full"></div>
                        <span class="text-sm font-bold tracking-[0.3em] text-[#066c5f] uppercase">A Decade of Excellence</span>
                    </div>
                    <h2 class="text-4xl md:text-6xl font-black mb-10 leading-[1.1] text-gray-900">
                        Membangun <span class="gradient-text">Masa Depan</span> Melalui Keahlian
                    </h2>
                    <div class="space-y-8 text-lg text-gray-600 leading-relaxed font-light">
                        <p>
                            Vinsa didirikan dengan satu tujuan utama: menghadirkan solusi kelistrikan yang tidak hanya memenuhi standar, tetapi melampaui ekspektasi keamanan dan efisiensi.
                        </p>
                        <p>
                            Kami percaya bahwa di balik setiap rumah yang terang dan industri yang produktif, terdapat sistem kelistrikan yang dirancang dengan presisi. Itulah komitmen kami selama lebih dari sepuluh tahun.
                        </p>
                    </div>
                    
                    <div class="mt-12 flex flex-wrap gap-10">
                        <div class="flex flex-col">
                            <span class="text-4xl font-black text-[#066c5f]">10+</span>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Years Experience</span>
                        </div>
                        <div class="w-[1px] h-12 bg-gray-200"></div>
                        <div class="flex flex-col">
                            <span class="text-4xl font-black text-[#066c5f]">500+</span>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Global Clients</span>
                        </div>
                        <div class="w-[1px] h-12 bg-gray-200"></div>
                        <div class="flex flex-col">
                            <span class="text-4xl font-black text-[#066c5f]">100%</span>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Quality Trust</span>
                        </div>
                    </div>
                </div>
                
                <div class="relative scroll-reveal stagger-2">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div class="h-64 bg-[#066c5f] rounded-[40px] shadow-xl flex items-center justify-center p-8 transform hover:scale-[1.03] transition-all duration-500">
                                <svg class="w-16 h-16 text-[#0dd8bd]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.45L19.15 19H4.85L12 5.45zM11 16h2v2h-2v-2zm0-7h2v5h-2V9z"/></svg>
                            </div>
                            <div class="h-48 bg-white p-8 rounded-[40px] shadow-lg border border-gray-100 flex flex-col justify-end">
                                <span class="text-3xl font-black text-[#066c5f]">Safety</span>
                                <p class="text-sm text-gray-500 mt-2">Zero compromise policy on all electrical standards.</p>
                            </div>
                        </div>
                        <div class="space-y-6 pt-12">
                            <div class="h-48 bg-[#0dd8bd] p-8 rounded-[40px] shadow-lg flex flex-col justify-end">
                                <span class="text-3xl font-black text-white">Smart</span>
                                <p class="text-white/80 text-sm mt-2">Integrated technology for modern energy management.</p>
                            </div>
                            <div class="h-64 bg-white p-8 rounded-[40px] shadow-xl border border-gray-100 flex items-center justify-center transform hover:scale-[1.03] transition-all duration-500">
                                <div class="text-center">
                                    <div class="text-5xl font-black text-[#066c5f]">24/7</div>
                                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-2">Professional Support</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative background element -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-[#066c5f]/5 rounded-full blur-[100px] -z-10"></div>
                </div>
            </div>
        </section>

        <!-- Core Values Section -->
        <section class="bg-white py-28">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-20 scroll-reveal">
                    <h2 class="text-sm font-bold tracking-[0.4em] text-[#066c5f] uppercase mb-4">Core Philosophy</h2>
                    <h3 class="text-4xl md:text-5xl font-black mb-6">Mengapa Memilih Vinsa?</h3>
                    <p class="text-lg text-gray-500 font-light">Kami mengombinasikan keahlian teknis bertahun-tahun dengan material berkualitas tinggi untuk memberikan hasil yang tak tertandingi.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Value 1 -->
                    <div class="glass-card p-12 rounded-[50px] hover:bg-[#066c5f] group transition-all duration-700 scroll-reveal stagger-1">
                        <div class="w-16 h-16 bg-[#066c5f]/10 group-hover:bg-white/20 rounded-3xl flex items-center justify-center mb-10 transition-all duration-500">
                            <svg class="w-8 h-8 text-[#066c5f] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h4 class="text-2xl font-black mb-6 group-hover:text-white transition-colors">Safety Legacy</h4>
                        <p class="text-gray-600 group-hover:text-white/70 transition-colors leading-relaxed font-light">
                            Keamanan bukan sekadar fitur, melainkan identitas kami. Setiap produk melewati uji ketat standar internasional.
                        </p>
                    </div>

                    <!-- Value 2 -->
                    <div class="glass-card p-12 rounded-[50px] bg-[#066c5f] md:translate-y-12 scroll-reveal stagger-2">
                        <div class="w-16 h-16 bg-white/20 rounded-3xl flex items-center justify-center mb-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h4 class="text-2xl font-black mb-6 text-white">Innovation Hub</h4>
                        <p class="text-white/70 leading-relaxed font-light">
                            Terus berevolusi dengan teknologi terbaru untuk memastikan sistem kelistrikan Anda tetap relevan di masa depan.
                        </p>
                    </div>

                    <!-- Value 3 -->
                    <div class="glass-card p-12 rounded-[50px] hover:bg-[#066c5f] group transition-all duration-700 scroll-reveal stagger-3">
                        <div class="w-16 h-16 bg-[#066c5f]/10 group-hover:bg-white/20 rounded-3xl flex items-center justify-center mb-10 transition-all duration-500">
                            <svg class="w-8 h-8 text-[#066c5f] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <h4 class="text-2xl font-black mb-6 group-hover:text-white transition-colors">Material Quality</h4>
                        <p class="text-gray-600 group-hover:text-white/70 transition-colors leading-relaxed font-light">
                            Hanya menggunakan material kelas premium untuk menjamin daya tahan maksimal dan performa yang stabil.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vision & Mission Section -->
        <section class="max-w-7xl mx-auto px-6 py-28 mb-10">
            <div class="bg-gray-900 rounded-[60px] p-12 md:p-24 text-white relative overflow-hidden shadow-2xl group">
                <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#0dd8bd]/10 rounded-full blur-[150px] transition-all duration-1000 group-hover:bg-[#0dd8bd]/20"></div>
                <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#066c5f]/10 rounded-full blur-[150px]"></div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 relative z-10">
                    <div class="scroll-reveal">
                        <h3 class="text-4xl md:text-5xl font-black mb-10">Our Vision</h3>
                        <p class="text-2xl text-gray-400 leading-relaxed font-light">
                            Menjadi katalis utama dalam transformasi industri kelistrikan global yang <span class="text-white font-medium">berkelanjutan, cerdas, dan aman</span> bagi setiap generasi.
                        </p>
                    </div>
                    
                    <div class="scroll-reveal stagger-2">
                        <h3 class="text-4xl md:text-5xl font-black mb-10">Our Mission</h3>
                        <div class="space-y-10">
                            <div class="flex gap-8">
                                <span class="text-5xl font-black text-[#0dd8bd]/20 group-hover:text-[#0dd8bd]/40 transition-colors">01</span>
                                <div>
                                    <h5 class="text-xl font-bold mb-3">Keamanan Global</h5>
                                    <p class="text-gray-400 font-light">Menghadirkan standar keamanan internasional di setiap produk yang kami buat.</p>
                                </div>
                            </div>
                            <div class="flex gap-8">
                                <span class="text-5xl font-black text-[#0dd8bd]/20 group-hover:text-[#0dd8bd]/40 transition-colors">02</span>
                                <div>
                                    <h5 class="text-xl font-bold mb-3">Inovasi Terpadu</h5>
                                    <p class="text-gray-400 font-light">Mengintegrasikan teknologi pintar untuk efisiensi energi yang maksimal.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <x-footer></x-footer>

    <script>
        // Scroll Reveal Animation with Intersection Observer
        const observerOptions = {
            threshold: 0.1,
            rootMargin: "0px 0px -50px 0px"
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));

        // Smooth scroll for anchors
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
