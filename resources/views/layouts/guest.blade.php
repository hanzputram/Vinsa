<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
    </style>
</head>

<body class="outfit font-sans text-gray-900 bg-gray-100 antialiased">
    <div
        class="min-h-screen mx-auto max-w-[90%] lg:flex-row flex flex-col lg:justify-between items-center pt-6 sm:pt-0">

        <div class="w-full flex justify-between lg:flex-row flex-col lg:justify-between lg:items-end">
            <div class="flex h-full lg:w-1/2 flex-col items-center justify-center">
                <div class="flex justify-center w-full">
                    <x-application-logo class="w-[120px] h-auto" />
                </div>
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-[1rem]">
                    {{ $slot }}
                </div>
            </div>


            <div class="relative bg-center bg-cover w-full lg:w-1/2 h-[300px] lg:h-[440px] my-10 lg:my-0 rounded-[1rem] after:rounded-[1rem] after:w-full after:h-full after:content-[''] after:absolute after:top-0 after:left-0 after:bg-[#00000079]"
                style="background-image:url('/image/81.jpg')">

                <div class="w-full h-full">
                    <!-- Mobile: Centered welcome text -->
                    <div class="flex lg:hidden w-full h-full items-center justify-center">
                        <p class="z-10 text-white text-4xl font-extrabold text-center">
                            Welcome<br>To<br>Vinsa
                        </p>
                    </div>

                    <!-- Desktop: Top left and bottom right text -->
                    <div class="hidden lg:flex flex-col justify-between w-full h-full">
                        <p class="relative z-[10] font-extrabold text-4xl text-white text-left p-[2rem]">
                            Welcome<br>To<br>Vinsa
                        </p>
                        <p class="relative z-[10] font-extrabold text-4xl text-white text-right p-[2rem]">
                            Welcome<br>To<br>Vinsa
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
