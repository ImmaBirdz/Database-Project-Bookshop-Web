<div class="min-h-screen w-64 bg-white shadow-md p-4">
    <h2 class="text-xl font-bold">Books</h2>
    <nav class="mt-4">
        <p class="text-sm font-semibold text-gray-600">Discover</p>
        <ul class="space-y-2 mt-2">
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-home"></i>
                <button onclick="window.location.href='{{ url('/explore') }}'" class="ml-2 text-black bg-transparent border-none">Home</button>
            </li>
            <li class="flex items-center px-3 py-2 rounded-lg bg-gray-100">
                <i class="fas fa-search"></i>
                <button class="ml-2 text-black bg-transparent border-none">Browse</button>
            </li>
        </ul>
        <p class="text-sm font-semibold text-gray-600 mt-4">Library</p>
        <ul class="space-y-2 mt-2">
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-list"></i>
                <button onclick="window.location.href='{{ url('/mycollection') }}'" class="ml-2 text-black bg-transparent border-none">Collections</button>
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

<!-- i will fix the hover later -->
