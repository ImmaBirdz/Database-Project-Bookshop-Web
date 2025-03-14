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
            <span class="bg-white text-black px-2 py-1 rounded-sm font-bold ml-[-3px]">15$</span>
            <span class="text-red-500 font-bold">SALE -15%</span>
        </div>



            <!-- Book Image -->
            <img src="/path-to-image.jpg" alt="Book pic" class="w-[350px] h-[524px] rounded-lg ">
        </div>

        <!-- Book Details & Buttons -->
        <div class="mt-6 flex justify-between items-start w-full">
            <!-- Left Side: Text -->
            <div class="text-left">
                <h3 class="text-xl font-bold">Harry Potter and the Prisoner of Azkaban</h3>
                <p class="text-gray-400">J. K. Rowling</p>
                <p class="text-gray-500">info (if have)</p>
            </div>

            <!-- add to cart & buy now button -->
            <div class="ml-1 flex flex-col space-y-3">
                <button class="bg-yellow-400 px-6 py-2 text-black font-semibold rounded">BUY NOW</button>
                <form action="{{ route('cart.store', 1) }}" method="POST"> <!-- 1 is the book ID -->
                    @csrf
                    @method('POST')
                    <input type="number" name="quantity" value="1" min="1" class="border rounded p-2 w-16"> <!-- Quantity -->
                    <button type="submit" class="bg-gray-700 px-6 py-2 rounded text-white">ADD TO CART</button>
                </form>
            </div>

        </div>
    </main>
</div>
@endsection