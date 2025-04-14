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

    <title>Vinsa</title>
    <link rel="icon" type="image/png" href="{{ asset('image/sa.png') }}">
    <style>
        .outfit {
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
            width: 6px;
            /* Lebar scrollbar */
            height: 7px;
            /* Tinggi scrollbar */
        }

        ::-webkit-scrollbar-button {
            display: block;
            background-color: #cccccc00;
            /* Warna tombol */
            border-radius: 10px;
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #ffffff53;
            /* Warna thumb */
            border-radius: 100px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ffffffb5;
            /* Warna saat hover */
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            /* Menghilangkan background */
        }

        /* Untuk Firefox */
        .scroll-container {
            scrollbar-width: thin;
            /* Lebar scrollbar */
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

<body class="outfit bg-[#FDFBEE]">
    <div class="max-w-[93%] mx-auto">
        <div class="flex justify-between items-center py-3">
            <x-navUser></x-navUser>
        </div>
        <div
            class="overflow-hidden p-10 lg:p-[5rem] lg:justify-between py-[80px]  flex justify-center relative w-full h-screen after:content-[''] bg-gradient-to-r from-[#066c5f] to-[#0dd8bd] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]">
            <div class="w-full relative z-[10]">
                <a href="/" class="group">
                    <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="stroke-white group-hover:stroke-gray-400 transition-colors duration-300">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </a>
                <p class="text-6xl text-center font-extrabold  text-[#fff]">
                    About Us
                </p>
                <p class="text-xl w-[90%] text-center text-[#fffffffe] pt-5 mx-auto pb-15">
                    {{-- "Vinsa: Dedikasi dalam Menyediakan Solusi Kelistrikan Premium, Menghadirkan Produk Berkualitas
                    Tinggi untuk Kebutuhan Rumah, Bisnis, dan Industri Anda! --}}
                </p>
            </div>
        </div>
    </div>
    {{-- <div class="max-w-7xl mx-auto py-16 px-6 flex flex-col md:flex-row gap-12 items-start">
        <!-- Google Map -->
        <div class="w-full md:w-1/2 h-[400px] rounded-lg overflow-hidden shadow-md">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2156.2719827748297!2d112.69587530477804!3d-7.670149427676324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d96dc646c1d5%3A0x7e975d52bc2a3c77!2sATStekno%20Pandaan!5e0!3m2!1sen!2sid!4v1744161778716!5m2!1sen!2sid"
                class="w-full h-full border-0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <!-- Contact Information -->
        <div class="w-full md:w-1/2 text-[#e53935] space-y-4">
            <h2 class="text-2xl font-bold">PT. Anugerah Tama Sejati Surabaya</h2>
            <p>The Taman Dayu, Cluster Palazio Boulevard, J-1 No. 06, Pandaan, Pasuruan, Jawa Timur, Indonesia 67156</p>
            <p><strong>Phone</strong>: 034-34857758</p>
            <p><strong>WhatsApp</strong>: +62 8897 3783 384</p>
            <p><strong>Email</strong>: <a href="mailto:sales@ATstekno.com"
                    class="underline hover:text-red-400">sales@ATstekno.com</a></p>
        </div>
    </div> --}}

    <x-footer></x-footer>
</body>

</html>
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
