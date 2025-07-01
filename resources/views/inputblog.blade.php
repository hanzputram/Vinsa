<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-screen min-h-[calc(100vh-66px)] p-6 bg-white space-y-4">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Tambah Artikel Blog</h2>

        {{-- Gambar --}}
        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Gambar untuk Artikel</label>
            <input type="file" name="image" required
                class="block w-full file:cursor-pointer text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100">
        </div>

        {{-- Judul --}}
        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Judul Artikel</label>
            <input type="text" name="title" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Section Dinamis --}}
        <h2 class="border-t-[1.5px] py-4 text-2xl font-semibold text-gray-700 mb-4">Sub Judul & Isi</h2>

        <div id="blog-sections" class="space-y-4">
            <div class="section-row space-y-2">
                <div>
                    <label class="block text-gray-600">Sub Judul</label>
                    <input type="text" name="sections[0][subtitle]" placeholder="Sub Judul"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-600">Isi</label>
                    <input type="text" name="sections[0][content]" placeholder="Isi Konten"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-600">Gambar (opsional)</label>
                    <input type="file" name="sections[0][image]"
                        class="block w-full file:cursor-pointer text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                       file:rounded-lg file:border-0
                       file:text-sm file:font-semibold
                       file:bg-blue-50 file:text-blue-700
                       hover:file:bg-blue-100">
                </div>

                <hr class="mt-4 border-gray-300">
            </div>
        </div>



        </div>


        <button type="submit"
            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
            Simpan Artikel
        </button>
    </form>

    {{-- SweetAlert --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan Artikel',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif

    {{-- Script untuk section dinamis --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let sectionContainer = document.getElementById("blog-sections");

            function addNewSectionRow() {
                let index = document.querySelectorAll(".section-row").length;
                let div = document.createElement("div");
                div.classList.add("section-row", "space-y-2", "mt-4");
                div.innerHTML = `
                <div>
                    <label class="block text-gray-600">Sub Judul</label>
                    <input type="text" name="sections[${index}][subtitle]" placeholder="Sub Judul"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-gray-600">Isi</label>
                    <input type="text" name="sections[${index}][content]" placeholder="Isi Konten"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-gray-600">Gambar (opsional)</label>
                    <input type="file" name="sections[${index}][image]"
                        class="block w-full file:cursor-pointer text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                               file:rounded-lg file:border-0
                               file:text-sm file:font-semibold
                               file:bg-blue-50 file:text-blue-700
                               hover:file:bg-blue-100">
                </div>
                <hr class="mt-4 border-gray-300">
            `;
                sectionContainer.appendChild(div);
                addInputListenersToLast();
            }

            function addInputListenersToLast() {
                let sections = sectionContainer.querySelectorAll(".section-row");
                let lastInputs = sections[sections.length - 1].querySelectorAll("input[type='text']");

                function triggerAdd(e) {
                    if (lastInputs[0].value !== "" || lastInputs[1].value !== "") {
                        lastInputs[0].removeEventListener("input", triggerAdd);
                        lastInputs[1].removeEventListener("input", triggerAdd);
                        addNewSectionRow();
                    }
                }

                lastInputs[0].addEventListener("input", triggerAdd);
                lastInputs[1].addEventListener("input", triggerAdd);
            }

            addInputListenersToLast();
        });
    </script>

</x-app-layout>
