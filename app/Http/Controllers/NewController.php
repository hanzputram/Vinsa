<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function show()
    {
        $carousels = Carousel::all();
        $products = Product::all();
        return view('new', compact('carousels', 'products'));
    }
}
