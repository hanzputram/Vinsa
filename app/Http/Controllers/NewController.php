<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Carousel;
use App\Models\Category;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function show()
    {
        $carousels = Carousel::all();

        // ✅ Hanya ambil kolom yang dibutuhkan untuk card produk (bukan semua kolom)
        $allCategories = Category::with([
            'products' => function ($q) {
                $q->select('id', 'name', 'slug', 'kode', 'image', 'category_id', 'custom_input');
            }
        ])->get(['id', 'name']);

        // ✅ Hanya blog published, kolom minimal, limit 12
        $blogs = Blog::with([
            'sections' => fn($q) => $q->select('id', 'blog_id', 'subtitle', 'content', 'image')
        ])
        ->where('is_published', true)
        ->latest()
        ->limit(12)
        ->get(['id', 'title', 'slug', 'image', 'content', 'is_published', 'created_at']);

        $customOrder = [
            'Contactor',
            'Contactor Accessories',
            'MCCB',
            'MCCB Accessories',
            'Box Panel',
            'Cable Lug',
            'Push Button',
            'Illuminated Push Button',
            'Emergency Push Button',
            'Pilot Lamp',
            'Illuminated Selector Switch',
            'Selector Switch',
            'Flashing Buzzer',
            'Terminal Block',
            'Empty Control Panel',
            'Cable Ties',
            'Cable Tray',
            'Accessories',
            'Rak',
        ];

        $orderedCategories = collect($customOrder)
            ->map(function ($name) use ($allCategories) {
                return $allCategories->firstWhere('name', $name);
            })
            ->filter();

        $remainingCategories = $allCategories->filter(function ($category) use ($customOrder) {
            return !in_array($category->name, $customOrder);
        });

        $categories = $orderedCategories->concat($remainingCategories)->values();

        return view('new', compact('carousels', 'categories', 'blogs'));
    }
}
