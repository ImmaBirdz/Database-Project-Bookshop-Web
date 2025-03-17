@section('title') {{ 'Profile' }} @endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <div class="flex justify-between items-center">
                            <div>
                                <h1 class="text-2xl font-semibold text-gray-800">Profile Information</h1>
                            </div>
                        </div>
                        <div class="mt-4">
                            <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" class="w-32 h-32 object-cover rounded-full">
                        </div>
                        <div class="mt-4">
                            <div class="flex flex-col sm:flex-row">
                                <div class="w-full sm:w-1/3">
                                    <p class="text-gray-600">Name</p>
                                </div>
                                <div class="w-full sm:w-2/3">
                                    <p class="text-gray-800">{{ auth()->user()->name }}</p>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row">
                                <div class="w-full sm:w-1/3">
                                    <p class="text-gray-600">Email</p>
                                </div>
                                <div class="w-full sm:w-2/3">
                                    <p class="text-gray-800">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row">
                                <div class="w-full sm:w-1/3">
                                    <p class="text-gray-600">Address</p>
                                </div>
                                <div class="w-full sm:w-2/3">
                                    <p class="text-gray-800">{{ auth()->user()->address }}</p>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row">
                                <div class="w-full sm:w-1/3">
                                    <p class="text-gray-600">Phone Number</p>
                                </div>
                                <div class="w-full sm:w-2/3">
                                    <p class="text-gray-800">{{ auth()->user()->phone_number }}</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
