@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-black text-black" style="background-image: url('https://images.steamusercontent.com/ugc/586909633581902758/BCAF264131B1B1792A7F985BFDCB749844A7DB8B/?imw=512&&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=false'); background-size: cover; background-position: center;">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-white">Your Order Summary</h1>
        <p class="mt-4 text-gray-50">Review your selected books before checkout.</p>

        <!-- Order List -->
        <div class="mt-6 space-y-6 bg-opacity-70 p-4 rounded-lg shadow-lg"> 

            @php
                //  book data for preview
                $books = [
                    (object)[
                        'image_url' => 'https://via.placeholder.com/150',
                        'title' => 'Book 1',
                        'author' => 'Author 1',
                        'price' => 15,
                        'quantity' => 2
                    ],
                    (object)[
                        'image_url' => 'https://via.placeholder.com/150',
                        'title' => 'Book 2',
                        'author' => 'Author 2',
                        'price' => 18,
                        'quantity' => 5
                    ],
                    (object)[
                        'image_url' => 'https://via.placeholder.com/150',
                        'title' => 'Book 3',
                        'author' => 'Author 3',
                        'price' => 40,
                        'quantity' => 3
                    ]
                ];
            @endphp

            <!-- Display books -->
            @foreach($books as $book)
                <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow-lg" id="book-{{ $loop->index }}">
                    <!-- Book Image -->
                    <div class="w-24 h-32 bg-gray-300 overflow-hidden ">
                        <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Book Details -->
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-bold text-gray-800">{{ $book->title }}</p>
                        <p class="text-xs text-gray-600">by {{ $book->author }}</p>
                        <p class="text-xs text-gray-600">Price: ${{ $book->price }}</p> 
                    </div>

                    <!-- Quantity and Total Price -->
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <!-- Decrement Quantity -->
                            <button class="px-2 py-1 text-white bg-blue-500 rounded-full hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-300 decrease-btn" data-book-index="{{ $loop->index }}">
                                &minus;
                            </button>

                            <!-- Quantity Number -->
                            <p class="text-sm text-gray-600 quantity-display" id="quantity-{{ $loop->index }}">{{ $book->quantity }}</p>

                            <!-- Increment Quantity -->
                            <button class="px-2 py-1 text-white bg-pink-500 rounded-full hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-300 increase-btn" data-book-index="{{ $loop->index }}">
                                &plus;
                            </button>
                        </div>
                        <p class="text-sm font-bold text-gray-800 total-price" id="total-price-{{ $loop->index }}">${{ $book->price * $book->quantity }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Total Price Section -->
        <div class="mt-8 flex justify-between items-center bg-gray-100 p-4 rounded-lg">
            <p class="text-xl font-bold text-gray-800">Total Price</p>
            <p class="text-xl font-bold text-gray-800" id="grand-total">${{ collect($books)->sum(fn($book) => $book->price * $book->quantity) }}</p>
        </div>

        <!-- Checkout Button -->
        <div class="mt-6 flex justify-center">
            <x-primary-button class="px-6 py-2 rounded-full">
                Proceed to Checkout
            </x-primary-button>
        </div>
    </div>
</div>


<!-- ah is see y the button didnt work cos in the above i didnt use$book to refer to book data-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to update the total price when quantity changes
        function updatePrice(bookIndex) {
            const quantity = parseInt(document.getElementById(`quantity-${bookIndex}`).innerText);
            const price = @json($books)[bookIndex].price;
            const totalPrice = quantity * price;
            
            document.getElementById(`total-price-${bookIndex}`).innerText = `$${totalPrice}`;
            updateGrandTotal(); // Update the grand total after changing quantity
        }

        // Function to update the grand total
        function updateGrandTotal() {
            let grandTotal = 0;
            @foreach($books as $book)
                const quantity = parseInt(document.getElementById(`quantity-{{ $loop->index }}`).innerText);
                const price = {{ $book->price }};
                grandTotal += quantity * price;
            @endforeach
            document.getElementById('grand-total').innerText = `$${grandTotal}`;
        }

        // Increase quantity event listener
        document.querySelectorAll('.increase-btn').forEach(button => {
            button.addEventListener('click', function() {
                const bookIndex = this.getAttribute('data-book-index');
                const quantityDisplay = document.getElementById(`quantity-${bookIndex}`);
                quantityDisplay.innerText = parseInt(quantityDisplay.innerText) + 1;
                updatePrice(bookIndex);
            });
        });

        // Decrease quantity event listener
        document.querySelectorAll('.decrease-btn').forEach(button => {
            button.addEventListener('click', function() {
                const bookIndex = this.getAttribute('data-book-index');
                const quantityDisplay = document.getElementById(`quantity-${bookIndex}`);
                if (parseInt(quantityDisplay.innerText) > 1) {
                    quantityDisplay.innerText = parseInt(quantityDisplay.innerText) - 1;
                    updatePrice(bookIndex);
                }
            });
        });
    });
</script>

@endsection
