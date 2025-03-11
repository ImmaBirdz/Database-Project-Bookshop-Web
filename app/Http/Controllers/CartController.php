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
        $cartItems = Cart::where('user_id', Auth::id())->with('book')->get();
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
    public function store(Request $request)
    {
        $bookId = $request->book_id;

        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('book_id', $bookId)
                        ->first();
        
        if($cartItem){
            $cartItem->increment('quantity');
        }else{
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $bookId,
                'quantity' => 1,
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
        $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->first();

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
        Cart::where('user_id', Auth::id())->where('id', $id)->delete();

        return redirect()->back()->with('Book removed from cart!');
    }

}
