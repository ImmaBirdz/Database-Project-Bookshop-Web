<div class="min-h-screen w-64 bg-white shadow-md p-4 overflow-hidden">
    <h2 class="text-xl font-bold">Bookshop Name</h2>
    <nav class="mt-4">
        <p class="text-sm font-semibold text-gray-600">Discover</p>
        <ul class="space-y-2 mt-2">
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-home"></i>
                <button onclick="window.location.href='{{ route('explore.index') }}'" class="ml-2 text-black bg-transparent border-none">Home</button>
            </li>
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-search"></i>
                <button onclick="window.location.href='{{ route('browse.index') }}'" class="ml-2 text-black bg-transparent border-none">Browse</button>
            </li>
        </ul>
        @if(Auth::check())
        <p class="text-sm font-semibold text-gray-600 mt-4">Library</p>
        <ul class="space-y-2 mt-2">
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-list"></i>
                <button onclick="window.location.href='{{ url('/mycollection') }}'" class="ml-2 text-black bg-transparent border-none">Collections</button>
            </li>
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-smile"></i>
                <button onclick="window.location.href='{{ route('wishlist.index') }}'" class="ml-2 text-black bg-transparent border-none">Wishlist</button>
            </li>
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-shopping-cart"></i>
                <button onclick="window.location.href='{{ route('cart.index') }}'" class="ml-2 text-black bg-transparent border-none">Cart</button>
            </li>
        </ul>
        <!-- My profile -->
        <p class="text-sm font-semibold text-gray-600 mt-4">Setting</p>
        <ul class="space-y-2 mt-2">
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-user"></i>
                <button onclick="window.location.href='{{ route('profile.index') }}'" class="ml-2 text-black bg-transparent border-none">Profile</button>
            </li>
            <!-- this one is temporary -->
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-cog"></i>
                <button onclick="window.location.href='{{ route('profile.edit') }}'" class="ml-2 text-black bg-transparent border-none">Settings</button>
            </li>
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-sign-out-alt"></i>
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="ml-2 text-black bg-transparent border-none">Logout</button>
                </form>
            </li>
        </ul>
        @else
        <p class="text-sm font-semibold text-gray-600 mt-4">User</p>
        <ul class="space-y-2 mt-2">
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
            <i class="fas fa-sign-in-alt"></i>
            <button onclick="window.location.href='{{ route('login') }}'" class="ml-2 text-black bg-transparent border-none">Login</button>
            </li>
            <li class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100">
            <i class="fas fa-user-plus"></i>
            <button onclick="window.location.href='{{ route('register') }}'" class="ml-2 text-black bg-transparent border-none">Register</button>
            </li>
        </ul>
        @endif
    </nav>
</div>

<!-- i will fix the hover later -->
