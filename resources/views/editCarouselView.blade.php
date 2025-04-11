<x-app-layout>
    <div
        class="overflow-hidden p-10 lg:p-[5rem] lg:justify-between py-[80px] flex justify-center relative bg-no-repeat bg-cover w-full min-h-screen">
        <div class="w-full relative z-[10]">
            <p class="text-6xl pb-10 text-center font-extrabold text-[#1e1e1e]">
                Perbarui Banner
            </p>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Reusable Card Component -->
                @forelse ($carousels as $carousel)
                    <div
                        class="h-40 bg-[#4d4d4d37] border border-[#ffffff] text-white p-4 sm:p-5 rounded-2xl shadow-lg flex flex-col justify-between relative overflow-hidden backdrop-blur-[8px]">
                        <p class="mt-2 flex-grow text-xs sm:text-sm">
                            <img src="{{ asset('storage/' . $carousel->image) }}" alt="Vinsa">
                        </p>
                        <a href="/carousels/{{ $carousel->id }}/edit"
                            class="hover:cursor-pointer text-center px-3 sm:px-4 py-1 sm:py-2 bg-white text-[#066c5f] text-sm font-semibold rounded-lg hover:bg-gray-200">
                            Update
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center text-lg text-[#1e1e1e] font-medium">
                        Banner belum ada.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
