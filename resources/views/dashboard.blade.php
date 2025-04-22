<style>
    .outfit {
        font-family: "Outfit", sans-serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
    }
</style>

<x-app-layout class="outfit">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-4 bg-white p-4 mb-10 rounded-md shadow-sm">
                <p class="text-lg font-semibold">Jumlah Pengunjung: <span class="text-indigo-600">{{ $visitorCount }}</span></p>
            </div>
            
            <div class="flex justify-between gap-2">
                <!-- Produk -->
                <a href="/products/edit"
                    class="bg-white hover:bg-gray-200 transition-all ease-in-out duration-300 cursor-pointer border-[1.5px] rounded-md w-[49%] py-4 px-4 flex items-center gap-4">
                    <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 7.5L12 12M4 7.5l8 4.5m0 0v9M20 7.5v9M4 7.5v9M20 16.5l-8 4.5m-8-4.5l8 4.5" />
                    </svg>
                    <div>
                        <p class="text-xl font-semibold">{{ $productCount }}</p>
                        <p class="text-gray-600">Products</p>
                    </div>
                </a>

                <!-- Gambar -->
                <a href="/carouselView"
                    class="bg-white hover:bg-gray-200 transition-all ease-in-out duration-300 cursor-pointer border-[1.5px] rounded-md w-[49%] py-4 px-4 flex items-center gap-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4 6H5l4-6 3 4z" />
                    </svg>
                    <div>
                        <p class="text-xl font-semibold">{{ $carouselCount }}</p>
                        <p class="text-gray-600">Banner</p>
                    </div>
                </a>
            </div>

            {{-- Show User History --}}
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-3xl font-semibold mb-4">Riwayat Aktivitas</h3>

                    {{-- Filter Bar: Tanggal & Search --}}
                    <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                        <!-- Form Filter Tanggal -->
                        <form method="GET" action="{{ route('dashboard') }}" class="flex items-center gap-2">
                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">
                                    Cari Berdasarkan Tanggal
                                </label>
                                <input type="date" name="date" id="date" value="{{ request('date') }}"
                                    class="border px-3 py-2 rounded-md">
                            </div>
                            <button type="submit"
                                class="self-end bg-blue-600 text-white px-4 py-2 rounded-md mt-1 md:mt-[26px]">
                                Cari
                            </button>
                        </form>

                        <!-- Search Bar -->
                        <form method="GET" action="{{ route('dashboard') }}" class="w-full md:w-[300px]">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">
                                Cari Aktivitas
                            </label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                placeholder="Cari berdasarkan nama atau deskripsi"
                                class="w-full border px-3 py-2 rounded-md" />
                        </form>
                    </div>

                    {{-- Tampilkan Tanggal yang Dicari --}}
                    @php
                        \Carbon\Carbon::setLocale('id');
                    @endphp

                    @if (request('date'))
                        <p class="text-lg text-center text-black my-5">
                            Menampilkan riwayat untuk tanggal: <br>
                            <strong>{{ \Carbon\Carbon::parse(request('date'))->translatedFormat('d F Y') }}</strong>
                        </p>
                    @else
                        <p class="text-lg text-center text-black my-5">
                            Menampilkan riwayat hari ini: <br>
                            <strong>{{ \Carbon\Carbon::today()->translatedFormat('d F Y') }}</strong>
                        </p>
                    @endif

                    {{-- List Riwayat --}}
                    @if ($histories->isEmpty())
                        <div class="text-center mt-6 mb-10">
                            <p class="text-gray-500 text-lg mb-4">Data tidak ditemukan.</p>
                            <a href="{{ route('dashboard') }}"
                                class="inline-block bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-all">
                                Kembali
                            </a>
                        </div>
                    @else
                        <ul class="list-decimal ml-5 space-y-2">
                            @foreach ($histories as $history)
                                <li class="border-b-[1.5px] pb-3">
                                    <span class="text-gray-600 text-sm">
                                        {{ $history->created_at->timezone('Asia/Jakarta')->format('H:i') }} WIB -
                                    </span>
                                    <strong>{{ $history->user->name ?? 'User tidak dikenal' }}</strong>
                                    {{ $history->description }}
                                </li>
                            @endforeach
                        </ul>

                        {{-- Pagination --}}
                        <div class="mt-6">
                            {{ $histories->withQueryString()->links('vendor.pagination.tailwind') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
