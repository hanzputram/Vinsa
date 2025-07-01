<x-app-layout>
    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data"
        class="p-6 space-y-6 bg-white rounded-xl">
        @csrf
        @method('PUT')

        <h2 class="text-xl font-bold">Edit Blog</h2>

        <div>
            <label class="block font-medium text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ $blog->title }}" required
                class="w-full border rounded-lg px-4 py-2">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Gambar</label>
            <input type="file" name="image"
                class="w-full border rounded-lg px-4 py-2">
            @if ($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="w-32 mt-2 rounded-lg">
            @endif
        </div>

        <h3 class="text-lg font-semibold border-b pb-2">Sub Judul & Isi</h3>
        <div id="section-container" class="space-y-4">
            @foreach ($blog->sections as $index => $section)
                <div class="flex flex-col gap-2 section-block">
                    <input type="text" name="sections[{{ $index }}][subtitle]" value="{{ $section->subtitle }}"
                        placeholder="Sub Judul" class="w-full border rounded px-4 py-2">
                    <input type="text" name="sections[{{ $index }}][content]" value="{{ $section->content }}"
                        placeholder="Isi Konten" class="w-full border rounded px-4 py-2">
                </div>
            @endforeach
        </div>

        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan Perubahan</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sectionContainer = document.getElementById('section-container');

            function addSectionRow(index) {
                const wrapper = document.createElement('div');
                wrapper.classList.add('flex', 'flex-col', 'gap-2', 'section-block');
                wrapper.innerHTML = `
                    <input type="text" name="sections[${index}][subtitle]" placeholder="Sub Judul"
                        class="w-full border rounded px-4 py-2">
                    <input type="text" name="sections[${index}][content]" placeholder="Isi Konten"
                        class="w-full border rounded px-4 py-2">
                `;
                sectionContainer.appendChild(wrapper);
                addInputListeners();
            }

            function addInputListeners() {
                const lastBlocks = sectionContainer.querySelectorAll('.section-block');
                const last = lastBlocks[lastBlocks.length - 1];
                const inputs = last.querySelectorAll('input');

                function listener(e) {
                    if (inputs[0].value.length > 0 || inputs[1].value.length > 0) {
                        inputs[0].removeEventListener('input', listener);
                        inputs[1].removeEventListener('input', listener);
                        addSectionRow(lastBlocks.length);
                    }
                }

                inputs[0].addEventListener('input', listener);
                inputs[1].addEventListener('input', listener);
            }

            addInputListeners();
        });
    </script>
</x-app-layout>
