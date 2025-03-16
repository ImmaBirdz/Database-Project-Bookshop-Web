@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-white text-black">
<!-- Main Content -->
<main class="flex-1 p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Books</h2>
        </div>

        <!-- Book Container (Centered Image) -->
        <div class="mt-10 flex flex-col items-center relative">
        <!-- Price Tag -->
        <div class="absolute top-2 right-44 bg-[#F7F7F7] text-white px-2 py-1 rounded-sm flex items-center space-x-2 text-sm">
            <span class="bg-white text-black px-2 py-1 rounded-sm font-bold ml-[-3px]">$ {{ $book->book_price }}</span>
            <span class="text-red-500 font-bold">SALE -15%</span>
        </div>
            <!-- Book Image -->
            <img src="{{ $book->book_cover }}" alt="Book pic" class="w-[350px] h-[524px] rounded-lg ">
        </div>

        <!-- Book Details & Buttons -->
        <div class="mt-6 flex justify-between items-start w-full">
            <!-- Left Side: Text -->
            <div class="text-left">
                <h3 class="text-xl font-bold">{{ $book->book_title }}</h3>
                <p class="text-gray-400">{{ $book->author_name }}</p>
                <p class="text-gray-500">{{ $book->publisher_name }}</p>
            </div>

            <!-- add to cart & buy now button -->
            <div class="ml-1 flex flex-col space-y-3">
                <button class="bg-yellow-400 px-6 py-2 text-black font-semibold rounded">BUY NOW</button>
                <form action="{{ route('cart.store', 1) }}" method="POST"> <!-- 1 is the book ID -->
                    @csrf
                    @method('POST')
                    <input type="number" name="quantity" value="1" min="1" class="border rounded p-2 w-16"> <!-- Quantity -->
                    <button type="submit" class="bg-gray-700 px-6 py-2 rounded text-white">ADD TO CART</button>
                </form>
            </div>

        </div>
    </main>
</div>
@endsection