<x-guest-layout>

    <div>
        <h1 class="text-3xl font-semibold text-center text-black-500">{{ __('Register') }}</h1>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full  bg-gray-50 focus:bg-gray-200  focus:border-pink-500 focus:ring focus:ring-pink-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full  bg-gray-50 focus:bg-gray-200  focus:border-pink-500 focus:ring focus:ring-pink-300" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full  bg-gray-50 focus:bg-gray-200  focus:border-pink-500 focus:ring focus:ring-pink-300"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full  bg-gray-50 focus:bg-gray-200  focus:border-pink-500 focus:ring focus:ring-pink-300"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-pink-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
            {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-3 transform transition-all duration-150 hover:scale-110 hover:bg-pink-500 rounded-full">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    
</x-guest-layout>


