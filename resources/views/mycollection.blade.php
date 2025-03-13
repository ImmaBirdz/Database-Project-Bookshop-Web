@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-black text-black">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800">Your Order Summary</h1>
        <p class="mt-4 text-gray-600">Review your selected books before checkout.</p>

        <!-- Order List -->
        <div class="mt-6 space-y-6">
            @foreach($books as $book)
                <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow-lg">
                    <!-- Book Image -->
                    <div class="w-24 h-32 bg-gray-300 overflow-hidden rounded-md">
                        <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Book Details -->
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-bold text-gray-800">{{ $book->title }}</p>
                        <p class="text-xs text-gray-600">by {{ $book->author }}</p>
                    </div>

                    <!-- Quantity and Price -->
                    <div class="flex items-center space-x-4">
                        <p class="text-sm text-gray-600">Quantity: {{ $book->quantity }}</p>
                        <p class="text-sm font-bold text-gray-800">${{ $book->price * $book->quantity }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Total Price Section -->
        <div class="mt-8 flex justify-between items-center bg-gray-100 p-4 rounded-lg">
            <p class="text-xl font-bold text-gray-800">Total Price</p>
            <p class="text-xl font-bold text-gray-800">${{ $totalPrice }}</p>
        </div>

        <!-- Checkout Button -->
        <div class="mt-6 flex justify-center">
            <x-primary-button class="px-6 py-2 rounded-full">
                Proceed to Checkout
            </x-primary-button>
        </div>
    </div>
</div>
@endsection
