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
    <div>
        <ul class="hidden md:flex space-x-6">
            <li><a href="{{ url('/') }}" class="font-bold text-xl hover:text-[#066c5fad]">Home</a></li>
            <li><a href="/about" class="font-bold text-xl hover:text-[#066c5fad]">About Us</a></li>
            <li><a href="https://wa.me/6281335715398" class="font-bold text-xl hover:text-[#066c5fad]">Contact Us</a></li>
        </ul>
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
        <a href="{{ url('/') }}" class="block py-2 text-[#066C5F] border-b-[1.5px] hover:text-[#066c5fad] font-bold">Home</a>
        <a href="{{ url('/about') }}" class="block py-2 border-b-[1.5px] text-[#066C5F] hover:text-[#066c5fad] font-bold">About Us</a>
        <a href="{{ url('/contact') }}" class="block py-2 text-[#066C5F] hover:text-[#066c5fad] font-bold">Contact Us</a>
    </div>
</nav>

<!-- Alpine.js -->
<script src="https://unpkg.com/alpinejs" defer></script>
