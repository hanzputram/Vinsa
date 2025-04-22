<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

        $customOrder = [
            'Push Button',
            'Illuminated Push Button',
            'Emergency Push Button',
            'Selector Switch',
            'Illuminated Selector Switch',
            'Cable Ties',
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

        if (request()->getHost() === 'vinsa.fr' && request()->path() === '/') {
            $today = now()->toDateString();
    
            $alreadyVisited = Visit::where('ip_address', request()->ip())
                ->whereDate('visited_at', $today)
                ->exists();
    
            if (!$alreadyVisited) {
                Visit::create([
                    'ip_address' => request()->ip(),
                    'visited_at' => now(),
                ]);
            }
        }

        return view('new', compact('carousels', 'products', 'categories'));
    }
}
