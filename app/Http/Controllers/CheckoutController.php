<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // get all the cart items
        $cartItems = Cart::where('user_id', Auth::id())
            ->join('books', 'carts.book_id', '=', 'books.book_id')
            ->join('authors', 'books.author_id', '=', 'authors.author_id')
            ->select('carts.cart_id', 'books.*', 'authors.author_name as author_name', 'carts.quantity')
            ->get();
        return view('checkout.index', compact('cartItems'));
    }
}
