<nav class="h-10 bg-white flex gap-4 items-center justify-between px-3 mb-2">
    <div>
        @if(Str::contains(Route::currentRouteName(), 'admin.'))
            <x-link>
                <x-slot:route>{{route('admin.dashboard.index')}}</x-slot:route>
                Dashboard
            </x-link>
            <x-link>
                <x-slot:route>{{route('admin.categories.index')}}</x-slot:route>
                Categories
            </x-link>
            <x-link>
                <x-slot:route>{{route('admin.logs.index')}}</x-slot:route>
                Logs
            </x-link>
        @else
            <x-link>
                <x-slot:route>{{route('posts.index')}}</x-slot:route>
                Posts
            </x-link>
        @endif
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
                @if(Gate::allows('show-admin-dashboard'))
                    @if(Str::contains(Route::currentRouteName(), 'admin.'))
                        <a href="{{ route('posts.index') }}">Front Office</a>
                    @else
                        <a href="{{ route('admin.dashboard.index') }}">Back Office</a>
                        <a href="{{ route('profile.index') }}">Hi {{ Auth::user()->fullname() }}!</a>
                    @endif

                @endif
                <form action="{{ route('logout') }}" method="post" class="mb-0">
                    @csrf
                    @method('delete')
                    <button type="submit" class="hover:opacity-50 hover:cursor-pointer py-2 px-2">Logout</button>
                </form>
            </div>
        @endauth
    </div>
</nav>
