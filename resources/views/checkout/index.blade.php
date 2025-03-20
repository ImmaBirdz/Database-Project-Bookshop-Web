@section('title') {{ 'Checkout' }} @endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6">
            {{ __('Checkout') }}
        </h2>

        @if($cartItems->isNotEmpty())
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                <div class="flex flex-col lg:flex-row">
                    <div class="w-full lg:w-2/3">
                        @foreach ($cartItems as $cart)
                            <div class="flex justify-between items-center border-b py-4">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ $cart->book_cover }}" alt="{{ $cart->book_title }}" class="w-16 h-24 object-cover">
                                    <div>
                                        <p class="text-lg font-semibold">{{ $cart->book_title }}</p>
                                        <p class="text-gray-600">{{ $cart->author_name }}</p>
                                        <p class="text-gray-600">${{ $cart->book_price }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <p class="text-lg font-semibold">Quantity: {{ $cart->quantity }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="w-full lg:w-1/3 lg:pl-6 mt-6 lg:mt-0">
                        <div class="bg-gray-100 p-4 rounded-lg mb-6">
                            <p class="text-lg font-semibold">User Information</p>
                            <p class="text-gray-600">Name: {{ $user->name }}</p>
                            <p class="text-gray-600">Email: {{ $user->email }}</p>
                            <p class="text-gray-600">Address: {{ $user->address }}</p>
                            <p class="text-gray-600">Phone: {{ $user->phone_number }}</p>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <div class="flex justify-between items-center border-b py-4">
                                <div>
                                    <p class="text-lg font-semibold">Total</p>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold">${{ $total }}</p>
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <form action="{{ route('checkout.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                        <p class="flex justify-center text-lg font-semibold">You cannot checkout with empty cart!</p>
                        <div class="flex justify-center mt-4">
                            <button onclick="window.location.href='{{ route('explore.index') }}'" class="bg-blue-500 text-white px-4 py-2 rounded">Explore Books</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-slot>
</x-app-layout>
