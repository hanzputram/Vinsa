<x-app-layout>
    <div class="mx-auto p-6">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">Update Blog</h1>
            <a href="{{ route('blog.index') }}" class="px-4 py-2 rounded-xl border">Kembali</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 rounded-xl bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 rounded-xl bg-red-100 text-red-800">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM UPDATE --}}
        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">Judul Blog</label>
                <input type="text" name="title" value="{{ old('title', $blog->title) }}" required
                       class="w-full rounded-xl border-gray-300 focus:border-gray-400 focus:ring-0">
            </div>

            {{-- Gambar utama --}}
            <div class="space-y-3">
                <label class="block text-sm text-gray-600">Gambar Utama</label>

                @if($blog->image)
                    <div class="flex items-start gap-4">
                        <img src="{{ asset('storage/'.$blog->image) }}"
                             alt="{{ $blog->title }}"
                             class="w-56 rounded-border">
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">Gambar saat ini</p>
                            <label class="inline-flex items-center gap-2 text-sm">
                                <input type="checkbox" name="remove_image" value="1" class="rounded border-gray-300">
                                Hapus gambar utama
                            </label>
                        </div>
                    </div>
                @endif

                <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp"
                       class="w-full rounded-xl border-gray-300">
                <p class="text-xs text-gray-500">Upload gambar baru untuk mengganti gambar utama.</p>
            </div>

            {{-- Konten utama --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">Konten Utama</label>
                <textarea id="content" name="content">{!! old('content', $blog->content) !!}</textarea>
            </div>

            {{-- Publish (FIX: selalu kirim 0 kalau tidak dicentang) --}}
            <div class="flex items-center gap-2">
                <input type="hidden" name="is_published" value="0">

                <input type="checkbox" id="is_published" name="is_published" value="1"
                       class="rounded border-gray-300"
                       {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>

                <label for="is_published" class="text-sm text-gray-700">Publish</label>

                @if($blog->published_at)
                    <span class="text-xs text-gray-500">
                        Published at: {{ $blog->published_at->format('d-m-Y H:i') }}
                    </span>
                @endif
            </div>

            <hr>

            {{-- Sections --}}
            <div>
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-lg font-semibold">Section</h2>
                    <button type="button" id="addSection"
                            class="px-3 py-1 rounded-lg bg-black text-white text-sm">
                        + Tambah Section
                    </button>
                </div>

                <div id="sectionsWrapper" class="space-y-6">

                    @php $startIndex = 0; @endphp

                    @foreach($blog->sections as $i => $section)
                        <div class="section-card p-4 border rounded-2xl bg-gray-50 relative"
                             data-section-index="{{ $startIndex }}">

                            <button type="button"
                                class="absolute top-2 right-2 text-red-600 text-sm"
                                onclick="markDeleteSection(this)">
                                Hapus
                            </button>

                            <input type="hidden" name="sections[{{ $startIndex }}][id]" value="{{ $section->id }}">
                            <input type="hidden" class="delete-flag" name="sections[{{ $startIndex }}][_delete]" value="0">
                            <input type="hidden" name="sections[{{ $startIndex }}][position]" value="{{ $section->position ?? $i }}">

                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Sub Judul</label>
                                    <input type="text" name="sections[{{ $startIndex }}][subtitle]"
                                           value="{{ old("sections.$startIndex.subtitle", $section->subtitle) }}"
                                           class="w-full rounded-xl border-gray-300">
                                </div>

                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Isi Section</label>
                                    <textarea name="sections[{{ $startIndex }}][content]" rows="4"
                                              class="w-full rounded-xl border-gray-300">{{ old("sections.$startIndex.content", $section->content) }}</textarea>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm text-gray-600">Gambar Section</label>

                                    @if($section->image)
                                        <div class="flex items-start gap-4">
                                            <img src="{{ asset('storage/'.$section->image) }}"
                                                 class="w-48 rounded-xl border"
                                                 alt="Section image">
                                            <label class="inline-flex items-center gap-2 text-sm">
                                                <input type="checkbox" name="sections[{{ $startIndex }}][remove_image]" value="1"
                                                       class="rounded border-gray-300">
                                                Hapus gambar section
                                            </label>
                                        </div>
                                    @endif

                                    <input type="file" name="sections[{{ $startIndex }}][image]"
                                           accept=".jpg,.jpeg,.png,.webp"
                                           class="w-full rounded-xl border-gray-300">
                                    <p class="text-xs text-gray-500">Upload gambar baru untuk mengganti gambar section.</p>
                                </div>
                            </div>
                        </div>

                        @php $startIndex++; @endphp
                    @endforeach

                </div>
            </div>

            <hr>

            {{-- Tombol update + delete (FIX: no nested form) --}}
            <div class="flex items-center justify-between">
                <button type="submit" class="px-5 py-2 rounded-xl bg-black text-white">
                    Update Blog
                </button>

                <button type="button"
                    onclick="if(confirm('Yakin hapus blog ini?')) document.getElementById('deleteBlogForm').submit();"
                    class="px-5 py-2 rounded-xl border border-red-600 text-red-600">
                    Hapus Blog
                </button>
            </div>

        </form>

        {{-- FORM DELETE (di luar form update) --}}
        <form id="deleteBlogForm" action="{{ route('blog.destroy', $blog->id) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>

    {{-- TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/dcolkzxvp2hqqbnwtk2bo4utnxtiraex0wcohpee9povnm2p/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            tinymce.init({
                selector: '#content',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                height: 450,
                branding: false,
            });

            let sectionIndex = {{ $startIndex ?? 0 }};
            const wrapper = document.getElementById('sectionsWrapper');
            const addBtn = document.getElementById('addSection');

            addBtn.addEventListener('click', () => addSection());

            window.markDeleteSection = function(btn) {
                const card = btn.closest('.section-card');
                const flag = card.querySelector('.delete-flag');

                flag.value = "1";
                card.style.opacity = "0.5";
                card.style.filter = "grayscale(1)";
                card.style.pointerEvents = "none";

                const badge = document.createElement('div');
                badge.className = "mt-2 text-xs text-red-600 font-semibold";
                badge.innerText = "Section akan dihapus saat disimpan.";
                card.appendChild(badge);
            }

            function addSection() {
                const idx = sectionIndex++;

                const html = `
                <div class="section-card p-4 border rounded-2xl bg-gray-50 relative">
                    <button type="button"
                        class="absolute top-2 right-2 text-red-600 text-sm"
                        onclick="this.closest('.section-card').remove()">
                        ✕
                    </button>

                    <input type="hidden" name="sections[${idx}][position]" value="${idx}">

                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Sub Judul</label>
                            <input type="text" name="sections[${idx}][subtitle]"
                                class="w-full rounded-xl border-gray-300">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Isi Section</label>
                            <textarea name="sections[${idx}][content]" rows="4"
                                class="w-full rounded-xl border-gray-300"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Gambar Section</label>
                            <input type="file" name="sections[${idx}][image]"
                                accept=".jpg,.jpeg,.png,.webp"
                                class="w-full rounded-xl border-gray-300">
                        </div>
                    </div>
                </div>
                `;

                wrapper.insertAdjacentHTML('beforeend', html);
            }
        });
    </script>
</x-app-layout>
