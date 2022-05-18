<x-shared::layouts.page>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-shared::icons.logo class="w-56 h-56 fill-current text-gray-500" />
            </a>
        </div>

{{--    <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">{{ __('Name') }}</label>

                <x-shared::form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email">{{ __('Email') }}</label>

                <x-shared::form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">{{ __('Password') }}</label>

                <x-shared::form.input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>

                <x-shared::form.input
                    id="password_confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-shared::form.button class="ml-4">
                    {{ __('Register') }}
                </x-shared::form.button>
            </div>
        </form>
    </div>
</x-shared::layouts.page>
