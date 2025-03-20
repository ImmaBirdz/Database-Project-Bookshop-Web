<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\OrderController;

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

// Auth needed routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/edit-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/edit-profile', [ProfileController::class, 'updateProfilePhoto'])->name('profile.updatePhoto');

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
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success'); // Route to show the success page
    Route::post('/checkout/success', [CheckoutController::class, 'store'])->name('checkout.store'); // Route to store the checkout details to order table

    // Buy Now Routes
    Route::get('/checkout/buynow/{id}', [CheckoutController::class, 'buyNow'])->name('checkout.buyNow'); // Route to show the buy now page
    Route::post('/checkout/buynow/{id}', [CheckoutController::class, 'storeBuyNow'])->name('checkout.storeBuyNow'); // Route to store the buynow checkout details to order table

    // Collection Routes
    Route::get('/mycollection', [CollectionController::class, 'index'])->name('collection.index');

    // Order Routes
    Route::get('/myorders', [OrderController::class, 'index'])->name('order.index');
});

require __DIR__ . '/auth.php';