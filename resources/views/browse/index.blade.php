@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-white text-black">

    <!-- Main Content -->
   <main class="flex-1 p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Browse</h2>
        </div>

        <!-- Categories -->
        <div class="flex flex-col items-center gap-3 mt-4">
            <div class="flex flex-wrap justify-center gap-3">
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110"onclick="window.location.href='/'" >Fantasy</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Mystery</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Horror</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Science Fiction</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Drama</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Thriller</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Crime</button>
            </div>
            
            <div class="flex justify-center gap-3">
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Fiction</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Non-Fiction</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Poetry</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">History</button>
                <button class="px-6 py-2 bg-gray-200 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='/'">Romance</button>
            </div>
        </div>

        <!-- Search Section -->
        <div class="text-center mt-8">
            <h2 class="text-2xl font-bold">Serching your own adventure</h2>
            <p class="text-gray-500">just chill guy</p>

            <div class="mt-4 flex justify-center">
                <div class="relative w-1/2 transition-transform transform hover:scale-110">
                    <input id="search" type="text" class="border p-3 w-full rounded-full pr-10 focus:outline-none" placeholder="Search for name, author">
                    <form action="{{ route('browse.show', ['id' => '1']) }}" method="GET" class="absolute top-1/2 right-3 transform -translate-y-1/2 flex items-center justify-center" onsubmit="return validateSearch()">
                        <input type="hidden" name="search" id="searchInput">
                        <button type="submit" class="bg-blue-500 text-white rounded-full w-10 h-10" onclick="document.getElementById('searchInput').value = document.getElementById('search').value;">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/search--v1.png" alt="search--v1" class="mx-auto"/>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </main> 
</div>

<script>
    function validateSearch() {
        var searchInput = document.getElementById('search').value;
        if (searchInput.trim() === '') {
            return false;
        }
        return true;
    }
</script>
@endsection