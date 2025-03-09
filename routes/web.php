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
    Route::resource('book', BookController::class); // Book Routes
    Route::resource('wishlist', WishListController::class); // Wishlist Routes
    Route::delete('/wishlist/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove'); // Route to remove item from wishlist
    Route::resource('cart', CartController::class); // Wishlist Routes
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Route to remove item from cart
});

// Explore Routes
Route::get('/explore', function () {
    return view('explore');
});

require __DIR__.'/auth.php';
