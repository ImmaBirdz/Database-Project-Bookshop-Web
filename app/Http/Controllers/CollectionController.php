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
        // JOIN orders ON collections.order_id = orders.order_id
        // JOIN order_details ON orders.order_id = order_details.order_id
        // WHERE user_id = auth()->id()
        // GROUP BY collections.collection_id
        $myCollections = Collection::where('collections.user_id', auth()->id())
                        ->join('books', 'collections.book_id', '=', 'books.book_id')
                        ->join('authors', 'books.author_id', '=', 'authors.author_id')
                        ->join('orders', 'collections.user_id', '=', 'orders.user_id')
                        ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
                        ->select('collections.collection_id', 'collections.user_id', 'books.*', 'authors.author_name', 'order_details.quantity')
                        ->groupBy('collections.collection_id', 'collections.user_id', 'books.book_id', 'authors.author_name', 'order_details.quantity')
                        ->paginate(8);

        return view('collection.index', compact('myCollections'));
    }
}
