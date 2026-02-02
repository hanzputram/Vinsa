<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SitemapController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('locale/{locale}', [LocaleController::class, 'setLocale'])->name('locale.set');

Route::get('/', [NewController::class, 'show']);
Route::get('/about', [AboutController::class, 'show']);
Route::get('/product', [ProductController::class, 'index'])->name('products.view.user');
Route::get('/detail/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/new', [NewController::class, 'show'])->name('home');
Route::get('/blog/{slug}', [BlogController::class, 'showPublic'])->name('blog.public');
Route::get('/blog', [BlogController::class, 'blogCollection'])->name('blog.collection');
Route::get('/contact-us', function () {
    return view('contactus');
})->name('contact-us');
Route::post('/contact-us', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product Routes
    Route::get('/input-product', [ProductController::class, 'view'])->name('products.view');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'editView'])->name('products.editss');
    Route::get('/products/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Carousel Routes
    Route::get('/carousel/create', [CarouselController::class, 'create'])->name('carousels.create');
    Route::post('/carousel', [CarouselController::class, 'store'])->name('carousels.store');
    Route::get('/carouselView', [CarouselController::class, 'index'])->name('carousels.index');
    Route::get('/carousels/{id}/edit', [CarouselController::class, 'edit'])->name('carousels.edit');
    Route::put('/carousels/{id}', [CarouselController::class, 'update'])->name('carousels.update');
    Route::delete('/carousels/{id}', [CarouselController::class, 'destroy'])->name('carousels.destroy');

    //Blog Routes
    Route::get('/admin/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/admin/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/admin/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/admin/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');


});

require __DIR__ . '/auth.php';
