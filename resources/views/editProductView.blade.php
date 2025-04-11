<x-app-layout>
    <div
        x-data="{ search: '' }"
        class="overflow-hidden p-10 lg:p-[5rem] lg:justify-between py-[80px] flex justify-center relative bg-no-repeat bg-cover w-full min-h-screen"
    >
        <div class="w-full relative z-[10]">
            <p class="text-6xl pb-10 text-center font-extrabold text-[#1e1e1e]">
                Perbarui Product
            </p>

            <!-- Search Bar -->
            <div class="flex justify-center mb-10">
                <input
                    type="text"
                    x-model="search"
                    placeholder="Cari produk..."
                    class="w-full max-w-md px-5 py-3 rounded-full border border-gray-300 shadow focus:outline-none focus:ring-2 focus:ring-[#066c5f]"
                />
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($products as $product)
                    <div
                        x-show="{{ json_encode(Str::lower($product->name . ' ' . $product->kode)) }}.includes(search.toLowerCase())"
                        class="bg-[#4d4d4d37] border border-[#ffffff] text-white p-4 sm:p-5 rounded-2xl shadow-lg flex flex-col justify-between relative overflow-hidden backdrop-blur-[8px]"
                    >
                        <h2 class="text-center sm:text-lg hidden lg:block font-bold">{{ \Illuminate\Support\Str::limit($product->name, 20) }}</h2>
                        <h2 class="text-center sm:text-lg lg:hidden font-bold">{{ \Illuminate\Support\Str::limit($product->name, 12) }}</h2>
                        <h2 class="text-center sm:text-lg font-bold">{{ $product->kode }}</h2>
                        <p class="mt-2 flex-grow text-xs sm:text-sm">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </p>
                        <a href="/products/{{$product->id}}/edit"
                            class="hover:cursor-pointer text-center my-3 px-3 sm:px-4 py-1 sm:py-2 bg-white text-[#066c5f] text-sm font-semibold rounded-lg hover:bg-gray-200">
                            Update
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
