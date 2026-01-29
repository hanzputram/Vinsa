<x-app-layout>
    <div x-data="{ search: '' }" class="p-6 md:p-10 space-y-10">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Editorial Hub</h1>
                <p class="text-slate-500 font-medium tracking-tight">Manage your blog posts and articles</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400 group-focus-within:text-[#066c5f] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                    <input type="text" x-model="search" placeholder="Search articles..."
                        class="w-full md:w-64 pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-[#066c5f] focus:border-transparent font-semibold shadow-sm transition-all outline-none" />
                </div>
                <a href="{{ route('blog.create') }}" class="inline-flex items-center gap-2 bg-[#066c5f] text-white px-6 py-3 rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg shadow-[#066c5f]/30 hover:bg-[#088a7a] transition-all active:scale-95">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
                    Write Post
                </a>
            </div>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach ($blogs as $blog)
                @php
                    $previewHtml = $blog->content ?? optional($blog->sections->first())->content ?? '';
                    $previewText = \Illuminate\Support\Str::limit(strip_tags($previewHtml), 120);
                @endphp
                <div x-show="{{ json_encode(Str::lower($blog->title . ' ' . $previewText)) }}.includes(search.toLowerCase())"
                    class="group relative bg-white rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden flex flex-col">
                    
                    <!-- Image Area -->
                    <div class="aspect-video relative overflow-hidden bg-slate-100">
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-50 text-slate-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                        @endif
                        
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4">
                            @if($blog->is_published)
                                <span class="px-4 py-1.5 bg-emerald-500 text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg shadow-emerald-500/30">Published</span>
                            @else
                                <span class="px-4 py-1.5 bg-[#F77F1E] text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg shadow-[#F77F1E]/30">Draft</span>
                            @endif
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-[10px] font-black text-[#066c5f] uppercase tracking-[0.2em] mb-3">{{ $blog->created_at->format('M d, Y') }}</p>
                        <h2 class="text-xl font-black text-slate-900 leading-tight mb-4 group-hover:text-[#066c5f] transition-colors line-clamp-2 italic">
                            {{ $blog->title }}
                        </h2>
                        <p class="text-slate-500 text-sm font-medium leading-relaxed mb-6 line-clamp-3">
                            {{ $previewText }}
                        </p>

                        <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                            <div class="flex gap-2">
                                <a href="{{ route('blog.edit', $blog->id) }}" class="p-2.5 bg-slate-50 text-slate-600 rounded-xl hover:bg-[#066c5f] hover:text-white transition-all shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </a>
                                <button type="button" class="p-2.5 bg-slate-50 text-slate-600 rounded-xl hover:bg-rose-600 hover:text-white transition-all shadow-sm delete-blog" data-id="{{ $blog->id }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                                <form id="delete-form-{{ $blog->id }}" action="{{ route('blog.destroy', $blog->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                            <a href="{{ route('blog.public', $blog->slug) }}" target="_blank" class="text-xs font-black text-slate-400 hover:text-[#066c5f] uppercase tracking-widest flex items-center gap-1 transition-colors">
                                View Live <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(method_exists($blogs, 'links'))
            <div class="mt-10">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-blog').forEach(button => {
            button.addEventListener('click', function() {
                const blogId = this.dataset.id;
                Swal.fire({
                    title: 'Delete this article?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e11d48',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete it!',
                    customClass: {
                        popup: 'rounded-[2.5rem]',
                        confirmButton: 'rounded-xl font-bold px-8 py-3',
                        cancelButton: 'rounded-xl font-bold px-8 py-3'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + blogId).submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
