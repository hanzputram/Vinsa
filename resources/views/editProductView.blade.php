<x-app-layout>
    <div x-data="{ search: '' }" class="p-6 md:p-10 space-y-10">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Product Catalog</h1>
                <p class="text-slate-500 font-medium tracking-tight">Manage and update your products</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400 group-focus-within:text-[#066c5f] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                    <input type="text" x-model="search" placeholder="Search product name or code..."
                        class="w-full md:w-80 pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-[#066c5f] focus:border-transparent font-semibold shadow-sm transition-all outline-none" />
                </div>
                <a href="{{ route('products.view') }}" class="inline-flex items-center gap-2 bg-[#066c5f] text-white px-6 py-3 rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg shadow-[#066c5f]/30 hover:bg-[#088a7a] transition-all active:scale-95">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
                    New Product
                </a>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <div x-show="{{ json_encode(Str::lower($product->name . ' ' . $product->kode . ' ' . ($product->custom_input ?? ''))) }}.includes(search.toLowerCase())"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="group relative bg-white rounded-[2rem] border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">
                    
                    <!-- Image Container -->
                    <div class="aspect-[8/11] relative overflow-hidden bg-slate-100 border-b border-slate-100">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        
                        <!-- Quick Actions Overlay -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 scale-90 group-hover:scale-100">
                            <a href="/products/{{ $product->id }}/edit" class="px-6 py-2.5 bg-white text-slate-900 rounded-xl font-bold shadow-2xl hover:bg-[#066c5f] hover:text-white transition-colors">Edit Product</a>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <p class="text-[10px] font-black text-[#F77F1E] uppercase tracking-[0.2em] mb-2">{{ $product->category->name ?? 'Product' }}</p>
                        <h2 class="text-lg font-black text-slate-900 leading-tight mb-4 group-hover:text-[#066c5f] transition-colors">
                            {{ $product->name }}
                        </h2>
                        
                        <div class="flex items-center justify-between border-t border-slate-50 pt-4">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest pl-1">Reference Code</p>
                                <p class="text-sm font-black text-slate-900 uppercase">#{{ $product->kode }}</p>
                            </div>
                            @if($product->custom_input)
                                <div class="text-right">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Detail</p>
                                    <p class="text-xs font-bold text-slate-600 truncate max-w-[100px]">{{ $product->custom_input }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(count($products) == 0)
            <div class="py-40 text-center">
                <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0l-8 4-8-4" /></svg>
                </div>
                <h3 class="text-xl font-black text-slate-900 tracking-tight">No products found</h3>
                <p class="text-slate-500 font-medium">Get started by creating your first product.</p>
            </div>
        @endif

    </div>
</x-app-layout>
