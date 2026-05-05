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
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .gradient-text {
            background: linear-gradient(90deg, #066c5f, #0dd8bd);
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
            animation: mesh-move 15s ease infinite;
        }

        @keyframes mesh-move {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s cubic-bezier(0.22, 1, 0.36, 1);
        }
        
        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .circuit-line {
            position: absolute;
            background: rgba(13, 216, 189, 0.1);
        }
    </style>
</head>

<body class="outfit bg-[#FDFBEE] text-gray-800 overflow-x-hidden">
    <x-app-loader />

    <!-- Navbar Section -->
    <div class="max-w-[95%] mx-auto relative z-50">
        <div class="flex justify-between items-center h-20">
            <x-navUser></x-navUser>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative min-h-[60vh] md:min-h-[550px] flex items-center justify-center overflow-hidden px-4 mb-12 rounded-[40px] mx-[2.5%] bg-mesh shadow-2xl">
        <!-- Abstract Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 -left-20 w-96 h-96 bg-white/10 rounded-full blur-[100px] animate-pulse"></div>
            <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-[#0dd8bd]/20 rounded-full blur-[100px] animate-pulse" style="animation-delay: 2s;"></div>
            
            <!-- Circuit patterns (CSS only) -->
            <div class="circuit-line w-[1px] h-full left-[10%] opacity-20"></div>
            <div class="circuit-line w-[1px] h-full left-[20%] opacity-10"></div>
            <div class="circuit-line h-[1px] w-full top-[30%] opacity-20"></div>
            <div class="circuit-line h-[1px] w-full top-[60%] opacity-10"></div>
        </div>
        
        <div class="relative z-20 text-center max-w-4xl mx-auto px-6 py-12">
            <div class="inline-block px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-white/80 text-xs font-bold tracking-widest uppercase mb-4 border border-white/20">
                Premium Electrical Solutions
            </div>
            <h1 class="text-4xl md:text-7xl font-black text-white mb-6 drop-shadow-2xl leading-tight">
                Innovating for <br><span class="text-white drop-shadow-[0_0_20px_rgba(13,216,189,0.8)]">Excellence</span>
            </h1>
            <p class="text-lg md:text-xl text-white/90 font-light leading-relaxed mb-10 max-w-2xl mx-auto">
                Vinsa berdedikasi menyediakan solusi kelistrikan terbaik untuk kebutuhan masa depan rumah, bisnis, dan industri Anda.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#story" class="bg-white text-[#066c5f] px-8 py-3 rounded-full font-bold hover:bg-[#FDFBEE] transition-all transform hover:scale-105 shadow-xl text-base">
                    Pelajari Kisah Kami
                </a>
                <a href="/contactus" class="border-2 border-white/40 backdrop-blur-sm text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-[#066c5f] transition-all transform hover:scale-105 text-base">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section id="story" class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="scroll-reveal">
                <div class="w-20 h-1 bg-[#066c5f] mb-8"></div>
                <h2 class="text-sm font-bold tracking-widest text-[#066c5f] uppercase mb-4">A Decade of Excellence</h2>
                <h3 class="text-4xl md:text-5xl font-extrabold mb-8 leading-tight">
                    Membangun <span class="gradient-text">Masa Depan</span> Melalui Koneksi yang Aman
                </h3>
                <div class="space-y-6 text-lg text-gray-600 leading-relaxed">
                    <p>
                        Vinsa lahir dari ambisi sederhana namun mendalam: mendefinisikan ulang standar keamanan dan efisiensi dalam industri kelistrikan. Kami memahami bahwa setiap kabel dan panel adalah infrastruktur vital bagi kehidupan modern.
                    </p>
                    <p>
                        Selama lebih dari 10 tahun, kami telah bertransformasi dari penyedia peralatan menjadi partner solusi strategis bagi ribuan pelanggan di seluruh Indonesia. Fokus kami tetap sama: **Kualitas tanpa kompromi.**
                    </p>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-6 scroll-reveal">
                <div class="bg-white p-10 rounded-[40px] shadow-xl border border-gray-100 flex flex-col justify-center items-center text-center group hover:bg-[#066c5f] transition-colors duration-500">
                    <p class="text-5xl font-black text-[#066c5f] mb-2 group-hover:text-white transition-colors">10+</p>
                    <p class="text-sm text-gray-500 uppercase font-bold group-hover:text-white/70 transition-colors">Years of Experience</p>
                </div>
                <div class="bg-[#0dd8bd] p-10 rounded-[40px] shadow-xl flex flex-col justify-center items-center text-center transform translate-y-12">
                    <p class="text-5xl font-black text-white mb-2">500+</p>
                    <p class="text-sm text-white/80 uppercase font-bold">Successful Projects</p>
                </div>
                <div class="bg-[#066c5f] p-10 rounded-[40px] shadow-xl flex flex-col justify-center items-center text-center">
                    <p class="text-5xl font-black text-white mb-2">100%</p>
                    <p class="text-sm text-white/80 uppercase font-bold">Safety Standard</p>
                </div>
                <div class="bg-white p-10 rounded-[40px] shadow-xl border border-gray-100 flex flex-col justify-center items-center text-center transform translate-y-12 group hover:bg-[#0dd8bd] transition-colors duration-500">
                    <p class="text-5xl font-black text-[#066c5f] mb-2 group-hover:text-white transition-colors">24/7</p>
                    <p class="text-sm text-gray-500 uppercase font-bold group-hover:text-white/70 transition-colors">Client Support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="bg-white py-32 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-[#FDFBEE] -skew-x-12 transform translate-x-20"></div>
        
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="mb-20 scroll-reveal">
                <h2 class="text-sm font-bold tracking-widest text-[#066c5f] uppercase mb-4 text-center lg:text-left">Our Core Values</h2>
                <h3 class="text-4xl font-extrabold text-center lg:text-left">Prinsip yang Menggerakkan Kami</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="p-12 rounded-[40px] bg-[#FDFBEE] hover:bg-[#066c5f] group transition-all duration-500 scroll-reveal shadow-sm hover:shadow-2xl">
                    <div class="w-16 h-16 bg-[#066c5f] group-hover:bg-white rounded-2xl flex items-center justify-center mb-10 transition-colors shadow-lg">
                        <svg class="w-8 h-8 text-white group-hover:text-[#066c5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-6 group-hover:text-white transition-colors">Keamanan Mutlak</h4>
                    <p class="text-gray-600 group-hover:text-white/80 transition-colors leading-relaxed">
                        Kami menganggap setiap koneksi sebagai tanggung jawab besar. Standar keamanan kami melampaui regulasi industri untuk ketenangan Anda.
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="p-12 rounded-[40px] bg-[#FDFBEE] hover:bg-[#066c5f] group transition-all duration-500 scroll-reveal shadow-sm hover:shadow-2xl md:translate-y-8">
                    <div class="w-16 h-16 bg-[#0dd8bd] group-hover:bg-white rounded-2xl flex items-center justify-center mb-10 transition-colors shadow-lg">
                        <svg class="w-8 h-8 text-white group-hover:text-[#066c5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-6 group-hover:text-white transition-colors">Inovasi Berkelanjutan</h4>
                    <p class="text-gray-600 group-hover:text-white/80 transition-colors leading-relaxed">
                        Dunia terus berubah, begitu pula kami. Kami mengintegrasikan teknologi terbaru untuk solusi energi yang lebih cerdas dan efisien.
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="p-12 rounded-[40px] bg-[#FDFBEE] hover:bg-[#066c5f] group transition-all duration-500 scroll-reveal shadow-sm hover:shadow-2xl">
                    <div class="w-16 h-16 bg-[#066c5f] group-hover:bg-white rounded-2xl flex items-center justify-center mb-10 transition-colors shadow-lg">
                        <svg class="w-8 h-8 text-white group-hover:text-[#066c5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-6 group-hover:text-white transition-colors">Integritas Kualitas</h4>
                    <p class="text-gray-600 group-hover:text-white/80 transition-colors leading-relaxed">
                        Kualitas bukan hanya janji, tapi bukti. Kami menggunakan material premium untuk memastikan daya tahan jangka panjang.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="max-w-7xl mx-auto px-6 py-32 mb-20">
        <div class="bg-[#066c5f] rounded-[60px] p-12 md:p-24 text-white relative overflow-hidden shadow-2xl">
            <!-- Decorative shapes -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#0dd8bd]/20 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/5 rounded-full blur-[100px]"></div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 relative z-10">
                <div class="scroll-reveal">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-[2px] bg-[#0dd8bd]"></div>
                        <h3 class="text-3xl md:text-4xl font-black italic">Visi Kami</h3>
                    </div>
                    <p class="text-2xl text-white/80 leading-relaxed font-light">
                        Menjadi standar emas global dalam penyediaan solusi kelistrikan terpadu yang memberdayakan peradaban melalui teknologi yang aman, cerdas, dan ramah lingkungan.
                    </p>
                </div>
                
                <div class="scroll-reveal">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-[2px] bg-[#0dd8bd]"></div>
                        <h3 class="text-3xl md:text-4xl font-black italic">Misi Kami</h3>
                    </div>
                    <ul class="space-y-8">
                        <li class="flex items-start gap-6 group">
                            <div class="w-10 h-10 bg-white/10 rounded-full flex-shrink-0 flex items-center justify-center text-[#0dd8bd] font-bold border border-white/20 group-hover:bg-white group-hover:text-[#066c5f] transition-all">01</div>
                            <p class="text-lg text-white/70 group-hover:text-white transition-colors">Menyediakan akses produk kelistrikan dengan standar keamanan internasional yang tak tertandingi.</p>
                        </li>
                        <li class="flex items-start gap-6 group">
                            <div class="w-10 h-10 bg-white/10 rounded-full flex-shrink-0 flex items-center justify-center text-[#0dd8bd] font-bold border border-white/20 group-hover:bg-white group-hover:text-[#066c5f] transition-all">02</div>
                            <p class="text-lg text-white/70 group-hover:text-white transition-colors">Membangun ekosistem pelayanan pelanggan yang transparan, responsif, dan berbasis solusi.</p>
                        </li>
                        <li class="flex items-start gap-6 group">
                            <div class="w-10 h-10 bg-white/10 rounded-full flex-shrink-0 flex items-center justify-center text-[#0dd8bd] font-bold border border-white/20 group-hover:bg-white group-hover:text-[#066c5f] transition-all">03</div>
                            <p class="text-lg text-white/70 group-hover:text-white transition-colors">Mendorong adopsi teknologi hemat energi untuk mendukung masa depan bumi yang berkelanjutan.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-footer></x-footer>

    <script>
        // Scroll Reveal Animation
        const observerOptions = {
            threshold: 0.15,
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
    </script>
</body>

</html>
