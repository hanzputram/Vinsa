<x-app-layout>
    <div class="p-6 md:p-10">
        <div class="max-w-3xl mx-auto text-center mb-10">
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Banner Advertising</h1>
            <p class="text-slate-500 font-medium italic">"A picture is worth a thousand words." — Elevate your homepage.</p>
        </div>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-8 border-b border-slate-100 bg-slate-50/50">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#066c5f] rounded-2xl flex items-center justify-center text-white shadow-lg shadow-[#066c5f]/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-black text-slate-900 tracking-tight">New Banner</h2>
                            <p class="text-sm text-slate-500 font-medium tracking-tight">Upload high-resolution assets</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('carousels.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                    @csrf

                    <div class="space-y-4">
                        <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Image Asset</label>
                        
                        <div class="relative group">
                            <div class="aspect-[28/6] w-full bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200 flex flex-col items-center justify-center p-6 transition-all duration-300 group-hover:border-[#066c5f] group-hover:bg-[#066c5f]/5">
                                <svg class="w-10 h-10 text-slate-300 group-hover:text-[#066c5f] transition-colors mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                <p class="text-xs font-black text-slate-400 group-hover:text-[#066c5f] uppercase tracking-widest">Click to upload or drag and drop</p>
                                <p class="text-[10px] font-bold text-rose-500 uppercase tracking-widest mt-2">Required: 2800 x 600 px</p>
                                <input type="file" name="image" required accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 flex items-center justify-between gap-4">
                        <a href="{{ route('carousels.index') }}" class="px-8 py-4 text-slate-500 font-black uppercase tracking-widest text-xs hover:text-slate-900 transition-colors">Cancel</a>
                        <button type="submit" class="px-10 py-4 bg-[#066c5f] text-white rounded-2xl font-black uppercase tracking-[0.2em] shadow-lg shadow-[#066c5f]/30 hover:bg-[#F77F1E] hover:text-white transition-all duration-300">
                            Launch Banner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Submission Failed',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#e11d48',
                customClass: { popup: 'rounded-[2.5rem]', confirmButton: 'rounded-xl font-bold px-8 py-3' }
            });
        </script>
    @endif
</x-app-layout>
