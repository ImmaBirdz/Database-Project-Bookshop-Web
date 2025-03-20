@section('title') 
    {{ 'Checkout Successful' }} 
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout Successful') }}
        </h2>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 text-center">
                <p class="text-lg font-semibold">Thank you for your purchase!</p>
                <p class="text-gray-600">Your order has been successfully placed.</p>
                <div class="flex justify-center mt-4">
                    <a href="{{ route('order.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded ml-4">
                        View Order
                    </a>
                    <a href="{{ route('collection.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded ml-4">
                        View Collection
                    </a>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>