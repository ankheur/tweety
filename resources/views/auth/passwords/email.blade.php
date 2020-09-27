<x-master>
    <div class="container mx-auto flex justify-center">
        <x-panel>
            <x-slot name="heading">{{ __('Reset Password') }}</x-slot>

                
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

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
                           value="{{ old('email') }}"
                           autocomplete="email"
                           required
                           autofocus
                    >

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
 

                <div class="mb-4">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                    {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>
