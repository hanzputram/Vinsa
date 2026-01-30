<footer class="w-full bg-white text-gray-800 pt-20 pb-10 relative border-t border-gray-100" id="footer">
    <!-- Subtle Decorative Background -->
    <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-[#0dd8bd] rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[500px] h-[500px] bg-[#066c5f] rounded-full blur-[120px]"></div>
    </div>

    <div class="mx-auto w-[93%] relative z-10">
        <!-- Floating WhatsApp Section (Reverted to Original Style & Position) -->
        <a href="https://wa.me/6281335715398" id="fixedWhatsapp">
            <div class="w-[75px] h-[75px] fixed bottom-[20px] left-[20px] z-[1000] bg-[#ffffff4d] rounded-full backdrop-blur-[2px] flex items-center justify-center border border-gray-200/50 shadow-lg">
                <img class="wa-text-curv flex items-center justify-center" src="/image/war.png" alt="">
                <svg width="30px" height="30px" fill="#066c5f" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.42 9.49c-.19-.09-1.1-.54-1.27-.61s-.29-.09-.42.1-.48.6-.59.73-.21.14-.4 0a5.13 5.13 0 0 1-1.49-.92 5.25 5.25 0 0 1-1-1.29c-.11-.18 0-.28.08-.38s.18-.21.28-.32a1.39 1.39 0 0 0 .18-.31.38.38 0 0 0 0-.33c0-.09-.42-1-.58-1.37s-.3-.32-.41-.32h-.4a.72.72 0 0 0-.5.23 2.1 2.1 0 0 0-.65 1.55A3.59 3.59 0 0 0 5 8.2 8.32 8.32 0 0 0 8.19 11c.44.19.78.3 1.05.39a2.53 2.53 0 0 0 1.17.07 1.93 1.93 0 0 0 1.26-.88 1.67 1.67 0 0 0 .11-.88c-.05-.07-.17-.12-.36-.21z"></path>
                    <path d="M13.29 2.68A7.36 7.36 0 0 0 8 .5a7.44 7.44 0 0 0-6.41 11.15l-1 3.85 3.94-1a7.4 7.4 0 0 0 3.55.9H8a7.44 7.44 0 0 0 5.29-12.72zM8 14.12a6.12 6.12 0 0 1-3.15-.87l-.22-.13-2.34.61.62-2.28-.14-.23a6.18 6.18 0 0 1 9.6-7.65 6.12 6.12 0 0 1 1.81 4.37A6.19 6.19 0 0 1 8 14.12z"></path>
                </svg>
            </div>
        </a>

        <!-- Absolute WhatsApp (Hidden until footer is reached) -->
        <a href="https://wa.me/6281335715398" id="absoluteWhatsapp" class="hidden">
            <div class="w-[75px] h-[75px] absolute top-[-176px] left-[-25.5px] z-[1000] bg-[#ffffff4d] rounded-full backdrop-blur-[2px] flex items-center justify-center border border-gray-200/50 shadow-lg">
                <img class="wa-text-curv flex items-center justify-center" src="/image/war.png" alt="">
                <svg width="30px" height="30px" fill="#066c5f" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.42 9.49c-.19-.09-1.1-.54-1.27-.61s-.29-.09-.42.1-.48.6-.59.73-.21.14-.4 0a5.13 5.13 0 0 1-1.49-.92 5.25 5.25 0 0 1-1-1.29c-.11-.18 0-.28.08-.38s.18-.21.28-.32a1.39 1.39 0 0 0 .18-.31.38.38 0 0 0 0-.33c0-.09-.42-1-.58-1.37s-.3-.32-.41-.32h-.4a.72.72 0 0 0-.5.23 2.1 2.1 0 0 0-.65 1.55A3.59 3.59 0 0 0 5 8.2 8.32 8.32 0 0 0 8.19 11c.44.19.78.3 1.05.39a2.53 2.53 0 0 0 1.17.07 1.93 1.93 0 0 0 1.26-.88 1.67 1.67 0 0 0 .11-.88c-.05-.07-.17-.12-.36-.21z"></path>
                    <path d="M13.29 2.68A7.36 7.36 0 0 0 8 .5a7.44 7.44 0 0 0-6.41 11.15l-1 3.85 3.94-1a7.4 7.4 0 0 0 3.55.9H8a7.44 7.44 0 0 0 5.29-12.72zM8 14.12a6.12 6.12 0 0 1-3.15-.87l-.22-.13-2.34.61.62-2.28-.14-.23a6.18 6.18 0 0 1 9.6-7.65 6.12 6.12 0 0 1 1.81 4.37A6.19 6.19 0 0 1 8 14.12z"></path>
                </svg>
            </div>
        </a>

        <div class="grid lg:grid-cols-4 gap-12 mb-20">
            <!-- Brand Column -->
            <div class="lg:col-span-1 border-r border-gray-200 pr-10">
                <img width="160px" src="/image/vinsalg.png" alt="Vinsa Logo" class="mb-8">
                <p class="text-gray-500 leading-relaxed mb-8 font-medium">
                    {{ __('Vinsa is dedicated to providing premium electrical solutions, delivering high-quality products for your home, business, and industrial needs.') }}
                </p>
                <div class="flex gap-4">
                    <a href="https://wa.me/6281335715398" class="p-3 bg-gray-50 rounded-2xl hover:bg-[#0dd8bd] hover:text-white transition-all group border border-gray-200">
                        <svg class="w-5 h-5 text-[#066c5f] group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.937 3.659 1.432 5.631 1.433h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                    </a>
                    <a href="mailto:sales@ATstekno.com" class="p-3 bg-gray-50 rounded-2xl hover:bg-[#0dd8bd] hover:text-white transition-all group border border-gray-200">
                        <svg class="w-5 h-5 text-[#066c5f] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Branch Locations Section (Grouped Together) -->
            <div class="lg:col-span-3 lg:pl-12 grid md:grid-cols-3 gap-8">
                <!-- Branch 1: Main Workshop Pandaan -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-gray-900 flex items-center gap-2">
                        <span class="p-2 rounded-xl bg-[#066c5f]/10 text-[#066c5f]">
                            <svg class="w-5 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </span>
                        {{ __('Head Quarter') }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-4 h-12">Galaxy Bumi Permai J1-23, Sukolilo, Surabaya, Jawa Timur</p>
                    <div class="w-full h-40 rounded-2xl overflow-hidden shadow-sm border border-gray-100 group">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.955175708051!2d112.781761174774!3d-7.301971992705706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb1cc2393627%3A0xbb6164eba28ffa7a!2sPT.%20Anugerah%20Tama%20Sejati!5e1!3m2!1sid!2sid!4v1769589245001!5m2!1sid!2sid" 
                            class="w-full h-full border-0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <!-- Branch 2: Sales Office Surabaya -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-gray-900 flex items-center gap-2">
                        <span class="p-2 rounded-xl bg-[#066c5f]/10 text-[#066c5f]">
                            <svg class="w-5 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        </span>
                        {{ __('Showroom Surabaya') }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-4 h-12">Jl. Jagalan No.38, Bongkaran, Kec. Pabean Cantian, Surabaya, Jawa Timur</p>
                    <div class="w-full h-40 rounded-2xl overflow-hidden shadow-sm border border-gray-100 group">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.4077215678653!2d112.74307727477348!3d-7.248128092758349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9adfa96554b%3A0x7967d62798b76363!2sATStekno!5e1!3m2!1sid!2sid!4v1769589383835!5m2!1sid!2sid" 
                            class="w-full h-full border-0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <!-- Branch 3: Project Office -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-gray-900 flex items-center gap-2">
                        <span class="p-2 rounded-xl bg-[#066c5f]/10 text-[#066c5f]">
                            <svg class="w-5 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        </span>
                        {{ __('Showroom Pandaan') }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-4 h-12">The Taman Dayu, Cluster Palazio Boulevard, J-1 No. 06, Pandaan, Pasuruan</p>
                    <div class="w-full h-40 rounded-2xl overflow-hidden shadow-sm border border-gray-100 group">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.773337474848!2d112.6948181747779!3d-7.669940092346755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d96dc646c1d5%3A0x7e975d52bc2a3c77!2sATStekno%20Pandaan!5e1!3m2!1sid!2sid!4v1769589427717!5m2!1sid!2sid" 
                            class="w-full h-full border-0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secondary Row for Navigation and CTA -->
        <div class="grid lg:grid-cols-4 gap-12 border-t border-gray-200 pt-16">
            <!-- Quick Links -->
            <div class="lg:col-span-1">
                <h3 class="text-lg font-bold mb-8 text-gray-900 border-b-2 border-[#0dd8bd] inline-block">{{ __('Menu Utama') }}</h3>
                <ul class="grid grid-cols-2 gap-x-4 gap-y-4 text-gray-500 font-medium">
                    <li><a href="/new" class="hover:text-[#066c5f]  transition-colors flex items-center gap-2 text-sm"> {{ __('Home') }}</a></li>
                    <!-- <li><a href="/about" class="hover:text-[#066c5f] transition-colors flex items-center gap-2 text-sm"> Tentang Kami</a></li> -->
                    <li><a href="/product" class="hover:text-[#066c5f] transition-colors flex items-center gap-2 text-sm"> {{ __('Products') }}</a></li>
                    <li><a href="/blog" class="hover:text-[#066c5f] transition-colors flex items-center gap-2 text-sm"> {{ __('Blog') }}</a></li>
                    <li><a href="/contact-us" class="hover:text-[#066c5f] transition-colors flex items-center gap-2 text-sm"> {{ __('Contact') }}</a></li>
                </ul>
            </div>
            
            <div class="lg:col-span-1 hidden lg:block"></div>
            
            <div class="lg:col-span-2">
                <div class="p-8 bg-gradient-to-br from-[#066c5f] to-[#0dd8bd] rounded-[30px] shadow-xl text-white transform hover:scale-[1.01] transition-all duration-500 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <p class="text-xs font-bold text-white/80 uppercase tracking-widest mb-2">{{ __('Need Assistance?') }}</p>
                        <h4 class="text-2xl font-bold">{{ __('Consultation Now!') }}</h4>
                    </div>
                    <a href="https://wa.me/6281335715398" class="whitespace-nowrap px-8 py-4 bg-white text-[#066c5f] font-black rounded-xl hover:shadow-2xl transition-all">{{ __('Contact Us') }}</a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="mt-20 pt-10 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-6 text-sm text-gray-400 font-medium">
            <p>&copy; {{ date('Y') }} Vinsa. {{ __('All rights reserved.') }}</p>
            <div class="flex gap-10">
                <a href="#" class="hover:text-[#066c5f] transition-colors">{{ __('Privacy Policy') }}</a>
                <a href="#" class="hover:text-[#066c5f] transition-colors">{{ __('Terms of Service') }}</a>
            </div>
        </div>
    </div>
</footer>

<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-spin-slow {
        animation: spin-slow 8s linear infinite;
    }
</style>

<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-spin-slow {
        animation: spin-slow 8s linear infinite;
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fixedWhatsapp = document.getElementById("fixedWhatsapp");
        const absoluteWhatsapp = document.getElementById("absoluteWhatsapp");
        const footer = document.getElementById("footer");

        // Buat IntersectionObserver
        const observer = new IntersectionObserver(entries => {
            if (entries[0].isIntersecting) {
                // Footer terlihat
                fixedWhatsapp.style.display = "none";
                absoluteWhatsapp.style.display = "flex";
            } else {
                // Footer tidak terlihat
                fixedWhatsapp.style.display = "flex";
                absoluteWhatsapp.style.display = "none";
            }
        }, {
            rootMargin: "-50px 0px 0px 0px", // Aktif saat footer 50px masuk viewport
            threshold: 0
        });

        // Observasi footer
        observer.observe(footer);
    });
</script>
