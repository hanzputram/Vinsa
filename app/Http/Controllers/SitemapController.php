<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $products = Product::select('slug', 'updated_at')->get();

        $blogs = Blog::select('slug', 'updated_at', 'published_at')
            ->where('is_published', true)
            ->get();

        return response()
            ->view('sitemap', compact('products', 'blogs'))
            ->header('Content-Type', 'application/xml; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=3600');
    }
}
    