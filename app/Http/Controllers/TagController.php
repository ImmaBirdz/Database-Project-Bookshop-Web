<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function show($id)
    {
        $tag = $id;
        // $items
        // SELECT *
        // FROM books
        // JOIN authors ON books.author_id = authors.authoer_id
        // JOIN PUBHISHERS ON books.publisher_id = publishers.publisher_id
        // WHERE books.book_category = $tag
        $items = Book::join('authors', 'books.author_id', '=', 'authors.author_id')
                ->join('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
                ->where('books.book_category', $tag)
                ->paginate(8);
        // $wishlist
        // SELECT *
        // FROM wishlists
        // WHERE user_id = Auth::id()
        $wishlist = Wishlist::where('user_id', Auth::id())
                ->first();

        return view('tag.show', compact('items', 'tag', 'wishlist'));
    }
}
