<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
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
                    ->paginate(8);

        // $wishlists
        // SELECT *
        // FROM wishlists
        // JOIN books ON wishlists.book_id = books.book_id
        // JOIN authors ON books.author_id = authors.author_id
        // WHERE user_id = Auth::id()
        $wishlists = Wishlist::where('user_id', Auth::id())
                    ->join('books', 'wishlists.book_id', '=', 'books.book_id')
                    ->join('authors', 'books.author_id', '=', 'authors.author_id')
                    ->select('wishlists.*', 'books.*', 'authors.author_name')
                    ->first();

        return view('explore.index', compact('books', 'wishlists'));
    }

    public function show($id)
    {
        // Logic to retrieve a specific item by its ID
        $item = Item::find($id);

        if (!$item) {
            return redirect()->route('explore.index')->with('error', 'Item not found.');
        }

        return view('explore.show', compact('item'));
    }

    public function create()
    {
        return view('explore.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Create a new item
        $item = new Item();
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        // Set other item properties as needed
        $item->save();

        return redirect()->route('explore.index')->with('success', 'Item created successfully.');
    }

    public function edit($id)
    {
        // Logic to retrieve a specific item by its ID for editing
        $item = Item::find($id);

        if (!$item) {
            return redirect()->route('explore.index')->with('error', 'Item not found.');
        }

        return view('explore.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Update the item
        $item = Item::find($id);

        if (!$item) {
            return redirect()->route('explore.index')->with('error', 'Item not found.');
        }

        $item->name = $request->input('name');
        $item->description = $request->input('description');
        // Update other item properties as needed
        $item->save();

        return redirect()->route('explore.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        // Logic to delete a specific item by its ID
        $item = Item::find($id);

        if (!$item) {
            return redirect()->route('explore.index')->with('error', 'Item not found.');
        }

        $item->delete();

        return redirect()->route('explore.index')->with('success', 'Item deleted successfully.');
    }
}
