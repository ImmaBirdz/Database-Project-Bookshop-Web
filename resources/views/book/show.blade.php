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
                    <button onclick="window.location.href='http://localhost/browse' " class="ml-2 text-black bg-transparent border-none">Browse</button>
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
            <h2 class="text-2xl font-bold">Books</h2>
            <!-- <div>
                <button class="bg-[#454545] px-4 py-2 rounded mr-2 text-white hover:bg-[#333333]">My Cart</button>
                <button class="bg-black px-4 py-2 rounded text-white hover:bg-[#333333]">Log Out</button>
            </div> -->
        </div>

        <!-- Book Container (Centered Image) -->
        <div class="mt-10 flex flex-col items-center relative">
         <!-- Price Tag -->
        <div class="absolute top-2 right-44 bg-[#F7F7F7] text-white px-2 py-1 rounded-sm flex items-center space-x-2 text-sm">
            <form class="bg-white text-black px-2 py-1 rounded-sm font-bold ml-[-3px]">$ {{ $book->book_price }}</form>
            @if($isInWishlist && Auth::check())
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

            <!-- Book Image -->
            <img src="{{ $book->book_cover }}" alt="Book pic" class="w-[350px] h-[524px] rounded-lg ">
        </div>

        <!-- Book Details & Buttons -->
        <div class="mt-6 flex justify-between items-start w-full">
            <!-- Left Side: Text -->
            <div class="text-left">
                <h3 class="text-xl font-bold">Title: {{ $book->book_title }}</h3>
                <p class="text-gray-400">Author: {{ $book->author_name }}</p>
                <p class="text-gray-500">Publisher: {{ $book->publisher_name }}</p>
            </div>

            <!-- add to cart & buy now button -->
            <div class="ml-1 flex flex-col space-y-3">
                <button class="bg-yellow-400 px-6 py-2 text-black font-semibold rounded">BUY NOW</button>
                <form action="{{ route('cart.store', $book->book_id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="number" name="quantity" value="1" min="1" class="border rounded p-2 w-16">
                    <button type="submit" class="bg-gray-700 px-6 py-2 rounded text-white">ADD TO CART</button>
                </form>
            </div>

        </div>
    </main>
</div>

<!-- Import Ion-Icon -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

@endsection

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
            @endif

            @if (session('delete'))
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted',
                    text: '{{ session('delete') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
            @endif
        });


        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form after the user confirms
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

    </script>