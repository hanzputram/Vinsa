<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="p-6 md:p-10">
        <div class="max-w-3xl mx-auto text-center mb-10">
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Banner Settings</h1>
            <p class="text-slate-500 font-medium">Refining your homepage visual experience.</p>
        </div>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-8 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#066c5f] rounded-2xl flex items-center justify-center text-white shadow-lg shadow-[#066c5f]/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-black text-slate-900 tracking-tight">Update Asset</h2>
                            <p class="text-sm text-slate-500 font-medium tracking-tight">Banner ID: #{{ $carousel->id }}</p>
                        </div>
                    </div>
                    <form id="delete-carousel-form-{{ $carousel->id }}" action="{{ route('carousels.destroy', $carousel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="delete-carousel-btn p-3 bg-rose-50 text-rose-500 rounded-xl hover:bg-rose-600 hover:text-white transition-all shadow-sm border border-rose-100" data-id="{{ $carousel->id }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </form>
                </div>

                <form action="{{ route('carousels.update', $carousel->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div class="space-y-4">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Current Preview</label>
                            <div class="aspect-[28/6] w-full rounded-[2rem] overflow-hidden border border-slate-200 relative group">
                                <img src="{{ asset('storage/' . $carousel->image) }}" alt="Current" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-slate-900/20 group-hover:opacity-0 transition-opacity"></div>
                            </div>
                        </div>

                        <div class="space-y-4 pt-4 border-t border-slate-50">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Swap Image (Optional)</label>
                            <div class="relative group">
                                <div class="w-full py-6 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center transition-all duration-300 group-hover:border-[#066c5f] group-hover:bg-[#066c5f]/5">
                                    <p class="text-xs font-black text-slate-400 group-hover:text-[#066c5f] uppercase tracking-widest">Select new 2800x600 px asset</p>
                                    <input type="file" name="image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 flex items-center justify-between gap-4">
                        <a href="{{ route('carousels.index') }}" class="px-8 py-4 text-slate-500 font-black uppercase tracking-widest text-xs hover:text-slate-900 transition-colors">Go Back</a>
                        <button type="submit" class="px-10 py-4 bg-[#066c5f] text-white rounded-2xl font-black uppercase tracking-[0.2em] shadow-lg shadow-[#066c5f]/30 hover:bg-[#F77F1E] hover:text-white transition-all duration-300">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-carousel-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-carousel-form-${id}`);
                    Swal.fire({
                        title: 'Delete this banner?',
                        text: "This action cannot be undone.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e11d48',
                        cancelButtonColor: '#64748b',
                        confirmButtonText: 'Yes, delete it!',
                        customClass: { popup: 'rounded-[2.5rem]', confirmButton: 'rounded-xl font-bold px-8 py-3', cancelButton: 'rounded-xl font-bold px-8 py-3' }
                    }).then((result) => { if (result.isConfirmed) form.submit(); });
                });
            });
        });
    </script>
</x-app-layout>
