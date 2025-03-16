@section('title') {{ 'Checkout' }} @endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>

        <div class="max-w-7xl mx-auto py-0 sm:px-6 lg:px-8">
            @if ($cartItems->isEmpty())
                <p class="text-gray-600 text-lg">Your cart is empty.</p>
            @else
                <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                    <form action="{{ route('cart.bulkUpdate') }}" method="POST">
                        @csrf
                        @foreach ($cartItems as $cart)
                            <div class="flex justify-between items-center border-b py-4">
                                <div class="flex items center">
                                    <input type="checkbox" name="selected_books[]" value="{{ $cart->cart_id }}" class="mr-4">
                                    <div>
                                        <p class="text-lg font-semibold">{{ $cart->book_title }}</p>
                                        <p class="text-gray-600">{{ $cart->author_name }}</p>
                                        <p class="text-gray-600">${{ $cart->book_price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </form>
                </div>
            @endif
        </div>
    </x-slot>
</x-app-layout>
