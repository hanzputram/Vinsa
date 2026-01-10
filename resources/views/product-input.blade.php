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
            <input type="text" name="name" required value="{{ old('name') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Kode Produk</label>
            <input type="text" name="kode" required value="{{ old('kode') }}"
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
                placeholder="Deskripsi Produk">{{ old('description') }}</textarea>
        </div>

        {{-- ✅ SEO META INPUT (DITAMBAHKAN) --}}
        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Meta Title</label>
            <p class="text-sm text-gray-500 mt-1">Disarankan 50–60 karakter. Kosongkan jika ingin otomatis dari Nama
                Produk.</p>
            <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                maxlength="255" placeholder="Contoh: Jual MCB Schneider iC60H 2A 1P | ATS Tekno">
        </div>

        <div class="max-w-[90%]">
            <label class="block text-gray-600 mb-1">Meta Description</label>
            <p class="text-sm text-gray-500 mt-1">Disarankan 140–155 karakter. Kosongkan jika ingin otomatis dari
                Deskripsi.</p>
            <textarea name="meta_description" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                maxlength="500" placeholder="Ringkasan singkat produk untuk hasil pencarian Google...">{{ old('meta_description') }}</textarea>
        </div>
        {{-- ✅ END SEO META INPUT --}}

        <div class="max-w-[90%]" id="specifications">
            <label class="block text-gray-600 mb-1">Spesifikasi</label>
            <div class="flex gap-2 mb-2 spec-row">
                <input type="text" name="specifications[0][field_name]" placeholder="Nama Spesifikasi"
                    value="{{ old('specifications.0.field_name') }}"
                    class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg spec-field">
                <input type="text" name="specifications[0][field_value]" placeholder="mm, Kg, °C ..."
                    value="{{ old('specifications.0.field_value') }}"
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
                const selectedCategory = this.options[this.selectedIndex].text.toLowerCase().trim();
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
                } else if (selectedCategory === 'terminal block') {
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Terminal Block</label>
                        <input type="text" name="terminal_block_type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                            placeholder="Masukkan tipe selector switch">
                            <label class="block text-gray-600">Series</label>
                        <select name="terminal_block_series"
                            class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Series</option>
                            <option value="Terminal Strip">Terminal Strip</option>
                            <option value="Terminal Block TB">Terminal Block TB</option>
                            <option value="Terminal Block TBC">Terminal Block TBC</option>
                            <option value="Terminal Block TBR">Terminal Block TBR</option>
                            <option value="Terminal Block TUK">Terminal Block TUK</option>
                            <option value="Terminal Block TUSLKG">Terminal Block TUSLKG</option>
                            <option value="Terminal Block KLUS">Terminal Block KLUS</option>
                        </select>
                    `;
                } else if (selectedCategory === 'cable lug') {
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Cable Lug</label>
                        <input type="text" name="cable_lug_type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                            placeholder="Masukkan tipe Cable Lug">
                            <label class="block text-gray-600">Series</label>
                        <select name="cable_lug_series"
                            class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Series</option>
                            <option value="SC Cable Lug">SC Cable Lug</option>
                            <option value="SV Cable Lug">SV Cable Lug</option>
                            <option value="RV Cable Lug">RV Cable Lug</option>
                            <option value="PTV Cable Lug">PTV Cable Lug</option>
                            <option value="DBV Cable Lug">DBV Cable Lug</option>
                        </select>
                    `;
                } else if (selectedCategory === 'mccb') {
                    extraContainer.innerHTML = `
                            <label class="block text-gray-600">Series</label>
                        <select name="mccb_series"
                            class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Series</option>
                            <option value="M12B 25kA">M12B 25kA</option>
                            <option value="M16F 35kA">M16F 35kA</option>
                            <option value="M25F 35kA">M25F 35kA</option>
                            <option value="M40F 35kA">M40F 35kA</option>
                            <option value="M63F 35kA">M63F 35kA</option>
                            <option value="M80F 35kA">M80F 35kA</option>
                        </select>
                    `;
                } else if (selectedCategory === 'mccb accessories') {
                    extraContainer.innerHTML = `
                    <label class="block text-gray-600">Tipe MCCB Accessories</label>
                        <input type="text" name="mccb_accessories_type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                            placeholder="Masukkan tipe Mccb Accessories">
                            <label class="block text-gray-600">Series</label>
                        <select name="mccb_accessories_series"
                            class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Series</option>
                            <option value="MAA Alarm Contact">MAA Alarm Contact</option>
                            <option value="MAS Shunt Release">MAS Shunt Release</option>
                            <option value="MAAUX Auxiliary Contact">MAAUX Auxiliary Contact</option>
                            <option value="MAUVT Under Voltage">MAUVT Under Voltage</option>
                            <option value="MARH Extended Rotary Handle">MARH Extended Rotary Handle</option>
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

        console.log('selectedCategory:', selectedCategory);

    </script>
    
</x-app-layout>
