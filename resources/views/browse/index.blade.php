@extends('layouts.app')

@section('title') {{ 'Browse' }} @endsection

@section('content')
<div class="flex min-h-screen bg-gray-100 text-black">

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Browse</h2>
        </div>

        <!-- Categories -->
        <div class="flex flex-col items-center gap-3 mt-4">
            <div class="flex flex-wrap justify-center gap-3">
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'fantasy']) }}'">Fantasy</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'mystery']) }}'">Mystery</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'horror']) }}'">Horror</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'science fiction']) }}'">Science Fiction</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'drama']) }}'">Drama</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'thriller']) }}'">Thriller</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'crime']) }}'">Crime</button>
            </div>
            
            <div class="flex justify-center gap-3">
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'fiction']) }}'">Fiction</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'non-fiction']) }}'">Non-Fiction</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'poetry']) }}'">Poetry</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'history']) }}'">History</button>
                <button class="px-6 py-2 bg-gray-300 rounded-full hover:bg-blue-500 hover:text-white transition-transform transform hover:scale-110" onclick="window.location.href='{{ route('tag.show', ['id' => 'romance']) }}'">Romance</button>
            </div>
        </div>

        <!-- Search Section -->
        <div class="text-center mt-8">
            <h2 class="text-2xl font-bold">Searching your own adventure</h2>
            <p class="text-gray-500">don't know?</p>

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
    // Handle search by pressing enter
    document.getElementById('search').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            document.getElementById('searchInput').value = document.getElementById('search').value;
            if (validateSearch()){
                document.querySelector('form[action="{{ route('browse.show', ['id' => '1']) }}"]').submit();
            }
        }
    });

    // Validate search input
    function validateSearch() {
        var searchInput = document.getElementById('search').value;
        if (searchInput.trim() === '') {
            return false;
        }
        return true;
    }
</script>
@endsection