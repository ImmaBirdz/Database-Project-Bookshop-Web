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
                    <button class="ml-2 text-black bg-transparent border-none">Home</button>
                </li>
                <li class="flex items-center px-3 py-2 rounded-lg bg-gray-100">
                    <i class="fas fa-search"></i>
                    <button class="ml-2 text-black bg-transparent border-none">Browse</button>
                </li>
                <!-- <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-shopping-cart"></i>
                    <button class="ml-2 text-black bg-transparent border-none">Store</button>
                </li> -->
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
            <h2 class="text-2xl font-bold">Browse</h2>
        </div>
        

        <!-- Categories -->
        <div class="flex flex-col items-center gap-3 mt-4">
            <div class="flex flex-wrap justify-center gap-3">
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110 ">Fantasy</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">Mystery</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">Horror</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">Science Fiction</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">Drama</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">Thriller</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">Crime</button>
            </div>
            
            <div class="flex justify-center gap-3">
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">Fiction</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">Poetry</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">History</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110">Romance</button>
            </div>
        </div>




        <!-- Search Section -->
        <div class="text-center mt-8">
            <h2 class="text-2xl font-bold">Serching your own adventure</h2>
            <p class="text-gray-500">just chill guy</p>

            <div class="mt-4 flex justify-center">
                <div class="relative w-1/2 transition-transform transform hover:scale-110">
                    <input type="text" class="border p-3 w-full rounded-full pr-10 focus:outline-none" placeholder="Search for name, author">
                    <button class="absolute top-1/2 right-3 transform -translate-y-1/2 flex items-center justify-center bg-blue-500 text-white rounded-full w-10 h-10"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/search--v1.png" alt="search--v1"/></button>
                </div>
            </div>
        </div>
    </main> 
</div>
@endsection