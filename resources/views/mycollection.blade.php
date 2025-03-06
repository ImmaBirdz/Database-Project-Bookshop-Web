@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-white text-black">

  <!-- Side B L -->
  <div class="min-h-screen w-64 bg-white shadow-md p-4">
        <h2 class="text-xl font-bold">Books</h2>
        <nav class="mt-4">
            <p class="text-sm font-semibold text-gray-600">Discover</p>
            <ul class="space-y-2 mt-2">
                <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-home"></i>
                    <button onclick="window.location.href='http://localhost/explore'" class="ml-2 text-black bg-transparent border-none">Home</button>
                </li>
                <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-search"></i>
                    <button onclick="window.location.href='http://localhost/browse'" class="ml-2 text-black bg-transparent border-none">Browse</button>
                </li>
                <!-- <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-shopping-cart"></i>
                    <button class="ml-2 text-black bg-transparent border-none">Store</button>
                </li> -->
            </ul>
            <p class="text-sm font-semibold text-gray-600 mt-4">Library</p>
            <ul class="space-y-2 mt-2">
                <li class="flex items-center px-3 py-2 rounded-lg bg-gray-100">
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
            <h2 class="text-2xl font-bold">My Library</h2>
        </div>
        
       <!-- Layout -->
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Book Grid -->
            @for ($i = 0; $i < 18; $i++) 
                <button class="flex flex-col items-center bg-gray-50 p-4 rounded-lg transform transition-transform duration-300 hover:scale-110" onclick="handleCoverClick({{ $i }})">
                    <div class="bg-gray-300 overflow-hidden" style="width: 280px; height: 390px;">
                        <!-- Placeholder Book Cover Image -->
                        <img src="https://via.placeholder.com" alt="Book Cover" class="w-full h-full object-cover text-gray-600">
                    </div>
                    <p class="text-sm font-bold mt-2">Book Name {{ $i + 1 }}</p>
                    <p class="text-xs text-gray-600">Author Name</p>
                </button>
            @endfor
         </div>
    </main> 
</div>
@endsection