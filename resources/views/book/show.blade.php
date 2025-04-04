@extends('layouts.app')

@section('title') 
    {{ $book->book_title }} 
@endsection

@section('content')
<div class="flex bg-white text-black">
    <!-- Main Content -->
    <main class="flex-1 p-6">
        <div class="flex items-center">
            <a href="{{ route('explore.index') }}" class="text-sm hover:underline">Cozy Library</a>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <a href="{{ route('tag.show', $book->book_category) }}" class="text-sm hover:underline">{{ $book->book_category }}</a>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <a href="{{ route('book.show', $book->book_id) }}" class="text-sm hover:underline">{{ $book->book_title }}</a>
        </div>

        <!-- Book Container (Centered Image) -->
        <div class="mt-10 flex flex-col items-center relative">
            <!-- Price Tag -->
            <div class="absolute top-2 right-44 bg-white text-white px-2 py-1 rounded-sm flex items-center space-x-2 text-sm">
                @if($isInWishlist && Auth::check())
                    <form 
                        class="font-bold cursor-pointer text-yellow-400 hover:text-yellow-500 transition duration-300 ease-in-out transform text-3xl"
                        action="{{ route('wishlist.destroy', $book->book_id) }}" 
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent border-none p-0 m-0 cursor-pointer">
                            <ion-icon name="star"></ion-icon>
                        </button>
                    </form>
                @else
                    <form 
                        class="font-bold cursor-pointer text-yellow-400 hover:fill-current transition duration-300 ease-in-out transform text-3xl"
                        action="{{ route('wishlist.store', $book->book_id) }}" 
                        method="POST"
                    >
                        @csrf
                        <button type="submit" class="bg-transparent border-none p-0 m-0 cursor-pointer">
                            <ion-icon name="star-outline"></ion-icon>
                        </button>
                    </form>
                @endif
            </div>

            <!-- Book Image -->
            <img src="{{ $book->book_cover }}" alt="Book pic" class="w-[150px] h-[225px] rounded-lg">
        </div>

        <!-- Book Details & Buttons -->
        <div class="mt-6 flex justify-between items-start w-full">
            <!-- Left Side: Text -->
            <div class="text-left">
                <h3 class="text-xl font-bold">Title: {{ $book->book_title }}</h3>
                <p class="text-gray-400">Author: {{ $book->author_name }}</p>
                <p class="text-gray-500">Publisher: {{ $book->publisher_name }}</p>
                <span class="text-gray-500">Tag: </span>
                <a href="{{ route('browse.show', $book->book_category) }}" 
                   class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mt-2 mb-2">
                    {{ $book->book_category }}
                </a>
            </div>

            <!-- Add to Cart & Buy Now Buttons -->
            <div class="ml-1 flex flex-col space-y-3">
                <div class="bg-white text-white py-1 rounded-sm flex items-center space-x-2 text-sm">
                    <span class="bg-gray-700 text-white px-2 py-1 rounded-md font-semibold ml-[-3px] text-lg">
                        ${{ $book->book_price }}
                    </span>
                </div>
                <form action="{{ route('checkout.buyNow', $book->book_id) }}" method="GET" class="flex items-center space-x-2">
                    <input type="hidden" name="quantity" id="buyNowQuantity">
                    <button type="submit" 
                            class="bg-yellow-400 w-full px-6 py-2 text-black font-semibold rounded hover:bg-red-500 hover:text-white">
                        BUY NOW
                    </button>
                </form>
                <form action="{{ route('cart.store', $book->book_id) }}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="quantity" id="addToCartQuantity">
                    <input type="number" name="quantity" value="1" min="1" class="border rounded p-2 w-16" id="quantity">
                    <button type="submit" class="bg-gray-700 px-6 py-2 rounded text-white hover:bg-black">
                        ADD TO CART
                    </button>
                </form>

                <script>
                    document.getElementById('quantity').value = 1;
                    document.getElementById('buyNowQuantity').value = 1;
                    document.getElementById('addToCartQuantity').value = 1;

                    document.getElementById('quantity').addEventListener('change', function() {
                        document.getElementById('buyNowQuantity').value = this.value;
                        document.getElementById('addToCartQuantity').value = this.value;
                    });
                </script>
            </div>
        </div>
    </main>
</div>
@endsection