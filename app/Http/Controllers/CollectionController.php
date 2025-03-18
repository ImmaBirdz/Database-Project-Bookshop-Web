<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Collection;

class CollectionController extends Controller
{
    public function index()
    {
        // $myCollections
        // SELECT *
        // FROM collections
        // JOIN books ON collections.book_id = books.book_id
        // JOIN authors ON books.author_id = authors.author_id
        // WHERE user_id = auth()->id()
        // GROUP BY collections.collection_id
        $myCollections = Collection::where('collections.user_id', auth()->id())
                        ->join('books', 'collections.book_id', '=', 'books.book_id')
                        ->join('authors', 'books.author_id', '=', 'authors.author_id')
                        ->groupBy('collections.collection_id')
                        ->paginate(8);

        return view('collection.index', compact('myCollections'));
    }
}
