@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-white text-black">
<!-- Main Content -->
<main class="flex-1 p-6">
        <div class="flex items-center">
            <a href="{{ route('explore.index') }}" class="text-sm hover:underline">Bookshop Name</a>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <a href="{{ route('tag.show', $book->book_category) }}" class="text-sm hover:underline">{{ $book->book_category }}</a>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <a href="{{ route('book.show', $book->book_id) }}" class="text-sm hover:underline">{{ $book->book_title }}</a>
            <!-- <div>
                <button class="bg-[#454545] px-4 py-2 rounded mr-2 text-white hover:bg-[#333333]">My Cart</button>
                <button class="bg-black px-4 py-2 rounded text-white hover:bg-[#333333]">Log Out</button>
            </div> -->
        </div>

        <!-- Book Container (Centered Image) -->
        <div class="mt-10 flex flex-col items-center relative">
            <!-- Price Tag -->
            <div class="absolute top-2 right-44 bg-[#F7F7F7] text-white px-2 py-1 rounded-sm flex items-center space-x-2 text-sm">
                @if($isInWishlist && Auth::check())
                <form class="font-bold cursor-pointer text-yellow-400 hover:text-yellow-500 transition duration-300 ease-in-out transform text-3xl"
                    action="{{ route('wishlist.destroy', $book->book_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-transparent border-none p-0 m-0 cursor-pointer">
                        <ion-icon name="star"></ion-icon>
                    </button>
                </form>
                @else
                <form class="font-bold cursor-pointer text-yellow-400 hover:fill-current transition duration-300 ease-in-out transform text-3xl"
                    action="{{ route('wishlist.store', $book->book_id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-transparent border-none p-0 m-0 cursor-pointer">
                        <ion-icon name="star-outline"></ion-icon>
                    </button>
                </form>
                @endif
            </div>
            <!-- Book Image -->
            <img src="{{ $book->book_cover }}" alt="Book pic" class="w-[350px] h-[524px] rounded-lg ">
        </div>

        <!-- Book Details & Buttons -->
        <div class="mt-6 flex justify-between items-start w-full">
            <!-- Left Side: Text -->
            <div class="text-left">
                <h3 class="text-xl font-bold">Title: {{ $book->book_title }}</h3>
                <p class="text-gray-400">Author: {{ $book->author_name }}</p>
                <p class="text-gray-500">Publisher: {{ $book->publisher_name }}</p>
                <span class="text-gray-500">Tag: </span>
                <a href="{{ route('browse.show', $book->book_category) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mt-2 mb-2">{{ $book->book_category }}</a>
            </div>

            <!-- add to cart & buy now button -->
            <div class="ml-1 flex flex-col space-y-3">
                <div class="bg-[#F7F7F7] text-white py-1 rounded-sm flex items-center space-x-2 text-sm">
                    <span class="bg-white text-black px-2 py-1 rounded-sm font-bold ml-[-3px] text-lg">${{ $book->book_price }}</span>
                </div>
                <button class="bg-yellow-400 px-6 py-2 text-black font-semibold rounded">BUY NOW</button>
                <form action="{{ route('cart.store', $book->book_id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="number" name="quantity" value="1" min="1" class="border rounded p-2 w-16">
                    <button type="submit" class="bg-gray-700 px-6 py-2 rounded text-white">ADD TO CART</button>
                </form>
            </div>

        </div>
    </main>
</div>
@endsection