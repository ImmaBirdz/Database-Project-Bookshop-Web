@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-white text-black">

<!-- Side B L -->
<div class="min-h-screen w-64 bg-white shadow-md p-4">
        <h2 class="text-xl font-bold">Books</h2>
        <nav class="mt-4">
            <p class="text-sm font-semibold text-gray-600">Discover</p>
            <ul class="space-y-2 mt-2">
                <li class="flex items-center px-3 py-2 rounded-lg bg-gray-100">
                    <i class="fas fa-home"></i>
                    <button class="ml-2 text-black bg-transparent border-none">Home</button>
                </li>
                <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-search"></i>
                    <button onclick="window.location.href='http://localhost/browse'" class="ml-2 text-black bg-transparent border-none">Browse</button>
                </li>
                <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-shopping-cart"></i>
                    <button class="ml-2 text-black bg-transparent border-none">Store</button>
                </li>
            </ul>
            <p class="text-sm font-semibold text-gray-600 mt-4">Library</p>
            <ul class="space-y-2 mt-2">
                <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-list"></i>
                    <button onclick="window.location.href='http://localhost/mycollection'" class="ml-2 text-black bg-transparent border-none">Collections</button>
                </li>
                <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-heart"></i>
                    <button class="ml-2 text-black bg-transparent border-none">Favourite</button>
                </li>
                <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-smile"></i>
                    <button class="ml-2 text-black bg-transparent border-none">My List</button>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Explore</h2>
        </div>
        <div>
            <h3 class="text-xl font-bold mt-6">Books List</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
            @foreach($books as $book)
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ $book->book_cover }}" alt="{{ $book->title }}" class="w-full h-auto mb-4" style="width: 286px; height: 432px;">
                <div class="text-lg font-semibold flex items-center justify-between">
                    {{ $book->book_title }}
                    @if($wishlists->where('book_id', $book->book_id)->exists() && Auth::check())
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
                <p class="text-sm text-gray-600">{{ $book->author_name }}</p>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mt-2 mb-2">{{ $book->book_category }}</span>
                <p class="text-sm text-gray-600">${{ $book->book_price }}</p>
                <div class="mt-4 flex items-center ">
                    <form action="{{ route('cart.store', $book->book_id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="bg-[#454545] px-4 py-2 rounded mr-2 text-white">Add to Cart</button>
                    </form>
                    <button onclick="window.location.href='{{ url("book/{$book->book_id}") }}'" class="bg-black px-4 py-2 rounded text-white">View Details</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $books->links() }}
        </div>
            </div>
        </div>
    </main>
</div>
@endsection