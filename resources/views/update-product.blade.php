<x-app-layout>
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="max-w-screen min-h-[calc(100vh-66px)] bg-white p-6">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Edit Produk</h2>

            <div class="max-w-[90%]">
                <label class="block text-gray-600 mb-1">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" required
                    class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="max-w-[90%]">
                <label class="block text-gray-600 mb-1">Kode Produk</label>
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
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-40 mt-2 rounded-lg">
            </div>

            <div class="max-w-[90%]" id="specifications">
                <label class="block text-gray-600 mb-1">Spesifikasi</label>
                @foreach ($product->attributes as $index => $attribute)
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="specifications[{{ $index }}][field_name]"
                            value="{{ $attribute->field_name }}" placeholder="Nama Spesifikasi"
                            class="w-1/2 px-4 py-2 border rounded-lg">
                        <input type="text" name="specifications[{{ $index }}][field_value]"
                            value="{{ $attribute->field_value }}" placeholder="Nilai"
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

    {{-- SweetAlert2 Error --}}
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

    {{-- SweetAlert2 Success --}}
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
            <input type="text" name="specifications[${specCount}][field_value]" placeholder="Nilai" class="w-1/2 px-4 py-2 border rounded-lg">
            `;
            document.getElementById('specifications').appendChild(div);
            specCount++;
        }
    </script>

    <script>
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
