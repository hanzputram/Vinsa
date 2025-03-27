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
    <title>Vinsa.fr</title>
    <link rel="icon" type="image/png" href="{{ asset('image/sa.png') }}">
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

        {{-- isi image --}}
        <div class="overflow-hidden lg:p-[5rem] lg:justify-between py-[80px]  flex justify-center relative bg-no-repeat bg-cover w-full h-screen after:content-[''] after:bg-[rgba(40,40,40,0.65)] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]" style="background-image:url('/image/pabrik.jpg')">
            <div class="lg:w-[50%] w-full relative z-[10]">
                <p class="shining-text text-xl text-center lg:text-left font-medium">
                    Penuhi Kebutuhan Listrik dengan Produk Terbaik
                </p>
                <p class="text-6xl text-center lg:text-left font-extrabold  text-[#fff]">
                    Welcome<br> To<br> Vinsa
                </p>
                <p class="text-xl lg:text-lg text-center mx-4 lg:mx-auto text-[#fffffffe] pt-5 pb-15 lg:text-left">
                    "Vinsa: Dedikasi dalam Menyediakan Solusi Kelistrikan Premium, Menghadirkan Produk Berkualitas Tinggi untuk Kebutuhan Rumah, Bisnis, dan Industri Anda!
                </p>
                <div class="flex justify-center lg:justify-start ">
                    <a href="#" class="bg-green-600 text-white px-6 py-3 transition-all mr-5 duration-100 ease-in-out rounded-full shadow hover:bg-green-700">Our Product</a>
                    <a href="https://wa.me/6282223332830" class="border-2 border-[#F77F1E] text-[#fff] px-6 py-3 rounded-full transition-all duration-300 ease-in-out shadow hover:bg-[#F77F1E] hover:text-white">Contact Us</a>
                </div>
            </div>

            {{-- card slider --}}
            <div class="hidden sm:hidden md:hidden lg:block lg:rounded-4xl lg:border-[1px] lg:shadow-lg lg:shadow-[#ffffff2a] lg:border-white  lg:w-[30%] lg:h-auto bg-[#00000036] backdrop-blur-[2.5px] z-[10]">
                <div class="flex flex-col  bg-transparent items-end gap-[1.25rem] text-white">
                  <div class="w-full overflow-x-hidden">
                    <div class="px-[1.25rem]">
                      <h2 class="my-[1rem] text-center text-2xl lg:text-3xl"><svg viewBox="0 0 32 32" widht="20px" height="20px" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill="none" fill-rule="evenodd"> <path d="m0 0h32v32h-32z"></path> <path d="m19 1.73205081 7.8564065 4.53589838c1.8564064 1.07179677 3 3.05255889 3 5.19615241v9.0717968c0 2.1435935-1.1435936 4.1243556-3 5.1961524l-7.8564065 4.5358984c-1.8564065 1.0717968-4.1435935 1.0717968-6 0l-7.85640646-4.5358984c-1.85640646-1.0717968-3-3.0525589-3-5.1961524v-9.0717968c0-2.14359352 1.14359354-4.12435564 3-5.19615241l7.85640646-4.53589838c1.8564065-1.07179677 4.1435935-1.07179677 6 0zm4.0203166 9.82532719c-.259282-.4876385-.8647807-.672758-1.3524192-.4134761l-5.6794125 3.0187491-5.6793299-3.0187491c-.4876385-.2592819-1.09313718-.0741624-1.35241917.4134761-.25928198.4876385-.07416246 1.0931371.41347603 1.3524191l5.61827304 2.9868539.0000413 6.7689186c0 .5522848.4477153 1 1 1 .5522848 0 1-.4477152 1-1l-.0000413-6.7689186 5.6183556-2.9868539c.4876385-.259282.6727581-.8647806.4134761-1.3524191z" fill="#ffffff"></path> </g> </g></svg>
                        Our Product
                      </h2>
                    </div>
                    <div class="w-full p-5 mx-auto max-w-full overflow-x-scroll flex gap-[1rem] flex-wrap-none pb-[.5rem]">
                      <div class="group card rounded-[24px] w-[200px] h-[275px] border-[1px] border-[#fff] bg-[#2c2c2c36] backdrop-blur-lg p-4 shrink-0 flex flex-col shadow-none">
                        <img class="object-cover transition-opacity duration-500 group-hover:opacity-0" src="/image/mcb.png" alt="">
                        <a href="" class="absolute inset-0 underline flex font-normal bg-[#2c2c2c17] backdrop-blur-lg rounded-[24px] items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            See More ↗
                        </a>
                      </div>
                      <div class="group card rounded-[24px] w-[200px] h-[275px] border-[1px] border-[#fff] bg-[#2c2c2c36] backdrop-blur-lg p-4 shrink-0 flex flex-col shadow-none">
                        <img class="object-cover transition-opacity duration-500 group-hover:opacity-0" src="/image/mcb.png" alt="">
                        <a href="" class="absolute inset-0 underline flex font-normal bg-[#2c2c2c17] backdrop-blur-lg rounded-[24px] items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            See More ↗
                        </a>
                      </div>
                      <div class="group card rounded-[24px] w-[200px] h-[275px] border-[1px] border-[#fff] bg-[#2c2c2c36] backdrop-blur-lg p-4 shrink-0 flex flex-col shadow-none">
                        <img class="object-cover transition-opacity duration-500 group-hover:opacity-0" src="/image/mcb.png" alt="">
                        <a href="" class="absolute inset-0 underline flex font-normal bg-[#2c2c2c17] backdrop-blur-lg rounded-[24px] items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            See More ↗
                        </a>
                      </div>
                      <div class="group card rounded-[24px] w-[200px] h-[275px] border-[1px] border-[#fff] bg-[#2c2c2c36] backdrop-blur-lg p-4 shrink-0 flex flex-col shadow-none">
                        <img class="object-cover transition-opacity duration-500 group-hover:opacity-0" src="/image/mcb.png" alt="">
                        <a href="" class="absolute inset-0 underline flex font-normal bg-[#2c2c2c17] backdrop-blur-lg rounded-[24px] items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            See More ↗
                        </a>
                      </div>
                      <div class="group card rounded-[24px] w-[200px] h-[275px] border-[1px] border-[#fff] bg-[#2c2c2c36] backdrop-blur-lg p-4 shrink-0 flex flex-col shadow-none">
                        <img class="object-cover transition-opacity duration-500 group-hover:opacity-0" src="/image/mcb.png" alt="">
                        <a href="" class="absolute inset-0 underline flex font-normal bg-[#2c2c2c17] backdrop-blur-lg rounded-[24px] items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            See More ↗
                        </a>
                      </div>
                      <div class="group card rounded-[24px] w-[200px] h-[275px] border-[1px] border-[#fff] bg-[#2c2c2c36] backdrop-blur-lg p-4 shrink-0 flex flex-col shadow-none">
                        <img class="object-cover transition-opacity duration-500 group-hover:opacity-0" src="/image/mcb.png" alt="">
                        <a href="" class="absolute inset-0 underline flex font-normal bg-[#2c2c2c17] backdrop-blur-lg rounded-[24px] items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            See More ↗
                        </a>
                      </div>
                      <div class="group card rounded-[24px] w-[200px] h-[275px] border-[1px] border-[#fff] bg-[#2c2c2c36] backdrop-blur-lg p-4 shrink-0 flex flex-col shadow-none">
                        <img class="object-cover transition-opacity duration-500 group-hover:opacity-0" src="/image/mcb.png" alt="">
                        <a href="" class="absolute inset-0 underline flex font-normal bg-[#2c2c2c17] backdrop-blur-lg rounded-[24px] items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            See More ↗
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="mx-auto mt-10">
                <!-- Grid Section -->
                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-[#fff] backdrop-blur-sm border-[1.5px] border-[#066c5f] p-6 rounded-3xl shadow-lg">
                        <h2 class="text-xl font-bold mb-2">🌟 Best Quality</h2>
                        <p>Quality you can trust, performance you can rely on.</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-[#fff] backdrop-blur-sm border-[1.5px] border-[#066c5f] p-6 rounded-3xl shadow-lg">
                        <h2 class="text-xl f  ont-bold mb-2">🔧 Best Product</h2>
                        <p>Reliable, safe, and efficient electrical products for home and business.</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-[#fff] backdrop-blur-sm border-[1.5px] border-[#066c5f] p-6 rounded-3xl shadow-lg">
                        <h2 class="text-xl font-bold mb-2">⚙ Best Service</h2>
                        <p>Smart, durable, and energy-efficient electrical solutions for homes and businesses.</p>
                    </div>
                </div>
        
                <!-- Call to Action -->
                <div class="mt-10 p-6 bg-[#066c5f] mb border-[1.5px] border-[#0cbca5] text-white rounded-3xl text-center shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
                    <p class="mb-[1.5rem]">Get the best products and the best quality at affordable prices and you will be able to feel the advantages yourself.</p>
                    <a href="https://wa.me/6282223332830" class="border-2 bg-white underline hover:text-blue-500 text-[#000] px-6 py-2 rounded-full transition-all duration-300 ease-in-out shadow border-[#fff]">Contact Us →</a>
                </div>
        
            </div>
            </div>
    </div>
            <footer class="w-[100%] bg-[#ffffff] border-t-[2px] border-[#066c5f] mt-10">
                <div class="mx-auto w-[90%] flex py-[3rem]  justify-between flex-wrap">
                    <div class="lg:w-1/3"> 
                        <img width="100px" src="/image/vinsalg.png" alt="">
                    </div>
                    <div class="text-center lg:w-1/3 text-[#066C5F] font-bold">
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
                    <div class="text-right lg:w-1/3 w-full flex justify-end">
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