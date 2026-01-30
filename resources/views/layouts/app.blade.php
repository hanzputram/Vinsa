<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
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
    @include('sweetalert::alert')

    <style>
        .outfit {
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body class="outfit antialiased bg-[#f8fafc] text-slate-900" x-data="{ sidebarOpen: false }">
    <div class="flex min-h-screen">
        <!-- Sidebar container -->
        @include('layouts.navigation')

        <!-- Main Content area -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Topbar (optional, but good for mobile toggle and profile) -->
            <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-30 h-16 flex items-center px-4 md:px-8 justify-between lg:hidden">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-slate-100 lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="font-bold text-xl text-indigo-600">Vinsa</div>
                <div class="w-8"></div><!-- Spacer -->
            </header>

            <main class="flex-1 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
