@extends('layouts.app')

@section('title') {{ 'My Collection' }} @endsection

@section('content')
<div class="flex min-h-screen bg-white text-black">

<!-- Main Content -->
<main class="flex-1 p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">My Collection</h2>
        </div>
        
        <!-- Layout -->
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Book Grid -->
            @if(!is_null($myCollections) && is_iterable($myCollections))
                @foreach ($myCollections as $myCollection)
                <button class="flex flex-col items-center bg-gray-50 p-4 rounded-lg transform transition-transform duration-300 hover:scale-110" onclick="handleCoverClick({{ $myCollection->book_id }})">
                    <div class="bg-gray-300 overflow-hidden" style="width: 280px; height: 390px;">
                        <img src="{{ $myCollection->book_cover }}" alt="Book Cover" class="w-full h-full object-cover text-gray-600">
                    </div>
                    <p class="text-sm font-bold mt-2">{{ $myCollection->book_title }}</p>
                    <p class="text-xs text-gray-600">{{ $myCollection->author_name }}</p>
                    <p class="text-xs text-gray-600">{{ $myCollection->book_category }}</p>
                    <p class="text-xs text-gray-600">Quantity: {{ $myCollection->quantity }}</p>
                </button>
                @endforeach
                @else
                <p>No collections found.</p>
                @endif
            <!-- pagination not place good -->
            <span class="flex justify-between mt-6">
                {{ $myCollections->links() }}
            </span>
        </div>
    </main> 

    @endsection