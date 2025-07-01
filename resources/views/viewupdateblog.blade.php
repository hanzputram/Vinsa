<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Blog</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($blogs as $blog)
                <div class="border p-4 rounded shadow hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-40 object-cover rounded mb-3">
                    <h3 class="font-semibold text-lg">{{ $blog->judul }}</h3>
                    
                    @if ($blog->sections->isNotEmpty())
                        <p class="text-sm text-gray-600 mt-1">
                            <strong>{{ $blog->sections->first()->sub_judul }}</strong><br>
                            {{ Str::limit($blog->sections->first()->isi, 100) }}
                        </p>
                    @endif

                    <a href="{{ route('blog.editview', $blog->id) }}"
                       class="text-blue-600 hover:underline mt-2 inline-block">Edit Blog</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
