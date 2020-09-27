<x-master>
    <div class="container mx-auto flex justify-center">
        <x-panel>
            <x-slot name="heading">{{ __('Reset Password') }}</x-slot>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email"
                    >
                        {{ __('E-Mail Address') }}
                    </label>

                    <input class="border border-gray-400 p-2 w-full @error('email') is-invalid @enderror"
                           type="email"
                           name="email"
                           id="email"
                           autocomplete="email"
                           value="{{ $email ?? old('email') }}"
                           required
                           autofocus
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

                    <input class="border border-gray-400 p-2 w-full @error('password') is-invalid @enderror"
                           type="password"
                           name="password"
                           id="password"
                           autocomplete="new-password"
                           required 
                    >

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password_confirmation"
                    >
                     {{ __('Confirm Password') }}
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           autocomplete="new-password"
                           required 
                    >

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                    {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>
