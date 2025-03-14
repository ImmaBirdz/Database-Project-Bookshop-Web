<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $wishlists
        // SELECT wishlists.*, books.*, authors.author_name
        // FROM wishlists
        // JOIN books ON wishlist.book_id = books.id
        // JOIN authors ON books.author_id = authors.id
        // WHERE user_id = Auth::id()
        $wishlists = Auth::user()->wishlists()
                ->join('books', 'wishlists.book_id', '=', 'books.book_id')
                ->join('authors', 'books.author_id', '=', 'authors.author_id')
                ->select('wishlists.*', 'books.*', 'authors.author_name')
                ->get();
        return view('wishlist.index',compact('wishlists'));
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
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        Auth::user()->wishlists()->firstOrCreate([
            'book_id' => $validated['book_id'],
        ]);

        return redirect()->route('wishlist.index')->with('status', 'Book added to wishlist!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wishlist = Auth::user()->wishlists()->with('book')->findOrFail($id);
        return view('wishlist.show', compact('wishlist'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->route('wishlist.index')->with('status', 'Book removed from wishlist!');
    }
}
