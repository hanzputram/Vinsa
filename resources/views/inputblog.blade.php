<x-app-layout>
    <div class="p-6 md:p-10">
        <div class="max-w-5xl mx-auto">
            
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight">Draft New Article</h1>
                    <p class="text-slate-500 font-medium tracking-tight italic">"Writing is the painting of the voice."</p>
                </div>
                <a href="{{ route('blog.index') }}" class="group inline-flex items-center gap-2 text-slate-500 hover:text-[#066c5f] font-bold transition-all underline decoration-2 decoration-slate-200 underline-offset-4">
                    Back to Editorial
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-10 p-6 rounded-[2rem] bg-rose-50 border border-rose-100 text-rose-800">
                    <p class="font-black uppercase tracking-widest text-xs mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Corrections Required
                    </p>
                    <ul class="list-disc ml-5 text-sm font-medium space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    
                    <!-- Left Column: Content -->
                    <div class="lg:col-span-2 space-y-10">
                        <!-- Main Info -->
                        <div class="bg-white rounded-[2.5rem] p-8 md:p-10 border border-slate-200 shadow-sm space-y-8">
                            <div class="space-y-2">
                                <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Article Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" required
                                       class="w-full px-6 py-4 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-black text-xl italic"
                                       placeholder="Enter a compelling title...">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Lead Content</label>
                                <div class="rounded-[2rem] overflow-hidden border border-slate-100 shadow-inner">
                                    <textarea id="content" name="content">{{ old('content') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Sections Wrapper -->
                        <div class="space-y-6">
                            <div class="flex items-center justify-between pl-4">
                                <h2 class="text-xl font-black text-slate-900 tracking-tight">Additional Sections</h2>
                                <button type="button" id="addSection" class="px-6 py-2 bg-[#066c5f]/5 text-[#066c5f] rounded-xl font-black text-xs uppercase tracking-widest hover:bg-[#066c5f] hover:text-white transition-all shadow-sm border border-[#066c5f]/10">+ Add Block</button>
                            </div>
                            <div id="sectionsWrapper" class="space-y-6"></div>
                        </div>
                    </div>

                    <!-- Right Column: Settings -->
                    <div class="space-y-8">
                        <!-- Cover Image -->
                        <div class="bg-white rounded-[2.5rem] p-8 border border-slate-200 shadow-sm space-y-6">
                            <h3 class="text-lg font-black text-slate-900">Featured Image</h3>
                            <div class="space-y-4">
                                <div class="relative group aspect-video bg-slate-50 rounded-[1.5rem] border-2 border-dashed border-slate-200 flex flex-col items-center justify-center p-6 hover:border-[#066c5f] hover:bg-[#066c5f]/5 transition-all cursor-pointer">
                                    <svg class="w-8 h-8 text-slate-300 group-hover:text-[#066c5f] mb-2 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    <p class="text-[10px] font-black text-slate-400 group-hover:text-[#066c5f] uppercase tracking-widest text-center">Thumbnail (JPG/PNG)</p>
                                    <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" class="absolute inset-0 opacity-0 cursor-pointer">
                                </div>
                            </div>
                        </div>

                        <!-- Publishing -->
                        <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-2xl shadow-slate-200 space-y-6">
                            <h3 class="text-lg font-black text-white">Status & Visibility</h3>
                            <div class="flex items-center gap-4 p-4 bg-white/5 rounded-2xl border border-white/10 group cursor-pointer" onclick="document.getElementById('is_published').click()">
                                <div class="relative">
                                    <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="sr-only peer">
                                    <div class="w-12 h-6 bg-slate-700 rounded-full peer peer-checked:bg-emerald-500 transition-colors after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-6"></div>
                                </div>
                                <label for="is_published" class="text-sm font-bold text-slate-300 cursor-pointer">Publish Immediately</label>
                            </div>

                            <button type="submit" class="w-full py-5 bg-[#066c5f] text-white rounded-[1.5rem] font-black uppercase tracking-[0.2em] shadow-lg shadow-[#066c5f]/30 hover:bg-[#F77F1E] hover:text-white transition-all flex items-center justify-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                                Post Article
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/dcolkzxvp2hqqbnwtk2bo4utnxtiraex0wcohpee9povnm2p/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            tinymce.init({
                selector: '#content',
                plugins: 'autolink charmap emoticons image link lists media table visualblocks wordcount',
                toolbar: 'undo redo | blocks | bold italic underline | link image | align numlist bullist | removeformat',
                height: 500,
                skin: 'oxide',
                content_css: 'default',
                branding: false,
                promotion: false,
                border: 0,
                content_style: 'body { font-family: Outfit, sans-serif; font-size: 16px; color: #334155; line-height: 1.6; padding: 20px; }'
            });

            let sectionIndex = 0;
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
                                <input type="file" name="sections[${idx}][image]" accept=".jpg,.jpeg,.png,.webp" 
                                       class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-slate-900 file:text-white hover:file:bg-[#066c5f] transition-all cursor-pointer">
                            </div>
                        </div>
                    </div>
                `;
                wrapper.insertAdjacentHTML('beforeend', html);
            });
        });
    </script>
</x-app-layout>
