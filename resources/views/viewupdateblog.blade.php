<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Blog</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($blogs as $blog)
                <div class="border p-4 rounded shadow hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-40 object-cover rounded mb-3">
                    <h3 class="font-semibold text-lg">{{ $blog->title }}</h3>

                    @if ($blog->sections->isNotEmpty())
                        <p class="text-sm text-gray-600 mt-1">
                            <strong>{{ $blog->sections->first()->subtitle }}</strong><br>
                            {{ Str::limit($blog->sections->first()->content, 100) }}
                        </p>
                    @endif
                    <div class="flex justify-between">
                        <a href="{{ route('blog.editview', $blog->id) }}"
                            class="text-white bg-blue-600 hover:underline py-2 px-4 border-[1.5px] hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 rounded-lg border-blue-600 mt-2 inline-block">Edit
                            Blog</a>

                        <button type="button"
                            class="btn btn-danger text-white bg-red-600 hover:underline py-2 px-4 border-[1.5px] hover:bg-blue-50 hover:text-red-600 transition-all duration-200 rounded-lg border-red-600 mt-2 inline-block delete-blog"
                            data-id="{{ $blog->id }}">
                            Hapus
                        </button>

                        <form id="delete-form-{{ $blog->id }}" action="{{ route('blogs.destroy', $blog->id) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-blog').forEach(button => {
            button.addEventListener('click', function() {
                const blogId = this.dataset.id;

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data blog akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + blogId).submit();
                    }
                });
            });
        });
    </script>
