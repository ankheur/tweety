<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{ $tweet->user->avatar }}" alt="" class="rounded-full mr-2" width="50" height="50">
        </a>
    </div>
    <div class="flex-grow">
        <div class="flex items-center mb-4">
            <h5 class="font-bold mr-2"><a href="{{ route('profile', $tweet->user) }}">{{ $tweet->user->name }}</a></h5>
            <p class="text-sm text-gray-600">{{ '@' . $tweet->user->username }} · {{ $tweet->created_at->diffForHumans() }}</p>
        </div>

        <p class="text-sm mb-3">
            {{ $tweet->body }}
        </p>

        <form method="POST" action="{{ route('like', $tweet->id) }}">
            @csrf
            @if (current_user() && $tweet->isLikedByUser())
                @method('DELETE')
            @endif
            <button type="submit" class="flex items-center {{ current_user() && $tweet->isLikedByUser() ? 'text-blue-500' : 'text-gray-500' }}">
                <a class="mr-1"><i class="{{ current_user() && $tweet->isLikedByUser() ? 'fas' : 'far' }} fa-thumbs-up"></i></a>
                <span>{{ $tweet->likes ?: 0 }}</span>
            </button>
        </form>
    </div>

    @auth
    <div>
        <form method="POST" action="{{ route('delete_tweet', $tweet->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">
                <a class="mr-1"><i class="far fa-trash-alt"></i></a>
            </button>
        </form>
    </div>
    @endauth
</div>