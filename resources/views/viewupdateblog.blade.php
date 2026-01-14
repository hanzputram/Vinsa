<x-app-layout>
    <div class="p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold">Daftar Blog</h2>

            {{-- tombol tambah (opsional) --}}
            <a href="{{ route('blog.create') }}"
               class="text-white bg-black py-2 px-4 rounded-lg border border-black hover:bg-white hover:text-black transition-all duration-200">
                + Tambah Blog
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($blogs as $blog)
                @php
                    // Preview: prioritas konten utama WYSIWYG, kalau kosong ambil section pertama
                    $previewHtml = $blog->content
                        ?? optional($blog->sections->first())->content
                        ?? '';

                    $previewText = \Illuminate\Support\Str::limit(strip_tags($previewHtml), 110);

                    $subtitle = optional($blog->sections->first())->subtitle;
                @endphp

                <div class="border p-4 rounded shadow hover:shadow-lg transition bg-white">
                    {{-- Image --}}
                    @if(!empty($blog->image))
                        <img src="{{ asset('storage/' . $blog->image) }}"
                             class="w-full h-40 object-cover rounded mb-3"
                             alt="{{ $blog->title }}">
                    @else
                        <div class="w-full h-40 rounded mb-3 bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                            No Image
                        </div>
                    @endif

                    {{-- Title + badge --}}
                    <div class="flex items-start justify-between gap-2">
                        <h3 class="font-semibold text-lg leading-snug">{{ $blog->title }}</h3>

                        @if(!empty($blog->is_published))
                            <span class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-700 whitespace-nowrap">
                                Published
                            </span>
                        @else
                            <span class="text-xs px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 whitespace-nowrap">
                                Draft
                            </span>
                        @endif
                    </div>

                    {{-- Subtitle + preview --}}
                    <p class="text-sm text-gray-600 mt-2">
                        @if($subtitle)
                            <strong>{{ $subtitle }}</strong><br>
                        @endif
                        {{ $previewText }}
                    </p>

                    {{-- Optional: slug / public url --}}
                    @if(!empty($blog->slug))
                        <p class="text-xs text-gray-500 mt-2">
                            URL: <span class="font-mono">/blog/{{ $blog->slug }}</span>
                        </p>
                    @endif

                    <div class="flex justify-between gap-2 mt-3">
                        <a href="{{ route('blog.edit', $blog->id) }}"
                           class="text-white bg-blue-600 py-2 px-4 border-[1.5px] rounded-lg border-blue-600
                                  hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 inline-block">
                            Edit Blog
                        </a>

                        <button type="button"
                            class="text-white bg-red-600 py-2 px-4 border-[1.5px] rounded-lg border-red-600
                                   hover:bg-blue-50 hover:text-red-600 transition-all duration-200 inline-block delete-blog"
                            data-id="{{ $blog->id }}">
                            Hapus
                        </button>

                        {{-- ✅ Form delete (route sesuaikan) --}}
                        <form id="delete-form-{{ $blog->id }}"
                              action="{{ route('blog.destroy', $blog->id) }}"
                              method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                </div>
            @endforeach
        </div>

        {{-- pagination kalau kamu pakai paginate --}}
        @if(method_exists($blogs, 'links'))
            <div class="mt-6">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>

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
</x-app-layout>
