<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wishlist') }}
        </h2>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if ($wishlists->isEmpty())
                <p class="text-gray-600 text-lg">Your wishlist is empty.</p>
            @else
                <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                    @foreach ($wishlists as $wishlist)
                        <div class="flex justify-between items-center border-b py-4">
                            <div>
                                <p class="text-lg font-semibold">{{ $wishlist->book_title }}</p>
                                <p class="text-gray-600">{{ $wishlist->author_name }}</p>
                                <p class="text-gray-600">${{ $wishlist->book_price }}</p>
                            </div>

                            <div class="flex items-center space-x-4">
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
        </div>
    </x-slot>     
</x-app-layout>