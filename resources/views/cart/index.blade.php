@section('title') {{ 'Cart' }} @endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if ($cartItems->isEmpty())
                <p class="text-gray-600 text-lg">Your cart is empty.</p>
            @else
                <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                    @foreach ($cartItems as $cart)
                        <div class="flex justify-between items-center border-b py-4">
                            <div>
                                <p class="text-lg font-semibold">{{ $cart->book_title }}</p>
                                <p class="text-gray-600">{{ $cart->author_name }}</p>
                                <p class="text-gray-600">${{ $cart->book_price }}</p>
                            </div>

                            <div class="flex items-center space-x-4">
                                <!-- Update Quantity Form -->
                                <form action="{{ route('cart.update', $cart->cart_id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" max="1000" class="border rounded p-2 w-16">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                                </form>

                                <!-- Remove from Cart Form -->
                                <form id="delete-form-{{ $cart->cart_id }}" action="{{ route('cart.destroy', $cart->cart_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="confirmDelete({{ $cart->cart_id }})" class="bg-red-500 text-white px-4 py-2 rounded">Remove</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-slot>    
</x-app-layout>