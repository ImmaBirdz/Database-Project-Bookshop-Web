<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CheckoutController;

// Home Page as Explore Page
Route::get('/', [ExploreController::class, 'index']);

// Explore Page
Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');

// Book Page
Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show'); // Show the particular book Page

// Browse Page
Route::get('/browse', [BrowseController::class, 'index'])->name('browse.index');
Route::get('/browse/{id}', [BrowseController::class, 'show'])->name('browse.show'); // Show the particular book page after searching

// Tag Page
Route::get('/tag/{id}', [TagController::class, 'show'])->name('tag.show'); // Show the particular category page

// Wishlist Page : auth check
Route::get('/wishlist', function () { // Wishlist Page : auth needed
    if(Auth::auth()){
        return view('/wishlist');
    }else{
        return redirect('/login');
    }
});

// Cart Page : auth check
Route::get('/cart', function () { // Cart Page : auth needed
    if(Auth::auth()){
        return view('/cart');
    }else{  
        return redirect('/login');
    }
});

Route::middleware('auth')->group(function () { // Auth needed
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/edit-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Wishlist Routes
    Route::resource('wishlist', WishListController::class);
    Route::post('/wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist.store'); // Route to add item to wishlist
    Route::delete('/wishlist/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove'); // Route to remove item from wishlist

    // Cart Routes
    Route::resource('/cart', CartController::class);
    Route::post('/cart/{id}', [CartController::class, 'store'])->name('cart.store'); // Route to add item to cart
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update'); // Route to update item in cart
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Route to remove item from cart

    // Checkout Routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store'); // Route to store the checkout details to order table
});

// not done yet
Route::get('/myorder', function () {
    return view('myorder');
});

Route::get('/mycollection', function () {
    return view('mycollection');
});

require __DIR__.'/auth.php';
