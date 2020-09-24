<x-panel>
    <x-slot name="heading">Followings</x-slot>
    
    <ul>
        @if (current_user())
            @forelse (current_user()->follows as $user)
            <li class="{{ $loop->last ? '' : 'mb-4' }}">
                
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                    <img src="{{ $user->avatar }}" alt="" class="rounded-full mr-2" width="40" height="40">
                    {{ $user->name }}
                </a>
                
            </li>
            @empty
                <li>Pas encore d'amis :(</li>
            @endforelse
        @else
            <p><a href="{{ url('/') }}">Connectez-vous pour ajouter des amis !</a></p>
        @endif
    </ul>
</x-panel>