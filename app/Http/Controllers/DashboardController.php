<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\History;
use App\Models\Product;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $productCount = Product::count();
        $carouselCount = Carousel::count();
    
        $query = History::with('user');
    
        // Filter berdasarkan tanggal
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', $request->date);
        } else {
            $query->whereDate('created_at', Carbon::today());
        }
    
        // Filter berdasarkan search query
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
    
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereRaw("DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') like ?", ["%$search%"]);
            });
        }
    
        $histories = $query->latest()->paginate(10);
    
        $visitorCount = Visit::whereDate('visited_at', now()->toDateString())->count();
    
        return view('dashboard', compact('histories', 'productCount', 'carouselCount', 'visitorCount'));
    }
    
}
