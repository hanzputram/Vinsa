<x-app-layout>
    <div class="p-6 md:p-10">
        <div class="max-w-5xl mx-auto">
            
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight">Refine Article</h1>
                    <p class="text-slate-500 font-medium tracking-tight">Editing: <span class="text-[#066c5f] italic">"{{ $blog->title }}"</span></p>
                </div>
                <div class="flex items-center gap-4">
                    <button type="button" onclick="confirmDeleteBlog()" class="px-6 py-2.5 bg-rose-50 text-rose-600 rounded-xl font-bold text-sm hover:bg-rose-600 hover:text-white transition-all border border-rose-100">
                        Delete Post
                    </button>
                    <a href="{{ route('blog.index') }}" class="group inline-flex items-center gap-2 text-slate-500 hover:text-[#066c5f] font-bold transition-all underline decoration-2 decoration-slate-200 underline-offset-4">
                        Back
                    </a>
                </div>
            </div>

            @if ($errors->any())
                <div class="mb-10 p-6 rounded-[2rem] bg-rose-50 border border-rose-100 text-rose-800">
                    <p class="font-black uppercase tracking-widest text-xs mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Update Blocked
                    </p>
                    <ul class="list-disc ml-5 text-sm font-medium space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    
                    <!-- Left Column: Content -->
                    <div class="lg:col-span-2 space-y-10">
                        <!-- Main Info -->
                        <div class="bg-white rounded-[2.5rem] p-8 md:p-10 border border-slate-200 shadow-sm space-y-8">
                            <div class="space-y-2">
                                <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Article Title</label>
                                <input type="text" name="title" value="{{ old('title', $blog->title) }}" required
                                       class="w-full px-6 py-4 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-black text-xl italic"
                                       placeholder="Enter a compelling title...">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Lead Content</label>
                                <div class="rounded-[2rem] overflow-hidden border border-slate-100 shadow-inner">
                                    <textarea id="content" name="content">{!! old('content', $blog->content) !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Sections Wrapper -->
                        <div class="space-y-6">
                            <div class="flex items-center justify-between pl-4">
                                <h2 class="text-xl font-black text-slate-900 tracking-tight">Article Structure</h2>
                                <button type="button" id="addSection" class="px-6 py-2 bg-[#066c5f]/5 text-[#066c5f] rounded-xl font-black text-xs uppercase tracking-widest hover:bg-[#066c5f] hover:text-white transition-all shadow-sm border border-[#066c5f]/10">+ Add Block</button>
                            </div>
                            <div id="sectionsWrapper" class="space-y-6">
                                @php $startIndex = 0; @endphp
                                @foreach($blog->sections as $i => $section)
                                    <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm relative section-card transition-all duration-500">
                                        <button type="button" class="absolute top-6 right-6 p-2 text-rose-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all" onclick="markDeleteSection(this)">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                        
                                        <div class="space-y-6">
                                            <input type="hidden" name="sections[{{ $startIndex }}][id]" value="{{ $section->id }}">
                                            <input type="hidden" class="delete-flag" name="sections[{{ $startIndex }}][_delete]" value="0">
                                            <input type="hidden" name="sections[{{ $startIndex }}][position]" value="{{ $section->position ?? $i }}">

                                            <div class="space-y-2 pr-10">
                                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest pl-1">Sub-Heading</label>
                                                <input type="text" name="sections[{{ $startIndex }}][subtitle]" 
                                                       value="{{ old("sections.$startIndex.subtitle", $section->subtitle) }}" 
                                                       class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold">
                                            </div>
                                            <div class="space-y-2">
                                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest pl-1">Section Content</label>
                                                <textarea name="sections[{{ $startIndex }}][content]" rows="5" 
                                                          class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-medium">{{ old("sections.$startIndex.content", $section->content) }}</textarea>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-50">
                                                @if($section->image)
                                                    <div class="space-y-2">
                                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest pl-1">Current Section Image</label>
                                                        <div class="relative group aspect-video rounded-xl overflow-hidden border border-slate-100">
                                                            <img src="{{ asset('storage/'.$section->image) }}" class="w-full h-full object-cover">
                                                            <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-slate-900/60 to-transparent">
                                                                <label class="flex items-center gap-2 text-[10px] font-black text-white uppercase tracking-widest cursor-pointer">
                                                                    <input type="checkbox" name="sections[{{ $startIndex }}][remove_image]" value="1" class="rounded border-0 focus:ring-0 text-rose-500">
                                                                    <span>Mark for extraction</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="space-y-2">
                                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest pl-1">Swap Image</label>
                                                    <input type="file" name="sections[{{ $startIndex }}][image]" accept=".jpg,.jpeg,.png,.webp" 
                                                           class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-slate-900 file:text-white hover:file:bg-[#066c5f] transition-all cursor-pointer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php $startIndex++; @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Settings -->
                    <div class="space-y-8">
                        <!-- Cover Image -->
                        <div class="bg-white rounded-[2.5rem] p-8 border border-slate-200 shadow-sm space-y-6">
                            <h3 class="text-lg font-black text-slate-900">Featured Image</h3>
                            <div class="space-y-6">
                                @if($blog->image)
                                    <div class="space-y-2">
                                        <div class="aspect-video relative rounded-2xl overflow-hidden group shadow-lg">
                                            <img src="{{ asset('storage/'.$blog->image) }}" alt="Preview" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                            <div class="absolute inset-0 bg-slate-900/10 group-hover:opacity-0 transition-opacity"></div>
                                        </div>
                                        <label class="inline-flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-widest cursor-pointer pl-1 hover:text-rose-500 transition-colors">
                                            <input type="checkbox" name="remove_image" value="1" class="rounded border-slate-300 text-rose-500">
                                            Remove Primary Image
                                        </label>
                                    </div>
                                @endif
                                <div class="relative group">
                                    <div class="w-full py-4 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center transition-all duration-300 group-hover:border-[#066c5f] group-hover:bg-[#066c5f]/5">
                                        <p class="text-[10px] font-black text-slate-400 group-hover:text-[#066c5f] uppercase tracking-widest">Upload New Thumbnail</p>
                                        <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" class="absolute inset-0 opacity-0 cursor-pointer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Publishing -->
                        <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-2xl shadow-slate-200 space-y-6">
                            <h3 class="text-lg font-black text-white">Status & Visibility</h3>
                            <div class="space-y-4">
                                <div class="flex items-center gap-4 p-4 bg-white/5 rounded-2xl border border-white/10 group cursor-pointer" onclick="document.getElementById('is_published').click()">
                                    <div class="relative">
                                        <input type="hidden" name="is_published" value="0">
                                        <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }} class="sr-only peer">
                                        <div class="w-12 h-6 bg-slate-700 rounded-full peer peer-checked:bg-emerald-500 transition-colors after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-6"></div>
                                    </div>
                                    <label class="text-sm font-bold text-slate-300 cursor-pointer">Public Visibility</label>
                                </div>
                                @if($blog->published_at)
                                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest pl-1">Launched: {{ $blog->published_at->format('M d, Y') }}</p>
                                @endif
                            </div>

                            <button type="submit" class="w-full py-5 bg-[#066c5f] text-white rounded-[1.5rem] font-black uppercase tracking-[0.2em] shadow-lg shadow-[#066c5f]/30 hover:bg-[#F77F1E] hover:text-white transition-all flex items-center justify-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                                Sync Updates
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <form id="deleteBlogForm" action="{{ route('blog.destroy', $blog->id) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/dcolkzxvp2hqqbnwtk2bo4utnxtiraex0wcohpee9povnm2p/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            tinymce.init({
                selector: '#content',
                plugins: 'autolink charmap emoticons image link lists media table visualblocks wordcount',
                toolbar: 'undo redo | blocks | bold italic underline | link image | align numlist bullist | removeformat',
                height: 500,
                skin: 'oxide',
                branding: false,
                promotion: false,
                content_style: 'body { font-family: Outfit, sans-serif; font-size: 16px; color: #334155; line-height: 1.6; padding: 20px; }'
            });

            let sectionIndex = {{ $startIndex ?? 0 }};
            const wrapper = document.getElementById('sectionsWrapper');
            const addBtn = document.getElementById('addSection');

            addBtn.addEventListener('click', () => {
                const idx = sectionIndex++;
                const html = `
                    <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm relative animate-in fade-in slide-in-from-top-4 duration-500">
                        <button type="button" class="absolute top-6 right-6 p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition-colors" onclick="this.closest('.bg-white').remove()">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                        <div class="space-y-6">
                            <input type="hidden" name="sections[${idx}][position]" value="${idx}">
                            <div class="space-y-2 pr-10">
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest pl-1">Sub-Heading</label>
                                <input type="text" name="sections[${idx}][subtitle]" class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold" placeholder="Section title...">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest pl-1">Section Content</label>
                                <textarea name="sections[${idx}][content]" rows="5" class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-medium" placeholder="Draft your content here..."></textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest pl-1">Supporting Image</label>
                                <input type="file" name="sections[${idx}][image]" accept=".jpg,.jpeg,.png,.webp" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-slate-900 file:text-white hover:file:bg-[#066c5f] transition-all cursor-pointer">
                            </div>
                        </div>
                    </div>
                `;
                wrapper.insertAdjacentHTML('beforeend', html);
            });

            window.markDeleteSection = function(btn) {
                const card = btn.closest('.section-card');
                const flag = card.querySelector('.delete-flag');
                flag.value = "1";
                card.classList.add('opacity-40', 'grayscale', 'pointer-events-none', 'scale-95');
                const badge = document.createElement('div');
                badge.className = "absolute inset-0 flex items-center justify-center z-10";
                badge.innerHTML = '<span class="px-4 py-2 bg-rose-500 text-white font-black text-xs uppercase tracking-[0.2em] rounded-full shadow-lg">Targeted for deletion</span>';
                card.appendChild(badge);
            }

            window.confirmDeleteBlog = function() {
                Swal.fire({
                    title: 'Delete this article?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e11d48',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete it!',
                    customClass: { popup: 'rounded-[2.5rem]', confirmButton: 'rounded-xl font-bold px-8 py-3', cancelButton: 'rounded-xl font-bold px-8 py-3' }
                }).then((result) => { if (result.isConfirmed) document.getElementById('deleteBlogForm').submit(); });
            }
        });
    </script>
</x-app-layout>
