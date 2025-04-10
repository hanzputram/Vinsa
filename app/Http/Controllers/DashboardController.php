<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\History;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $productCount = Product::count();
        $carouselCount = Carousel::count();

        // Ambil semua histories, termasuk relasi user
        $query = History::with('user');

        // Filter berdasarkan tanggal jika ada
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', $request->date);
        } else {
            $query->whereDate('created_at', Carbon::today());
        }

        // Ambil 10 log terbaru
        $histories = $query->latest()->take(10)->get();

        return view('dashboard', compact('histories', 'productCount', 'carouselCount'));
    }
}
