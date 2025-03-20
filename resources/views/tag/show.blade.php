@extends('layouts.app')

@section('title') {{ ucfirst($tag) . ' Book' }} @endsection

@section('content')
<div class="flex-column min-h-screen bg-white text-black">
    <main class="flex-1 p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">{{ ucfirst($tag) }} Book</h2>
        </div>
        @if($items->isNotEmpty())
        <!-- show search result with input -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
            @foreach($items as $item)
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ $item->book_cover }}" alt="{{ $item->title }}" class="w-full h-auto mb-4" style="width: 288px; height: 432px; aspect-ratio: 2/3;">
                <div class="text-lg font-semibold flex items-center justify-between">
                {{ $item->book_title }}
                @if(isset($wishlist) && $wishlist->where('book_id', $item->book_id)->exists() && Auth::check())
                <form class="font-bold cursor-pointer text-yellow-400 hover:text-yellow-500 transition duration-300 ease-in-out transform text-3xl"
                    action="{{ route('wishlist.destroy', $item->book_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-transparent border-none p-0 m-0 cursor-pointer">
                    <ion-icon name="star"></ion-icon>
                    </button>
                </form>
                @else
                <form class="font-bold cursor-pointer text-yellow-400 hover:fill-current transition duration-300 ease-in-out transform text-3xl"
                    action="{{ route('wishlist.store', $item->book_id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-transparent border-none p-0 m-0 cursor-pointer">
                    <ion-icon name="star-outline"></ion-icon>
                    </button>
                </form>
                @endif
                </div>
                <p class="text-sm text-gray-600">{{ $item->author_name }}</p>
                <a href="{{ route('browse.show', $item->book_category) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mt-2 mb-2">{{ $item->book_category }}</a>
                <p class="text-sm text-gray-600">${{ $item->book_price }}</p>
                <div class="mt-4 flex items-center ">
                <form action="{{ route('cart.store', $item->book_id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="bg-[#454545] px-4 py-2 rounded mr-2 text-white">Add to Cart</button>
                </form>
                <button onclick="window.location.href='{{ url("book/{$item->book_id}") }}'" class="bg-black px-4 py-2 rounded text-white">View Details</button>
                </div>
            </div>
            @endforeach
            </div>
            <div class="mt-4">
                <!-- pagination -->
                {{ $items->links() }}
            </div>
        @else
        <!-- show "not found" -->
        <div class="mt-4">
            <div class="flex justify-center bg-white rounded-lg p-4">
                <h2 class="text-2xl font-bold">No {{ $tag }} books found</h2>
            </div>
        </div>
        @endif
    </main>
</div>
@endsection