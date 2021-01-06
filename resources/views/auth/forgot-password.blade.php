<x-guest-layout>
    <x-form-card>
        <x-slot name="title">
            Forgotten Password
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="w-full mt-1" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="w-full mt-2 bg-yellow-600 hover:bg-yellow-700">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
        </x-auth-card>
</x-guest-layout>
