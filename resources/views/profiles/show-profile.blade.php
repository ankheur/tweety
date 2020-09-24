<x-app>
    <header class="mb-6 relative">

        <div class="relative">
            <img src="{{ asset('images/good cop.jpg') }}" alt="" class="mb-2 rounded-lg" height="150px">
    
            <img src="{{ $user->avatar }}" alt="avatar" class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" width="150" style="left:50%;">
    
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <h3 class="italic mb-2">{{ '@' . $user->username }}</h3>
                <p class="text-xs">Since {{ $user->created_at->format('F Y') }}</p>
            </div>

            <div class="flex">
                @can ('update', $user)
                <a href="profile/edit" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
                @endcan

                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">
            {{ $user->biography }}
        </p>
    </header>

    @include('_timeline', [
        'tweets' => $tweets
    ])
</x-app>