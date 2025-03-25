<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <title>Vinsa</title>
</head>
<style>
    html {
  scroll-behavior: smooth;
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
  background-image: linear-gradient(90deg, #066C5F 25%, #0b907e68 50%, #066C5F 75%);
  background-size: 200% auto;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: shine 6s linear infinite;
}

@keyframes jump {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-8px);
    }
}

.jump-arrow {
    animation: jump 1.2s infinite ease-in-out;
    transition: stroke 0.3s ease-in-out;
}

.wa-text-curv {
  width: 100%;
  position: absolute;
  top: 0%;
  -webkit-animation: spin 6s linear infinite;
  -moz-animation: spin 6s linear infinite;
  animation: spin 6s linear infinite;
}
@-moz-keyframes spin {
  100% {
    -moz-transform: rotate(360deg);
  }
}
@-webkit-keyframes spin {
  100% {
    -webkit-transform: rotate(360deg);
  }
}
@keyframes spin {
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

</style>
<body class="overflow-x-hidden w-full hide-scrollbar">
    <a href="https://wa.me/6282223332830">
        <div class="w-[75px] h-[75px] fixed bottom-[20px] left-[20px] z-[1000] bg-[#ffffff4d] rounded-full backdrop-blur-[2px] flex items-center justify-center">
            <img class="wa-text-curv flex items-center justify-center" src="/image/war.png" alt=""><svg widht="30px" height="30px" fill="#000000" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.42 9.49c-.19-.09-1.1-.54-1.27-.61s-.29-.09-.42.1-.48.6-.59.73-.21.14-.4 0a5.13 5.13 0 0 1-1.49-.92 5.25 5.25 0 0 1-1-1.29c-.11-.18 0-.28.08-.38s.18-.21.28-.32a1.39 1.39 0 0 0 .18-.31.38.38 0 0 0 0-.33c0-.09-.42-1-.58-1.37s-.3-.32-.41-.32h-.4a.72.72 0 0 0-.5.23 2.1 2.1 0 0 0-.65 1.55A3.59 3.59 0 0 0 5 8.2 8.32 8.32 0 0 0 8.19 11c.44.19.78.3 1.05.39a2.53 2.53 0 0 0 1.17.07 1.93 1.93 0 0 0 1.26-.88 1.67 1.67 0 0 0 .11-.88c-.05-.07-.17-.12-.36-.21z"></path><path d="M13.29 2.68A7.36 7.36 0 0 0 8 .5a7.44 7.44 0 0 0-6.41 11.15l-1 3.85 3.94-1a7.4 7.4 0 0 0 3.55.9H8a7.44 7.44 0 0 0 5.29-12.72zM8 14.12a6.12 6.12 0 0 1-3.15-.87l-.22-.13-2.34.61.62-2.28-.14-.23a6.18 6.18 0 0 1 9.6-7.65 6.12 6.12 0 0 1 1.81 4.37A6.19 6.19 0 0 1 8 14.12z"></path></g></svg>
        </div>
    </a>    
     <!-- Background Section -->
    <div class="relative bg-no-repeat bg-cover w-full" style="background-image:url('/image/pabrik.jpg')">
        <div class="Relative after:content-[''] after:w-full after:h-full after:absolute after:top-0 after:left-0 after:bg-[rgba(1441,1441,1441,0.65)] after:blur-[10px]"></div>
        
        <!-- Navigation -->
        <nav class="relative z-10 text-[#066C5F] py-4 px-6 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ url('/') }}" class="w-[100px]"><img src="/image/vinsalg.png" alt="Vinsa"></a>
        
                <ul class="hidden md:flex space-x-6">
                    <li><a href="{{ url('/') }}" class="font-bold text-xl hover:text-[#066c5fad]">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="font-bold text-xl hover:text-[#066c5fad]">About Us</a></li>
                    <li><a href="{{ url('/contact') }}" class="font-bold text-xl hover:text-[#066c5fad]">Contact Us</a></li>
                </ul>
        
                <!-- Mobile Menu Button -->
                <button id="menu-toggle" class="md:hidden focus:outline-none">
                    <svg class="w-6 h-6 hover:text-[#066c5fad] cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden p-4">
                <a href="{{ url('/') }}" class="block py-2 text-[#066C5F] border-b-[1.5px] hover:text-[#066c5fad] font-bold">Home</a>
                <a href="{{ url('/about') }}" class="block py-2 border-b-[1.5px] text-[#066C5F] hover:text-[#066c5fad] font-bold">About Us</a>
                <a href="{{ url('/contact') }}" class="block py-2 text-[#066C5F] hover:text-[#066c5fad] font-bold">Contact Us</a>
            </div>
        </nav>

        {{-- carosel --}}

        <div class="w-[90%] lg:h-[100%] h-[150px] mx-auto mt-10">
        <div class="relative w-[100%] h-[100%] mx-auto">
                <div class="swiper mySmallSwiper w-full h-full rounded-lg shadow-md">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <img src="/image/6.jpg" class="w-full h-full object-cover rounded-lg" alt="Slide 1">
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <img src="/image/6.jpg" class="w-full h-full object-cover rounded-lg" alt="Slide 2">
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <img src="/image/6.jpg" class="w-full h-full object-cover rounded-lg" alt="Slide 3">
                        </div>
                        <div class="swiper-slide">
                            <img src="/image/6.jpg" class="w-full h-full object-cover rounded-lg" alt="Slide 3">
                        </div>
                    </div>
            
                    <!-- Pagination (Dots) -->
                    <div class="swiper-pagination"></div>
                    <!-- Navigation Buttons -->
                    <div class="swiper-button-next hidden md:block"></div>
                    <div class="swiper-button-prev hidden md:block"></div>
                </div>
            </div>
            
            <!-- Swiper Initialization -->
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    var swiper = new Swiper(".mySmallSwiper", {
                        loop: true,
                        autoplay: {
                            delay: 4000, 
                            disableOnInteraction: false,
                        },
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                        },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        autoHeight: true
                    });
                });
            </script>
        </div>

        {{-- First sesion --}}
        <div class="relative z-10 flex flex-col items-center text-center h-screen pt-20 px-6">
            <p class="mt-4 text-md flex font-bold items-center text-[#066c5f] max-w-2xl shining-text"><span class="mx-2"><svg width="16px" height="16px" fill="#F77F1E" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon" stroke="#F77F1E">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path d="M848 359.3H627.7L825.8 109c4.1-5.3.4-13-6.3-13H436c-2.8 0-5.5 1.5-6.9 4L170 547.5c-3.1 5.3.7 12 6.9 12h174.4l-89.4 357.6c-1.9 7.8 7.5 13.3 13.3 7.7L853.5 373c5.2-4.9 1.7-13.7-5.5-13.7z"></path>
                </g>
            </svg>
        </span>Penuhi Kebutuhan Listrik dengan Produk Terbaik</p>
        <h1 class="text-4xl font-extrabold text-[#066c5f]">Selamat Datang di Vinsa</h1>
        <p class="mt-4 mb-10 text-lg  font-medium text-[#066c5f] max-w-2xl">"Vinsa: Dedikasi dalam Menyediakan Solusi Kelistrikan Premium, Menghadirkan Produk Berkualitas Tinggi untuk Kebutuhan Rumah, Bisnis, dan Industri Anda!"</p>
            <div class="mt-6 flex space-x-4">
                <a href="#" class="bg-green-600 text-white px-6 py-3 transition-all duration-100 ease-in-out rounded-full shadow hover:bg-green-700">LIHAT KOLEKSI</a>
                <a href="#" class="border-2 border-[#F77F1E] text-[#000000] px-6 py-3 rounded-full transition-all duration-300 ease-in-out shadow hover:bg-[#F77F1E] hover:text-white">CONTACT US</a>
            </div>
            {{-- arrow down --}}
            <a href="#second">
                <svg 
                    width="40px" height="40px" 
                    class="mt-10 jump-arrow hover:cursor-pointer transition-all duration-100 ease-in-out hover:stroke-[#066c5f]" 
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    stroke="#F77F1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 6V18M12 18L7 13M12 18L17 13"></path> 
                </svg>
            </a>
            </a>
        </div>
    </div>



    {{-- second sesion --}}



    {{-- animated background --}}
    <div id="second" class="w-full min-h-screen flex flex-wrap justify-center items-center gap-4 p-4 bg-linear-to-r from-[#066c5f] to-[#3cd6c1]">
        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
        <dotlottie-player 
        class="absolute opacity-45 z-[-1000px] w-[150%] h-[150%] sm:w-[120%] sm:h-[120%] md:w-full md:h-full" 
        src="https://lottie.host/4dfd2dd9-215a-4ce5-952d-0fc0ba29b9aa/KSZioDTRVJ.lottie" 
        background="transparent" 
        speed="1" 
        loop 
        autoplay>
    </dotlottie-player>
        <div>
            
            <h1 class="text-4xl font-extrabold text-[#fff]">Produk Kita</h1>
        </div>
        <!-- Card Container -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Reusable Card Component -->
            <div class="w-40 h-56 sm:w-52 sm:h-64 md:w-60 md:h-72 bg-[#066c5f]/37 border border-black text-white p-4 sm:p-5 rounded-2xl shadow-lg flex flex-col justify-between relative overflow-hidden backdrop-blur-[8px]">
                <h2 class="text-base sm:text-lg font-bold">Push Button</h2>
                <p class="mt-2 flex-grow text-xs sm:text-sm"><img src="/image/1.png" alt="Vinsa"></p>
                <button class="hover:cursor-pointer px-3 sm:px-4 py-1 sm:py-2 bg-white text-[#066c5f] text-sm font-semibold rounded-lg hover:bg-gray-200">
                    Action
                </button>
            </div>
    
            <div class="w-40 h-56 max-h-96 sm:w-52 sm:h-64 md:w-60 md:h-72 bg-[#066c5f]/37 border border-black text-white p-4 sm:p-5 rounded-2xl shadow-lg flex flex-col justify-between relative overflow-hidden backdrop-blur-[8px]">
                <h2 class="text-base sm:text-lg font-bold">Box Panel</h2>
                <p class="mt-2 flex-grow text-xs sm:text-sm"><img class="" src="/image/2.png" alt="Vinsa"></p>
                <button class="hover:cursor-pointer px-3 sm:px-4 py-1 sm:py-2 bg-white text-[#066c5f] text-sm font-semibold rounded-lg hover:bg-gray-200">
                    Action
                </button>
            </div>
    
            <div class="w-40 h-56 sm:w-52 sm:h-64 md:w-60 md:h-72 bg-[#066c5f]/37 border border-black text-white p-4 sm:p-5 rounded-2xl shadow-lg flex flex-col justify-between relative overflow-hidden backdrop-blur-[8px]">
                <h2 class="text-base sm:text-lg font-bold">Box Panel</h2>
                <p class="mt-2 flex-grow text-xs sm:text-sm"><img class="" src="/image/3.png" alt="Vinsa"></p>
                <button class="hover:cursor-pointer px-3 sm:px-4 py-1 sm:py-2 bg-white text-[#066c5f] text-sm font-semibold rounded-lg hover:bg-gray-200">
                    Action
                </button>
            </div>
    
            <div class="w-40 h-56 sm:w-52 sm:h-64 md:w-60 md:h-72 bg-[#066c5f]/37 border border-black text-white p-4 sm:p-5 rounded-2xl shadow-lg flex flex-col justify-between relative overflow-hidden backdrop-blur-[8px]">
                <h2 class="text-base sm:text-lg font-bold">Card Title</h2>
                <p class="mt-2 flex-grow text-xs sm:text-sm"><img class="" src="/image/4.png" alt="Vinsa"></p>
                <button class="hover:cursor-pointer px-3 sm:px-4 py-1 sm:py-2 bg-white text-[#066c5f] text-sm font-semibold rounded-lg hover:bg-gray-200">
                    Action
                </button>
            </div>
        </div>
    </div>    
    </div>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>    
</body>
</html>


