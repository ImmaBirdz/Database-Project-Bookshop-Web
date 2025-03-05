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
                    <button class="ml-2 text-black bg-transparent border-none">Browse</button>
                </li>
                <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-shopping-cart"></i>
                    <button class="ml-2 text-black bg-transparent border-none">Store</button>
                </li>
            </ul>
            <p class="text-sm font-semibold text-gray-600 mt-4">Library</p>
            <ul class="space-y-2 mt-2">
                <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-list"></i>
                    <button class="ml-2 text-black bg-transparent border-none">Collections</button>
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
            <h2 class="text-2xl font-bold">Explore</h2>
            <div>
                <button class="bg-[#454545] px-4 py-2 rounded mr-2 text-white">My Cart</button>
                <button class="bg-black px-4 py-2 rounded text-white">Log Out</button>
            </div>
        </div>
        <div>
            <h3 class="text-xl font-bold mt-6">Books List</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="https://m.media-amazon.com/images/I/51RjWBYGweL._SY445_SX342_.jpg" alt="Harry Potter and the Prisoner of Azkaban" class="w-full h-auto mb-4" style="max-width: 286px; max-height: 432px;">
                <div class ="text-lg font-semibold">Harry Potter and the Prisoner of Azkaban</div>
                <p class="text-sm text-gray-600">J. K. Rowling</p>
            </div>
            
            </div>
        </div>
    </main>
</div>
@endsection