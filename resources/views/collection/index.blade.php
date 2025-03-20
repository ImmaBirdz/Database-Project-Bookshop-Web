@extends('layouts.app')

@section('title') {{ 'My Collection' }} @endsection

@section('content')
<div class="flex min-h-screen bg-gray text-black">
    <main class="flex-1 p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">My Collection</h2>
        </div>

        @if ($myCollections->isEmpty())
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                    <p class="flex justify-center text-lg font-semibold">Your collection is empty!</p>
                    <div class="flex justify-center mt-4">
                        <button onclick="window.location.href='{{ route('explore.index') }}'" class="bg-blue-500 text-white px-4 py-2 rounded">Explore Books</button>
                    </div>
                </div>
            </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
            @foreach($myCollections as $myCollection)
            <div class="bg-white shadow-lg rounded-lg p-4">
                <img src="{{ $myCollection->book_cover }}" alt="{{ $myCollection->title }}" class="w-full h-auto mb-4" style="width: 200px; height: 300px; aspect-ratio: 2/3;">
                <div class="text-lg font-semibold flex items-center justify-between">
                    {{ $myCollection->book_title }}
                </div>
                <p class="text-sm text-gray-600">{{ $myCollection->author_name }}</p>
                <a href="{{ route('tag.show', $myCollection->book_category) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mt-2 mb-2">{{ $myCollection->book_category }}</a>
                <p class="text-sm text-gray-600">Quantity: {{ $myCollection->quantity }}</p>
            </div>
            @endforeach
        </div>
        <div class="mt-6">
            <!-- pagination -->
            {{ $myCollections->links() }}
        </div>
        @endif
    </main>
</div>
@endsection