@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-white text-black">

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
                        <p class="text-sm font-bold mt-2">Book Name {{ $i + 1 }}</p>
                    <p class="text-xs text-gray-600">Author Name</p>
                </button>
            @endfor
         </div>
    </main> 

    @endsection