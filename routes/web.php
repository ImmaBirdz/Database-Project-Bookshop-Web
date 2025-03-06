<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\CartController;

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


//browse route
Route::get('/browse', function () {
    return view('browse');
});


//book route
Route::get('/book', function () {
    return view('book');
});



//book route
Route::get('/book', function () {
    return view('book');
});

// explore route
Route::get('/explore', function () {
    return view('explore');
});


require __DIR__.'/auth.php';
