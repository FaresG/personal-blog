<nav class="h-10 bg-white flex gap-4 items-center justify-between px-3 mb-2">
    <div>
        <x-link>
            <x-slot:route>{{route('posts.index')}}</x-slot:route>
            Posts
        </x-link>
    </div>
    <div>
        @guest
            @if(Route::currentRouteName() !== 'auth.register')
        <x-link>
            <x-slot:route>{{route('auth.register')}}</x-slot:route>
            Register
        </x-link>
            @endif
            @if (Route::currentRouteName() !== 'login')
        <x-link>
                <x-slot:route>{{route('login')}}</x-slot:route>
                Login
        </x-link>
            @endif
        @endguest
        @auth
            <div class="flex gap-3 items-center">
                <a href="{{ route('profile.index') }}">Hi {{ Auth::user()->fullname() }}!</a>
                <form action="{{ route('logout') }}" method="post" class="mb-0">
                    @csrf
                    @method('delete')
                    <button type="submit" class="hover:opacity-50 hover:cursor-pointer py-2 px-2">Logout</button>
                </form>
            </div>
        @endauth
    </div>
</nav>
