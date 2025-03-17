@section('title') {{ 'Wishlist' }} @endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wishlist') }}
        </h2>
            @if ($wishlists->isEmpty())
                <p class="text-gray-600 text-lg">Your wishlist is empty.</p>
            @else
                <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                    @foreach ($wishlists as $wishlist)
                        <div class="flex justify-between items-center border-b py-4">
                                <div class="flex items-center space-x-4">
                                    <div>
                                        <img src="{{ $wishlist->book_cover }}" alt="Book cover" class="w-20 h-28 rounded-lg">
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold">{{ $wishlist->book_title }}</p>
                                        <p class="text-gray-600">{{ $wishlist->author_name }}</p>
                                        <p class="text-gray-600">${{ $wishlist->book_price }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-4">
                                    <!-- Add to Cart Form -->
                                    <form action="{{ route('cart.store', $wishlist->book_id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="book_id" value="{{ $wishlist->book_id }}">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add to Cart</button>
                                    </form>
                                    <!-- Remove from Wishlist Form -->
                                    <form id="delete-form-{{ $wishlist->wishlist_id }}" action="{{ route('wishlist.destroy', $wishlist->book_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $wishlist->wishlist_id }})" class="bg-red-500 text-white px-4 py-2 rounded">Remove</button>
                                    </form>
                                </div>
                        </div>
                    @endforeach
                </div>
            @endif
    </x-slot>     
</x-app-layout>