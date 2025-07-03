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
    <link rel="icon" type="image/png" href="{{ asset('image/vinsalg.png') }}">
</head>
<style>
    .outfit {
        font-family: "Outfit", sans-serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
    }
</style>

<body class="outfit bg-[#FDFBEE]">
    <div class="max-w-[93%] mx-auto">
        <div class="flex justify-between items-center py-3">
            <x-navUser></x-navUser>
        </div>
        <div
            class="overflow-hidden p-6 sm:p-10 lg:p-[5rem] lg:justify-between py-[80px] relative bg-no-repeat bg-cover w-full min-h-screen after:content-[''] bg-gradient-to-r from-[#066c5f] to-[#0dd8bd] after:w-full after:h-full after:absolute after:top-0 after:left-0 rounded-[40px]">
            <div class="w-full relative z-[10]">
                <a href="javascript:window.history.back()" class="group">
                    <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="stroke-white group-hover:stroke-gray-400 transition-colors duration-300">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>
            <div class="p-6 max-w-5xl mx-auto">
                <h1 class="text-3xl font-bold text-[#FDFBEE] mb-2">{{ $blog->title }}</h1>
                <p class="text-sm text-white mb-4">Published on: {{ $blog->created_at->format('F d, Y') }}</p>

                {{-- Banner atau Gambar Utama --}}
                <div class="relative w-full mb-6">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->judul }}"
                        class="w-full rounded-xl shadow-md">
                </div>

                {{-- Konten Sub Judul & Isi --}}
                @foreach ($blog->sections as $section)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-[#FDFBEE] border-l-4 border-[#f4752c] pl-3 mb-2">
                            {{ $section->subtitle }}
                        </h2>
                        <img src="{{ asset('storage/' . $section->image) }}" alt="" width="300px">
                        <p class="text-justify text-white leading-relaxed">
                            {!! nl2br(e($section->content)) !!}
                        </p>
                    </div>
                @endforeach

                <div class="w-full relative z-[10]">
                    <a href="javascript:window.history.back()" class="group">
                        <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="stroke-white group-hover:stroke-gray-400 transition-colors duration-300">
                            <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
