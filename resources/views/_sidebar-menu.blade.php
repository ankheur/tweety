<ul>
    <li>
        <a href="{{ route('home') }}" class="font-bold text-lg mb-4 block">{{ __('menu.Home') }}</a>
    </li>
    <li>
        <a href="{{ route('explore') }}" class="font-bold text-lg mb-4 block">{{ __('menu.Explore') }}</a>
    </li>
    {{-- <li>
        <a href="" class="font-bold text-lg mb-4 block">Notifications</a>
    </li>
    <li>
        <a href="" class="font-bold text-lg mb-4 block">Messages</a>
    </li> --}}
    <li>
        <a href="{{ current_user() ? route('profile', current_user()) : route('login') }}" class="font-bold text-lg mb-4 block">{{ __('menu.Profile') }}</a>
    </li>
    @auth
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="font-bold text-lg mb-4 block">{{ __('menu.Logout') }}</button>
        </form>
    </li>
    @endauth
    @guest
    <li>
        <a href="{{ route('login') }}" class="font-bold text-lg mb-4 block">{{ __('menu.Login') }}</a>
    </li>
    <li>
        <a href="{{ route('register') }}" class="font-bold text-lg mb-4 block">{{ __('menu.Register') }}</a>
    </li>
    @endguest
</ul>