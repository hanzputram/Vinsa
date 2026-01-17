<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    // Form input
    public function create()
    {
        return view('inputblog');
    }

    // List untuk admin
    public function index()
    {
        $blogs = Blog::latest()->paginate(20);
        return view('viewupdateblog', compact('blogs'));
    }

    // Simpan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['nullable','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp,gif','max:2048'],
            'is_published' => ['nullable','boolean'],

            'sections' => ['nullable','array'],
            'sections.*.subtitle' => ['nullable','string','max:255'],
            'sections.*.content' => ['nullable','string'],
            'sections.*.image' => ['nullable','image','mimes:jpg,jpeg,png,webp,gif','max:2048'],
            'sections.*.position' => ['nullable','integer','min:0'],
        ]);

        // Rule: kalau subtitle ada, content wajib
        foreach ($request->sections ?? [] as $i => $sec) {
            if (!empty($sec['subtitle']) && empty($sec['content'])) {
                return back()->withErrors(["sections.$i.content" => "Isi wajib diisi jika sub judul ada."])
                    ->withInput();
            }
        }

        return DB::transaction(function () use ($request, $validated) {

            $slug = $this->uniqueSlug($validated['title']);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('blogs', 'public');
            }

            $published = (bool)($validated['is_published'] ?? false);

            $blog = Blog::create([
                'title' => $validated['title'],
                'slug' => $slug,
                'content' => $validated['content'] ?? null,
                'image' => $imagePath,
                'is_published' => $published,
                'published_at' => $published ? now() : null,
            ]);

            $this->saveSections($blog, $request);

            return back()->with('success', 'Blog berhasil ditambahkan!');
        });
    }

    // Edit
    public function edit($id)
    {
        $blog = Blog::with('sections')->findOrFail($id);
        return view('blogupdate', compact('blog'));
    }

    public function blogCollection()
{
    $blogs = Blog::with('sections')
        ->where('is_published', true)
        ->latest()
        ->get();

    // kalau kamu belum punya kategori blog, hapus ini saja
    $categories = []; // atau BlogCategory::all();

    return view('blogcollection', compact('blogs', 'categories'));
}


    // Update (tidak delete semua)
    public function update(Request $request, $id)
    {
        $blog = Blog::with('sections')->findOrFail($id);

        $validated = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['nullable','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp,gif','max:2048'],
            'remove_image' => ['nullable','boolean'],
            'is_published' => ['nullable','boolean'],

            'sections' => ['nullable','array'],
            'sections.*.id' => ['nullable','integer','exists:blog_sections,id'],
            'sections.*.subtitle' => ['nullable','string','max:255'],
            'sections.*.content' => ['nullable','string'],
            'sections.*.image' => ['nullable','image','mimes:jpg,jpeg,png,webp,gif','max:2048'],
            'sections.*.remove_image' => ['nullable','boolean'],
            'sections.*._delete' => ['nullable','boolean'],
            'sections.*.position' => ['nullable','integer','min:0'],
        ]);

        foreach ($request->sections ?? [] as $i => $sec) {
            if (!empty($sec['subtitle']) && empty($sec['content']) && empty($sec['_delete'])) {
                return back()->withErrors(["sections.$i.content" => "Isi wajib diisi jika sub judul ada."])
                    ->withInput();
            }
        }

        return DB::transaction(function () use ($request, $validated, $blog) {

            // slug ikut title (kalau kamu mau slug TETAP, comment 2 baris ini)
            $blog->slug = $this->uniqueSlug($validated['title'], $blog->id);

            // gambar utama
            if (($validated['remove_image'] ?? false) && $blog->image) {
                $this->deletePublicFile($blog->image);
                $blog->image = null;
            }

            if ($request->hasFile('image')) {
                if ($blog->image) $this->deletePublicFile($blog->image);
                $blog->image = $request->file('image')->store('blogs', 'public');
            }

            $published = (bool)($validated['is_published'] ?? false);

            $blog->title = $validated['title'];
            $blog->content = $validated['content'] ?? null;
            $blog->is_published = $published;
            $blog->published_at = $published ? ($blog->published_at ?? now()) : null;
            $blog->save();

            $this->saveSections($blog, $request, true);

            return redirect()->back()->with('success', 'Blog berhasil diperbarui.');
        });
    }

    // Detail admin by id
    public function showDetail($id)
    {
        $blog = Blog::with('sections')->findOrFail($id);
        return view('detailblog', compact('blog'));
    }

    // Detail publik by slug (SEO URL)
public function showPublic($slug)
{
    $blog = Blog::with('sections')
        ->where('slug', $slug)
        ->where('is_published', true)
        ->firstOrFail();

    return view('detailblog', compact('blog'));
}


    public function destroy($id)
    {
        $blog = Blog::with('sections')->findOrFail($id);

        return DB::transaction(function () use ($blog) {

            if ($blog->image) $this->deletePublicFile($blog->image);

            foreach ($blog->sections as $section) {
                if ($section->image) $this->deletePublicFile($section->image);
                $section->delete();
            }

            $blog->delete();

            return redirect()->back()->with('success', 'Blog berhasil dihapus.');
        });
    }

    // ----------------- Helpers -----------------

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 2;

        $q = Blog::query()->where('slug', $slug);
        if ($ignoreId) $q->where('id', '!=', $ignoreId);

        while ($q->exists()) {
            $slug = $base . '-' . $i++;
            $q = Blog::query()->where('slug', $slug);
            if ($ignoreId) $q->where('id', '!=', $ignoreId);
        }

        return $slug;
    }

    private function deletePublicFile(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * save sections
     * - create baru jika tidak ada id
     * - update jika ada id
     * - bisa delete jika _delete=true (mode update)
     */
    private function saveSections(Blog $blog, Request $request, bool $isUpdate = false): void
    {
        $sections = $request->sections ?? [];
        if (!$sections) return;

        foreach ($sections as $idx => $sec) {

            // hapus section
            if ($isUpdate && !empty($sec['_delete']) && !empty($sec['id'])) {
                $existing = BlogSection::where('blog_id', $blog->id)->where('id', $sec['id'])->first();
                if ($existing) {
                    if ($existing->image) $this->deletePublicFile($existing->image);
                    $existing->delete();
                }
                continue;
            }

            // skip section kosong total
            $hasText = !empty($sec['subtitle']) || !empty($sec['content']);
            $hasImage = isset($sec['image']) && is_object($sec['image']);
            if (!$hasText && !$hasImage) continue;

            $position = isset($sec['position']) ? (int)$sec['position'] : $idx;

            // update existing
            if ($isUpdate && !empty($sec['id'])) {
                $section = BlogSection::where('blog_id', $blog->id)->where('id', $sec['id'])->first();
                if (!$section) continue;

                // remove image section
                if (!empty($sec['remove_image']) && $section->image) {
                    $this->deletePublicFile($section->image);
                    $section->image = null;
                }

                // upload image baru
                if ($hasImage) {
                    if ($section->image) $this->deletePublicFile($section->image);
                    $section->image = $sec['image']->store('blogs/sections', 'public');
                }

                $section->subtitle = $sec['subtitle'] ?? null;
                $section->content = $sec['content'] ?? null;
                $section->position = $position;
                $section->save();

                continue;
            }

            // create new
            $sectionImage = null;
            if ($hasImage) {
                $sectionImage = $sec['image']->store('blogs/sections', 'public');
            }

            BlogSection::create([
                'blog_id' => $blog->id,
                'position' => $position,
                'subtitle' => $sec['subtitle'] ?? null,
                'content' => $sec['content'] ?? null,
                'image' => $sectionImage,
            ]);
        }
    }
}
