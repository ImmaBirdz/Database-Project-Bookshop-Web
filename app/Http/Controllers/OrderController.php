<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Book;

class OrderController extends Controller
{
    public function index()
    {
        // $myOrders
        // SELECT orders.*, SUM(order_details.quantity) as total_quantity, SUM(order_details.price) as total_price
        // FROM orders
        // JOIN order_details ON orders.id = order_details.order_id
        // WHERE user_id = auth()->id()
        // ORDER BY created_at DESC
        $myOrders = Order::join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->select('orders.*', DB::raw('SUM(order_details.quantity) as total_quantity'), DB::raw('SUM(order_details.total_price) as total_price'))
            ->where('orders.user_id', Auth::id())
            ->orderBy('orders.created_at', 'DESC')
            ->groupBy('orders.order_id')
            ->get();

        // $myOrdersDetails
        // SELECT *
        // FROM orders
        // JOIN users ON orders.user_id = users.id
        // JOIN order_details ON orders.id = order_details.order_id
        // JOIN books ON order_details.book_id = books.id
        // WHERE orders.user_id = auth()->id()
        // ORDER BY orders.created_at DESC
        $myOrderDetails = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->join('books', 'order_details.book_id', '=', 'books.book_id')
            ->where('orders.user_id', Auth::id())
            ->orderBy('orders.created_at', 'DESC')
            ->get();

        return view('order.index', compact('myOrders', 'myOrderDetails'));
    }
}
