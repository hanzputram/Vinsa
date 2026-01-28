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
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Contact Us - Vinsa</title>
    <link rel="icon" type="image/png" href="{{ asset('image/vinsalg.png') }}">
    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-weight: normal;
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
    </style>
</head>

<body class="outfit bg-[#FDFBEE]">
    <div class="max-w-[93%] mx-auto">
        <div class="flex justify-between items-center py-3">
            <x-navUser></x-navUser>
        </div>
        <div class="overflow-hidden p-10 lg:p-[5rem] flex flex-col relative w-full bg-gradient-to-br from-[#066c5f] via-[#077d6e] to-[#0dd8bd] rounded-[40px] mb-10 shadow-2xl" id="wrapper-contact">
            
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full blur-3xl -mr-20 -mt-20"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#0dd8bd]/10 rounded-full blur-3xl -ml-20 -mb-20"></div>
            
            <!-- Hero Section -->
            <div class="w-full relative z-[10] text-center py-16 lg:py-20">
                @if(session('success'))
                    <div class="mb-8 p-4 bg-green-500/20 border border-green-500/50 rounded-2xl text-white backdrop-blur-md">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-8 p-4 bg-red-500/20 border border-red-500/50 rounded-2xl text-white backdrop-blur-md">
                        {{ session('error') }}
                    </div>
                @endif
                
                <a href="javascript:window.history.back()" class="absolute left-0 top-0 group inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full backdrop-blur-sm border border-white/20 transition-all">
                    <svg viewBox="0 0 24 24" width="20px" height="20px" fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="stroke-white transition-transform group-hover:-translate-x-1">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                    <span class="text-white text-sm font-semibold">Back</span>
                </a>
                
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/20 text-white text-xs font-bold tracking-widest uppercase backdrop-blur-md border border-white/30 mb-6">
                    <span class="w-2 h-2 rounded-full bg-[#0dd8bd] animate-pulse"></span>
                    Get in Touch
                </div>
                
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white tracking-tight mb-6 leading-none">
                    Contact Us
                </h1>
                <p class="text-lg md:text-xl lg:text-2xl w-full md:w-[85%] lg:w-[70%] text-white/90 mx-auto leading-relaxed font-medium">
                    Have a question or ready to power up your project? We're here to help with premium electrical solutions.
                </p>
            </div>

            <!-- Contact Information & Form Section -->
            <div class="relative z-[10] max-w-7xl mx-auto w-full px-6 pb-16 grid lg:grid-cols-5 gap-8 lg:gap-12">
                
                <!-- Contact Information - Left Side -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Company Info Card -->
                    <div class="bg-white/10 backdrop-blur-xl p-8 rounded-3xl border border-white/20 shadow-2xl">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="p-3 rounded-2xl bg-white/20">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white/60 uppercase tracking-wider mb-1">Office Location</h3>
                                <h2 class="text-xl font-bold text-white mb-2">Head Quarter</h2>
                                <p class="text-white/80 leading-relaxed">Galaxy Bumi Permai J1-23, Sukolilo, Surabaya, Jawa Timur</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Methods -->
                    <div class="space-y-4">
                        <a href="tel:03434857758" class="group flex items-center gap-4 bg-white/10 backdrop-blur-xl p-6 rounded-2xl border border-white/20 hover:bg-white/15 transition-all hover:scale-[1.02]">
                            <div class="p-3 rounded-xl bg-white/20 group-hover:bg-white/30 transition-all">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-white/60 uppercase tracking-wider">Phone</p>
                                <p class="text-lg font-semibold text-white">034-34857758</p>
                            </div>
                        </a>

                        <a href="https://wa.me/6281335715398" class="group flex items-center gap-4 bg-white/10 backdrop-blur-xl p-6 rounded-2xl border border-white/20 hover:bg-white/15 transition-all hover:scale-[1.02]">
                            <div class="p-3 rounded-xl bg-[#25D366]/30 group-hover:bg-[#25D366]/40 transition-all">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.937 3.659 1.432 5.631 1.433h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-white/60 uppercase tracking-wider">WhatsApp</p>
                                <p class="text-lg font-semibold text-white">+62 813-3571-5398</p>
                            </div>
                        </a>

                        <a href="mailto:sales@ATstekno.com" class="group flex items-center gap-4 bg-white/10 backdrop-blur-xl p-6 rounded-2xl border border-white/20 hover:bg-white/15 transition-all hover:scale-[1.02]">
                            <div class="p-3 rounded-xl bg-white/20 group-hover:bg-white/30 transition-all">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-white/60 uppercase tracking-wider">Email</p>
                                <p class="text-lg font-semibold text-white">sales@ATstekno.com</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Contact Form - Right Side -->
                <div class="lg:col-span-3">
                    <form action="{{ route('contact.send') }}" method="POST" class="bg-white/10 backdrop-blur-xl p-8 lg:p-10 rounded-3xl border border-white/20 shadow-2xl space-y-6">
                        @csrf
                        <div class="mb-8">
                            <h3 class="text-3xl font-bold text-white mb-2">Send us a Message</h3>
                            <p class="text-white/70">Fill out the form below and we'll get back to you within 24 hours.</p>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-white font-semibold mb-2 text-sm uppercase tracking-wider">Full Name *</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-5 py-4 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:bg-white/25 transition-all"
                                    placeholder="John Doe">
                            </div>

                            <div>
                                <label for="email" class="block text-white font-semibold mb-2 text-sm uppercase tracking-wider">Email Address *</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-5 py-4 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:bg-white/25 transition-all"
                                    placeholder="john@example.com">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-white font-semibold mb-2 text-sm uppercase tracking-wider">Phone Number</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-5 py-4 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:bg-white/25 transition-all"
                                    placeholder="+62 812-3456-7890">
                            </div>

                            <div>
                                <label for="subject" class="block text-white font-semibold mb-2 text-sm uppercase tracking-wider">Subject</label>
                                <input type="text" id="subject" name="subject"
                                    class="w-full px-5 py-4 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:bg-white/25 transition-all"
                                    placeholder="Project Inquiry">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-white font-semibold mb-2 text-sm uppercase tracking-wider">Your Message *</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-5 py-4 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:bg-white/25 transition-all resize-none"
                                placeholder="Tell us about your electrical needs and how we can help you..."></textarea>
                        </div>

                        <button type="submit"
                            class="group w-full bg-white text-[#066c5f] px-8 py-5 rounded-xl text-lg font-black hover:bg-[#FDFBEE] transition-all transform hover:scale-[1.02] shadow-2xl flex items-center justify-center gap-3 relative overflow-hidden">
                            <span class="relative z-10">Send Message</span>
                            <svg class="relative z-10 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                            <div class="absolute inset-0 bg-gradient-to-r from-[#0dd8bd] to-[#066c5f] opacity-0 group-hover:opacity-10 transition-opacity"></div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[93%] mx-auto">
    </div>

    <x-footer></x-footer>

    <script>
        document.getElementById('menu-toggle')?.addEventListener('click', function() {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
        });
    </script>
</body>

</html>
