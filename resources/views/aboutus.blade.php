<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    
    <title>Document</title>
    <style>
        
.outfit{
  font-family: "Outfit", sans-serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
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
  width: 6px; /* Lebar scrollbar */
  height: 7px; /* Tinggi scrollbar */
}

::-webkit-scrollbar-button {
  display: block;
  background-color: #cccccc00; /* Warna tombol */
  border-radius: 10px;
  width: 10px;
}

::-webkit-scrollbar-thumb {
  background: #ffffff53; /* Warna thumb */
  border-radius: 100px;
}

::-webkit-scrollbar-thumb:hover {
  background: #ffffffb5; /* Warna saat hover */
}

::-webkit-scrollbar-track {
  background: transparent; /* Menghilangkan background */
}

/* Untuk Firefox */
.scroll-container {
  scrollbar-width: thin; /* Lebar scrollbar */
  scrollbar-color: #888 transparent;
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
</head>
<body class="outfit">
    <div class="max-w-[93%] mx-auto"> 
    <a href="https://wa.me/6282223332830">
        <div class="w-[75px] h-[75px] fixed bottom-[20px] left-[20px] z-[1000] bg-[#ffffff4d] rounded-full backdrop-blur-[2px] flex items-center justify-center">
            <img class="wa-text-curv flex items-center justify-center" src="/image/war.png" alt=""><svg widht="30px" height="30px" fill="#000000" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.42 9.49c-.19-.09-1.1-.54-1.27-.61s-.29-.09-.42.1-.48.6-.59.73-.21.14-.4 0a5.13 5.13 0 0 1-1.49-.92 5.25 5.25 0 0 1-1-1.29c-.11-.18 0-.28.08-.38s.18-.21.28-.32a1.39 1.39 0 0 0 .18-.31.38.38 0 0 0 0-.33c0-.09-.42-1-.58-1.37s-.3-.32-.41-.32h-.4a.72.72 0 0 0-.5.23 2.1 2.1 0 0 0-.65 1.55A3.59 3.59 0 0 0 5 8.2 8.32 8.32 0 0 0 8.19 11c.44.19.78.3 1.05.39a2.53 2.53 0 0 0 1.17.07 1.93 1.93 0 0 0 1.26-.88 1.67 1.67 0 0 0 .11-.88c-.05-.07-.17-.12-.36-.21z"></path><path d="M13.29 2.68A7.36 7.36 0 0 0 8 .5a7.44 7.44 0 0 0-6.41 11.15l-1 3.85 3.94-1a7.4 7.4 0 0 0 3.55.9H8a7.44 7.44 0 0 0 5.29-12.72zM8 14.12a6.12 6.12 0 0 1-3.15-.87l-.22-.13-2.34.61.62-2.28-.14-.23a6.18 6.18 0 0 1 9.6-7.65 6.12 6.12 0 0 1 1.81 4.37A6.19 6.19 0 0 1 8 14.12z"></path></g></svg>
        </div>
    </a>  
    <div class="flex justify-between items-center py-3">
        <img src="/image/vinsalg.png" width="80px" height="80px" alt="">
        <nav class="relative z-10 text-[#066C5F] py-4 px-6">
                <ul class="hidden md:flex space-x-6">
                    <li><a href="{{ url('/') }}" class="font-bold text-xl hover:text-[#066c5fad]">Home</a></li>
                    <li><a href="/about" class="font-bold text-xl hover:text-[#066c5fad]">About Us</a></li>
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
        <div class="overflow-hidden lg:p-[5rem] lg:justify-between py-[80px]  flex justify-center relative bg-no-repeat bg-cover w-full h-screen after:content-[''] after:bg-[#066C5F] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]">
            <div class="w-full relative z-[10]">
                <a href="/new" class="group">
                    <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none" 
                        xmlns="http://www.w3.org/2000/svg"
                        class="stroke-white group-hover:stroke-gray-400 transition-colors duration-300">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" 
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
                
                <p class="text-6xl text-center font-extrabold  text-[#fff]">
                    About Us
                </p>
                <p class="text-xl w-[90%] text-center text-[#fffffffe] pt-5 mx-auto pb-15">
                    "Vinsa: Dedikasi dalam Menyediakan Solusi Kelistrikan Premium, Menghadirkan Produk Berkualitas Tinggi untuk Kebutuhan Rumah, Bisnis, dan Industri Anda!
                </p>
            </div>
            </div>
    </div>
            <footer class="w-[100%] bg-[#ffffff] border-t-[2px] border-[#066c5f] mt-10">
                <div class="mx-auto w-[90%] flex py-[3rem]  justify-between flex-wrap">
                    <div class="w-1/3"> 
                        <img width="100px" src="/image/vinsalg.png" alt="">
                    </div>
                    <div class="text-center w-1/3 text-[#066C5F] font-bold">
                        Stay Connected
                        <br>
                        <div class="my-4  flex text-black justify-center font-normal space-x-6">
                            <a href="#" class="hover:text-[#066C5F]">Facebook</a>
                            <a href="#" class="hover:text-[#066C5F]">Twitter</a>
                            <a href="#" class="hover:text-[#066C5F]">Instagram</a>
                            <a href="#" class="hover:text-[#066C5F]">LinkedIn</a>
                        </div>
                        &copy; 2025 Your Company. All rights reserved.
                    </div>
                    <div class="text-right w-1/3">
                        J - 1 Ruko Galaxi Bumi Permai No.23,<br> Semolowaru, Kec. Sukolilo, Surabaya,<br> Jawa Timur 60119
                    </div>
                </div>
            </footer>
</body>
</html>
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>    