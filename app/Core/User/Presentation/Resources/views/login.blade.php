<x-shared::layouts.page>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-shared::icons.logo class="w-56 h-56 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Session Status -->
            <x-user::auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
{{--            <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email">
                        {{ __('Email') }}
                    </label>

                    <x-shared::form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password">
                        {{ __('Password') }}
                    </label>

                    <x-shared::form.input
                        id="password"
                        class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password"
                    />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-shared::form.button class="ml-3">
                        {{ __('Log in') }}
                    </x-shared::form.button>
                </div>
            </form>
        </div>
    </div>
</x-shared::layouts.page>
