<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function show()
    {
        $carousels = Carousel::all();
        $products = Product::all();

        // Ambil semua kategori beserta produk pertama di setiap kategori
        $categories = Category::with('products')->get();

        return view('new', compact('carousels', 'products', 'categories', 'categories'));
    }
}
