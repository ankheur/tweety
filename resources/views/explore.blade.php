<x-app>
    <div>
        @foreach ($users as $user)
        <a href="{{ $user->path() }}" class="flex items-center mb-5">
            <img src="{{ $user->avatar }}" alt="{{ $user->username}} avatar" width="60" class="mr-4 rounded">
            <div>
                <h4 class="font-bold">{{ $user->name}}</h4> {{ '@' . $user->username }}
            </div>
        </a>
        @endforeach

        {{-- Pagination --}}
        {{ $users->links() }}
    </div>
</x-app>