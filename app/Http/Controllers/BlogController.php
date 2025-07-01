<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function show()
    {
        return view('inputblog');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'sections' => 'nullable|array',
            'sections.*.subtitle' => 'nullable|string',
            'sections.*.content' => 'nullable|string',
            'sections.*.image' => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ]);

        foreach ($request->sections ?? [] as $index => $section) {
            if (!empty($section['subtitle']) && empty($section['content'])) {
                return back()->withErrors([
                    "sections.$index.content" => "Isi wajib diisi jika sub judul ada."
                ])->withInput();
            }
        }

        $imagePath = $request->file('image')->store('blogs', 'public');

        $blog = Blog::create([
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        if ($request->has('sections')) {
            foreach ($request->sections as $index => $section) {
                if (!empty($section['subtitle']) && !empty($section['content'])) {
                    $sectionImage = null;
                    if (isset($section['image']) && is_object($section['image'])) {
                        $sectionImage = $section['image']->store('blogs/sections', 'public');
                    }

                    BlogSection::create([
                        'blog_id' => $blog->id,
                        'subtitle' => $section['subtitle'],
                        'content' => $section['content'],
                        'image' => $sectionImage,
                    ]);
                }
            }
        }

        // dd($request->all());

        return back()->with('success', 'Blog berhasil ditambahkan!');
    }

    public function updateView()
    {
        $blogs = Blog::with('sections')->get();
        return view('viewupdateblog', compact('blogs'));
    }

    public function edit($id)
    {
        $blog = Blog::with('sections')->findOrFail($id);
        return view('blogupdate', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'sections' => 'required|array',
            'sections.*.subtitle' => 'required|string',
            'sections.*.content' => 'required|string',
            'sections.*.image' => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        $blog->title = $request->title;
        $blog->save();

        $blog->sections()->delete();

        foreach ($request->sections as $section) {
            $sectionImage = null;
            if (isset($section['image']) && is_object($section['image'])) {
                $sectionImage = $section['image']->store('blogs/sections', 'public');
            }

            BlogSection::create([
                'blog_id' => $blog->id,
                'subtitle' => $section['subtitle'],
                'content' => $section['content'],
                'image' => $sectionImage,
            ]);
        }

        return redirect()->back()->with('success', 'Blog berhasil diperbarui.');
    }

    public function showDetail($id)
    {
        $blog = Blog::with('sections')->findOrFail($id);
        return view('detailblog', compact('blog'));
    }
}