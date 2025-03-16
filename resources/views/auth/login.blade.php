<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div>
        <h1 class="text-2xl font-semibold text-center text-white">{{ __('Log in') }}</h1>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-100"/> 
            <x-text-input id="email" class="block mt-1 w-full  bg-gray-50 focus:bg-gray-200 focus:border-pink-500 focus:ring focus:ring-pink-300 focus:ring-opacity-50 rounded-md" 
            type="email" 
            name="email" 
            :value="old('email')" 
            required autofocus 
            autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-100"/> 

            <x-text-input id="password" class="block mt-1 w-full bg-gray-50 focus:bg-gray-200  focus:border-pink-500 focus:ring focus:ring-pink-300 focus:ring-opacity-50 rounded-md" 
                    type="password" 
                    name="password" 
                    required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 " />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-black shadow-sm focus:ring-pink-500 checked:bg-pink-500 checked:border-pink-500" name="remember">
                <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4 ">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-300 hover:text-pink-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 transform transition-all duration-150 hover:scale-110 hover:bg-pink-500 rounded-full">
                {{ __('Log in') }}
            </x-primary-button>


        </div>
    </form>
</x-guest-layout>
