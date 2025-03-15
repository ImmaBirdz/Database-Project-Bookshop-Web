<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // $cartItems
        // SELECT *
        // FROM carts
        // JOIN books ON carts.book_id = books.id
        // WHERE user_id = Auth::id()
        
        $cartItems = Cart::where('user_id', Auth::id())
                ->join('books', 'carts.book_id', '=', 'books.book_id')
                ->join('authors', 'books.author_id', '=', 'authors.author_id')
                ->select('carts.cart_id', 'books.*', 'authors.author_name as author_name', 'carts.quantity')
                ->get();
        return view('cart.index', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $bookId = $id;
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('book_id', $bookId)
                        ->first();
        
        if($cartItem){
            // can limit the quantity here using if-else
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->quantity
            ]);
        }else{
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $bookId,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->back()->with('success', 'Book added to cart!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('cart_id', $id)->first();

        if($cartItem){
            $cartItem->update([
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::where('user_id', Auth::id())
            ->where('cart_id', $id)
            ->delete();

        return redirect()->back()->with('delete', 'Book removed from cart!');
    }

}
