<x-app-layout>
    <div class="mx-auto p-6">

        <h1 class="text-2xl font-semibold mb-6">Tambah Blog</h1>

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

        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Judul --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">Judul Blog</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                       class="w-full rounded-xl border-gray-300 focus:border-gray-400 focus:ring-0">
            </div>

            {{-- Gambar utama --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">Gambar Utama</label>
                <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp"
                       class="w-full rounded-xl border-gray-300">
            </div>

            {{-- Konten utama --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">Konten Utama</label>
                <textarea id="content" name="content">{{ old('content') }}</textarea>
            </div>

            {{-- Publish --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_published" name="is_published" value="1"
                       class="rounded border-gray-300" {{ old('is_published') ? 'checked' : '' }}>
                <label for="is_published" class="text-sm text-gray-700">Publish</label>
            </div>

            {{-- Submit --}}
            <div class="flex gap-2">
                <button type="submit"
                        class="px-5 py-2 rounded-xl bg-black text-white">
                    Simpan Blog
                </button>
                <a href="{{ route('blog.index') }}"
                   class="px-5 py-2 rounded-xl border">
                    Batal
                </a>
            </div>

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

            let sectionIndex = 0;

            const wrapper = document.getElementById('sectionsWrapper');
            const addBtn = document.getElementById('addSection');

            addBtn.addEventListener('click', () => addSection());

            function addSection() {
                const idx = sectionIndex++;

                const html = `
                <div class="p-4 border rounded-2xl relative bg-gray-50">
                    <button type="button"
                        class="absolute top-2 right-2 text-red-600 text-sm"
                        onclick="this.closest('.section-item').remove()">
                        ✕
                    </button>

                    <div class="section-item space-y-3">
                        <input type="hidden" name="sections[${idx}][position]" value="${idx}">

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
