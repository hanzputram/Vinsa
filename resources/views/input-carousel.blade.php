<x-app-layout>
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="max-w-screen min-h-[calc(100vh-66px)] p-6 bg-white rounded-lg shadow space-y-4">
        <h2 class="text-2xl font-semibold text-gray-700">Tambah Gambar Banner</h2>

        <form action="{{ route('carousels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="image" class="block text-gray-600 mb-1">Gambar</label>
                <p class="text-sm text-red-500 mt-1">*Wajib menggunakan dimensi 2800:600</p>
                <input type="file" name="image" id="image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0 file:cursor-pointer file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                    required>
            </div>

            <div>
                <button type="submit" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Tambah Gambar
                </button>
            </div>
        </form>
    </div>

    {{-- SweetAlert2 Error --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menambahkan Gambar',
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
</x-app-layout>
