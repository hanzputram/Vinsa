<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-screen min-h-[calc(100vh-66px)] p-6 bg-white space-y-4">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Tambah Produk</h2>

        <select name="category_id" id="categorySelect" required class="form-select rounded-xl">
            <option value=""> Pilih Kategori </option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <div id="category-extra" class="max-w-[90%] space-y-2 mt-2"></div>

        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Nama Produk</label>
            <input type="text" name="name" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Kode Produk</label>
            <input type="text" name="kode" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

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

        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Deskripsi</label>
            <textarea name="description" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Deskripsi Produk"></textarea>
        </div>

        <div class="max-w-[90%]" id="specifications">
            <label class="block text-gray-600 mb-1">Spesifikasi</label>
            <div class="flex gap-2 mb-2 spec-row">
                <input type="text" name="specifications[0][field_name]" placeholder="Nama Spesifikasi"
                    class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg spec-field">
                <input type="text" name="specifications[0][field_value]" placeholder="mm, Kg, °C ..."
                    class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg spec-value">
            </div>
        </div>

        <div class="">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
                Tambah Produk
            </button>
        </div>
    </form>

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
                    <input type="text" name="specifications[${specCount}][field_value]" placeholder="mm, Kg, °C ..."
                        class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg spec-value">
                `;
                specContainer.appendChild(div);
                addListenerToLastInput();
            }

            function addListenerToLastInput() {
                let lastField = document.querySelectorAll('.spec-field');
                let lastValue = document.querySelectorAll('.spec-value');
                let field = lastField[lastField.length - 1];
                let value = lastValue[lastValue.length - 1];

                function trigger(e) {
                    if (e.target.value.length > 0) {
                        field.removeEventListener("input", trigger);
                        value.removeEventListener("input", trigger);
                        addNewSpecificationRow();
                    }
                }

                field.addEventListener("input", trigger);
                value.addEventListener("input", trigger);
            }

            addListenerToLastInput();

            const categorySelect = document.getElementById('categorySelect');
            const extraContainer = document.getElementById('category-extra');

            categorySelect.addEventListener('change', function() {
                const selectedCategory = this.options[this.selectedIndex].text.toLowerCase();
                extraContainer.innerHTML = '';

                if (selectedCategory === 'cable tray') {
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">U & C Series</label>
                        <select name="uc_series"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            <option value="U Series">U Series</option>
                            <option value="C Series">C Series</option>
                        </select>
                    `;
                } else if (selectedCategory === 'push button') {
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Push Button</label>
                        <input type="text" name="push_button_type"
                            class="w-full px-4 py-2 border rounded-lg mb-2"
                            placeholder="Masukkan tipe push button">

                        <label class="block text-gray-600">Series</label>
                        <select name="push_button_series"
                            class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Series</option>
                            <option value="KB 5 Series">KB 5 Series</option>
                            <option value="KB 2 Series">KB 2 Series</option>
                        </select>
                    `;
                } else if (selectedCategory === 'illuminated push button') {
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Push Button</label>
                        <input type="text" name="push_button_type"
                            class="w-full px-4 py-2 border rounded-lg mb-2"
                            placeholder="Masukkan tipe push button">

                        <label class="block text-gray-600">Series</label>
                        <select name="push_button_series"
                            class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Series</option>
                            <option value="KB 5 Series">KB 5 Series</option>
                            <option value="KB 2 Series">KB 2 Series</option>
                        </select>
                    `;
                } else if (selectedCategory === 'emergency push button') {
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Push Button</label>
                        <input type="text" name="push_button_type"
                            class="w-full px-4 py-2 border rounded-lg mb-2"
                            placeholder="Masukkan tipe push button">

                        <label class="block text-gray-600">Series</label>
                        <select name="push_button_series"
                            class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Series</option>
                            <option value="KB 5 Series">KB 5 Series</option>
                            <option value="KB 2 Series">KB 2 Series</option>
                        </select>
                    `;
                } else if (selectedCategory === 'selector switch') {
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Selector Switch</label>
                        <input type="text" name="selector_switch_type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                            placeholder="Masukkan tipe selector switch">
                            <label class="block text-gray-600">Series</label>
                        <select name="selector_switch_series
                        "
                            class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Series</option>
                            <option value="KB 5 Series">KB 5 Series</option>
                            <option value="KB 2 Series">KB 2 Series</option>
                        </select>
                    `;
                } else if (selectedCategory === 'pilot lamp') {
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Pilot Lamp</label>
                        <input type="text" name="pilot_lamp_type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                            placeholder="Masukkan tipe pilot lamp">
                    `;
                } else if (selectedCategory === 'accessories') {
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Accessories</label>
                        <input type="text" name="accessories_type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                            placeholder="Masukkan tipe accessories">
                    `;
                }
            });
        });
    </script>
</x-app-layout>
