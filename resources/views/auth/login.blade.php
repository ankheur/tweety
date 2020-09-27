<x-master>
    <div class="container mx-auto flex justify-center">
        <x-panel>
            <x-slot name="heading">Login</x-slot>

            <form method="POST"
                  action="{{ route('login') }}"
            >
                @csrf

                @error('login_error')
                        <p class="text-red-500 text-xs mb-2"><strong>{{ $message }}</strong></p>
                @enderror

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email"
                    >
                    {{ __('Email') }}
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="email"
                           id="email"
                           autocomplete="email"
                           value="{{ old('email') }}"
                           required
                    >

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password"
                    >
                    {{ __('Password') }}
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                    >

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <div>
                        <input class="mr-1"
                               type="checkbox"
                               name="remember"
                               id="remember" {{ old('remember') ? ' checked' : '' }}
                        >

                        <label class="text-xs text-gray-700 font-bold uppercase"
                               for="remember"
                        >
                        {{ __('Remember Me') }}
                        </label>
                    </div>

                    @error('remember')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2"
                    >
                    {{ __('Submit') }}
                    </button>

                    <a href="{{ route('password.request') }}" class="text-xs text-gray-700">Forgot Your Password?</a>
                </div>

                <a class="text-sm italic" href="{{ route('register') }}">You don't have an account? Create one!</a>
            </form>
        </x-panel>
    </div>
</x-master>