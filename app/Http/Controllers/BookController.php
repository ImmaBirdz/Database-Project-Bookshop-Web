<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // $books
        // SELECT *
        // FROM books
        // JOIN authors ON books.author_id = authors.id
        // JOIN publishers ON books.publisher_id = publishers.id
        $books = Book::join('authors', 'books.author_id', '=', 'authors.author_id')
                    ->join('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
                    ->get();
        return view('book.index', compact('books'));
    }

    public function show($id)
    {
        // $book
        // SELECT *
        // FROM books
        // JOIN authors ON books.author_id = authors.id
        // JOIN publishers ON books.publisher_id = publishers.id
        $book = Book::join('authors', 'books.author_id', '=', 'authors.author_id')
                    ->join('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
                    ->where('books.book_id', $id)
                    ->firstOrFail();
        // $wishlist
        // SELECT *
        // FROM wishlists
        // WHERE user_id = Auth::id()
        $wishlist = Wishlist::where('user_id', Auth::id())
                            ->first();

        // $isInWishlist
        // SELECT *
        // FROM wishlists
        // WHERE book_id = $id AND user_id = Auth::id()
        $isInWishlist = Wishlist::where('book_id', $id)
                        ->where('user_id', Auth::id())
                        ->exists();
        return view('book.show', compact('book', 'wishlist', 'isInWishlist'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
        ]);

        $book = Book::create($validatedData);

        return redirect()->route('book.index')->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validatedData);

        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
    }
}
