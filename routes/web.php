<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewController::class, 'show']);
Route::get('/about', [AboutController::class, 'show']);
Route::get('/product', [ProductController::class, 'index'])->name('products.view.user');
Route::get('/detail/{id}', [ProductController::class, 'show']);
Route::get('/new', [NewController::class, 'show']);

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

});

require __DIR__ . '/auth.php';
