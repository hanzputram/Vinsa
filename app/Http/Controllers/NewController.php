<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Visit;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function show()
    {
        $carousels = Carousel::all();
        $products = Product::all();
        $blogs = Blog::with('sections')->latest()->get(); // Tambahkan ini

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

        $allCategories = Category::with('products')->get();

        $orderedCategories = collect($customOrder)
            ->map(function ($name) use ($allCategories) {
                return $allCategories->firstWhere('name', $name);
            })
            ->filter();

        $remainingCategories = $allCategories->filter(function ($category) use ($customOrder) {
            return !in_array($category->name, $customOrder);
        });

        $categories = $orderedCategories->concat($remainingCategories)->values();

        return view('new', compact('carousels', 'products', 'categories', 'blogs'));
    }
}
