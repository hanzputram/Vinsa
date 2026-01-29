<x-app-layout>
    <div class="p-6 md:p-10 space-y-10">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Banner Advertising</h1>
                <p class="text-slate-500 font-medium tracking-tight">Main homepage carousel management</p>
            </div>
            <a href="{{ route('carousels.create') }}" class="inline-flex items-center gap-2 bg-[#066c5f] text-white px-6 py-3 rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg shadow-[#066c5f]/30 hover:bg-[#088a7a] transition-all active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
                New Banner
            </a>
        </div>

        <!-- Banner Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @forelse ($carousels as $carousel)
                <div class="group relative bg-white rounded-[2rem] border border-slate-200 shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden">
                    <!-- Image Container -->
                    <div class="aspect-video relative overflow-hidden bg-slate-100">
                        <img src="{{ asset('storage/' . $carousel->image) }}" alt="Vinsa Banner" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        
                        <!-- Actions Overlay -->
                        <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity backdrop-blur-[2px] flex items-center justify-center gap-3">
                            <a href="/carousels/{{ $carousel->id }}/edit" 
                               class="px-6 py-2 bg-white text-slate-900 rounded-xl font-bold text-sm shadow-xl hover:bg-[#066c5f] hover:text-white transition-all">
                                Edit Banner
                            </a>
                            <form action="{{ route('carousels.destroy', $carousel->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-rose-500 text-white rounded-xl hover:bg-rose-600 transition-colors shadow-xl" onclick="return confirm('Silahkan konfirmasi penghapusan banner ini.')">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-40 text-center">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">No Banners Found</h3>
                    <p class="text-slate-500 font-medium tracking-tight">Start by adding descriptive banners for your homepage.</p>
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>
