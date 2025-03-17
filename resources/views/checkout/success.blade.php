@section('title') {{ 'Checkout Successful' }} @endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout Successful') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <p class="text-lg font-semibold">Thank you for your purchase!</p>
            <p class="text-gray-600">Your order has been successfully placed.</p>
            <div class="flex justify-center mt-4">
                <form action="{{ route('explore.index') }}" method="GET">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Explore Books</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>