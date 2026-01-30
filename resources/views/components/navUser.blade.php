<!-- Navbar Wrapper -->
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<nav 
    x-data="{
        sidebarOpen: false,
        clickCount: 0,
        resetTimer: null,
        incrementClick() {
            this.clickCount++;
            clearTimeout(this.resetTimer);
            this.resetTimer = setTimeout(() => this.clickCount = 0, 3000);
            if (this.clickCount >= 1) {
                window.location.href = '/';
            }
        }
    }"
    x-effect="document.body.classList.toggle('overflow-hidden', sidebarOpen)"
    class="relative w-full flex justify-between items-center text-[#066C5F] px-6 py-4"
>

    <!-- Logo -->
    <div x-show="!sidebarOpen" x-transition>
        <img 
            id="logo" 
            src="/image/vinsalg.png" 
            width="80px" 
            height="80px" 
            alt="Logo Vinsalg" 
            class="cursor-pointer"
            @click="incrementClick()"
        >
    </div>

    <!-- Menu Desktop -->
    <div class="flex items-center space-x-8">
        <ul class="hidden md:flex space-x-6 items-center">
            <li><a href="{{ url('/') }}" class="font-bold text-xl hover:text-[#066c5fad]">{{ __('Home') }}</a></li>
            <li><a href="/blog" class="font-bold text-xl hover:text-[#066c5fad]">{{ __('Blog') }}</a></li>
            <li><a href="{{ route('contact-us') }}" class="font-bold text-xl hover:text-[#066c5fad]">{{ __('Contact Us') }}</a></li>
        </ul>

        <!-- Language Switcher Desktop -->
        <div class="hidden md:block relative px-4 border-l-2 border-[#066c5f20]" x-data="{ openLang: false }">
            <button @click="openLang = !openLang" class="flex items-center space-x-2 font-bold text-lg focus:outline-none hover:text-[#066c5fad] transition-colors">
                <span>{{ strtoupper(App::getLocale()) }}</span>
                <svg :class="openLang ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="openLang" @click.away="openLang = false" 
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="absolute right-0 mt-2 w-32 bg-[#FFFCF0] border border-[#066c5f20] rounded-xl shadow-xl py-2 z-50">
                <a href="{{ route('locale.set', 'id') }}" class="flex items-center px-4 py-2 hover:bg-[#066c5f10] {{ App::getLocale() == 'id' ? 'font-bold text-[#066C5F]' : '' }}">
                    <span class="mr-2">🇮🇩</span> Indonesia
                </a>
                <a href="{{ route('locale.set', 'en') }}" class="flex items-center px-4 py-2 hover:bg-[#066c5f10] {{ App::getLocale() == 'en' ? 'font-bold text-[#066C5F]' : '' }}">
                    <span class="mr-2">🇺🇸</span> English
                </a>
            </div>
        </div>
    </div>

    <!-- Tombol Hamburger (Mobile) -->
    <button class="md:hidden focus:outline-none" @click="sidebarOpen = true">
        <svg class="w-6 h-6 hover:text-[#066c5fad] cursor-pointer" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>

    <!-- Overlay hitam -->
    <div class="fixed inset-0 bg-black bg-opacity-30 z-[29]" x-show="sidebarOpen" x-transition.opacity
        @click="sidebarOpen = false" x-cloak></div>

    <!-- Sidebar Menu (Mobile) -->
    <div class="fixed top-0 right-0 w-64 h-full bg-[#FFFCF0] shadow-lg p-4 z-[30] transform transition-transform duration-300 ease-in-out"
        :class="{ 'translate-x-0': sidebarOpen, 'translate-x-full': !sidebarOpen }" x-cloak>
        
        <!-- Tombol Close -->
        <button class="mb-4 text-right w-full" @click="sidebarOpen = false">
            <svg class="w-6 h-6 ml-auto text-[#066C5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Link Menu -->
        <a href="{{ url('/') }}" class="block py-3 text-[#066C5F] border-b-[1.5px] border-[#066c5f20] hover:text-[#066c5fad] font-bold">{{ __('Home') }}</a>
        <a href="/blog" class="block py-3 text-[#066C5F] border-b-[1.5px] border-[#066c5f20] hover:text-[#066c5fad] font-bold">{{ __('Blog') }}</a>
        <a href="{{ route('contact-us') }}" class="block py-3 text-[#066C5F] border-b-[1.5px] border-[#066c5f20] hover:text-[#066c5fad] font-bold">{{ __('Contact Us') }}</a>
        
        <!-- Language Switcher Mobile -->
        <div class="mt-6">
            <p class="text-xs uppercase tracking-widest text-[#066c5f60] font-bold mb-3">{{ __('Language') }}</p>
            <div class="flex flex-col space-y-2">
                <a href="{{ route('locale.set', 'id') }}" class="flex items-center justify-between px-4 py-2 rounded-lg {{ App::getLocale() == 'id' ? 'bg-[#066C5F] text-white' : 'text-[#066C5F] hover:bg-[#066c5f10]' }}">
                    <span>Indonesia</span>
                    <span>🇮🇩</span>
                </a>
                <a href="{{ route('locale.set', 'en') }}" class="flex items-center justify-between px-4 py-2 rounded-lg {{ App::getLocale() == 'en' ? 'bg-[#066C5F] text-white' : 'text-[#066C5F] hover:bg-[#066c5f10]' }}">
                    <span>English</span>
                    <span>🇺🇸</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Alpine.js -->
<script src="https://unpkg.com/alpinejs" defer></script>
