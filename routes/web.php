<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ExploreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Wishlist Routes
    Route::resource('wishlist', WishListController::class);

    // Wishlist Routes
    Route::resource('cart', CartController::class);
});


//book route
Route::get('/book', function () {
    return view('book');
});



//book route
Route::get('/book', function () {
    return view('book');
});

// Explore Routes
Route::get('/explore', function () {
    return view('explore');
});

//browse route
Route::get('/browse', function () {
    return view('browse');
});

//collection route
Route::get('/mycollection', function () {
    return view('mycollection');
});

require __DIR__.'/auth.php';
