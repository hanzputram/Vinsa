<x-app-layout>
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="max-w-screen min-h-[calc(100vh-66px)] p-6 bg-white rounded-lg shadow space-y-4">
        <h2 class="text-2xl font-semibold text-gray-700">Edit Gambar Carousel</h2>

        <form action="{{ route('carousels.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="image" class="block text-gray-600 mb-1">Upload Gambar Baru (Opsional)</label>
                <p class="text-sm text-red-500 my-1 cursor-default underline">*Wajib menggunakan dimensi 2800:600</p>
                <input type="file" name="image" id="image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:cursor-pointer file:py-2 file:px-4
                              file:rounded-lg file:border-0 file:text-sm file:font-semibold
                              file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-sm text-gray-500 mt-1">*Kosongkan jika tidak ingin mengganti gambar</p>
            </div>

            <div class="mt-4">
                <label class="block text-gray-600 mb-1">Gambar Saat Ini</label>
                <img src="{{ asset('storage/' . $carousel->image) }}" class="w-[100%] rounded shadow border"
                    alt="Current Image">
            </div>

            <div>
                <button type="submit" class="mt-6 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update Gambar
                </button>
            </div>
        </form>

        {{-- Tombol Hapus dengan SweetAlert --}}
        <form id="delete-carousel-form-{{ $carousel->id }}" action="{{ route('carousels.destroy', $carousel->id) }}"
            method="POST" class="inline-block mt-4">
            @csrf
            @method('DELETE')
            <button type="button"
                class="delete-carousel-btn px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700"
                data-id="{{ $carousel->id }}">
                Hapus Banner
            </button>
        </form>
    </div>

    {{-- SweetAlert2 Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-carousel-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-carousel-form-${id}`);

                    Swal.fire({
                        title: 'Yakin ingin menghapus banner ini?',
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
