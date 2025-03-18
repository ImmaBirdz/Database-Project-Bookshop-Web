@section('title') {{ 'My Order' }} @endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Order') }}
        </h2>

        @if (!$myOrders->isEmpty())
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/3">
                            <div class="flex flex-col space-y-4">
                                @foreach($myOrders as $myOrder)
                                    <div x-data="{ open: false }" class="flex flex-col bg-gray-100 p-4 rounded-lg">
                                        <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                            <div class="flex items-center justify-between w-full">
                                                <p class="font-semibold">Order ID: {{ $myOrder->order_id }}</p>
                                                <p class="ml-4">Total Quantity: {{ $myOrder->total_quantity }}</p>
                                            </div>
                                            <div class="flex items-center px-2">
                                                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div x-show="open" class="mt-4" x-cloak>
                                            <p>Order Date: {{ $myOrder->order_date }}</p>
                                            <p>Order Status: {{ ucfirst($myOrder->order_status) }}</p>
                                            <div class="mt-4">
                                                <p class="font-semibold">Order Details</p>
                                                <div class="flex flex-col space-y-2 mt-2">
                                                    @foreach($myOrderDetails as $myOrderDetail)
                                                        @if($myOrderDetail->order_id == $myOrder->order_id)
                                                            <div class="flex items-center justify-between">
                                                                <div class="flex items-center">
                                                                    <img src="{{ $myOrderDetail->book_cover }}" alt="{{ $myOrderDetail->book_title }}" class="w-16 h-24 object-cover rounded-lg mr-4">
                                                                    <div class="ml-4">
                                                                        <p class="font-semibold">{{ $myOrderDetail->book_title }}</p>
                                                                        <p>Quantity: {{ $myOrderDetail->quantity }}</p>
                                                                        <p>Price: ${{ $myOrderDetail->total_price }}</p>
                                                                    </div>
                                                                </div>
                                                                <p class="font-semibold">${{ $myOrderDetail->total_price * $myOrderDetail->quantity }}</p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <p>Order Total: ${{ $myOrder->total }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                    <p class="flex justify-center text-lg font-semibold">No order found!</p>
                    <div class="flex justify-center mt-4">
                        <button onclick="window.location.href='{{ route('explore.index') }}'" class="bg-blue-500 text-white px-4 py-2 rounded">Explore Books</button>
                    </div>
                </div>
            </div>
        @endif
    </x-slot>
</x-app-layout>
