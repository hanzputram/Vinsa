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

    <div class="p-7">  
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

                <a href="/admin/blog"
                    class="bg-white hover:bg-gray-200 transition-all ease-in-out duration-300 cursor-pointer border-[1.5px] rounded-md w-[49%] py-4 px-4 flex items-center gap-4">
<svg viewBox="0 0 24 24" class="w-10 h-10" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="#003cff" stroke-width="1.5"></path> <path d="M8 13H10.5" stroke="#003cff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M8 9H14.5" stroke="#003cff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M8 17H9.5" stroke="#003cff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M3 14V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157M21 14C21 17.7712 21 19.6569 19.8284 20.8284M4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284M19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="#003cff" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    <div>
                        <p class="text-xl font-semibold">{{ $blogCount }}</p>
                        <p class="text-gray-600">Blog</p>
                    </div>
                </a>
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
