<x-guest-layout>
    <x-form-card>
        <x-slot name="title">Login</x-slot>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" name="email" type="email" class="w-full my-1" requied autofocus />
            </div>
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" name="password" type="password" class="w-full my-1" required
                    autocomplete="current-password" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center text-xs font-semibold text-gray-600 uppercase">
                    <input id="remember_me" type="checkbox"
                        class="text-black bg-gray-200 border border-gray-200 rounded " name="remember">
                    <span class="ml-2">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-baseline justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="mr-2 text-sm text-gray-600 underline hover:text-gray-900 mt-auto"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="w-1/2 mt-2 bg-purple-600 hover:bg-purple-700">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>
    </x-form-card>
</x-guest-layout>
