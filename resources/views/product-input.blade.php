<x-app-layout>
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-screen min-h-[calc(100vh-66px)] p-6 bg-white space-y-4">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Tambah Produk</h2>

        {{-- Nama Produk --}}
        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Nama Produk</label>
            <input type="text" name="name" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Kode --}}
        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Kode Produk</label>
            <input type="text" name="kode" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Gambar --}}
        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Gambar</label>
            <p class="text-sm text-red-500 mt-1">*Wajib menggunakan dimensi 8:11</p>
            <input type="file" name="image" required
                class="block w-full file:cursor-pointer text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
            file:rounded-lg file:border-0
            file:text-sm file:font-semibold
            file:bg-blue-50 file:text-blue-700
            hover:file:bg-blue-100">
        </div>

        <h2 class="border-t-[1.5px] py-4 text-2xl font-semibold text-gray-700 mb-4">Tambah Spesifikasi</h2>

        {{-- Deskripsi --}}
        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Deskripsi</label>
            <textarea name="description" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Deskripsi Produk"></textarea>
        </div>

        {{-- Spesifikasi Produk --}}
        <div class="max-w-[90%]" id="specifications">
            <label class="block text-gray-600 mb-1">Spesifikasi</label>
            <div class="flex gap-2 mb-2 spec-row">
                <input type="text" name="specifications[0][field_name]" placeholder="Nama Spesifikasi"
                    class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg spec-field">
                <input type="text" name="specifications[0][field_value]" placeholder="Nilai"
                    class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg spec-value">
            </div>
        </div>

        {{-- Tombol Submit --}}
        <div class="">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
                Tambah Produk
            </button>
        </div>
    </form>

    {{-- SweetAlert2 Error Handler --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan Produk',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif

    {{-- SweetAlert2 Success Handler --}}
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

    {{-- Dynamic Spesifikasi --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let specContainer = document.getElementById('specifications');

            function addNewSpecificationRow() {
                let specCount = document.querySelectorAll('.spec-row').length;
                let div = document.createElement('div');
                div.classList.add('flex', 'gap-2', 'mb-2', 'spec-row');
                div.innerHTML = `
                    <input type="text" name="specifications[${specCount}][field_name]" placeholder="Nama Spesifikasi" 
                        class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg spec-field">
                    <input type="text" name="specifications[${specCount}][field_value]" placeholder="Nilai" 
                        class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg spec-value">
                `;
                specContainer.appendChild(div);
                addListenerToLastInput();
            }

            function addListenerToLastInput() {
                let lastFieldInput = document.querySelectorAll('.spec-field');
                let lastValueInput = document.querySelectorAll('.spec-value');
                let lastField = lastFieldInput[lastFieldInput.length - 1];
                let lastValue = lastValueInput[lastValueInput.length - 1];

                function checkAndAddRow(e) {
                    if (e.target.value.length > 0) {
                        lastField.removeEventListener("input", checkAndAddRow);
                        lastValue.removeEventListener("input", checkAndAddRow);
                        addNewSpecificationRow();
                    }
                }

                lastField.addEventListener("input", checkAndAddRow);
                lastValue.addEventListener("input", checkAndAddRow);
            }

            addListenerToLastInput();
        });
    </script>
</x-app-layout>
