<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ExploreController;

Route::get('/', [ExploreController::class, 'index']); // Home Page as Explore Page

Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index'); // Explore Page
Route::get('/book', [BookController::class, 'index'])->name('book.index'); // Book Page
Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show'); // Show the particular book Page

Route::get('/wishlist', function () { // Wishlist Page : auth needed
    if(Auth::auth()){
        return view('/wishlist');
    }else{
        return redirect('/login');
    }
});

Route::get('/cart', function () { // Cart Page : auth needed
    if(Auth::auth()){
        return view('/cart');
    }else{  
        return redirect('/login');
    }
});

Route::middleware('auth')->group(function () { // Auth needed
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::resource('explore', ExploreController::class); // Explore Routes
    
    // Route::resource('book', BookController::class); // Book Routes

    Route::resource('wishlist', WishListController::class); // Wishlist Routes
    Route::post('/wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist.store'); // Route to add item to wishlist
    Route::delete('/wishlist/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove'); // Route to remove item from wishlist


    Route::resource('/cart', CartController::class); // Wishlist Routes
    Route::post('/cart/{id}', [CartController::class, 'store'])->name('cart.store'); // Route to add item to cart
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update'); // Route to update item in cart
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Route to remove item from cart
});


Route::get('/myorder', function () {
    return view('myorder');
});

Route::get('/browse', function () {
    return view('browse');
});

require __DIR__.'/auth.php';
