@section('title') {{ 'Cart' }} @endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6">
            {{ __('Cart') }}
        </h2>

        @if ($cartItems->isEmpty())
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                    <p class="flex justify-center text-lg font-semibold">
                        You cannot checkout with an empty cart!
                    </p>
                    <div class="flex justify-center mt-4">
                        <button 
                            onclick="window.location.href='{{ route('explore.index') }}'" 
                            class="bg-blue-500 text-white px-4 py-2 rounded">
                            Explore Books
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                @foreach ($cartItems as $cart)
                    <div class="flex justify-between items-center border-b py-4">
                        <div class="flex items-center">
                            <img 
                                src="{{ $cart->book_cover }}" 
                                alt="{{ $cart->book_title }}" 
                                class="w-16 h-24 object-cover mr-4">
                            <div>
                                <p class="text-lg font-semibold">{{ $cart->book_title }}</p>
                                <p class="text-gray-600">{{ $cart->author_name }}</p>
                                <p class="text-gray-600">${{ $cart->book_price }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <!-- Update Quantity Form -->
                            <form 
                                action="{{ route('cart.update', $cart->cart_id) }}" 
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <input 
                                    type="number" 
                                    name="quantity" 
                                    value="{{ $cart->quantity }}" 
                                    min="1" 
                                    max="1000" 
                                    class="border rounded p-2 w-16">
                                <button 
                                    type="submit" 
                                    class="bg-blue-500 text-white px-4 py-2 rounded">
                                    Update
                                </button>
                            </form>

                            <!-- Remove from Cart Form -->
                            <form 
                                id="delete-form-{{ $cart->cart_id }}" 
                                action="{{ route('cart.destroy', $cart->cart_id) }}" 
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="button" 
                                    onclick="confirmDelete({{ $cart->cart_id }})" 
                                    class="bg-red-500 text-white px-4 py-2 rounded">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end mt-6">
                <button 
                    onclick="window.location.href='{{ route('checkout.index') }}'" 
                    class="bg-green-500 text-white px-6 py-3 rounded">
                    Proceed to Checkout
                </button>
            </div>
        @endif
    </x-slot>
</x-app-layout>