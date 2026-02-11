<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vinsa') }} | Admin Portal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .outfit { font-family: "Outfit", sans-serif; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="outfit antialiased bg-[#f8fafc] text-slate-900">
    <x-app-loader />
    <div class="min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
        <!-- Abstract Background Orbs -->
        <div class="absolute top-0 -left-4 w-72 h-72 bg-[#066c5f]/10 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-[#F77F1E]/10 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-[#066c5f]/10 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <div class="max-w-5xl w-full grid grid-cols-1 lg:grid-cols-2 bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200 overflow-hidden relative z-10 border border-slate-100">
            <!-- Form Section -->
            <div class="p-8 md:p-12 lg:p-16 flex flex-col justify-center">
                <div class="mb-10 text-center lg:text-left">
                    <div class="inline-flex items-center justify-center mb-6">
                        <img src="/image/vinsalg.png" alt="Vinsa Logo" class="h-16 w-auto">
                    </div>
                </div>

                {{ $slot }}
                
                <div class="mt-10 pt-8 border-t border-slate-50 text-center">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">&copy; {{ date('Y') }} Vinsa Electric. All Rights Reserved.</p>
                </div>
            </div>

            <!-- Image/Welcome Section -->
            <div class="hidden lg:block relative overflow-hidden bg-slate-900">
                <img src="/image/81.jpg" alt="Vinsa Hero" class="absolute inset-0 w-full h-full object-cover opacity-60 scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent"></div>
                
                <div class="absolute inset-0 p-16 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-1 bg-[#F77F1E] rounded-full"></div>
                        <p class="text-4xl font-black text-white leading-tight italic">
                            Elevating<br>Electronic<br>Commerce.
                        </p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-[2rem]">
                        <p class="text-white text-lg font-bold mb-1">Empowering the Grid.</p>
                        <p class="text-slate-300 text-sm leading-relaxed">System administrator portal for managing product listings, marketing banners, and editorial content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
