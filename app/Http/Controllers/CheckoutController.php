<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // get user
        $user = Auth::user();

        // get all the cart items
        $cartItems = Cart::where('user_id', Auth::id())
                    ->join('books', 'carts.book_id', '=', 'books.book_id')
                    ->join('authors', 'books.author_id', '=', 'authors.author_id')
                    ->select('carts.cart_id', 'books.*', 'authors.author_name as author_name', 'carts.quantity')
                    ->get();

        // total
        $total = Cart::where('user_id', Auth::id())
                    ->join('books', 'carts.book_id', '=', 'books.book_id')
                    ->selectRaw('SUM(books.book_price * carts.quantity) as total')
                    ->pluck('total')
                    ->first();
        
        return view('checkout.index', compact('cartItems' , 'user', 'total'));
    }

    public function store(Request $request)
    {
        // get user
        $user = Auth::user();

        // get all the cart items
        $cartItems = Cart::where('user_id', Auth::id())
                    ->join('books', 'carts.book_id', '=', 'books.book_id')
                    ->join('authors', 'books.author_id', '=', 'authors.author_id')
                    ->select('carts.cart_id', 'books.*', 'authors.author_name as author_name', 'carts.quantity')
                    ->get();

        // total
        $total = Cart::where('user_id', Auth::id())
                    ->join('books', 'carts.book_id', '=', 'books.book_id')
                    ->selectRaw('SUM(books.book_price * carts.quantity) as total')
                    ->pluck('total')
                    ->first();

        // validate the cart
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'You cannot checkout with empty cart!');
        }

        // store the order
        $order = new Order();
        $order->order_id = $tempOrderID  = 'ORD'.rand(1000,9999);
        $order->user_id = Auth::id();
        $order->total = $total;
        $order->order_date = now();
        $order->order_status = 'success';
        $order->save();

        // store the order items
        foreach($cartItems as $cartItem){
            $orderItem = new OrderDetail();
            $orderItem->order_detail_id = 'OD'.rand(1000,9999);
            $orderItem->order_id = $tempOrderID;
            $orderItem->book_id = $cartItem->book_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->total_price = $cartItem->book_price * $cartItem->quantity;
            $orderItem->save();
        }

        // delete the cart items
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', 'Order Placed Successfully');
    }
}
