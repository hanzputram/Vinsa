<x-app-layout>
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="max-w-screen min-h-[calc(100vh-66px)] bg-white p-6">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <a href="{{ route('products.edit') }}" class="group">
                <svg viewBox="0 0 24 24" width="40px" height="40px" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="stroke-black group-hover:stroke-gray-400 transition-colors duration-300">
                    <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </a>

            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Edit Produk</h2>

            <select name="category_id" id="categorySelect" required class="form-select rounded-xl">
                <option value="" disabled
                    {{ old('category_id', $product->category_id ?? '') == '' ? 'selected' : '' }}>Pilih Kategori
                </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}
                        data-name="{{ strtolower($category->name) }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <input type="hidden" name="custom_input" id="custom_input"
                value="{{ old('custom_input', $product->custom_input ?? '') }}">

            <div id="category-extra" class="max-w-[90%] space-y-2 mt-2"></div>

            <div class="max-w-[90%]">
                <label class="block text-gray-600 mb-1">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" required
                    class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="max-w-[90%]">
                <label class="block text-gray-600 mb-1">Referensi Kode Product</label>
                <input type="text" name="kode" value="{{ $product->kode }}" required
                    class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="max-w-[90%]">
                <label class="block text-gray-600 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $product->description }}</textarea>
            </div>

            <div class="max-w-[90%]">
                <label class="block text-gray-600 mb-1">Gambar</label>
                <input type="file" name="image"
                    class="block w-full file:cursor-pointer text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100">
                <p class="text-gray-500 text-sm">*Biarkan kosong jika tidak ingin mengganti gambar</p>
                <p class="text-red-500 text-sm">*Wajib menggunakan ratio 8:11</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                    class="w-40 border-[1.5px] mt-2 rounded-lg">
            </div>

            <div class="max-w-[90%]" id="specifications">
                <label class="block text-gray-600 mb-1">Spesifikasi</label>
                @foreach ($product->attributes as $index => $attribute)
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="specifications[{{ $index }}][field_name]"
                            value="{{ $attribute->field_name }}" placeholder="Nama Spesifikasi"
                            class="w-1/2 px-4 py-2 border rounded-lg">
                        <input type="text" name="specifications[{{ $index }}][field_value]"
                            value="{{ $attribute->field_value }}" placeholder="mm, Kg, °C ..."
                            class="w-1/2 px-4 py-2 border rounded-lg">
                    </div>
                @endforeach
            </div>

            <button type="button" onclick="addSpecification()"
                class="bg-green-500 text-white px-4 py-2 rounded-lg">Tambah Spesifikasi</button>

            <div>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update
                    Produk</button>
            </div>
        </form>

        <form id="delete-product-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}"
            method="POST" class="inline-block mt-4">
            @csrf
            @method('DELETE')
            <button type="button"
                class="delete-product-btn px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700"
                data-id="{{ $product->id }}">
                Hapus Produk
            </button>
        </form>
    </div>

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Mengupdate Produk',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33',
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
        let specCount = {{ count($product->attributes) }};

        function addSpecification() {
            let div = document.createElement('div');
            div.classList.add('flex', 'gap-2', 'mb-2');
            div.innerHTML = `
                <input type="text" name="specifications[${specCount}][field_name]" placeholder="Nama Spesifikasi" class="w-1/2 px-4 py-2 border rounded-lg">
                <input type="text" name="specifications[${specCount}][field_value]" placeholder="mm, Kg, °C ..." class="w-1/2 px-4 py-2 border rounded-lg">
            `;
            document.getElementById('specifications').appendChild(div);
            specCount++;
        }

        function updatePushButtonValue(tipe = null, series = null) {
            const hidden = document.getElementById('custom_input');
            let current = {};
            try {
                current = JSON.parse(hidden.value || '{}');
            } catch {}
            if (tipe !== null) current.tipe = tipe;
            if (series !== null) current.series = series;
            hidden.value = JSON.stringify(current);
        }

        document.addEventListener("DOMContentLoaded", function() {
            const categorySelect = document.getElementById('categorySelect');
            const extraContainer = document.getElementById('category-extra');
            const customInputHidden = document.getElementById('custom_input');
            const oldCategory = categorySelect.options[categorySelect.selectedIndex]?.dataset?.name;
            let oldValue = customInputHidden.value;
            let parsedOld = {};

            try {
                parsedOld = JSON.parse(oldValue);
            } catch {}

            function renderExtraFields(category) {
                extraContainer.innerHTML = '';
                if (category === 'cable tray') {
                    const selected = oldValue === 'U Series' ? 'U Series' : (oldValue === 'C Series' ? 'C Series' :
                        '');
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">U & C Series</label>
                        <select class="w-full px-4 py-2 border rounded-lg"
                            onchange="document.getElementById('custom_input').value = this.value;">
                            <option value="">Pilih Series</option>
                            <option value="U Series" ${selected === 'U Series' ? 'selected' : ''}>U Series</option>
                            <option value="C Series" ${selected === 'C Series' ? 'selected' : ''}>C Series</option>
                        </select>
                    `;
                    customInputHidden.value = selected;
                } else if (category === 'push button') {
                    const tipe = parsedOld.tipe || '';
                    const series = parsedOld.series || '';
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Push Button</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg mb-2"
                            placeholder="Masukkan tipe push button"
                            value="${tipe}"
                            oninput="updatePushButtonValue(this.value, null)">
                        
                        <label class="block text-gray-600">Series</label>
                        <select class="w-full px-4 py-2 border rounded-lg"
                            onchange="updatePushButtonValue(null, this.value)">
                            <option value="">Pilih Series</option>
                            <option value="KB 5 Series" ${series === 'KB 5 Series' ? 'selected' : ''}>KB 5 Series</option>
                            <option value="KB 2 Series" ${series === 'KB 2 Series' ? 'selected' : ''}>KB 2 Series</option>
                        </select>
                    `;
                    customInputHidden.value = JSON.stringify({
                        tipe,
                        series
                    });
                } else if (category === 'illuminated push button') {
                    const tipe = parsedOld.tipe || '';
                    const series = parsedOld.series || '';
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Push Button</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg mb-2"
                            placeholder="Masukkan tipe push button"
                            value="${tipe}"
                            oninput="updatePushButtonValue(this.value, null)">
                        
                        <label class="block text-gray-600">Series</label>
                        <select class="w-full px-4 py-2 border rounded-lg"
                            onchange="updatePushButtonValue(null, this.value)">
                            <option value="">Pilih Series</option>
                            <option value="KB 5 Series" ${series === 'KB 5 Series' ? 'selected' : ''}>KB 5 Series</option>
                            <option value="KB 2 Series" ${series === 'KB 2 Series' ? 'selected' : ''}>KB 2 Series</option>
                        </select>
                    `;
                    customInputHidden.value = JSON.stringify({
                        tipe,
                        series
                    });
                } else if (category === 'emergency push button') {
                    const tipe = parsedOld.tipe || '';
                    const series = parsedOld.series || '';
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Push Button</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg mb-2"
                            placeholder="Masukkan tipe push button"
                            value="${tipe}"
                            oninput="updatePushButtonValue(this.value, null)">
                        
                        <label class="block text-gray-600">Series</label>
                        <select class="w-full px-4 py-2 border rounded-lg"
                            onchange="updatePushButtonValue(null, this.value)">
                            <option value="">Pilih Series</option>
                            <option value="KB 5 Series" ${series === 'KB 5 Series' ? 'selected' : ''}>KB 5 Series</option>
                            <option value="KB 2 Series" ${series === 'KB 2 Series' ? 'selected' : ''}>KB 2 Series</option>
                        </select>
                    `;
                    customInputHidden.value = JSON.stringify({
                        tipe,
                        series
                    });
                } else if (category === 'illuminated selector switch') {
                    const tipe = parsedOld.tipe || '';
                    const series = parsedOld.series || '';
                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">Tipe Push Button</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg mb-2"
                            placeholder="Masukkan tipe selector switch"
                            value="${tipe}"
                            oninput="updatePushButtonValue(this.value, null)">
                        
                        <label class="block text-gray-600">Series</label>
                        <select class="w-full px-4 py-2 border rounded-lg"
                            onchange="updatePushButtonValue(null, this.value)">
                            <option value="">Pilih Series</option>
                            <option value="KB 5 Series" ${series === 'KB 5 Series' ? 'selected' : ''}>KB 5 Series</option>
                            <option value="KB 2 Series" ${series === 'KB 2 Series' ? 'selected' : ''}>KB 2 Series</option>
                        </select>
                    `;
                    customInputHidden.value = JSON.stringify({
                        tipe,
                        series
                    });
                } else if (category === 'selector switch') {
                    const tipe = parsedOld.tipe || '';
                    const series = parsedOld.series || '';
                    extraContainer.innerHTML = `
                            <label class="block text-gray-600">Tipe Selector Switch</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg mb-2"
                                placeholder="Masukkan tipe selector switch"
                                value="${tipe}"
                                oninput="updatePushButtonValue(this.value, null)">
                            
                            <label class="block text-gray-600">Series</label>
                            <select class="w-full px-4 py-2 border rounded-lg"
                                onchange="updatePushButtonValue(null, this.value)">
                                <option value="">Pilih Series</option>
                                <option value="KB 5 Series" ${series === 'KB 5 Series' ? 'selected' : ''}>KB 5 Series</option>
                                <option value="KB 2 Series" ${series === 'KB 2 Series' ? 'selected' : ''}>KB 2 Series</option>
                            </select>
                        `;
                    customInputHidden.value = JSON.stringify({
                        tipe,
                        series
                    });
                } else if (['pilot lamp', 'accessories'].includes(category)) {
                    let label = category === 'pilot lamp' ? 'Tipe Pilot Lamp' : 'Tipe Aksesoris';

                    extraContainer.innerHTML = `
                        <label class="block text-gray-600">${label}</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg"
                            placeholder="Masukkan ${label.toLowerCase()}"
                            value="${oldValue}"
                            oninput="document.getElementById('custom_input').value = this.value">
                    `;
                }
            }

            if (oldCategory) {
                renderExtraFields(oldCategory);
            }

            categorySelect.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex].dataset.name;
                renderExtraFields(selected);
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-product-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-product-form-${id}`);

                    Swal.fire({
                        title: 'Yakin ingin menghapus produk ini?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
