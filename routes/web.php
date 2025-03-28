<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'show']);
Route::get('/new', [NewController::class, 'show']);
