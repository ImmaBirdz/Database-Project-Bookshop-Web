<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class BrowseController extends Controller
{
    public function index()
    {
        $request = request();
        return view('browse.index', compact('request'));
    }

    public function show(Request $request)
    {
        $input = $request->input('search');
        // Logic to retrieve a specific item by its ID
        // $items
        // SELECT *
        // FROM books
        // JOIN authors ON books.author_id = authors.authoer_id
        // WHERE books.book_title LIKE '%$input%' OR authors.author_name LIKE '%$input%'
        $items = Book::join('authors', 'books.author_id', '=', 'authors.author_id')
                ->where('books.book_title', 'LIKE', "%$input%")
                ->orWhere('authors.author_name', 'LIKE', "%$input%")
                ->paginate(8);
        // dd($items);
        // $wishlist
        // SELECT *
        // FROM wishlists
        // WHERE user_id = Auth::id()
        $wishlist = Wishlist::where('user_id', Auth::id())
                ->first();
        return view('browse.show', compact('items', 'input', 'wishlist'));
    }
}
